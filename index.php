<?php

require_once ('vendor\autoload.php');

$post = new \ZeeyN\Core\Controllers\PostController();

print_r($post->getTopLine());