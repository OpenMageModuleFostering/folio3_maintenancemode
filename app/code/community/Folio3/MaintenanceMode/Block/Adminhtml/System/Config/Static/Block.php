<?php
class Folio3_MaintenanceMode_Block_Adminhtml_System_Config_Static_Block extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        if(!is_numeric($element->getValue())){
            $maintenanceBlock = Mage::getModel('cms/block')->load($element->getValue(), 'identifier');
            
            if($maintenanceBlock->getBlockId()) {
                $element->setValue($maintenanceBlock->getBlockId());
            }
        }

        return $element->getElementHtml();
    }
}