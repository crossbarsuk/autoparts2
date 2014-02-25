<?php
/*
* 2013-2014 Genstu
*
*  @author Polyakov Pavel <polyakov84@gmail.com>
*  @copyright  2013-2014 Genstu
*/

/**
 * SQL query builder
 */
class TecdocQuery extends DbQueryCore
{
  
  public function from($table, $alias = null, $sTablePrefix = null) {
    if (!empty($table))
      $this->query['from'][] = '`'.(isset($sTablePrefix) ? $sTablePrefix : TECDOC_PREFIX).$table.'`'.($alias ? ' '.$alias : '');
    return $this;
  }

  public function leftJoin($table, $alias = null, $on = null, $sTablePrefix = null) {
    return $this->join('LEFT JOIN `'.(isset($sTablePrefix) ? $sTablePrefix : TECDOC_PREFIX).bqSQL($table).'`'.($alias ? ' `'.pSQL($alias).'`' : '').($on ? ' ON '.$on : ''));
  }

  public function innerJoin($table, $alias = null, $on = null, $sTablePrefix = null) {
    return $this->join('INNER JOIN `'.(isset($sTablePrefix) ? $sTablePrefix : TECDOC_PREFIX).bqSQL($table).'`'.($alias ? ' '.pSQL($alias) : '').($on ? ' ON '.$on : ''));
  }

  public function leftOuterJoin($table, $alias = null, $on = null, $sTablePrefix = null) {
    return $this->join('LEFT OUTER JOIN `'.(isset($sTablePrefix) ? $sTablePrefix : TECDOC_PREFIX).bqSQL($table).'`'.($alias ? ' '.pSQL($alias) : '').($on ? ' ON '.$on : ''));
  }

  public function naturalJoin($table, $alias = null, $sTablePrefix = null) {
    return $this->join('NATURAL JOIN `'.(isset($sTablePrefix) ? $sTablePrefix : TECDOC_PREFIX).bqSQL($table).'`'.($alias ? ' '.pSQL($alias) : ''));
  }
}

