<?php
/*
* 2013-2014 Genstu
*
* www.genstu.com
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
		$this->description = $this->l('Override classes and controllers od shop core.');
	}

	public function install()
	{
		if (
			parent::install() == false
    )
			return false;
		return true;
	}
}

