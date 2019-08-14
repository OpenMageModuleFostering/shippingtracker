<?php

class Neo_Shippingtracker_Model_Shippingtracker extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('shippingtracker/shippingtracker');
    }
}