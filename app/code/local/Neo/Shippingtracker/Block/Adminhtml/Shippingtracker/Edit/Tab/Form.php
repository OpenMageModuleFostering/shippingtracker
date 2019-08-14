<?php

class Neo_Shippingtracker_Block_Adminhtml_Shippingtracker_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('shippingtracker_form', array('legend'=>Mage::helper('shippingtracker')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('shippingtracker')->__('Carrier Name'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));
	  
	  $fieldset->addField('content', 'text', array(
          'label'     => Mage::helper('shippingtracker')->__('Url'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'content',
      ));
	  /*
      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('shippingtracker')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
	   * */
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('shippingtracker')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('shippingtracker')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('shippingtracker')->__('Disabled'),
              ),
          ),
      ));      
     
      if ( Mage::getSingleton('adminhtml/session')->getShippingtrackerData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getShippingtrackerData());
          Mage::getSingleton('adminhtml/session')->setShippingtrackerData(null);
      } elseif ( Mage::registry('shippingtracker_data') ) {
          $form->setValues(Mage::registry('shippingtracker_data')->getData());
      }
      return parent::_prepareForm();
  }
}