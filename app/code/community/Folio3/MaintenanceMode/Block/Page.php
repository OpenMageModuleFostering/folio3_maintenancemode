<?php
class Folio3_MaintenanceMode_Block_Page extends Mage_Core_Block_Template{
    private $helper, $storeCode;

    public function __construct(){
        parent::__construct();

        $this->helper = Mage::helper('Folio3_MaintenanceMode');
        $this->storeCode = Mage::app()->getRequest()->getStoreCodeFromPath();
    }

    private function _loadBlock(){
        $staticBlockId = $this->helper->getConfig('pageStaticBlock', $this->storeCode);
        $pageContentBlock = $this->getLayout()->createBlock('cms/block')->setBlockId($staticBlockId);

        $this->append($pageContentBlock);
    }

    public function getStaticPageIdentifier(){
        $this->_loadBlock();
        return $this->getSortedChildren()[0];
    }

    public function hasCountdown(){
        $showCountdown = $this->helper->getConfig('showCountdown', $this->storeCode);
        if($showCountdown) {
            if ($this->getCountDownTime() !== '') {
                return true;
            }
        }

        return false;
    }

    public function getCountDownTime(){
        $upDateTime = $this->helper->getConfig('upDateTime', $this->storeCode);

        if($upDateTime !== ''){
            $upDateTime = strtotime($upDateTime);
            $Now = strtotime('now');

            $Diff = $upDateTime - $Now;
            if($Diff > 0){
                return $Diff;
            }
        }

        return '';
    }
}
?>