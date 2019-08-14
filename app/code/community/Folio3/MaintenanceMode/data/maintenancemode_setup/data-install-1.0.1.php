<?php
    //--- Add a Default Maintenance Mode Static
    //--- Block Page for the Customer

    $content = '<style type="text/css">
            h1{
                margin-bottom: 20px;
                margin-left: 0px;
            }

            h2{
                margin-left: 494px;
                font-size: 1.6em;
            }

            .centered{
                margin-left: auto;
                margin-right: auto;
                width: 800px;
            }

            </style>

<div class="centered">
    <h1>we are sorry but this store is down for maintenance</h1>
    <h2>please try again later ...</h2>
</div>';

    //--- One Stati Block for All Store Views
    $stores = array(0);

    foreach ($stores as $store){
        $block = Mage::getModel('cms/block');

        $block->setTitle('Maintenance Mode');
        $block->setIdentifier('f3_maintenance');
        $block->setStores(array($store));
        $block->setIsActive(1);
        $block->setContent($content);

        $block->save();
    }
?>