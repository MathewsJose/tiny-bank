<?php
session_start();

header("Content-Type: application/json");

require __DIR__ . '/../vendor/autoload.php';

use TinyBank\Controller\BankController;

// Initialize the controller
$controller = new BankController();
$controller->handleRequest();
