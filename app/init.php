<?php
// app/init.php

// Core
require_once __DIR__ . '/core/App.php';
require_once __DIR__ . '/core/Controller.php';
require_once __DIR__ . '/core/Database.php';
require_once __DIR__ . '/core/Flasher.php';
require_once __DIR__ . '/core/Mailer.php';

// Config
require_once __DIR__ . '/config/config.php';

// Composer Autoload
require_once __DIR__ . '/../vendor/autoload.php';
