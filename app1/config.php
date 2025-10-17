<?php

$title = "Podman Aplikasi PHP";

// MySQL database connection details
$host     = 'host.containers.internal:3307'; // MySQL server hostname
$user     = 'user_app1'; // MySQL username
$password = 'Pass4app1'; // MySQL password
$database = 'app1'; // MySQL database name

// Create a database connection
$db = new mysqli($host, $user, $password, $database);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} else {
    echo "Connected successfully <br>";
}

