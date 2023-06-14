<?php

/* ==========
   call controller
============= */

require_once 'controllers/sales.controller.php';
$response = new SalesController();
$response -> getData();