<?php
require_once( "settings/db.php" );
require_once( "db.php" );

class Magento
{
    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function getRevenue( $store, $from = "2000-01-01", $to = "2100-01-01", $tax = true )
    {
        if( $tax = true )
            $c = "row_total_incl_tax";
        else
            $c = "row_total";
        $revs = $this->db->query( "SELECT `$c` FROM sales_flat_order_item WHERE `created_at` BETWEEN '$from' AND '$to';" );
        $r = 0;
        foreach( $revs as $rev )
            $r = $r + $rev[$c];
        return $r;
    }
}
?>
