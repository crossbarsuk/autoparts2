<?php
/*
* 2013-2014 Genstu
*
*  @author Polyakov Pavel
*  @copyright  2013-2014 Genstu
*/

if (!defined('_PS_VERSION_'))
	exit;

class BlockBanner extends Module
{
	public function __construct()
	{
		$this->name = 'blockbanner';
		$this->tab = 'front_office_features';
		$this->version = '1.0';
		$this->author = 'Genstu';

		parent::__construct();

		$this->displayName = $this->l('Banner block');
		$this->description = $this->l('Adds a block with banner.');
	}

	public function install()
	{
		if (
			parent::install() == false
			|| $this->registerHook('header') == false
			|| $this->registerHook('rightColumn') == false
    )
			return false;
		return true;
	}

	public function hookRightColumn($params)
	{
		return $this->display(__FILE__, 'blockbanner.tpl');
	}

	public function hookHeader()
	{
		$this->context->controller->addCSS(($this->_path).'blockbanner.css', 'all');
	}
}

