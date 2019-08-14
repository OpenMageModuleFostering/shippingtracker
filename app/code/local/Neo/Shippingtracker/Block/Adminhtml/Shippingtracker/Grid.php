<?php

class Neo_Shippingtracker_Block_Adminhtml_Shippingtracker_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('shippingtrackerGrid');
      $this->setDefaultSort('shippingtracker_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('shippingtracker/shippingtracker')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('shippingtracker_id', array(
          'header'    => Mage::helper('shippingtracker')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'shippingtracker_id',
      ));

      $this->addColumn('title', array(
          'header'    => Mage::helper('shippingtracker')->__('Carrier Name'),
          'align'     =>'left',
          'index'     => 'title',
      ));

	  
      $this->addColumn('content', array(
			'header'    => Mage::helper('shippingtracker')->__('Url'),
			'width'     => '800px',
			'align'     =>'left',
			'index'     => 'content',
      ));
	  

      $this->addColumn('status', array(
          'header'    => Mage::helper('shippingtracker')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('shippingtracker')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('shippingtracker')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('shippingtracker')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('shippingtracker')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('shippingtracker_id');
        $this->getMassactionBlock()->setFormFieldName('shippingtracker');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('shippingtracker')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('shippingtracker')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('shippingtracker/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('shippingtracker')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('shippingtracker')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}