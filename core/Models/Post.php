<?php

namespace ZeeyN\Core\Models;

use ZeeyN\Core\Database\Data;

class Post extends Data
{
    /**
     * @var
     */
    public $id;
    public $parent_id;
    public $post_title;
    public $post_author;
    public $post_body;
    public $created_at;

    public function getLineData($line)
    {
        return [
            '$parent_id' => $line->parent_id,
            '$post_title' => $line->post_title,
            '$post_author' => $line->post_author,
            '$post_body' => $line->post_body,
            '$created_at' => $line->created_at,
        ];
    }
}
