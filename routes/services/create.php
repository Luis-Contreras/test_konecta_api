<?php

/* ==========
   CALL CONTROLLER CREATE
============= */
require_once 'controllers/create.controller.php';
$response = new CreateController();
$response -> createData();