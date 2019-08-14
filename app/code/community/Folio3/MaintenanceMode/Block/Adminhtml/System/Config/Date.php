<?php
class Folio3_MaintenanceMode_Block_Adminhtml_System_Config_Date extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $date = new Varien_Data_Form_Element_Date;
        $timeFormat = ' H:mm:ss';
        $dateTimeformat = 'MM/d/y ' . $timeFormat;

        $data = array(
            'name'      => $element->getName(),
            'html_id'   => $element->getId(),
            'image'     => $this->getSkinUrl('images/grid-cal.gif'),
        );

        $date->setData($data);
        $value = $element->getValue();
        if($value == "Today"){
            $value = strtotime('now');
        }

        $date->setValue($value, $dateTimeformat);
        $date->setTime($date->getValue("H:mm"));

        $date->setFormat($dateTimeformat);
        $date->setForm($element->getForm());

        return $date->getElementHtml();
    }
}