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
//        $rawPosts = $this->getData();
        return $this->getData();

    }



    public function getPostChilds($postId)
    {
        $data = $this->getDataByParentId($postId);
    }
}