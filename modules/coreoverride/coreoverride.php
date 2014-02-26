<?php
/*
* 2013-2014 Genstu
*
*  @author Polyakov Pavel
*  @copyright  2013-2014 Genstu
*/

if (!defined('_PS_VERSION_'))
	exit;

class CoreOverride extends Module
{
	public function __construct()
	{
		$this->name = 'coreoverride';
		$this->tab = 'front_office_features';
		$this->version = '1.0';
		$this->author = 'Genstu';

		parent::__construct();

		$this->displayName = $this->l('CoreOverride');
		$this->description = $this->l('CoreOverride');
	}

	public function install()
	{
		if (
			parent::install() == false
//			|| $this->registerHook('top') == false
			|| $this->registerHook('header') == false
      || !$this->installControllers()
//			|| $this->registerHook('displayTop') == false
//			|| $this->registerHook('leftColumn') == false
//			|| $this->registerHook('rightColumn') == false
    )
			return false;
		return true;
	}

  public function uninstall()
  {
    if (!$this->uninstallControllers() ||
      !parent::uninstall()) {
      return false;
    }
      
    return true;
  }

//	public function hookAjaxCall($params)
//	{
//		if (Configuration::get('PS_CATALOG_MODE'))
//			return;
//
//		$this->assignContentVars($params);
//		$res = $this->display(__FILE__, 'blockcart-json.tpl');
//		return $res;
//	}

	public function hookHeader()
	{
//		$this->context->controller->addCSS(($this->_path).'ajaxloginform.css', 'all');
//		if ((int)(Configuration::get('PS_BLOCK_CART_AJAX')))
//			$this->context->controller->addJS(($this->_path).'ajaxloginform.js');
	}

  protected function installControllers() {
    $this->_installControllers('front');
//    $this->_installControllers('admin');
  }

  protected function _installControllers($sType) {
    $sPath = dirname(__FILE__) . '/controllers/';
    $dPath = _PS_ROOT_DIR_ . '/controllers/';
    if ($handle = opendir($sPath . $sType)) {
      while (false !== ($filename = readdir($handle))) {
        $ext = substr(strrchr($filename, '.'), 1);
        if ($filename != "." && $filename != ".." && $ext == "php") {
          copy($sPath . $sType .'/' . $filename, $dPath . $sType .'/' . $filename);
        }
      } // while (false !== ($filename = readdir($handle)))
      closedir($handle);
    }
    
    return true;
  }

  protected function uninstallControllers() {
    $this->_uninstallControllers('front');
//    $this->_uninstallControllers('admin');
  }
  
  protected function _uninstallControllers($sType) {
    $sPath = dirname(__FILE__) . '/controllers/';
    $dPath = _PS_ROOT_DIR_ . '/controllers/';
    if ($handle = opendir($sPath . $sType)) {
      while (false !== ($filename = readdir($handle))) {
        $ext = substr(strrchr($filename, '.'), 1);
        if ($filename != "." && $filename != ".." && $ext == "php") {
          unlink($dPath . $sType .'/' . $filename);
        }
      } // while (false !== ($filename = readdir($handle)))
      closedir($handle);
    }

    return true;
  }

  protected function addCarDB() {
    $sTable = Db::getInstance()->executeS("SHOW TABLES LIKE `"._DB_PREFIX_."customer_car`");
    if (empty($sTable)) {
      Db::getInstance()->execute('
        CREATE TABLE `'._DB_PREFIX_.'customer_car` (
          `id_car` INT NOT NULL AUTO_INCREMENT,
          `name` VARCHAR(255) NOT NULL,
          `vim` VARCHAR(255) NOT NULL,
          `year` SMALLINT(4) NOT NULL,
          `id_customer` INT NOT NULL,
          `active` TINYINT(1) NOT NULL DEFAULT 1,
          `deleted` TINYINT(1) NOT NULL DEFAULT 0,
          PRIMARY KEY (`id_display_position`)
        ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;
      ');
    }

    return true;
  }
}

