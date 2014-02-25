<?php
class Tools extends ToolsCore
{
  public static function ru2lat_utf($string) {
    static $rus, $lat;
    
    if (is_null($rus)) {
      $rus = array('ё','ж','ц','ч','ш','щ','ю','я','Ё','Ж','Ц','Ч','Ш','Щ','Ю','Я');
      $lat = array('yo','zh','tc','ch','sh','sh','yu','ya','YO','ZH','TC','CH','SH','SH','YU','YA');

      $rusChars = "АБВГДЕЗИЙКЛМНОПРСТУФХЪЫЬЭабвгдезийклмнопрстуфхъыьэ";
      $latChars = "ABVGDEZIJKLMNOPRSTUFH_I_Eabvgdezijklmnoprstufh_i_e";
      $strLen = mb_strlen( $rusChars );
      for( $i = 0 ; $i < $strLen; $i++ ) {
        $rus[] = mb_substr( $rusChars, $i, 1 );
        $lat[] = mb_substr( $latChars, $i, 1 );
      }
    }
    
    return str_replace( $rus, $lat, $string );
  }
}
