<?php
namespace ZeeyN\Core;
use ZeeyN\Core\Database\Database;
use ZeeyN\Core\Controllers\PostController;

class Includes
{
    static function get_database()
    {
        return new Database();
    }

    static function get_post_controller()
    {
        return new PostController();
    }
}



