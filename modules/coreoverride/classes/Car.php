<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 26.02.14
 * Time: 9:25
 */

if (!defined('_PS_VERSION_'))
  exit;

class Car extends ObjectModel {

  public $id_car;
  public $name;
  public $vin;
  public $year;
  public $id_customer;
  public $id_model;
  public $id_manufacturer;
  public $id_mod;
  public $active = 1;
  public $deleted = 0;

  public static $definition = array(
    'table' => 'customer_car',
    'primary' => 'id_car',
    'fields' => array(
      'name' =>	array('type' => self::TYPE_STRING, 'validate' => 'isMessage'),
      'vin' =>	array('type' => self::TYPE_STRING, 'validate' => 'isMessage'),
      'year' =>	array('type' => self::TYPE_STRING, 'validate' => 'isInt'),
      'id_customer' =>	array('type' => self::TYPE_STRING, 'validate' => 'isInt'),
      'id_manufacturer' =>	array('type' => self::TYPE_STRING, 'validate' => 'isInt'),
      'id_model' =>	array('type' => self::TYPE_STRING, 'validate' => 'isInt'),
      'id_mod' =>	array('type' => self::TYPE_STRING, 'validate' => 'isInt'),
      'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
      'deleted' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
    ),
  );

  protected static $_customerHasCar = array();
  protected static $_customerCars = array();

  static public function customerHasCar($id_car, $id_customer = null) {
    $id_customer = isset($id_customer) ? $id_customer : Context::getContext()->customer->id;
    $key = (int)$id_customer.'-'.(int)$id_car;
    if (!array_key_exists($key, self::$_customerHasCar)) {
      $sql = new DbQuery();
      $sql->select('id_car');
      $sql->from('customer_car', 'car');
      $sql->where('id_customer = ' . (int)$id_customer.' AND id_car = ' . (int)$id_car . ' AND `deleted` = 0');
      
      self::$_customerHasCar[$key] = (bool)Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql->build());
    }
    
    return self::$_customerHasCar[$key];
  }
  
  static public function getCustomerCars($id_customer = null, $bOnlyActive = true) {
    $id_customer = isset($id_customer) ? $id_customer : Context::getContext()->customer->id;

    if (!array_key_exists($id_customer, self::$_customerCars)) {
      $sql = new DbQuery();
      $sql->select('*');
      $sql->from('customer_car', 'car');
      $sql->where('id_customer = ' . (int)$id_customer);
      if ($bOnlyActive) {
        $sql->where('`deleted` = 0');
      }

      self::$_customerCars[$id_customer] = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql->build());
      self::$_customerCars[$id_customer] = is_array(self::$_customerCars[$id_customer]) ? self::$_customerCars[$id_customer] : array();
    }

    return self::$_customerCars[$id_customer];
    
  }
}