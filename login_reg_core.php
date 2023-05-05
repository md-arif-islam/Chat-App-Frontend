<?php

session_start();

include_once "config.php";
$connection = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
if ( !$connection ) {
    echo mysqli_error( $connection );
    throw new Exception( "Database cannot Connect" );
}

$action = $_REQUEST['action'] ?? '';
print_r( $action );

if ( 'registration' == $action ) {
    $fname = $_REQUEST['fname'] ?? '';
    $email = $_REQUEST['email'] ?? '';
    $password = $_REQUEST['password'] ?? '';

    if ( $fname && $email && $password ) {
        $hashPassword = password_hash( $password, PASSWORD_BCRYPT );
        $query = "INSERT INTO users(fname,email,password) VALUES ('{$fname}','$email','$hashPassword')";
        mysqli_query( $connection, $query );
        header( "location:index.php?success" );
    }
}
