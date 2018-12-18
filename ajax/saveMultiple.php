<?php
include_once "ajax_bootstrap.php";
// Create Database object to spool db connection
$conn = new Database;
$validExtensions = array('txt', 'csv');
$path = UPLOAD_PATH;

if (!empty($_FILES['csv'])) {
    $csv = $_FILES['csv']['name'];
    $tmp = $_FILES['csv']['tmp_name'];

    // get uploaded file's extension
    $ext = strtolower(pathinfo($csv, PATHINFO_EXTENSION));
    // check if file's in valid format
    if (!in_array($ext, $validExtensions)) {
        echo "invalid";
    } else {
        // Generate random file name
        $finalCSV = date('d-m-Y h:i:s').'_wcms_members_'.rand(1000, 10000000).$csv;
        $path = $path.strtolower($finalCSV);
    }
    
}