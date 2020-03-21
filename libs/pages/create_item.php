<?php

use ZeeyN\Core\Includes;

$post = Includes::get_post_controller();

$parentId   = isset($_GET['id']) ? $_GET['id'] : null;
$parentPost = !empty($parentId) ? array_shift($post->formatOutput()) : null;
//var_dump($parentPost);

//TODO Сделать создание новых статей

?>
<div class="container">
    <!--    <div class="m-page">-->
    <?php
    if (isset($parentId)):
        ?>
        <label for="author">Автор:
            <br>
            <span id="author">
                <?= $parentPost->post_author ?>
            </span>
        </label>


        <label for="body">Сообщение:
            <br>
            <span id="body">
            <?= $parentPost->post_body ?>
        </span>
        </label>


    <?php
    endif
    ?>
    <div id="ajaxCreateItem">
        <form action="" class="new-modal__form new-modal__form_width" >
            <input type="hidden" name="formid" value="NewAuthorForm">
            <label class="new-modal__label">
                <input class="new-modal__input" name="post_name" type="text" required placeholder="Имя">
            </label>
            <?php
            if (!isset($parentId)):
                ?>
                <label class="new-modal__label">
                    <input class="new-modal__input" name="post_title" type="text" required placeholder="Оглавление">
                </label>
            <?php
            endif
            ?>
            <label class="new-modal__label">
                <textarea class="new-modal__input" name="post_body" required placeholder="Сообщение"></textarea>
            </label>
            <button type="submit" id="submition" class="pure-button blue-btn">Отправить</button>
        </form>
    </div>

    <!--    </div>-->
</div>




