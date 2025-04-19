<?php
// └── kostifynative/public/index.php

session_start();

// ———————————————————————————————
// 1) Session timeout & CSRF
$max_duration = 1800; // 30 menit
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > $max_duration) {
    session_unset();
    session_destroy();
    header('Location: ' . BASEURL . 'login');
    exit;
}
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$_SESSION['last_activity'] = time();

// ———————————————————————————————
// 2) Parse REQUEST_URI → $_GET['url']
// ambil path setelah domain, misal "/login" atau "/dashboard/edit/5"
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// jika vhost diarahkan ke public/ sebagai document root, SCRIPT_NAME = "/index.php"
// kita hilangkan SCRIPT_NAME dari URI agar yang tersisa hanya segmen routing
$scriptName = dirname($_SERVER['SCRIPT_NAME']); // biasanya "/"
if ($scriptName !== '/' && strpos($uri, $scriptName) === 0) {
    $uri = substr($uri, strlen($scriptName));
}

// trim slash di pinggir → misal "login"
$uri = trim($uri, '/');

// set ke $_GET['url'] agar App::parseURL() bisa mengambilnya
if ($uri !== '') {
    $_GET['url'] = $uri;
}

// ———————————————————————————————
// 3) Bootstrap MVC
require_once __DIR__ . '/../app/init.php';
$app = new App();
