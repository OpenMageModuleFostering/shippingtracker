<?php

class Neo_Shippingtracker_Block_Adminhtml_Shippingtracker_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('shippingtracker_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('shippingtracker')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('shippingtracker')->__('Item Information'),
          'title'     => Mage::helper('shippingtracker')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('shippingtracker/adminhtml_shippingtracker_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}