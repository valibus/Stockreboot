<?php
/*
 * @author Pvalibus
 * @description Richsnippets class */

class Valibus_Stockreboot_Helper_Data extends Mage_Core_Helper_Abstract{
    public function isEnable(){
       return Mage::getStoreConfig('cataloginventory/options/autoreset');
    }
}