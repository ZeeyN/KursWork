<?php

use ZeeyN\Core\Includes;

$post = Includes::get_post_controller();


if(isset($_GET['parentMessage'])) {
    $saveTo = $_GET['parentMessage'];
//    $parentPost = !empty($parentId) ? array_shift($post->getById($parentId)) : null;
}
if(isset($_GET['id'])) {
    $parentId = $_GET['id'];
    $parentPost = !empty($parentId) ? array_shift($post->getById($parentId)) : null;
}
$parentId   = isset($parentId) ? $parentId : 0;






?>
<div class="container">
    <!--    <div class="m-page">-->
    <?php if (isset($parentId)): ?>
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


    <?php endif ?>
    <div id="ajaxCreateItem">
        <form action="" class="new-modal__form new-modal__form_width" >
            <input type="hidden" name="parent_id" value="<?= isset($saveTo)? $saveTo : $parentId ?>">
            <?php if(isset($_GET['backTo'])): ?>
                <input type="hidden" name="backTo" value="<?= $_GET['backTo']?>">
            <?php endif; ?>
            <label class="new-modal__label">
                <input class="new-modal__input" name="post_author" type="text" required placeholder="Имя">
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
            <div class="form-buttons">
                <button type="submit" id="submition" class="pure-button blue-btn">Отправить</button>
                <?php if(isset($_GET['backTo'])):?>
                    <button id="backButton" class="pure-button blue-btn" data-href="show_item.php?id=<?= $_GET['backTo'] ?>"> Назад</button>
                <?php endif; ?>
            </div>

        </form>
    </div>

    <!--    </div>-->
</div>




