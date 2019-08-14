<?php

class Neo_Shippingtracker_Block_Adminhtml_Shippingtracker_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'shippingtracker';
        $this->_controller = 'adminhtml_shippingtracker';
        
        $this->_updateButton('save', 'label', Mage::helper('shippingtracker')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('shippingtracker')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('shippingtracker_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'shippingtracker_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'shippingtracker_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('shippingtracker_data') && Mage::registry('shippingtracker_data')->getId() ) {
            return Mage::helper('shippingtracker')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('shippingtracker_data')->getTitle()));
        } else {
            return Mage::helper('shippingtracker')->__('Add Item');
        }
    }
}