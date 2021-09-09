<?php
/**
 * Created by PhpStorm.
 * User: zoeofunne
 * Date: 09/09/2021
 * Time: 12:28
 */

// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName     = "dp-db";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}