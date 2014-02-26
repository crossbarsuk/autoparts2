<?php
class AdminImportController extends AdminImportControllerCore
{



  
  



  
  



  
  



  
  



  
  



  
  



  
  



  
  



  
  



  
  



  
  



  
  



  
  



  
  



  
  



  
  



  
  
	public function __construct()
	{
		$this->entities = array(
			$this->l('Categories'),
			$this->l('Products'),
			$this->l('Combinations'),
			$this->l('Customers'),
			$this->l('Addresses'),
			$this->l('Manufacturers'),
			$this->l('Suppliers'),
			$this->l('Alias'),
      $this->l('Tecdoc'),
		);

		// @since 1.5.0
		if (Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT'))
		{
			$this->entities = array_merge(
				$this->entities,
				array(
					$this->l('Supply Orders'),
					$this->l('Supply Order Details'),
				)
			);
		}

		$this->entities = array_flip($this->entities);

		switch ((int)Tools::getValue('entity'))
		{
      case $this->entities[$this->l('Tecdoc')]:
        self::$validators['image'] = array(
          'AdminImportController',
          'split'
        );

        $this->available_fields = array(
          'no' => array('label' => $this->l('Ignore this column')),
          'reference' => array('label' => $this->l('Reference')),
          'quantity' => array('label' => $this->l('Quantity')),
          'price_tex' => array('label' => $this->l('Price tax excluded')),
          'price_tin' => array('label' => $this->l('Price tax included')),
          'wholesale_price' => array('label' => $this->l('Wholesale price')),
        );
        
        self::$default_values = array(
          'id_category' => array((int)Configuration::get('PS_HOME_CATEGORY')),
          'id_category_default' => (int)Configuration::get('PS_HOME_CATEGORY'),
          'active' => '1',
          'width' => 0.000000,
          'height' => 0.000000,
          'depth' => 0.000000,
          'weight' => 0.000000,
          'visibility' => 'both',
          'additional_shipping_cost' => 0.00,
          'unit_price_ratio' => 0.000000,
          'quantity' => 0,
          'minimal_quantity' => 1,
          'price' => 0,
          'id_tax_rules_group' => 0,
          'description_short' => array((int)Configuration::get('PS_LANG_DEFAULT') => ''),
          'link_rewrite' => array((int)Configuration::get('PS_LANG_DEFAULT') => ''),
          'online_only' => 0,
          'condition' => 'new',
          'available_date' => date('Y-m-d'),
          'date_add' => date('Y-m-d H:i:s'),
          'customizable' => 0,
          'uploadable_files' => 0,
          'text_fields' => 0,
          'out_of_stock' => '2',
          'advanced_stock_management' => 1,
        );
        break;

      case $this->entities[$this->l('Combinations')]:
				$this->required_fields = array(
					'id_product',
					'group',
					'attribute'
				);

				$this->available_fields = array(
					'no' => array('label' => $this->l('Ignore this column')),
					'id_product' => array('label' => $this->l('Product ID').'*'),
					'group' => array(
						'label' => $this->l('Attribute (Name:Type:Position)').'*'
					),
					'attribute' => array(
						'label' => $this->l('Value (Value:Position)').'*'
					),
					'supplier_reference' => array('label' => $this->l('Supplier reference')),
					'reference' => array('label' => $this->l('Reference')),
					'ean13' => array('label' => $this->l('EAN13')),
					'upc' => array('label' => $this->l('UPC')),
					'wholesale_price' => array('label' => $this->l('Wholesale price')),
					'price' => array('label' => $this->l('Impact on price')),
					'ecotax' => array('label' => $this->l('Ecotax')),
					'quantity' => array('label' => $this->l('Quantity')),
					'minimal_quantity' => array('label' => $this->l('Minimal quantity')),
					'weight' => array('label' => $this->l('Impact on weight')),
					'default_on' => array('label' => $this->l('Default (0 = No, 1 = Yes)')),
					'image_position' => array(
						'label' => $this->l('Image position')
					),
					'image_url' => array('label' => $this->l('Image URL')),
					'delete_existing_images' => array(
						'label' => $this->l('Delete existing images (0 = No, 1 = Yes)')
					),
					'shop' => array(
						'label' => $this->l('ID / Name of shop'),
						'help' => $this->l('Ignore this field if you don\'t use the Multistore tool. If you leave this field empty, the default shop will be used.'),
					)
				);

				self::$default_values = array(
					'reference' => '',
					'supplier_reference' => '',
					'ean13' => '',
					'upc' => '',
					'wholesale_price' => 0,
					'price' => 0,
					'ecotax' => 0,
					'quantity' => 0,
					'minimal_quantity' => 1,
					'weight' => 0,
					'default_on' => 0,
				);
			break;

			case $this->entities[$this->l('Categories')]:
				$this->available_fields = array(
					'no' => array('label' => $this->l('Ignore this column')),
					'id' => array('label' => $this->l('ID')),
					'active' => array('label' => $this->l('Active (0/1)')),
					'name' => array('label' => $this->l('Name *')),
					'parent' => array('label' => $this->l('Parent category')),
					'is_root_category' => array(
						'label' => $this->l('Root category (0/1)'),
						'help' => $this->l('A category root is where a category tree can begin. This is used with multistore.')
						),
					'description' => array('label' => $this->l('Description')),
					'meta_title' => array('label' => $this->l('Meta title')),
					'meta_keywords' => array('label' => $this->l('Meta keywords')),
					'meta_description' => array('label' => $this->l('Meta description')),
					'link_rewrite' => array('label' => $this->l('URL rewritten')),
					'image' => array('label' => $this->l('Image URL')),
					'shop' => array(
						'label' => $this->l('ID / Name of shop'),
						'help' => $this->l('Ignore this field if you don\'t use the Multistore tool. If you leave this field empty, the default shop will be used.'),
					),
				);

				self::$default_values = array(
					'active' => '1',
					'parent' => Configuration::get('PS_HOME_CATEGORY'),
					'link_rewrite' => ''
				);
			break;

			case $this->entities[$this->l('Products')]:
				self::$validators['image'] = array(
					'AdminImportController',
					'split'
				);

				$this->available_fields = array(
					'no' => array('label' => $this->l('Ignore this column')),
					'id' => array('label' => $this->l('ID')),
					'active' => array('label' => $this->l('Active (0/1)')),
					'name' => array('label' => $this->l('Name *')),
					'category' => array('label' => $this->l('Categories (x,y,z...)')),
					'price_tex' => array('label' => $this->l('Price tax excluded')),
					'price_tin' => array('label' => $this->l('Price tax included')),
					'id_tax_rules_group' => array('label' => $this->l('Tax rules ID')),
					'wholesale_price' => array('label' => $this->l('Wholesale price')),
					'on_sale' => array('label' => $this->l('On sale (0/1)')),
					'reduction_price' => array('label' => $this->l('Discount amount')),
					'reduction_percent' => array('label' => $this->l('Discount percent')),
					'reduction_from' => array('label' => $this->l('Discount from (yyyy-mm-dd)')),
					'reduction_to' => array('label' => $this->l('Discount to (yyyy-mm-dd)')),
					'reference' => array('label' => $this->l('Reference #')),
					'supplier_reference' => array('label' => $this->l('Supplier reference #')),
					'supplier' => array('label' => $this->l('Supplier')),
					'manufacturer' => array('label' => $this->l('Manufacturer')),
					'ean13' => array('label' => $this->l('EAN13')),
					'upc' => array('label' => $this->l('UPC')),
					'ecotax' => array('label' => $this->l('Ecotax')),
					'width' => array('label' => $this->l('Width')),
					'height' => array('label' => $this->l('Height')),
					'depth' => array('label' => $this->l('Depth')),
					'weight' => array('label' => $this->l('Weight')),
					'quantity' => array('label' => $this->l('Quantity')),
					'minimal_quantity' => array('label' => $this->l('Minimal quantity')),
					'visibility' => array('label' => $this->l('Visibility')),
					'additional_shipping_cost' => array('label' => $this->l('Additional shipping cost')),
					'unity' => array('label' => $this->l('Unity')),
					'unit_price_ratio' => array('label' => $this->l('Unit price ratio')),
					'description_short' => array('label' => $this->l('Short description')),
					'description' => array('label' => $this->l('Description')),
					'tags' => array('label' => $this->l('Tags (x,y,z...)')),
					'meta_title' => array('label' => $this->l('Meta title')),
					'meta_keywords' => array('label' => $this->l('Meta keywords')),
					'meta_description' => array('label' => $this->l('Meta description')),
					'link_rewrite' => array('label' => $this->l('URL rewritten')),
					'available_now' => array('label' => $this->l('Text when in stock')),
					'available_later' => array('label' => $this->l('Text when backorder allowed')),
					'available_for_order' => array('label' => $this->l('Available for order (0 = No, 1 = Yes)')),
					'available_date' => array('label' => $this->l('Product available date')),
					'date_add' => array('label' => $this->l('Product creation date')),
					'show_price' => array('label' => $this->l('Show price (0 = No, 1 = Yes)')),
					'image' => array('label' => $this->l('Image URLs (x,y,z...)')),
					'delete_existing_images' => array(
						'label' => $this->l('Delete existing images (0 = No, 1 = Yes)')
					),
					'features' => array('label' => $this->l('Feature(Name:Value:Position:Customized)')),
					'online_only' => array('label' => $this->l('Available online only (0 = No, 1 = Yes)')),
					'condition' => array('label' => $this->l('Condition')),
					'customizable' => array('label' => $this->l('Customizable (0 = No, 1 = Yes)')),
					'uploadable_files' => array('label' => $this->l('Uploadable files (0 = No, 1 = Yes)')),
					'text_fields' => array('label' => $this->l('Text fields (0 = No, 1 = Yes)')),
					'out_of_stock' => array('label' => $this->l('Action when out of stock')),
					'advanced_stock_management' => array('label' => $this->l('Advanced stock management')),
					'shop' => array(
						'label' => $this->l('ID / Name of shop'),
						'help' => $this->l('Ignore this field if you don\'t use the Multistore tool. If you leave this field empty, the default shop will be used.'),
					)
				);

				self::$default_values = array(
					'id_category' => array((int)Configuration::get('PS_HOME_CATEGORY')),
					'id_category_default' => (int)Configuration::get('PS_HOME_CATEGORY'),
					'active' => '1',
					'width' => 0.000000,
					'height' => 0.000000,
					'depth' => 0.000000,
					'weight' => 0.000000,
					'visibility' => 'both',
					'additional_shipping_cost' => 0.00,
					'unit_price_ratio' => 0.000000,
					'quantity' => 0,
					'minimal_quantity' => 1,
					'price' => 0,
					'id_tax_rules_group' => 0,
					'description_short' => array((int)Configuration::get('PS_LANG_DEFAULT') => ''),
					'link_rewrite' => array((int)Configuration::get('PS_LANG_DEFAULT') => ''),
					'online_only' => 0,
					'condition' => 'new',
					'available_date' => date('Y-m-d'),
					'date_add' => date('Y-m-d H:i:s'),
					'customizable' => 0,
					'uploadable_files' => 0,
					'text_fields' => 0,
					'out_of_stock' => '2',
					'advanced_stock_management' => '0',
				);
			break;

			case $this->entities[$this->l('Customers')]:
				//Overwrite required_fields AS only email is required whereas other entities
				$this->required_fields = array('email', 'passwd', 'lastname', 'firstname');

				$this->available_fields = array(
					'no' => array('label' => $this->l('Ignore this column')),
					'id' => array('label' => $this->l('ID')),
					'active' => array('label' => $this->l('Active  (0/1)')),
					'id_gender' => array('label' => $this->l('Titles ID (Mr = 1, Ms = 2, else 0)')),
					'email' => array('label' => $this->l('Email *')),
					'passwd' => array('label' => $this->l('Password *')),
					'birthday' => array('label' => $this->l('Birthday (yyyy-mm-dd)')),
					'lastname' => array('label' => $this->l('Last Name *')),
					'firstname' => array('label' => $this->l('First Name *')),
					'newsletter' => array('label' => $this->l('Newsletter (0/1)')),
					'optin' => array('label' => $this->l('Opt-in (0/1)')),
					'group' => array('label' => $this->l('Groups (x,y,z...)')),
					'id_default_group' => array('label' => $this->l('Default group ID')),
					'id_shop' => array(
						'label' => $this->l('ID / Name of shop'),
						'help' => $this->l('Ignore this field if you don\'t use the Multistore tool. If you leave this field empty, the default shop will be used.'),
					),
				);

				self::$default_values = array(
					'active' => '1',
					'id_shop' => Configuration::get('PS_SHOP_DEFAULT'),
				);
			break;

			case $this->entities[$this->l('Addresses')]:
				//Overwrite required_fields
				$this->required_fields = array(
					'alias',
					'lastname',
					'firstname',
					'address1',
					'postcode',
					'country',
					'customer_email',
					'city'
				);

				$this->available_fields = array(
					'no' => array('label' => $this->l('Ignore this column')),
					'id' => array('label' => $this->l('ID')),
					'alias' => array('label' => $this->l('Alias *')),
					'active' => array('label' => $this->l('Active  (0/1)')),
					'customer_email' => array('label' => $this->l('Customer email *')),
					'id_customer' => array('label' => $this->l('Customer ID:')),
					'manufacturer' => array('label' => $this->l('Manufacturer')),
					'supplier' => array('label' => $this->l('Supplier')),
					'company' => array('label' => $this->l('Company')),
					'lastname' => array('label' => $this->l('Last Name *')),
					'firstname' => array('label' => $this->l('First Name *')),
					'address1' => array('label' => $this->l('Address 1 *')),
					'address2' => array('label' => $this->l('Address 2')),
					'postcode' => array('label' => $this->l('Postal code / Zipcode *')),
					'city' => array('label' => $this->l('City *')),
					'country' => array('label' => $this->l('Country *')),
					'state' => array('label' => $this->l('State')),
					'other' => array('label' => $this->l('Other')),
					'phone' => array('label' => $this->l('Phone')),
					'phone_mobile' => array('label' => $this->l('Mobile Phone')),
					'vat_number' => array('label' => $this->l('VAT number')),
				);

				self::$default_values = array(
					'alias' => 'Alias',
					'postcode' => 'X'
				);
			break;
			case $this->entities[$this->l('Manufacturers')]:
			case $this->entities[$this->l('Suppliers')]:
				//Overwrite validators AS name is not MultiLangField
				self::$validators = array(
					'description' => array('AdminImportController', 'createMultiLangField'),
					'short_description' => array('AdminImportController', 'createMultiLangField'),
					'meta_title' => array('AdminImportController', 'createMultiLangField'),
					'meta_keywords' => array('AdminImportController', 'createMultiLangField'),
					'meta_description' => array('AdminImportController', 'createMultiLangField'),
				);

				$this->available_fields = array(
					'no' => array('label' => $this->l('Ignore this column')),
					'id' => array('label' => $this->l('ID')),
					'active' => array('label' => $this->l('Active (0/1)')),
					'name' => array('label' => $this->l('Name *')),
					'description' => array('label' => $this->l('Description')),
					'short_description' => array('label' => $this->l('Short description')),
					'meta_title' => array('label' => $this->l('Meta title')),
					'meta_keywords' => array('label' => $this->l('Meta keywords')),
					'meta_description' => array('label' => $this->l('Meta description')),
					'image' => array('label' => $this->l('Image URL')),
					'shop' => array(
						'label' => $this->l('ID / Name of group shop'),
						'help' => $this->l('Ignore this field if you don\'t use the Multistore tool. If you leave this field empty, the default shop will be used.'),
					),
				);

				self::$default_values = array(
					'shop' => Shop::getGroupFromShop(Configuration::get('PS_SHOP_DEFAULT')),
				);
			break;
			case $this->entities[$this->l('Alias')]:
				//Overwrite required_fields
				$this->required_fields = array(
					'alias',
					'search',
				);
				$this->available_fields = array(
					'no' => array('label' => $this->l('Ignore this column')),
					'id' => array('label' => $this->l('ID')),
					'alias' => array('label' => $this->l('Alias *')),
					'search' => array('label' => $this->l('Search *')),
					'active' => array('label' => $this->l('Active')),
					);
				self::$default_values = array(
					'active' => '1',
				);
			break;
		}
		
		// @since 1.5.0
		if (Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT'))
			switch ((int)Tools::getValue('entity'))
			{
				case $this->entities[$this->l('Supply Orders')]:
					// required fields
					$this->required_fields = array(
						'id_supplier',
						'id_warehouse',
						'reference',
						'date_delivery_expected',
					);
					// available fields
					$this->available_fields = array(
						'no' => array('label' => $this->l('Ignore this column')),
						'id' => array('label' => $this->l('ID')),
						'id_supplier' => array('label' => $this->l('Supplier ID *')),
						'id_lang' => array('label' => $this->l('Lang ID')),
						'id_warehouse' => array('label' => $this->l('Warehouse ID *')),
						'id_currency' => array('label' => $this->l('Currency ID *')),
						'reference' => array('label' => $this->l('Supply Order Reference *')),
						'date_delivery_expected' => array('label' => $this->l('Delivery Date (Y-M-D)*')),
						'discount_rate' => array('label' => $this->l('Discount Rate')),
						'is_template' => array('label' => $this->l('Template')),
					);
					// default values
					self::$default_values = array(
						'id_lang' => (int)Configuration::get('PS_LANG_DEFAULT'),
						'id_currency' => Currency::getDefaultCurrency()->id,
						'discount_rate' => '0',
						'is_template' => '0',
					);
				break;
				case $this->entities[$this->l('Supply Order Details')]:
					// required fields
					$this->required_fields = array(
						'supply_order_reference',
						'id_product',
						'unit_price_te',
						'quantity_expected',
					);
					// available fields
					$this->available_fields = array(
						'no' => array('label' => $this->l('Ignore this column')),
						'supply_order_reference' => array('label' => $this->l('Supply Order Reference *')),
						'id_product' => array('label' => $this->l('Product ID *')),
						'id_product_attribute' => array('label' => $this->l('Product Attribute ID')),
						'unit_price_te' => array('label' => $this->l('Unit Price (tax excl.)*')),
						'quantity_expected' => array('label' => $this->l('Quantity Expected *')),
						'discount_rate' => array('label' => $this->l('Discount Rate')),
						'tax_rate' => array('label' => $this->l('Tax Rate')),
					);
					// default values
					self::$default_values = array(
						'discount_rate' => '0',
						'tax_rate' => '0',
					);
				break;
					
			}

		$this->separator = ($separator = Tools::substr(strval(trim(Tools::getValue('separator'))), 0, 1)) ? $separator :  ';';
		$this->multiple_value_separator = ($separator = Tools::substr(strval(trim(Tools::getValue('multiple_value_separator'))), 0, 1)) ? $separator :  ',';
    AdminController::__construct();
	}

	public function tecdocImport()
  {
    $sSupplier = !empty($this->context->cookie->supplier_name) ? base64_decode($this->context->cookie->supplier_name) : '';
    if (empty($sSupplier)) {
      $this->errors[] = $this->l('Supplier name not specified. Supplier name must be specified for Tecdoc import.');
      $this->display = '';
      return;
    }
    
    $this->receiveTab();
    $handle = $this->openCsvFile();
    $default_language_id = (int)Configuration::get('PS_LANG_DEFAULT');
    $id_lang = Language::getIdByIso(Tools::getValue('iso_lang'));
    if (!Validate::isUnsignedId($id_lang))
      $id_lang = $default_language_id;
    AdminImportController::setLocale();
    $shop_ids = Shop::getCompleteListOfShopsID();
    for ($current_line = 0; $line = fgetcsv($handle, MAX_LINE_SIZE, $this->separator); $current_line++) {
      if (Tools::getValue('convert'))
        $line = $this->utf8EncodeArray($line);
      $info = AdminImportController::getMaskedRow($line);

      if (Tools::getValue('forceIDs') && isset($info['id']) && (int)$info['id'])
        $product = new Product((int)$info['id']);
      elseif (Tools::getValue('match_ref') && array_key_exists('reference', $info))
      {
        $datas = Db::getInstance()->getRow('
          SELECT p.`id_product`
          FROM `'._DB_PREFIX_.'product` p
          '.Shop::addSqlAssociation('product', 'p').'
          WHERE p.`reference` = "'.pSQL($info['reference']).'"
        ');
        if (isset($datas['id_product']) && $datas['id_product'])
          $product = new Product((int)$datas['id_product']);
        else
          $product = new Product();
      }
      elseif (array_key_exists('id', $info) && (int)$info['id'] && Product::existsInDatabase((int)$info['id'], 'product'))
        $product = new Product((int)$info['id']);
      else
        $product = new Product();

      if (isset($product->id) && $product->id && Product::existsInDatabase((int)$product->id, 'product'))
      {
        $product->loadStockData();
        $category_data = Product::getProductCategories((int)$product->id);
        foreach ($category_data as $tmp)
          $product->category[] = $tmp;
      }

      AdminImportController::setEntityDefaultValues($product);
      AdminImportController::arrayWalk($info, array('AdminImportController', 'fillInfo'), $product);

      if (empty($product->id)) {
        if (!isset($tecdoc)) {
          require_once(_PS_MODULE_DIR_ . '/tecdoc/TecDoc.class.php');
          $tecdoc = new TecDocBase();
        }
        
        //TODO: get data from TECDOC (product images and features) and apply to product
        $tecdoc->fillFromTecdoc($product);
        $product->advanced_stock_management = 1;
      }

      $product->supplier = $sSupplier;

      if (!Shop::isFeatureActive())
        $product->shop = 1;
      elseif (!isset($product->shop) || empty($product->shop))
        $product->shop = implode($this->multiple_value_separator, Shop::getContextListShopID());

      if (!Shop::isFeatureActive())
        $product->id_shop_default = 1;
      else
        $product->id_shop_default = (int)Context::getContext()->shop->id;

      // link product to shops
      $product->id_shop_list = array();
      foreach (explode($this->multiple_value_separator, $product->shop) as $shop)
        if (!empty($shop) && !is_numeric($shop))
          $product->id_shop_list[] = Shop::getIdByName($shop);
        elseif (!empty($shop))
          $product->id_shop_list[] = $shop;

      if ((int)$product->id_tax_rules_group != 0)
      {
        if (Validate::isLoadedObject(new TaxRulesGroup($product->id_tax_rules_group)))
        {
          $address = $this->context->shop->getAddress();
          $tax_manager = TaxManagerFactory::getManager($address, $product->id_tax_rules_group);
          $product_tax_calculator = $tax_manager->getTaxCalculator();
          $product->tax_rate = $product_tax_calculator->getTotalRate();
        }
        else
          $this->addProductWarning(
            'id_tax_rules_group',
            $product->id_tax_rules_group,
            Tools::displayError('Invalid tax rule group ID. You first need to create a group with this ID.')
          );
      }
      if (isset($product->manufacturer) && is_numeric($product->manufacturer) && Manufacturer::manufacturerExists((int)$product->manufacturer))
        $product->id_manufacturer = (int)$product->manufacturer;
      else if (isset($product->manufacturer) && is_string($product->manufacturer) && !empty($product->manufacturer))
      {
        if ($manufacturer = Manufacturer::getIdByName($product->manufacturer))
          $product->id_manufacturer = (int)$manufacturer;
        else
        {
          $manufacturer = new Manufacturer();
          $manufacturer->name = $product->manufacturer;
          if (($field_error = $manufacturer->validateFields(UNFRIENDLY_ERROR, true)) === true &&
            ($lang_field_error = $manufacturer->validateFieldsLang(UNFRIENDLY_ERROR, true)) === true && $manufacturer->add())
            $product->id_manufacturer = (int)$manufacturer->id;
          else
          {
            $this->errors[] = sprintf(
              Tools::displayError('%1$s (ID: %2$s) cannot be saved'),
              $manufacturer->name,
              (isset($manufacturer->id) && !empty($manufacturer->id))? $manufacturer->id : 'null'
            );
            $this->errors[] = ($field_error !== true ? $field_error : '').(isset($lang_field_error) && $lang_field_error !== true ? $lang_field_error : '').
              Db::getInstance()->getMsgError();
          }
        }
      }

      if (isset($product->supplier) && is_numeric($product->supplier) && Supplier::supplierExists((int)$product->supplier))
        $product->id_supplier = (int)$product->supplier;
      else if (isset($product->supplier) && is_string($product->supplier) && !empty($product->supplier))
      {
        if ($supplier = Supplier::getIdByName($product->supplier))
          $product->id_supplier = (int)$supplier;
        else
        {
          $supplier = new Supplier();
          $supplier->name = $product->supplier;
          $supplier->active = true;

          if (($field_error = $supplier->validateFields(UNFRIENDLY_ERROR, true)) === true &&
            ($lang_field_error = $supplier->validateFieldsLang(UNFRIENDLY_ERROR, true)) === true && $supplier->add())
          {
            $product->id_supplier = (int)$supplier->id;
            $supplier->associateTo($product->id_shop_list);
          }
          else
          {
            $this->errors[] = sprintf(
              Tools::displayError('%1$s (ID: %2$s) cannot be saved'),
              $supplier->name,
              (isset($supplier->id) && !empty($supplier->id))? $supplier->id : 'null'
            );
            $this->errors[] = ($field_error !== true ? $field_error : '').(isset($lang_field_error) && $lang_field_error !== true ? $lang_field_error : '').
              Db::getInstance()->getMsgError();
          }
        }
      }

      if (isset($product->price_tex) && !isset($product->price_tin))
        $product->price = $product->price_tex;
      else if (isset($product->price_tin) && !isset($product->price_tex))
      {
        $product->price = $product->price_tin;
        // If a tax is already included in price, withdraw it from price
        if ($product->tax_rate)
          $product->price = (float)number_format($product->price / (1 + $product->tax_rate / 100), 6, '.', '');
      }
      else if (isset($product->price_tin) && isset($product->price_tex))
        $product->price = $product->price_tex;

      $iPartsCat = Category::searchByNameAndParentCategoryId(Language::getIdByIso('RU'), 'Автозапчасти', Configuration::get('PS_HOME_CATEGORY'));
      if ($iPartsCat) {
        $product->id_category[] = $iPartsCat;
      }
      
      if (isset($product->category) && is_array($product->category) && count($product->category))
      {
        $product->id_category = array(); // Reset default values array
        foreach ($product->category as $value)
        {
          if (is_numeric($value))
          {
            if (Category::categoryExists((int)$value))
              $product->id_category[] = (int)$value;
            else
            {
              $category_to_create = new Category();
              $category_to_create->id = (int)$value;
              $category_to_create->name = AdminImportController::createMultiLangField($value);
              $category_to_create->active = 1;
              $category_to_create->id_parent = Configuration::get('PS_HOME_CATEGORY'); // Default parent is home for unknown category to create
              $category_link_rewrite = Tools::link_rewrite($category_to_create->name[$default_language_id]);
              $category_to_create->link_rewrite = AdminImportController::createMultiLangField($category_link_rewrite);
              if (($field_error = $category_to_create->validateFields(UNFRIENDLY_ERROR, true)) === true &&
                ($lang_field_error = $category_to_create->validateFieldsLang(UNFRIENDLY_ERROR, true)) === true && $category_to_create->add())
                $product->id_category[] = (int)$category_to_create->id;
              else
              {
                $this->errors[] = sprintf(
                  Tools::displayError('%1$s (ID: %2$s) cannot be saved'),
                  $category_to_create->name[$default_language_id],
                  (isset($category_to_create->id) && !empty($category_to_create->id))? $category_to_create->id : 'null'
                );
                $this->errors[] = ($field_error !== true ? $field_error : '').(isset($lang_field_error) && $lang_field_error !== true ? $lang_field_error : '').
                  Db::getInstance()->getMsgError();
              }
            }
          }
          else if (is_string($value) && !empty($value))
          {
            $category = Category::searchByName($id_lang, trim($value), true);
            if ($category['id_category'])
              $product->id_category[] = (int)$category['id_category'];
            else
            {
              $category_to_create = new Category();
              if (!Shop::isFeatureActive())
                $category_to_create->id_shop_default = 1;
              else
                $category_to_create->id_shop_default = (int)Context::getContext()->shop->id;
              $category_to_create->name = AdminImportController::createMultiLangField(trim($value));
              $category_to_create->active = 1;
              $category_to_create->id_parent = (int)Configuration::get('PS_HOME_CATEGORY'); // Default parent is home for unknown category to create
              $category_link_rewrite = Tools::link_rewrite($category_to_create->name[$default_language_id]);
              $category_to_create->link_rewrite = AdminImportController::createMultiLangField($category_link_rewrite);
              if (($field_error = $category_to_create->validateFields(UNFRIENDLY_ERROR, true)) === true &&
                ($lang_field_error = $category_to_create->validateFieldsLang(UNFRIENDLY_ERROR, true)) === true && $category_to_create->add())
                $product->id_category[] = (int)$category_to_create->id;
              else
              {
                $this->errors[] = sprintf(
                  Tools::displayError('%1$s (ID: %2$s) cannot be saved'),
                  $category_to_create->name[$default_language_id],
                  (isset($category_to_create->id) && !empty($category_to_create->id))? $category_to_create->id : 'null'
                );
                $this->errors[] = ($field_error !== true ? $field_error : '').(isset($lang_field_error) && $lang_field_error !== true ? $lang_field_error : '').
                  Db::getInstance()->getMsgError();
              }
            }
          }
        }
      }
      

      $product->id_category_default = isset($product->id_category[0]) ? (int)$product->id_category[0] : '';

      $link_rewrite = (is_array($product->link_rewrite) && isset($product->link_rewrite[$id_lang])) ? trim($product->link_rewrite[$id_lang]) : '';

      $valid_link = Validate::isLinkRewrite($link_rewrite);

      if ((isset($product->link_rewrite[$id_lang]) && empty($product->link_rewrite[$id_lang])) || !$valid_link)
      {
//        $link_rewrite = Tools::link_rewrite($product->name[$id_lang]);
        $link_rewrite = Tools::link_rewrite(Tools::ru2lat_utf($product->name[$default_language_id] . '-' . $product->reference));
        if ($link_rewrite == '')
          $link_rewrite = 'friendly-url-autogeneration-failed';
      }

      if (!$valid_link)
        $this->warnings[] = sprintf(
          Tools::displayError('Rewrite link for %1$s (ID: %2$s) was re-written as %3$s.'),
          $product->name[$id_lang],
          (isset($info['id']) && !empty($info['id']))? $info['id'] : 'null',
          $link_rewrite
        );

      if (!Tools::getValue('match_ref') || !(is_array($product->link_rewrite) && count($product->link_rewrite) && !empty($product->link_rewrite[$id_lang])))
        $product->link_rewrite = AdminImportController::createMultiLangField($link_rewrite);

      // replace the value of separator by coma
      if ($this->multiple_value_separator != ',')
        if (is_array($product->meta_keywords))
          foreach ($product->meta_keywords as &$meta_keyword)
            if (!empty($meta_keyword))
              $meta_keyword = str_replace($this->multiple_value_separator, ',', $meta_keyword);

      // Convert comma into dot for all floating values
      foreach (Product::$definition['fields'] as $key => $array)
        if ($array['type'] == Product::TYPE_FLOAT)
          $product->{$key} = str_replace(',', '.', $product->{$key});

      // Indexation is already 0 if it's a new product, but not if it's an update
      $product->indexed = 0;

      $res = false;
      $field_error = $product->validateFields(UNFRIENDLY_ERROR, true);
      $lang_field_error = $product->validateFieldsLang(UNFRIENDLY_ERROR, true);
      if ($field_error === true && $lang_field_error === true)
      {
        // check quantity
        if ($product->quantity == null)
          $product->quantity = 0;

        // If match ref is specified && ref product && ref product already in base, trying to update
        if (Tools::getValue('match_ref') == 1 && $product->reference && $product->existsRefInDatabase($product->reference))
        {
          $datas = Db::getInstance()->getRow('
						SELECT product_shop.`date_add`, p.`id_product`
						FROM `'._DB_PREFIX_.'product` p
						'.Shop::addSqlAssociation('product', 'p').'
						WHERE p.`reference` = "'.pSQL($product->reference).'"
					');
          $product->id = (int)$datas['id_product'];
          $product->date_add = pSQL($datas['date_add']);
          $res = $product->update();
        } // Else If id product && id product already in base, trying to update
        else if ($product->id && Product::existsInDatabase((int)$product->id, 'product'))
        {
          $datas = Db::getInstance()->getRow('
						SELECT product_shop.`date_add`
						FROM `'._DB_PREFIX_.'product` p
						'.Shop::addSqlAssociation('product', 'p').'
						WHERE p.`id_product` = '.(int)$product->id);
          $product->date_add = pSQL($datas['date_add']);
          $res = $product->update();
        }
        // If no id_product or update failed
        if (!$res)
        {
          if (isset($product->date_add) && $product->date_add != '')
            $res = $product->add(false);
          else
            $res = $product->add();
        }
      }

      $shops = array();
      $product_shop = explode($this->multiple_value_separator, $product->shop);
      foreach ($product_shop as $shop)
      {
        if (empty($shop))
          continue;
        $shop = trim($shop);
        if (!empty($shop) && !is_numeric($shop))
          $shop = Shop::getIdByName($shop);

        if (in_array($shop, $shop_ids))
          $shops[] = $shop;
        else
          $this->addProductWarning(Tools::safeOutput($info['name']), $product->id, $this->l('Shop is not valid'));
      }
      if (empty($shops))
        $shops = Shop::getContextListShopID();
      // If both failed, mysql error
      if (!$res)
      {
        $this->errors[] = sprintf(
          Tools::displayError('%1$s (ID: %2$s) cannot be saved'),
          (isset($info['name']) && !empty($info['name']))? Tools::safeOutput($info['name']) : 'No Name',
          (isset($info['id']) && !empty($info['id']))? Tools::safeOutput($info['id']) : 'No ID'
        );
        $this->errors[] = ($field_error !== true ? $field_error : '').(isset($lang_field_error) && $lang_field_error !== true ? $lang_field_error : '').
          Db::getInstance()->getMsgError();

      }
      else
      {
        // Product supplier
        if (isset($product->id_supplier) && property_exists($product, 'supplier_reference'))
        {
          $id_product_supplier = ProductSupplier::getIdByProductAndSupplier((int)$product->id, 0, (int)$product->id_supplier);
          if ($id_product_supplier)
            $product_supplier = new ProductSupplier((int)$id_product_supplier);
          else
            $product_supplier = new ProductSupplier();

          $product_supplier->id_product = $product->id;
          $product_supplier->id_product_attribute = 0;
          $product_supplier->id_supplier = $product->id_supplier;
          $product_supplier->product_supplier_price_te = $product->wholesale_price;
          $product_supplier->product_supplier_reference = $product->supplier_reference;
          $product_supplier->save();
        }

        // SpecificPrice (only the basic reduction feature is supported by the import)
        if (!Shop::isFeatureActive())
          $info['shop'] = 1;
        elseif (!isset($info['shop']) || empty($info['shop']))
          $info['shop'] = implode($this->multiple_value_separator, Shop::getContextListShopID());

        // Get shops for each attributes
        $info['shop'] = explode($this->multiple_value_separator, $info['shop']);

        $id_shop_list = array();
        foreach ($info['shop'] as $shop)
          if (!empty($shop) && !is_numeric($shop))
            $id_shop_list[] = (int)Shop::getIdByName($shop);
          elseif (!empty($shop))
            $id_shop_list[] = $shop;

        if ((isset($info['reduction_price']) && $info['reduction_price'] > 0) || (isset($info['reduction_percent']) && $info['reduction_percent'] > 0))
          foreach($id_shop_list as $id_shop)
          {
            $specific_price = SpecificPrice::getSpecificPrice($product->id, $id_shop, 0, 0, 0, 1, 0, 0, 0, 0);

            if (is_array($specific_price) && isset($specific_price['id_specific_price']))
              $specific_price = new SpecificPrice((int)$specific_price['id_specific_price']);
            else
              $specific_price = new SpecificPrice();
            $specific_price->id_product = (int)$product->id;
            $specific_price->id_specific_price_rule = 0;
            $specific_price->id_shop = $id_shop;
            $specific_price->id_currency = 0;
            $specific_price->id_country = 0;
            $specific_price->id_group = 0;
            $specific_price->price = -1;
            $specific_price->id_customer = 0;
            $specific_price->from_quantity = 1;
            $specific_price->reduction = (isset($info['reduction_price']) && $info['reduction_price']) ? $info['reduction_price'] : $info['reduction_percent'] / 100;
            $specific_price->reduction_type = (isset($info['reduction_price']) && $info['reduction_price']) ? 'amount' : 'percentage';
            $specific_price->from = (isset($info['reduction_from']) && Validate::isDate($info['reduction_from'])) ? $info['reduction_from'] : '0000-00-00 00:00:00';
            $specific_price->to = (isset($info['reduction_to']) && Validate::isDate($info['reduction_to']))  ? $info['reduction_to'] : '0000-00-00 00:00:00';
            if (!$specific_price->save())
              $this->addProductWarning(Tools::safeOutput($info['name']), $product->id, $this->l('Discount is invalid'));
          }

        if (isset($product->tags) && !empty($product->tags))
        {
          if (isset($product->id) && $product->id)
          {
            $tags = Tag::getProductTags($product->id);
            if (is_array($tags) && count($tags))
            {
              if (!empty($product->tags))
                $product->tags = explode($this->multiple_value_separator, $product->tags);
              if (is_array($product->tags) && count($product->tags))
              {
                foreach ($product->tags as $key => $tag)
                  if (!empty($tag))
                    $product->tags[$key] = trim($tag);
                $tags[$id_lang] = $product->tags;
                $product->tags = $tags;
              }
            }
          }
          // Delete tags for this id product, for no duplicating error
          Tag::deleteTagsForProduct($product->id);
          if (!is_array($product->tags) && !empty($product->tags))
          {
            $product->tags = AdminImportController::createMultiLangField($product->tags);
            foreach ($product->tags as $key => $tags)
            {
              $is_tag_added = Tag::addTags($key, $product->id, $tags, $this->multiple_value_separator);
              if (!$is_tag_added)
              {
                $this->addProductWarning(Tools::safeOutput($info['name']), $product->id, $this->l('Tags list is invalid'));
                break;
              }
            }
          }
          else
          {
            foreach ($product->tags as $key => $tags)
            {
              $str = '';
              foreach ($tags as $one_tag)
                $str .= $one_tag.$this->multiple_value_separator;
              $str = rtrim($str, $this->multiple_value_separator);

              $is_tag_added = Tag::addTags($key, $product->id, $str, $this->multiple_value_separator);
              if (!$is_tag_added)
              {
                $this->addProductWarning(Tools::safeOutput($info['name']), (int)$product->id, 'Invalid tag(s) ('.$str.')');
                break;
              }
            }
          }
        }
        //delete existing images if "delete_existing_images" is set to 1
        if (isset($product->delete_existing_images))
          if ((bool)$product->delete_existing_images)
            $product->deleteImages();
          else if (isset($product->image) && is_array($product->image) && count($product->image))
            $product->deleteImages();

        if (isset($product->image) && is_array($product->image) && count($product->image))
        {
          $product_has_images = (bool)Image::getImages($this->context->language->id, (int)$product->id);
          foreach ($product->image as $key => $url)
          {
            $url = trim($url);
            $error = false;
            if (!empty($url))
            {
              $url = str_replace(' ', '%20', $url);

              $image = new Image();
              $image->id_product = (int)$product->id;
              $image->position = Image::getHighestPosition($product->id) + 1;
              $image->cover = (!$key && !$product_has_images) ? true : false;
              // file_exists doesn't work with HTTP protocol
              if (($field_error = $image->validateFields(UNFRIENDLY_ERROR, true)) === true &&
                ($lang_field_error = $image->validateFieldsLang(UNFRIENDLY_ERROR, true)) === true && $image->add())
              {
                // associate image to selected shops
                $image->associateTo($shops);
                if (!AdminImportController::copyImg($product->id, $image->id, $url, 'products', !Tools::getValue('regenerate')))
                {
                  $image->delete();
                  $this->warnings[] = sprintf(Tools::displayError('Error copying image: %s'), $url);
                }
              }
              else
                $error = true;
            }
            else
              $error = true;

            if ($error)
              $this->warnings[] = sprintf(Tools::displayError('Product n°%1$d: the picture cannot be saved: %2$s'), $image->id_product, $url);
          }
        }
        if (isset($product->id_category))
          $product->updateCategories(array_map('intval', $product->id_category));

        // Features import
        $features = get_object_vars($product);

        if (isset($features['features']) && !empty($features['features']))
          foreach (explode($this->multiple_value_separator, $features['features']) as $single_feature)
          {
            if (empty($single_feature))
              continue;
            $tab_feature = explode(':', $single_feature);
            $feature_name = isset($tab_feature[0]) ? trim($tab_feature[0]) : '';
            $feature_value = isset($tab_feature[1]) ? trim($tab_feature[1]) : '';
            $position = isset($tab_feature[2]) ? (int)$tab_feature[2] : false;
            $custom = isset($tab_feature[3]) ? (int)$tab_feature[3] : false;
            if(!empty($feature_name) && !empty($feature_value))
            {
              $id_feature = (int)Feature::addFeatureImport($feature_name, $position);
              $id_product = null;
              if (Tools::getValue('forceIDs') || Tools::getValue('match_ref'))
                $id_product = (int)$product->id;
              $id_feature_value = (int)FeatureValue::addFeatureValueImport($id_feature, $feature_value, $id_product, $id_lang, $custom);
              Product::addFeatureProductImport($product->id, $id_feature, $id_feature_value);
            }
          }
        // clean feature positions to avoid conflict
        Feature::cleanPositions();
      }

      // stock available
      if (Shop::isFeatureActive()) {
        foreach ($shops as $shop) {
          StockAvailable::setProductDependsOnStock((int)$product->id, true, (int)$shop);
//          StockAvailable::setQuantity((int)$product->id, 0, $product->quantity, (int)$shop);
        }
      } else {
        StockAvailable::setProductDependsOnStock((int)$product->id, true, $this->context->shop->id);
//        StockAvailable::setQuantity((int)$product->id, 0, $product->quantity, $this->context->shop->id);
      }

      $this->addToWarehouse($product);
    }
    $this->closeCsvFile($handle);
  }

  public function postProcess()
  {
    /* PrestaShop demo mode */
    if (_PS_MODE_DEMO_)
    {
      $this->errors[] = Tools::displayError('This functionality has been disabled.');
      return;
    }
    /* PrestaShop demo mode*/

    if (Tools::isSubmit('submitFileUpload'))
    {
      $path = _PS_ADMIN_DIR_.'/import/'.date('YmdHis').'-';
      if (isset($_FILES['file']) && !empty($_FILES['file']['error']))
      {
        switch ($_FILES['file']['error'])
        {
          case UPLOAD_ERR_INI_SIZE:
            $this->errors[] = Tools::displayError('The uploaded file exceeds the upload_max_filesize directive in php.ini. If your server configuration allows it, you may add a directive in your .htaccess.');
            break;
          case UPLOAD_ERR_FORM_SIZE:
            $this->errors[] = Tools::displayError('The uploaded file exceeds the post_max_size directive in php.ini.
							If your server configuration allows it, you may add a directive in your .htaccess, for example:')
              .'<br/><a href="'.$this->context->link->getAdminLink('AdminMeta').'" >
						<code>php_value post_max_size 20M</code> '.
              Tools::displayError('(click to open "Generators" page)').'</a>';
            break;
            break;
          case UPLOAD_ERR_PARTIAL:
            $this->errors[] = Tools::displayError('The uploaded file was only partially uploaded.');
            break;
            break;
          case UPLOAD_ERR_NO_FILE:
            $this->errors[] = Tools::displayError('No file was uploaded.');
            break;
            break;
        }
      }
      elseif (!preg_match('/.*\.csv$/i', $_FILES['file']['name']))
        $this->errors[] = Tools::displayError('The extension of your file should be .csv.');
      elseif (!file_exists($_FILES['file']['tmp_name']) ||
        !@move_uploaded_file($_FILES['file']['tmp_name'], $path.$_FILES['file']['name']))
        $this->errors[] = $this->l('An error occurred while uploading / copying the file.');
      else
      {
        @chmod($path.$_FILES['file']['name'], 0664);
        Tools::redirectAdmin(self::$currentIndex.'&token='.Tools::getValue('token').'&conf=18');
      }
    }
    elseif (Tools::getValue('import'))
    {
      // Check if the CSV file exist
      if (Tools::getValue('csv'))
      {
        // If i am a superadmin, i can truncate table
        if (((Shop::isFeatureActive() && $this->context->employee->isSuperAdmin()) || !Shop::isFeatureActive()) && Tools::getValue('truncate'))
          $this->truncateTables((int)Tools::getValue('entity'));
        $import_type = false;
        switch ((int)Tools::getValue('entity'))
        {
          case $this->entities[$import_type = $this->l('Tecdoc')]:
            $this->tecdocImport();
            $this->clearSmartyCache();
            break;
          case $this->entities[$import_type = $this->l('Categories')]:
            $this->categoryImport();
            $this->clearSmartyCache();
            break;
          case $this->entities[$import_type = $this->l('Products')]:
            $this->productImport();
            $this->clearSmartyCache();
            break;
          case $this->entities[$import_type = $this->l('Customers')]:
            $this->customerImport();
            break;
          case $this->entities[$import_type = $this->l('Addresses')]:
            $this->addressImport();
            break;
          case $this->entities[$import_type = $this->l('Combinations')]:
            $this->attributeImport();
            $this->clearSmartyCache();
            break;
          case $this->entities[$import_type = $this->l('Manufacturers')]:
            $this->manufacturerImport();
            $this->clearSmartyCache();
            break;
          case $this->entities[$import_type = $this->l('Suppliers')]:
            $this->supplierImport();
            $this->clearSmartyCache();
            break;
          case $this->entities[$import_type = $this->l('Alias')]:
            $this->aliasImport();
            break;
        }

        // @since 1.5.0
        if (Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT'))
          switch ((int)Tools::getValue('entity'))
          {
            case $this->entities[$import_type = $this->l('Supply Orders')]:
              if (Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT'))
                $this->supplyOrdersImport();
              break;
            case $this->entities[$import_type = $this->l('Supply Order Details')]:
              if (Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT'))
                $this->supplyOrdersDetailsImport();
              break;
          }

        if ($import_type !== false)
        {
          $log_message = sprintf($this->l('%s import', 'AdminTab', false, false), $import_type);
          if (Tools::getValue('truncate'))
            $log_message .= ' '.$this->l('with truncate', 'AdminTab', false, false);
          Logger::addLog($log_message, 1, null, $import_type, null, true, (int)$this->context->employee->id);
        }
      }
      else
        $this->errors[] = $this->l('You must upload a file in order to proceed to the next step');
    }
    elseif ($filename = Tools::getValue('csvfilename'))
    {
      $filename = base64_decode($filename);
      $file =  _PS_ADMIN_DIR_.'/import/'.basename($filename);
      if (realpath(dirname($file)) != _PS_ADMIN_DIR_.DIRECTORY_SEPARATOR.'import')
        exit();
      if (!empty($filename))
      {
        $bName = basename($filename);
        if ($delete = Tools::getValue('delete') && file_exists($file))
          @unlink($file);
        elseif (file_exists($file))
        {
          $bName = explode('.', $bName);
          $bName = strtolower($bName[count($bName) - 1]);
          $mimeTypes = array('csv' => 'text/csv');

          if (isset($mimeTypes[$bName]))
            $mimeType = $mimeTypes[$bName];
          else
            $mimeType = 'application/octet-stream';
          if (ob_get_level() && ob_get_length() > 0)
            ob_end_clean();

          header('Content-Transfer-Encoding: binary');
          header('Content-Type: '.$mimeType);
          header('Content-Length: '.filesize($file));
          header('Content-Disposition: attachment; filename="'.$filename.'"');
          $fp = fopen($file, 'rb');
          while (is_resource($fp) && !feof($fp))
            echo fgets($fp, 16384);
          exit;
        }
      }
    }

    if (Tools::isSubmit('submitImportFile')) {
      $sSupplier = Tools::getValue('supplier_name');
      if (empty($sSupplier)) {
        $this->errors[] = $this->l('Supplier name not specified. Supplier name must be specified for Tecdoc import.');
        unset($this->context->cookie->supplier_name);
        $this->display = '';
        return;
//        Tools::redirectAdmin(self::$currentIndex.'&token='.Tools::getValue('token'));
      } else {
        $this->context->cookie->supplier_name = base64_encode($sSupplier);
      }
    }
    
    AdminController::postProcess();
  }

  public function renderForm()
  {
    if (!is_writable(_PS_ADMIN_DIR_.'/import/'))
      $this->displayWarning($this->l('Directory import on admin directory must be writable (CHMOD 755 / 777)'));

    if (isset($this->warnings) && count($this->warnings))
    {
      $warnings = array();
      foreach ($this->warnings as $warning)
        $warnings[] = $warning;
    }

    $files_to_import = scandir(_PS_ADMIN_DIR_.'/import/');
    uasort($files_to_import, array('AdminImportController', 'usortFiles'));
    foreach ($files_to_import as $k => &$filename)
      //exclude .  ..  .svn and index.php and all hidden files
      if (preg_match('/^\..*|index\.php/i', $filename))
        unset($files_to_import[$k]);
    unset($filename);

    $this->fields_form = array('');

    $this->toolbar_scroll = false;
    $this->toolbar_btn = array();

    // adds fancybox
    $this->addCSS(_PS_CSS_DIR_.'jquery.fancybox-1.3.4.css', 'screen');
    $this->addJqueryPlugin(array('fancybox'));

    $entity_selected = 0;
    if (isset($this->entities[$this->l(Tools::ucfirst(Tools::getValue('import_type')))]))
    {
      $entity_selected = $this->entities[$this->l(Tools::ucfirst(Tools::getValue('import_type')))];
      $this->context->cookie->entity_selected = (int)$entity_selected;
    }
    elseif (isset($this->context->cookie->entity_selected))
      $entity_selected = (int)$this->context->cookie->entity_selected;

    $csv_selected = '';
    if (isset($this->context->cookie->csv_selected))
      $csv_selected = base64_decode($this->context->cookie->csv_selected);

    $id_lang_selected = '';
    if (isset($this->context->cookie->iso_lang_selected) && $this->context->cookie->iso_lang_selected)
      $id_lang_selected = (int)Language::getIdByIso(base64_decode($this->context->cookie->iso_lang_selected));

    $separator_selected = $this->separator;
    if (isset($this->context->cookie->separator_selected) && $this->context->cookie->separator_selected)
      $separator_selected = base64_decode($this->context->cookie->separator_selected);

    $multiple_value_separator_selected = $this->multiple_value_separator;
    if (isset($this->context->cookie->multiple_value_separator_selected) && $this->context->cookie->multiple_value_separator_selected)
      $multiple_value_separator_selected = base64_decode($this->context->cookie->multiple_value_separator_selected);

    $supplier_name = $this->supplier_name;
    if (!empty($this->context->cookie->supplier_name))
      $supplier_name = base64_decode($this->context->cookie->supplier_name);
    
    $this->tpl_form_vars = array(
      'module_confirmation' => (Tools::getValue('import')) && (isset($this->warnings) && !count($this->warnings)),
      'path_import' => _PS_ADMIN_DIR_.'/import/',
      'entities' => $this->entities,
      'entity_selected' => $entity_selected,
      'csv_selected' => $csv_selected,
      'separator_selected' => $separator_selected,
      'multiple_value_separator_selected' => $multiple_value_separator_selected,
      'supplier_name' => $supplier_name,
      'files_to_import' => $files_to_import,
      'languages' => Language::getLanguages(false),
      'id_language' => ($id_lang_selected) ? $id_lang_selected : $this->context->language->id,
      'available_fields' => $this->getAvailableFields(),
      'truncateAuthorized' => (Shop::isFeatureActive() && $this->context->employee->isSuperAdmin()) || !Shop::isFeatureActive(),
      'PS_ADVANCED_STOCK_MANAGEMENT' => Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT'),
    );

    return AdminController::renderForm();
  }
  
  protected function createWarehouse($product) {
    $warehouse = new Warehouse();
    $warehouse->reference = $product->supplier;
    $warehouse->name = $product->supplier;
    $warehouse->id_currency = Currency::getIdByIsoCode('UAH');
    $warehouse->id_employee = Context::getContext()->employee->id;
    $warehouse->management_type = 'WA';
  
    //get warehouse address
    $id_address = Address::getAddressIdBySupplierId($product->id_supplier);
    if (!$id_address) {
      $address = new Address();
      $address->alias = $product->supplier;
      $address->lastname = 'warehouse'; // skip problem with numeric characters in warehouse name
      $address->firstname = 'warehouse'; // skip problem with numeric characters in warehouse name
      $address->address1 = 'warehouse';
      $address->address2 = 'warehouse';
      $address->postcode = '00001';
      $address->phone = '1234567';
      $address->id_country = Country::getByIso('UA');
      $address->id_state = null;//reset(State::getStatesByIdCountry($address->id_country));
      $address->city = 'warehouse';
      $address->save();

      $warehouse->id_address = $address->id;
    } else {
      $warehouse->id_address = $id_address;
    }

    $warehouse->save();
        
    return $warehouse;   
  }
  
  protected function addToWarehouse($product) {
    //get|create new Warehouse
    $id_warehouse = 0;
    foreach (Warehouse::getWarehouses() as $aWarehouse) {
      $aParams = explode(' - ', $aWarehouse['name']);
      if ($product->supplier == $aParams[0]) {
        $id_warehouse = $aWarehouse['id_warehouse'];
        break;
      }
    }

    if (!$id_warehouse || !Warehouse::exists($id_warehouse)) {
      $warehouse = $this->createWarehouse($product);
    } else {
      $warehouse = new Warehouse($id_warehouse);
    }
    //End: get|create new Warehouse

    //get|create new Warehouse product location
    $wpl_id = (int)WarehouseProductLocation::getIdByProductAndWarehouse((int)$product->id, 0, (int)$warehouse->id);
    if (empty($wpl_id)) {
      //create new record
      $warehouse_location_entity = new WarehouseProductLocation();
      $warehouse_location_entity->id_product = (int)$product->id;
      $warehouse_location_entity->id_product_attribute = 0;
      $warehouse_location_entity->id_warehouse = $warehouse->id;
//        $warehouse_location_entity->location = '';
      $warehouse_location_entity->save();
    }
    //End: get|create new Warehouse product location

    // add stock
    $stock_manager = StockManagerFactory::getManager();
    if ($stock_manager->addProduct($product->id, 0, $warehouse, $product->quantity, Configuration::get('PS_STOCK_MVT_INC_REASON_DEFAULT'), $product->wholesale_price, true)) {
      StockAvailable::synchronize($product->id);
    }
  }
}
?>
