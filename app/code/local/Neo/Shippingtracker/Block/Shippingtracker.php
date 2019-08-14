<?php
class Neo_Shippingtracker_Block_Shippingtracker extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getShippingtracker()     
     { 
        if (!$this->hasData('shippingtracker')) {
            $this->setData('shippingtracker', Mage::registry('shippingtracker'));
        }
        return $this->getData('shippingtracker');
        
    }
}