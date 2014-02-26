<?php

class CarController extends FrontController
{
  public function setMedia() {
    $this->addCSS(_THEME_CSS_DIR_ . 'car.css');
    parent::setMedia();
  }

  /**
   * Initialize car controller
   * @see FrontController::init()
   */
  public function init() {
    parent::init();

    if ($this->ajax) {
      $aResult = array(
        'status' => 'ok',
      );

      $action = Tools::getValue('action', '');
      if (empty($action)) {
        $aResult['status'] = 'error';
        $aResult['error'] = 'incorrect or empty action';
        die(Tools::jsonEncode($aResult));
      }

      switch ($action) {
        case 'getmodels' :
          $this->ajaxGetModels($aResult);
          break;
        case 'getyears' :
          $this->ajaxGetYears($aResult);
          break;
      }

      die(Tools::jsonEncode($aResult));
    }
    
    
    // Get car ID
    $id_car = (int)Tools::getValue('id_car', 0);

    // Initialize car
    if ($id_car)
    {
      $this->_car = new Car($id_car);
      if (Validate::isLoadedObject($this->_car) && Car::customerHasCar($this->context->customer->id, $id_car)) {
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

    $manufacturerList = array();
    $modelList = array();
    $bEditMode = (int)Tools::getValue('edit_mode', 0);
    if ($bEditMode) {
      $tecdoc = new TecdocBase();

      $aManufacturers = $tecdoc->getManufacturers();
      foreach ($aManufacturers as $aManufacturer) {
        $manufacturerList[] = '<option value="' . $aManufacturer['id'] . '">' . $aManufacturer['name'] . '</option>';
      }
      $manufacturerList = implode("\n", $manufacturerList);

      $modelList = $this->getModelOptionList($aManufacturers[0]['id']);
    }
//    $this->assignModels();

    // Assign common vars
    $this->context->smarty->assign(array(
        'ajaxurl' => _MODULE_DIR_,
        'errors' => $this->errors,
        'token' => Tools::getToken(false),
//        'select_address' => (int)Tools::getValue('select_address'),
        'car' => $this->_car,
        'id_car' => (Validate::isLoadedObject($this->_car)) ? $this->_car->id : 0,
        'edit_mode' => $bEditMode,
        'manufacturerList' => $manufacturerList,
        'modelList' => $modelList,
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
    $car = new Car();
    $this->errors = $car->validateController();
    $car->id_customer = (int)$this->context->customer->id;

    // Check page token
    if ($this->context->customer->isLogged() && !$this->isTokenValid())
      $this->errors[] = Tools::displayError('Invalid token.');

    // Check the requires fields which are settings in the BO
    $this->errors = array_merge($this->errors, $car->validateFieldsRequiredDatabase());

    // Don't continue this process if we have errors !
    if ($this->errors && !$this->ajax)
      return;

    // Save car
    if ($result = $car->save()) {
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
        Tools::redirect('index.php?controller=cars');
    }
    $this->errors[] = Tools::displayError('An error occurred while updating your car.');
  }

  protected function getModelOptionList($iManufacturerId, $bOnlyPassenger = true) {
    $modelList = array();
    $tecdoc = new TecdocBase();
    foreach ($tecdoc->getModels($iManufacturerId, $bOnlyPassenger) as $aModel) {
      $modelList[] = '<option value="' . $aModel['id'] . '">' . $aModel['name'] . '</option>';
    }
    
    return implode("\n", $modelList);
  }

  protected function getYearOptionList($iModelId) {
    $tecdoc = new TecdocBase();
    $aModel = $tecdoc->getModel($iModelId);

    $yearList = array();
    if (is_array($aModel) && count($aModel)) {
      for ($i = (int)substr($aModel['start'], 0, 4); $i <= (int)substr($aModel['end'], 0, 4); ++$i) {
        $yearList[] = '<option value="' . $i . '">' . $i . '</option>';
      }
    }

    return implode("\n", $yearList);
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

  protected function ajaxGetYears(&$aResult) {
    $id_model = (int)Tools::getValue('id_model', '');
    if (empty($id_model)) {
      $aResult['status'] = 'error';
      $aResult['error'] = 'incorrect or empty id_model';

      return;
    }

    $yearList = $this->getYearOptionList($id_model);
    if (empty($yearList)) {
      $aResult['status'] = 'error';
      $aResult['error'] = 'incorrect or empty id_model';

      return;
    }

    $aResult['yearlist'] = $yearList;
  }
  
}