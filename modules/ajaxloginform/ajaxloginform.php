<?php
/*
* 2013-2014 Genstu
*
*  @author Polyakov Pavel
*  @copyright  2013-2014 Genstu
*/

if (!defined('_PS_VERSION_'))
	exit;

class AjaxLoginForm extends Module
{
	public function __construct()
	{
		$this->name = 'ajaxloginform';
		$this->tab = 'front_office_features';
		$this->version = '1.0';
		$this->author = 'Genstu';

		parent::__construct();

		$this->displayName = $this->l('Ajax login form');
		$this->description = $this->l('Adds a block with ajax login form.');
	}

	public function install()
	{
		if (
			parent::install() == false
//			|| $this->registerHook('top') == false
			|| $this->registerHook('header') == false
			|| $this->registerHook('displayTop') == false
			|| $this->registerHook('leftColumn') == false
			|| $this->registerHook('rightColumn') == false
    )
			return false;
		return true;
	}

	public function hookRightColumn($params)
	{
    if (empty(Context::getContext()->customer->id)) {
      return $this->display(__FILE__, 'ajaxloginform.tpl');
    } else {
      return;
    }
	}

	public function hookLeftColumn($params)
	{
		return $this->hookRightColumn($params);
	}

  public function hookDisplayTop($params)
  {
    return $this->hookRightColumn($params);
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
		$this->context->controller->addCSS(($this->_path).'ajaxloginform.css', 'all');
		if ((int)(Configuration::get('PS_BLOCK_CART_AJAX')))
			$this->context->controller->addJS(($this->_path).'ajaxloginform.js');
	}
	
	public function hookTop($params)
	{
		return $this->hookRightColumn($params);
	}
}

