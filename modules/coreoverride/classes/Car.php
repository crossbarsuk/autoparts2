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
  public $vim;
  public $year;
  public $id_customer;
  public $active = 1;

  public static $definition = array(
    'table' => 'customer_car',
    'primary' => 'id_car',
    'fields' => array(
      'name' =>	array('type' => self::TYPE_STRING, 'validate' => 'isMessage'),
      'vim' =>	array('type' => self::TYPE_STRING, 'validate' => 'isMessage'),
      'year' =>	array('type' => self::TYPE_STRING, 'validate' => 'isInt'),
      'id_customer' =>	array('type' => self::TYPE_STRING, 'validate' => 'isInt'),
      'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
      'deleted' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
    ),
  );

  protected static $_customerHasCar = array();

  static public function customerHasCar($id_customer, $id_car) {
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
}