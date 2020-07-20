<?php

$host = 'localhost';
$user = 'iixcyrum_BrianNyaberi';
$pass = '2WHJ#pnj&Bgb';
$db_name = 'iixcyrum_blog1';

$conn = new MySQLi($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die('Database connection error: ' . $conn->connect_error);
}