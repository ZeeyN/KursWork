<?php

use ZeeyN\Core\Includes;

$posts    = Includes::get_post_controller();
$database = Includes::get_database();
if(is_bool($posts->createPost($_POST))) {
    echo 'Сообщение не сохранено, попробуйте позже!';
} else {
    if(isset($_POST['backTo'])) {
        $parentId = $_POST['backTo'];
    } elseif(isset($_POST['parent_id'])) {
        $parentId = $_POST['parent_id'];
    }
    if(!empty($parentId)) {
        $message = "<br>Сообщение сохранено!<br><a href=\"show_item.php?id={$parentId}\">Назад</a>";
    } else {
        $message = 'Сообщение сохранено!';
    }
    echo $message;
}

exit();
