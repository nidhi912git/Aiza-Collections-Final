<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* ===============================
   CSRF TOKEN
================================ */

if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

function csrf_token()
{
    return $_SESSION['csrf'];
}

function verify_csrf()
{
    if (
        !isset($_POST['csrf']) ||
        !isset($_SESSION['csrf']) ||
        $_POST['csrf'] !== $_SESSION['csrf']
    ) {
        die("Invalid CSRF token");
    }
}


/* ===============================
   AUTH HELPERS
================================ */

function is_logged_in()
{
    return isset($_SESSION['user']);
}

function require_login()
{
    if (!is_logged_in()) {

        header("Location: /aiza-collections-final/pages/login.php");
        exit;
    }
}


/* ===============================
   ADMIN CHECK
================================ */

function is_admin()
{
    return (
        isset($_SESSION['user']) &&
        ($_SESSION['user']['role'] ?? '') === 'manager'
    );
}


function require_admin()
{
    if (!is_admin()) {

        header("Location: /aiza-collections-final/pages/home.php");
        exit;
    }
}

/* Staff Check  */
function is_staff()
{
    return (
        isset($_SESSION['user']) &&
        isset($_SESSION['user']['role']) &&
        (
            $_SESSION['user']['role'] === 'staff' ||
            $_SESSION['user']['role'] === 'manager'
        )
    );
}

function require_staff()
{
    if (!is_staff()) {

        header("Location: /aiza-collections-final/pages/home.php");
        exit;
    }
}
