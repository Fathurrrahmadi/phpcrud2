<?php 
// Include config file 
include_once 'config.php'; 
 
// Database connection info 
$dbDetails = array( 
    'host' => DB_HOST, 
    'user' => DB_USER, 
    'pass' => DB_PASS, 
    'db'   => DB_NAME 
); 
 
// DB table to use 
$table = 'penertiban_sfr'; 
 
// Table's primary key 
$primaryKey = 'idsfr'; 
 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array(
    array( 'db' => 'idsfr', 'dt' => 0 ),
    array( 'db' => 'NAMA PENGGUNA', 'dt' => 1 ),
    array( 'db' => 'DINAS', 'dt' => 2 ),
    array( 'db' => 'SUBSERVICE', 'dt' => 3 ),
    array( 'db' => 'LOKASI', 'dt' => 4 ),
    array( 'db' => 'NOMER SPT', 'dt' => 5 ),
    array(
        'db' => 'JENIS PELANGGARAN',
        'dt' => 6,
        'formatter' => function( $d, $row ) {
            return $d === 'LEGAL' ? 'Legal' : 'Ilegal';
        }
    ),
    array( 'db' => 'TINDAKAN', 'dt' => 7 ),
    array( 'db' => 'STATUS', 'dt' => 8 ),
    array(
        'db' => 'TGL OPERASI',
        'dt' => 9,
        'formatter' => function( $d, $row ) {
            return date('jS M Y', strtotime($d));
        }
    ),
    array( 'db' => 'NO ISR TELAH SETELAH PENINDAKAN', 'dt' => 10 ),
    array( 'db' => 'NO SURAT PENINDAKAN', 'dt' => 11 ),
    array(
        'db' => 'TANGGAL TINDAKAN',
        'dt' => 12,
        'formatter' => function( $d, $row ) {
            return date('jS M Y', strtotime($d));
        }
    ),
    array( 'db' => 'KETERANGAN', 'dt' => 13 )
);
 
// Include SQL query processing class 
require 'ssp.class.php'; 
 
// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ) 
);

?>