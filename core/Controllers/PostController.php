<?php

namespace ZeeyN\Core\Controllers;

use ZeeyN\Core\Models\Post;

class PostController extends Post
{
    /**
     * @return array
     */
    public function formatOutput()
    {
        $rawPosts = $this->getData();

        foreach($rawPosts as &$post) {
            $date = date_create_from_format('U', $post->created_at);
            $post->created_at = $date->format('h:i d.m.Y');
        }
        return $rawPosts;

    }



    public function getPostChilds($postId)
    {
        $data = $this->getDataByParentId($postId);
    }
}