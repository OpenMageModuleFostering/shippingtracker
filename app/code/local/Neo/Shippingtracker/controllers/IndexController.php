<?php
class Neo_Shippingtracker_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	$this->getResponse()->setHeader('HTTP/1.1','404 Not Found');
		$this->getResponse()->setHeader('Status','404 File not found');
		$pageId = Mage::getStoreConfig('web/default/cms_no_route');
		if (!Mage::helper('cms/page')->renderPage($this, $pageId)) {
		$this->_forward('defaultNoRoute');
		}
    }
}