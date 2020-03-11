<?php
session_start();
$lastUrl = $_SESSION['q'] = $_GET['q'];
unset($_GET['q']);

$rdi = new RecursiveDirectoryIterator('libs/pages');
if (empty($lastUrl) || $lastUrl === 'index.php') {
    $out = 'libs/pages/home.php';
} else {
    foreach (new RecursiveIteratorIterator($rdi) as $filePath => $obj) {
        $fileName = pathinfo($filePath, PATHINFO_BASENAME);
        if ($fileName !== '.' && $fileName !== '..') {
            if ($fileName === $lastUrl) {
                $out = $_SERVER['DOCUMENT_ROOT'] . '/libs/pages/' . $fileName;
            }
        }
    }
}

include 'libs/incs/header.html';
if(file_exists($out)) {
    include $out;
} else {
    include $_SERVER['DOCUMENT_ROOT'] . '/libs/pages/404.php';
}
include 'libs/incs/footer.html';
