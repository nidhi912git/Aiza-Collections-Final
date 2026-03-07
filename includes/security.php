<?php
if (session_status() === PHP_SESSION_NONE) session_start();

/* CSRF TOKEN */
if (empty($_SESSION['csrf'])) {
  $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

function csrf_token() {
  return $_SESSION['csrf'];
}

function verify_csrf() {
  if (!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']) {
    die("Invalid CSRF token");
  }
}

/* AUTH HELPERS */
function is_logged_in() {
  return isset($_SESSION['user']);
}

function require_login() {
  if (!is_logged_in()) {
    header("Location: /aiza-collections/pages/login.php");
    exit;
  }
}

function is_admin() {
  return is_logged_in() && $_SESSION['user']['role'] === 'admin';
}

function require_admin(){
if(!is_admin()){
header("Location: /aiza-collections/pages/home.php");
exit;
}
}