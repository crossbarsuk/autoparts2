<?php
/*
* 2013-2014 Genstu
*
* www.genstu.com
*/

if (!defined('_PS_VERSION_'))
  exit;

class Tecdoc extends Module
{
  public function __construct()
  {
    $this->name = 'tecdoc';
    $this->tab = 'front_office_features';
    $this->version = '1.0';
    $this->author = 'Genstu';

    parent::__construct();

    $this->displayName = $this->l('TecDoc');
    $this->description = $this->l('Adds a TecDoc integration to shop.');
  }

  public function install()
  {
    if (
      parent::install() == false
      || $this->registerHook('header') == false
      || $this->registerHook('leftColumn') == false
//			|| $this->registerHook('rightColumn') == false
    )
      return false;
    return true;
  }

  public function hookHeader()
  {
    if (Configuration::get('PS_CATALOG_MODE'))
      return;

    $this->context->controller->addCSS(($this->_path).'tecdoc.css', 'all');
//	$this->context->controller->addJS(($this->_path).'ajax-cart.js');
  }

  public function hookRightColumn($params)
  {
    require_once(dirname(__FILE__) . '/TecDoc.class.php');
    
    $tecdoc = new TecDocBase();
    $aManufacturers = $tecdoc->getManufacturers();
    
    $this->smarty->assign('aManufacturers', $aManufacturers);
    
    return $this->display(__FILE__, 'tecdoc.tpl');
  }

  public function hookLeftColumn($params)
  {
    return $this->hookRightColumn($params);
  }
}

