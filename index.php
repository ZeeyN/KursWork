<?php

require_once('vendor/autoload.php');

use ZeeyN\Core\Includes;

$post = Includes::get_post_controller();
print_r($post->formatOutput());

//todo Сделать simple обработчик url (ARKADIA)
