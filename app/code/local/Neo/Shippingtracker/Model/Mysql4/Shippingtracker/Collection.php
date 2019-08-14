<?php

class Neo_Shippingtracker_Model_Mysql4_Shippingtracker_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('shippingtracker/shippingtracker');
    }
}