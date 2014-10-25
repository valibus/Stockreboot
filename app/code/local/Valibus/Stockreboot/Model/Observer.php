<?php
/*
 * @author valibus.us
 * @Description Overide the title with extra value
 */

class Valibus_Stockreboot_Model_Observer {

    public function reinit($observer){
        if(Mage::helper('valibus_stockreboot')->isEnable()===true){
            try {
                /** @var $product Mage_Catalog_Model_Product */
                $productId=$observer->getProduct()->getId();//->getName();
                /** @var $stockItem Mage_CatalogInventory_Model_Stock_Item */
                $stockItem=Mage::getModel('cataloginventory/stock_item')->loadByProduct($productId);
                if($stockItem->getQty()>0){
                    $stockItem->setData('is_in_stock', 1);
                    $stockItem->save();
                }
            } catch (Exception $e) {
                mage::log($e->getMessage(),0,'valibus_stockreboot.log');
            }

        }
    }
}
