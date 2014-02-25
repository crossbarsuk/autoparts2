<?php
/**
 * Created by Genstu.
 * User: pavel
 * Date: 10.02.14
 * Time: 12:30
 */

define('TECDOC_SERVER', 'localhost');
define('TECDOC_DB_NAME', 'tecdoc');
define('TECDOC_DB_USER', 'admin');
define('TECDOC_DB_PASSWD', 'root');

define('TECDOC_LANG_ID', '16');
define('TECDOC_PREFIX', 'TOF_');


/*
    $sql = new DbQuery();
		$sql->select('cp.`id_product_attribute`, cp.`id_product`);
		$sql->from('cart_product', 'cp');
		$sql->leftJoin('product', 'p', 'p.`id_product` = cp.`id_product`');
		$sql->innerJoin('product_shop', 'product_shop', '(product_shop.id_shop=cp.id_shop AND product_shop.id_product = p.id_product)');
		$sql->where('cp.`id_cart` = '.(int)$this->id);
		$sql->groupBy('unique_id');
		$sql->orderBy('p.id_product, cp.id_product_attribute, cp.date_add ASC');
   */

require_once(_PS_MODULE_DIR_ . '/tecdoc/TecdocQuery.class.php');


/**
 * Class TecDoc
 */
class TecDoc {
  private $_dbServer;
  private $_dbName;
  private $_dbUser;
  private $_dbPassword;
  
  private $_dbLink;
  
  public function __construct() {
    $this->connect();
  }
  
  public function connect() {
    /** @var DbPDOCore $db */
    $this->_dbLink = new DbPDO(TECDOC_SERVER, TECDOC_DB_USER, TECDOC_DB_PASSWD, TECDOC_DB_NAME);
  }

  /**
   * Get product info grom TECDOC base by $product->reference and fill product instance
   * 
   * @param $product - product instance
   */
  public function fillFromTecdoc(&$product) {
    $tecdocProduct = $this->getTecdocProduct($product->reference);

    $product->manufacturer = $tecdocProduct['manufacturer'];//$this->getManufacturer($product->reference);
    $product->category = $tecdocProduct['category'];

    $sDescription = !empty($tecdocProduct['description']) ? $tecdocProduct['description'] : $tecdocProduct['complete_description'];
    foreach (Language::getLanguages() as $aLang) {
      $product->name[$aLang['id_lang']] = $sDescription;
    }

    $product->image = $this->getImages($product->reference);
    
//    $product->image = array();
//    $features['features']
  }

  /**
   * Get text of description by DES_ID
   * 
   * @param $desId - DES_ID
   */
  protected function getDesText($desId) {
    $sql = new TecdocQuery();
    $sql->select('t.TEX_TEXT AS `text`');
    $sql->from('DES_TEXTS', 't');
    $sql->innerJoin('DESIGNATIONS', 'd', '(t.TEX_ID = d.DES_TEX_ID AND d.DES_LNG_ID = ' . TECDOC_LANG_ID .')');
    $sql->where("d.DES_ID = '" . $desId . "'");
    
    return trim($this->_dbLink->getValue($sql->build()));
  }
  
  protected function getFeatures($article) {
    $sql = new DbQuery();
    $sql->select('artcri.*, cri.*');
    $sql->from(TECDOC_PREFIX . 'ARTICLE_CRITERIA', 'artcri');
    $sql->innerJoin(TECDOC_PREFIX . 'CRITERIA', 'cri', '(cri.CRI_ID = artcri.ACR_CRI_ID)');
    $sql->innerJoin(TECDOC_PREFIX . 'ARTICLES', 'art', '(artcri.ACR_ART_ID = art.ART_ID)');
    $sql->where("art.ART_ARTICLE_NR = '" . $article . "'");

    $pRes = $this->_dbLink->query($sql->build());
    $criteriaList = array();
    while (($artCriRow = $pRes->fetch(PDO::FETCH_ASSOC))) {
      if (/*$artCriRow['CRI_TYPE'] == 'A' && */$artCriRow['ACR_DISPLAY'] == 0) {
        continue;
      }

      $optName = $this->getDesText($artCriRow['CRI_DES_ID']);
      $optValue = !empty($artCriRow['ACR_KV_DES_ID']) ? $this->getDesText($artCriRow['ACR_KV_DES_ID']) : $artCriRow['ACR_VALUE'];

      /*switch ($artCriRow['CRI_TYPE']) {
        case 'A':

          break;
        case 'B':

          break;
        case 'D':

          break;
        case 'K':
          
          break;
        case 'N':

          break;
        case 'V':

          break;
      }*/

      $criteriaList[] = array(
        'option' => $optName,
        'value' => $optValue,
      );
    }

    return $criteriaList;
  }
  
  protected function getName($article) {
    $sql = new TecdocQuery();
    $sql->select('artga.LAG_GA_ID AS id');
    $sql->from('LINK_ART_GA', 'artga');
    $sql->innerJoin('ARTICLES', 'art', '(artga.LAG_ART_ID = art.ART_ID)');
    $sql->where("art.ART_ARTICLE_NR = '" . $article . "'");
    $sql->orderBy('artga.LAG_GA_ID ASC');
    $gaId = $this->_dbLink->getValue($sql->build());

    $sql = new TecdocQuery();
    $sql->select('des.DES_ID');
    $sql->from('DESIGNATIONS', 'des');
    $sql->innerJoin('GENERIC_ARTICLES', 'ga', '(des.DES_ID = ga.GA_DES_ID)');
    $sql->where("ga.GA_ID = '" . $gaId . "' AND des.DES_LNG_ID = " . TECDOC_LANG_ID);
    $iDesId = $this->_dbLink->getValue($sql->build());
    
    return $this->getDesText($iDesId);
  }
 
  protected function getTecdocProduct($article) {
    $sql = new TecdocQuery();
    $sql->select('DISTINCT sup.SUP_BRAND AS manufacturer, art.ART_DES_ID AS description, art.ART_COMPLETE_DES_ID AS complete_description');
    $sql->from('ARTICLES', 'art');
    $sql->innerJoin('SUPPLIERS', 'sup', '(sup.SUP_ID = art.ART_SUP_ID)');
    $sql->where("art.ART_ARTICLE_NR = '" . $article . "'");
    $aArticle = $this->_dbLink->getRow($sql->build());

    $aArticle['description'] = $this->getDesText($aArticle['description']);
    $aArticle['complete_description'] = $this->getDesText($aArticle['complete_description']);

    $aArticle['category'] = $this->getCategories($article);
    
    return $aArticle;
  }

  protected function getCategories($article) {
    $aCatList = array();
    
    $sql = new TecdocQuery();
    $sql->select('DISTINCT ga.GA_DES_ID AS des_id');
    $sql->from('ARTICLES', 'art');
    $sql->innerJoin('LINK_ART_GA', 'la', '(la.LAG_ART_ID = art.ART_ID)');
    $sql->innerJoin('GENERIC_ARTICLES', 'ga', '(ga.GA_ID = la.LAG_GA_ID)');
    $sql->where("art.ART_ARTICLE_NR = '" . $article . "'");
    $pRes = $this->_dbLink->query($sql->build());
    while (($aRow = $pRes->fetch(PDO::FETCH_ASSOC))) {
      $sCatName = $this->getDesText($aRow['des_id']);
      if (!empty($sCatName)) {
        $aCatList[] = $sCatName;
      }
    }
    
    return $aCatList;
  }
  
  protected function getManufacturer($article) {
    $sql = new TecdocQuery();
    $sql->select('sup.SUP_BRAND');
    $sql->from('SUPPLIERS', 'sup');
    $sql->innerJoin('ARTICLES', 'art', '(sup.SUP_ID = art.ART_SUP_ID)');
    $sql->where("art.ART_ARTICLE_NR = '" . $article . "'");
    
    return $this->_dbLink->getValue($sql->build());
  }
  
  protected function getImages($article) {
    $imageList = array();
    
    $sql = new TecdocQuery();
    $sql->select('GRA_TAB_NR, GRA_GRD_ID, DOC_EXTENSION');
    $sql->from('LINK_GRA_ART', 'lga');
    $sql->innerJoin('GRAPHICS', 'gra', '(gra.GRA_ID = lga.LGA_GRA_ID AND gra.GRA_TAB_NR IS NOT NULL AND (gra.GRA_LNG_ID = ' . TECDOC_LANG_ID . ' OR gra.GRA_LNG_ID = 255))');
    $sql->innerJoin('DOC_TYPES', 'doc', '(doc.DOC_TYPE = gra.GRA_DOC_TYPE AND doc.DOC_EXTENSION != "PDF" AND gra.GRA_TYPE <> 2)');
    $sql->innerJoin('ARTICLES', 'art', '(art.ART_ID = lga.LGA_ART_ID)');
    $sql->where("art.ART_ARTICLE_NR = '" . $article . "'");
//    $sql->orderBy("gra.GRA_TAB_NR");
    $pRes = $this->_dbLink->query($sql->build());
    while (($aRow = $pRes->fetch(PDO::FETCH_ASSOC))) {
      $sql = new TecdocQuery();
      $sql->select('GRD_GRAPHIC');
      $sql->from('GRA_DATA_' . $aRow['GRA_TAB_NR'], 'gd');
      $sql->where("gd.GRD_ID = '" . $aRow['GRA_GRD_ID'] . "'");
      $sImage = $this->_dbLink->getValue($sql->build());
      
      if (!empty($sImage)) {
        $sFileName = _PS_ROOT_DIR_ . '/img_import/' . $aRow['GRA_GRD_ID'];
        $sFileExt = '.' . strtolower($aRow['DOC_EXTENSION']);
        $sImageUrl = _PS_BASE_URL_ . '/img_import/' . $aRow['GRA_GRD_ID'];
        file_put_contents($sFileName . $sFileExt, $sImage);
        if ($aRow['DOC_EXTENSION'] == 'JP2') { //convert JP2 to BMP
          shell_exec('j2k_to_image -i "' . $sFileName . '.jp2" -o "' . $sFileName . '.bmp"');
          $sFileExt = '.bmp';
          unlink($sFileName . '.jp2');
        }
        if (in_array($aRow['DOC_EXTENSION'], array('BMP', 'JP2', 'JPG'))) { //convert to PNG
          shell_exec('convert "' . $sFileName . $sFileExt . '" "' . $sFileName . '.png"');
          unlink($sFileName . '.bmp');
        }

        $imageList[] = $sImageUrl . '.png';
      }
    }
    
    return $imageList;
  }
  
  protected function findAnalogue($article) {
    $list = array();
    
    $sql = new TecdocQuery();
    $sql->select('ARL_KIND, IF (ART_LOOKUP.ARL_KIND = 2, SUPPLIERS.SUP_BRAND, BRANDS.BRA_BRAND) AS BRAND, ARL_DISPLAY_NR');
    $sql->from('ART_LOOKUP', 'arl');
    $sql->leftJoin('BRANDS', 'bra', '(bra.BRA_ID = arl.ARL_BRA_ID)');
    $sql->innerJoin('ARTICLES', 'art', '(art.ART_ID = arl.ARL_ART_ID)');
    $sql->innerJoin('SUPPLIERS', 'sup', '(sup.SUP_ID = art.ART_SUP_ID)');
    $sql->innerJoin(_DB_NAME_ . _DB_PREFIX_ . 'product', 'pro', '(pro.reference = art.ART_ARTICLE_NR)');
    $sql->where("art.ART_ARTICLE_NR = '" . $article . "' AND arl.ARL_KIND IN (2, 3, 4)");
    $sql->orderBy("arl.ARL_KIND, bra.BRA_BRAND, arl.ARL_DISPLAY_NR");
    $sql->limit(50);
    $pRes = $this->_dbLink->query($sql->build());
    while (($aRow = $pRes->fetch(PDO::FETCH_ASSOC))) {
      $list[] = $aRow;
    }

   
    
  }
} 