<?php
class Folio3_MaintenanceMode_Helper_Data extends Mage_Core_Helper_Abstract {
    public function getConfig($key, $storeId = null) {
        $path = 'MaintenanceMode/config/' . $key;
        return Mage::getStoreConfig($path, $storeId);
    }

    public function getMaintenancePageBlock(){
        $block = Mage::app()
            ->loadArea('frontend')
            ->getLayout()
            ->createBlock('folio3_maintenanceMode/page')
            ->setTemplate('maintenanceMode/page.phtml');

        return $block;
    }

    public function getAllowedIPs($storeCode){
        $allowedIPsString = $this->getConfig('allowedIPs', $storeCode);

        // remove spaces from string
        $allowedIPsString = trim(preg_replace('/ +/', ',', preg_replace('/[\n\r]/', ' ', $allowedIPsString)), ' ,');
        $allowedIPs = array();
        if ('' !== trim($allowedIPsString)) {
            $allowedIPs = explode(',', $allowedIPsString);
        }

        return $allowedIPs;
    }
}

