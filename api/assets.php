<?php

/**
 * Manually route assets to be found
 */
if ($_GET['type'] === 'css' || $_GET['type'] === 'js') {
    $type = $_GET['type'];
    $file = basename($_GET['file']);
    $path = __DIR__ . "/../public/build/assets/$type/$file";

    if (file_exists($path)) {
        if ($type === 'css') {
            header("Content-type: text/css; charset: UTF-8");
        } elseif ($type === 'js') {
            header('Content-Type: application/javascript; charset: UTF-8');
        }
        echo file_get_contents($path);
    } else {
        // Handle file not found
        http_response_code(404);
        echo 'File not found';
    }
}
