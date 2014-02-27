<?php

class CarController extends FrontController {
  
  protected $_bEditMode = 0;
  protected $_car = null;
  protected $_id_car = 0;
  protected $_bCustomerHasCar = false;
  protected $_ajaxResult = array('status' => 'ok',);

  public function setMedia() {
    $this->addCSS(_THEME_CSS_DIR_ . 'car.css');
    $this->addJQuery();
    $this->addJQueryUI('ui.dialog');
    $this->addJQueryUI('ui.button');
    parent::setMedia();
  }

  /**
   * Initialize car controller
   * @see FrontController::init()
   */
  public function init() {
    parent::init();

    $this->_id_car = (int)Tools::getValue('id_car', 0);
    if ($this->_id_car) {
      $this->_bCustomerHasCar = Car::customerHasCar($this->_id_car);
    }
    if ($this->_id_car && $this->_bCustomerHasCar) {
      $this->_car = new Car($this->_id_car);
    } else {
      $this->_car = new Car();
    }
    
    if ($this->ajax) {
      $action = Tools::getValue('action', '');
      if (empty($action)) {
        $this->ajaxError('incorrect or empty action');
      }

      switch ($action) {
        case 'getmodels' :
          $this->ajaxGetModels($aResult);
          break;
        case 'gettypes' :
          $this->ajaxGetTypes($aResult);
          break;
        case 'getyears' :
          $this->ajaxGetYears($aResult);
          break;
        case 'getcar' :
          $this->checkAjaxCustomerCar();
          $this->ajaxGetCar($aResult);
          break;
        case 'deletecar' :
          $this->checkAjaxCustomerCar();
          if (!$this->_car->delete()) {
            $this->ajaxError('This car cannot be deleted.');
          }
          break;
      }

      die(Tools::jsonEncode($aResult));
    }

    $this->_bEditMode = (int)Tools::getValue('edit_mode', 0);
    if ($this->_bEditMode) {
      // Initialize car
      if (Validate::isLoadedObject($this->_car) && Car::customerHasCar($this->_id_car)) {
        if (Tools::isSubmit('delete')) {
          if ($this->_car->delete()) {
            Tools::redirect('index.php?controller=cars');
          }
          $this->errors[] = Tools::displayError('This car cannot be deleted.');
        }
      } else {
        Tools::redirect('index.php?controller=cars');
      }
    }
  }

  /**
   * Start forms process
   * @see FrontController::postProcess()
   */
  public function postProcess() {
    if (Tools::isSubmit('submitCar'))
      $this->processSubmitCar();
    
  }

  public function initContent()
  {
    parent::initContent();

    if ($this->_bEditMode) {
      $manufacturerList = $this->getManufacturerOptionList();

      $this->context->smarty->assign(array(
        'errors' => $this->errors,
        'car' => Validate::isLoadedObject($this->_car) ? $this->_car : '',
        'manufacturerList' => $manufacturerList,
      ));
      
    } else {
      $carList = $this->getCarOptionList();
      $this->context->smarty->assign('carList', $carList);
    }

    // Assign common vars
    $this->context->smarty->assign(array(
      'ajaxurl' => _MODULE_DIR_,
      'token' => Tools::getToken(false),
      'edit_mode' => $this->_bEditMode,
    ));

    if ($back = Tools::getValue('back'))
      $this->context->smarty->assign('back', Tools::safeOutput($back));
    if ($mod = Tools::getValue('mod'))
      $this->context->smarty->assign('mod', Tools::safeOutput($mod));

    $this->setTemplate(_PS_THEME_DIR_.'car.tpl');
  }
  
  /**
   * Process changes on an car
   */
  protected function processSubmitCar()
  {
    $this->errors = $this->_car->validateController();
    $this->_car->id_customer = (int)$this->context->customer->id;
    $this->_car->vin = strtoupper($this->_car->vin);

    // Check page token
    if ($this->context->customer->isLogged() && !$this->isTokenValid())
      $this->errors[] = Tools::displayError('Invalid token.');

    // Check the requires fields which are settings in the BO
    $this->errors = array_merge($this->errors, $this->_car->validateFieldsRequiredDatabase());

    // Don't continue this process if we have errors !
    if ($this->errors && !$this->ajax)
      return;

    // Save car
    if ($result = $this->_car->save()) {
      if ($this->ajax) {
        $return = array(
          'hasError' => (bool)$this->errors,
          'errors' => $this->errors,
        );
        die(Tools::jsonEncode($return));
      }

      // Redirect to old page or current page
      if ($back = Tools::getValue('back'))
      {
        if ($back == Tools::secureReferrer(Tools::getValue('back')))
          Tools::redirect(html_entity_decode($back));
        $mod = Tools::getValue('mod');
        Tools::redirect('index.php?controller='.$back.($mod ? '&back='.$mod : ''));
      }
      else
        Tools::redirect('index.php?controller=car');
    }
    $this->errors[] = Tools::displayError('An error occurred while updating your car.');
  }
  
  protected function getCarOptionList() {
    $list = array();
    foreach (Car::getCustomerCars() as $aCar) {
      $list[] = '<option value="' . $aCar['id_car'] . '">' . $aCar['name'] . '</option>';
    }

    return implode("\n", $list);
  }
  
  protected function getModelOptionList($iManufacturerId, $bOnlyPassenger = true) {
    $id_model = is_object($this->_car) && !empty($this->_car->id_model) ? $this->_car->id_model : 0;
    
    $modelList = array();
    $tecdoc = new TecdocBase();
    foreach ($tecdoc->getModels($iManufacturerId, $bOnlyPassenger) as $aModel) {
      $modelList[] = '<option value="' . $aModel['id'] . '"' . ($id_model == $aModel['id'] ? ' selected="selected"' : '') . '>' . $aModel['name'] . '</option>';
    }
    
    return implode("\n", $modelList);
  }

  protected function getManufacturerOptionList($bOnlyPassenger = true) {
    $id_manufacturer = is_object($this->_car) && !empty($this->_car->id_manufacturer) ? $this->_car->id_manufacturer : 0;

    $list = array();
    $tecdoc = new TecdocBase();
    foreach ($tecdoc->getManufacturers($bOnlyPassenger) as $aManufacturer) {
      $list[] = '<option value="' . $aManufacturer['id'] . '"' . ($id_manufacturer == $aManufacturer['id'] ? ' selected="selected"' : '') . '>' . $aManufacturer['name'] . '</option>';
    }

    return implode("\n", $list);
  }

  protected function getYearOptionList($iTypeId) {
    $year = is_object($this->_car) && !empty($this->_car->year) ? $this->_car->year : 0;
    
    $tecdoc = new TecdocBase();
    $aType = $tecdoc->getType($iTypeId);

    $yearList = array();
    if (is_array($aType) && count($aType)) {
      $iEnd = !empty($aType['end']) ? (int)substr($aType['end'], 0, 4) : (int)date('Y');
      for ($i = (int)substr($aType['start'], 0, 4); $i <= $iEnd; ++$i) {
        $yearList[] = '<option value="' . $i . '"' . ($year == $i ? ' selected="selected"' : '') . '>' . $i . '</option>';
      }
    }

    return implode("\n", $yearList);
  }

  protected function getTypeOptionList($iModelId) {
    $id_type = is_object($this->_car) && !empty($this->_car->id_type) ? $this->_car->id_type : 0;

    $list = array();
    $tecdoc = new TecdocBase();
    foreach ($tecdoc->getTypes($iModelId) as $aItem) {
      $list[] = '<option value="' . $aItem['id'] . '"' . ($id_type == $aItem['id'] ? ' selected="selected"' : '') . '>' . $aItem['name'] . '</option>';
    }

    return implode("\n", $list);
  }
  
  protected function ajaxGetCar(&$aResult) {
    $id_car = (int)Tools::getValue('id_car', '');
    if (empty($id_car)) {
      $this->ajaxError('incorrect or empty id_car');
    }

    $car = new Car($id_car);
    if (!is_object($car)) {
      $this->ajaxError('incorrect or empty id_car');
    }

    $manufacturer = Car::getCarManufacturer($car->id);

    $aResult['car'] = array(
      'id_car' => $car->id,
      'name' => $car->name,
      'vin' => $car->vin,
      'year' => $car->year,
      'manufacturer' => isset($manufacturer['name']) ? $manufacturer['name'] : '',
    );
  }

  protected function ajaxGetModels(&$aResult) {
    $id_manufacturer = (int)Tools::getValue('id_manufacturer', '');
    if (empty($id_manufacturer)) {
      $aResult['status'] = 'error';
      $aResult['error'] = 'incorrect or empty id_manufacturer';
      
      return;
    }
    
    $modelOptionList = $this->getModelOptionList($id_manufacturer);
    if (empty($modelOptionList)) {
      $aResult['status'] = 'error';
      $aResult['error'] = 'incorrect or empty model list';

      return;
    }

    $aResult['models'] = $modelOptionList;
  }

  protected function ajaxGetTypes(&$aResult) {
    $id_model = (int)Tools::getValue('id_model', '');
    if (empty($id_model)) {
      $this->ajaxError('incorrect or empty id_model');
    }

    $modelOptionList = $this->getTypeOptionList($id_model);
    if (empty($modelOptionList)) {
      $this->ajaxError('incorrect or empty id_model');
    }

    $aResult['types'] = $modelOptionList;
  }
  
  protected function ajaxGetYears(&$aResult) {
    $id_type = (int)Tools::getValue('id_type', '');
    if (empty($id_type)) {
      $this->ajaxError('incorrect or empty id_type');
    }

    $yearList = $this->getYearOptionList($id_type);
    if (empty($yearList)) {
      $this->ajaxError('incorrect or empty id_type');
    }

    $aResult['years'] = $yearList;
  }

  protected function ajaxError($sMessage) {
    $this->_ajaxResult['status'] = 'error';
    $this->_ajaxResult['error'] = $sMessage;
    
    die(Tools::jsonEncode($this->_ajaxResult));
  }
  
  protected function checkAjaxCustomerCar() {
    if (!$this->_bCustomerHasCar) {
      $this->ajaxError('customer has no car with this id_car');
    }
  }
  
}