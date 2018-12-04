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
    empty($data['agerange']) || empty($data['daysavailable']) || empty($data['phone']) || 
    empty($data['address']) || empty($data['nbs']) || empty($data['town']) || 
    empty($data['timeavailable']) || empty($data['currentchurch']))
{
    echo "empty";
} elseif (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL))
{
    echo "emailErr";
} elseif (duplicateExists($conn, 'newcomers', 'phone', $data['phone']))
{
    echo "phoneExists";
}
elseif (!empty($data['email']) && duplicateExists($conn, 'newcomers', 'email', $data['email'])) {
    echo "emailExists";
}
else 
{
    // Create new db table record
    create($conn, 'newcomers', $data);
    echo "OK";
}