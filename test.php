<?php
require_once( "classes/magento.php" );

$m = new Magento();
echo $m->getRevenue( "1" ) . "\n";
