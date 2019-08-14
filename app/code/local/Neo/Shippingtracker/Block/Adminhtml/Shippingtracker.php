<?php
class Neo_Shippingtracker_Block_Adminhtml_Shippingtracker extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_shippingtracker';
    $this->_blockGroup = 'shippingtracker';
    $this->_headerText = Mage::helper('shippingtracker')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('shippingtracker')->__('Add Item');
    parent::__construct();
  }
}