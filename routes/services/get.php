<?php

/* ==========
   call controller
============= */

require_once 'controllers/get.controller.php';
$response = new GetController();
$response -> getData();