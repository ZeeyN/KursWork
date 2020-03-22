<?php

use ZeeyN\Core\Includes;

$posts    = Includes::get_post_controller();
$database = Includes::get_database();

echo print_r($_POST);

/*TODO
* 1. Обработать массив POST
* 2. Сформировать запрос в БД
* 3. Отправить запрос в БД
*/

/**
 * $sql = "...";
 * $database->query($sql)
 *
 * echo 'Message saved';
 *
 */

exit();




//TODO Сделать обработку ajax запросов

