<div class="container">
    <div class="m-page">


        <div class="sticker-shop">
            <div class="sticker-shop__content">
                <div class="pure-g m-grid">


                    <?php foreach ($post->formatOutput() as $post): ?>
                        <?php if ($post->parent_id === null): ?>
                            <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-1-3">
                                <div class="shop-card">
                                    <a href="post.php?id=<?= $post->id; ?>" class="shop-card__name">
                                        <?= $post->post_title; ?>
                                    </a>
                                    <div class="shop-card__desc">
                                        <div class="shop-card__autor">
                                            <span><?= $post->post_author ?>,</span>
                                            <span class="shop-card__number"><?= $post->created_at ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>


                </div>
            </div>
        </div>
    </div>
</div>