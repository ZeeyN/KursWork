<?php

use ZeeyN\Core\Includes;

$post = Includes::get_post_controller();

$parentPost = array_shift($post->manageDate($post->getById($_GET['id'])));

?>
<div class="container">
    <!--    <div>-->
    <label for="answer">
        <a class="answer" href="create_item.php?id=<?= $parentPost->id ?>" id="answer">Ответить</a>
    </label>
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
    <label for="date">Дата:
        <br>
        <span id="date">
                <?= $parentPost->created_at ?>
            </span>
    </label>

    <div class="comments">
        <?php foreach ($post->outputMessages($parentPost->id) as $message) : ?>
            <div class="item">
                <label for="post_author">
                    <span class="author-name"><b><?= $message->post_author ?></b></span>
                    <span><?= $message->created_at ?></span>
                </label>
                <label for="post_body"><span><?= $message->post_body ?></span></label>
                <label for="answer">
                    <span><a id="answer"
                             href="create_item.php?id=<?= $message->id ?>&backTo=<?= $parentPost->id ?>">Ответить</a></span>
                </label>
                <?php if (!empty($message->childs)): ?>
                    <?php foreach ($message->childs as $child): ?>
                        <div class="child">
                            <label for="post_author">
                                <span class="author-name"><b><?= $child->post_author ?></b></span>
                                <span><?= $child->created_at ?></span>
                            </label>
                            <label for="post_body"><span><?= $child->post_body ?></span></label>
                            <label for="answer">
                                <span><a id="answer"
                                         href="create_item.php?id=<?= $child->id ?>&parentMessage=<?= $message->id?>&backTo=<?= $parentPost->id ?>">Ответить</a></span>
                            </label>
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>


            </div>
        <?php endforeach; ?>


    </div>

    <!--    </div>-->

</div>




