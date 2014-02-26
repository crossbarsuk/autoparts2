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
      }
      elseif ($this->ajax)
        exit;
      else
        Tools::redirect('index.php?controller=cars');
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

  /**
   * Assign template vars related to page content
   * @see FrontController::initContent()
   */
  public function initContent()
  {
    parent::initContent();

//    $this->assignManufacturers();
//    $this->assignModels();

    // Assign common vars
    $this->context->smarty->assign(array(
      'ajaxurl' => _MODULE_DIR_,
      'errors' => $this->errors,
      'token' => Tools::getToken(false),
//        'select_address' => (int)Tools::getValue('select_address'),
      'car' => $this->_car,
      'id_car' => (Validate::isLoadedObject($this->_car)) ? $this->_car->id : 0,
      'edit_mode' => (int)Tools::getValue('edit_mode', 0),
    ));

    if ($back = Tools::getValue('back'))
      $this->context->smarty->assign('back', Tools::safeOutput($back));
    if ($mod = Tools::getValue('mod'))
      $this->context->smarty->assign('mod', Tools::safeOutput($mod));

    $this->setTemplate(_PS_THEME_DIR_.'car.tpl');
  }

}