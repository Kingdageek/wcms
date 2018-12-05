<?php
include_once "ajax_bootstrap.php";
// Create Database object to spool db connection
$conn = new Database;
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$data = $_POST;
$data = array_map( function($value) {
            return ucwords($value);
        }, $data); 
$data['date'] = getTime(); 

// Validations 

if (empty($data['fname']) || empty($data['lname']) || empty($data['gender']) || 
    empty($data['agerange']) || empty($data['isworker']) || empty($data['phone']) || 
    empty($data['address']) || empty($data['nbs']) || empty($data['town']) )
{
    echo "empty";
} elseif ($data['isworker'] == "Yes" && (empty($data['department']) || empty($data['isaffu']) || 
    empty($data['isleader'])))
{
    echo "workerEmpty";
} elseif (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL))
{
    echo "emailErr";
} elseif (duplicateExists($conn, 'members', 'phone', $data['phone']))
{
    echo "phoneExists";
}
elseif (!empty($data['email']) && duplicateExists($conn, 'members', 'email', $data['email'])) {
    echo "emailExists";
}
else 
{
    // Create new db table record
    create($conn, 'members', $data);
    echo "OK";
}