<?php

namespace ZeeyN\Core\Controllers;

use ZeeyN\Core\Models\Post;

class PostController extends Post
{
    /**
     * @return array
     */
    public function getTopLine()
    {
        $rawPosts = $this->getData();
        $outPosts = [];

        foreach ($rawPosts as $rawPost) {
            if($rawPost->parent_id === NULL) {
                $outPosts[$rawPost->id] = $this->getLineData($rawPost);
            }
        }

        return $outPosts;

    }

    public function getPostChilds($postId)
    {
        $data = $this->getDataByParentId($postId);
    }
}