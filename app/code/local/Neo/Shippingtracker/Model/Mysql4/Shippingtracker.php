<?php

class Neo_Shippingtracker_Model_Mysql4_Shippingtracker extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the shippingtracker_id refers to the key field in your database table.
        $this->_init('shippingtracker/shippingtracker', 'shippingtracker_id');
    }
}