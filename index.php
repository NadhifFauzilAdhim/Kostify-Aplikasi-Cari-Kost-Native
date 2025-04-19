<?php
session_start();

// ———————————————————————————————
// 1. Session timeout & CSRF (tetap sama)
$max_duration = 1800;
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
// 2. Parse URL untuk routing MVC
// Ambil path, mis. "/login" atau "/dashboard/edit/5"
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Jika aplikasimu dipanggil di subfolder (misal http://domain/kostifynative/),
// dan .test vhost diarahkan ke public/, biasanya BASEURL = '/'
// Jika tidak di subfolder, kamu bisa hapus baris ini:
$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/'); // kalau ScriptName "/index.php" → $base = ""
if ($base && strpos($path, $base) === 0) {
    $path = substr($path, strlen($base));
}

// Bersihkan slash di pinggir
$path = trim($path, '/');

// Simpan untuk App
if ($path !== '') {
    $_GET['url'] = $path;
}

// ———————————————————————————————
// 3. Bootstrap MVC
require_once __DIR__ . '/../app/init.php';
$app = new App();
