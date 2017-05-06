<?php
setlocale (LC_CTYPE, "ru_RU.UTF-8");
require 'classes/Users.php';
require 'classes/Group.php';
require 'classes/MembersOfGroup.php';

class pars {

    

    static function ObjecttoJSON($object){
        return json_encode($object,JSON_UNESCAPED_UNICODE);
    }
    
    static function JSONtoXML($json) {
        $xml=new SimpleXMLElement('<data/>');
        pars::arrayToXml($json, $xml);
        return html_entity_decode($xml->asXML(),ENT_QUOTES, 'utf-8');
    }
    static function arrayToXml($array,&$xml){
        foreach ($array as $key => $value) {
            if(is_array($value) || is_object($value)){
                pars::arrayToXml($value, $xml->addChild($key));
            }else{
                $xml->addChild($key, htmlspecialchars($value));
            }
        }        
    }
    
    static function JSONtoStr($json,&$result){
        foreach ($json as $key => $value) {
            if(is_array($value) || is_object($value)){
                $result.='Æ';
                pars::JSONtoStr($value, $result);
                $result=$result.'Æ';
            }else{
                $result.=$key.':'.$value.'Ћ';
            }
        }
    }

}
