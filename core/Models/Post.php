<?php

namespace ZeeyN\Core\Models;
use ZeeyN\Core\Includes;

class Post
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

    protected $table = 'posts';

//    /**
//     * @param $line
//     * @return array
//     */
//    public function getLineData($line)
//    {
//        return [
//            '$parent_id' => $line->parent_id,
//            '$post_title' => $line->post_title,
//            '$post_author' => $line->post_author,
//            '$post_body' => $line->post_body,
//            '$created_at' => $line->created_at,
//        ];
//    }

//todo Сделать CRUD с добавлением в базу
//todo Сделать вывод древа сообщений (parent_id !== NULL)

    public function createPost($data){
        $database = Includes::get_database();
        $postTitle = isset($data['post_title']) ? $this->cleanValue($data['post_title']) : NULL;
        $postAuthor = isset($data['post_author']) ? $this->cleanValue($data['post_author']) : NULL;
        $postBody = isset($data['post_body']) ? $this->cleanValue($data['post_body']) : NULL;
        $parentId = (int)$data['parent_id'];
        $sql = 'INSERT INTO ' . $this->getTableName() . '(parent_id, post_title, post_author, post_body, created_at)';
        $sql .= ' VALUES(\'' . $parentId . '\',\'' . $postTitle . '\',\'' . $postAuthor . '\',\'' . $postBody .'\',\'' . time() . '\')';
        if($database->query($sql)) {
            return $database->lastId();
        } else {
            return false;
        }
    }


    public function cleanValue($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);
        return $value;
    }


    /**
     * @return string
     */
    public function getTableName()
    {
        return $this->table;
    }

    /**
     * @param $id
     * @return array
     */
    public function getById($id)
    {
        $database = Includes::get_database();
        $sql = "SELECT * FROM posts WHERE id='$id'";
        $result = $database->query($sql);

        $data = $this->parseResult($result);


        return $data;
    }

    /**
     * @return array
     */
    public function getData ()
    {
        $database = Includes::get_database();
        $sql = "SELECT * FROM posts";
        $result = $database->query($sql);
        $data = $this->parseResult($result);

        return $data;
    }

    /**
     * @param $record
     * @return mixed
     */
    private function instantiation ($record)
    {
        $callingClass = get_called_class();
        $object = new $callingClass;

        foreach($record as $attribute => $value) {
            if($object->hasAttribute($attribute)) {
                $object->$attribute = $value;
            }
        }
        return $object;
    }

    /**
     * @param $attribute
     * @return bool
     */
    private function hasAttribute($attribute)
    {
        $objectProps = get_object_vars($this);
        return array_key_exists($attribute, $objectProps);
    }

    /**
     * @param $result
     * @return array
     */
    private function parseResult($result)
    {
        $data = [];
        while ($row = mysqli_fetch_array($result)) {
            $data[] = $this->instantiation($row);
        }

        return $data;
    }

    public  function manageDate($data)
    {
        foreach ($data as &$item) {
            $date = date_create_from_format('U', $item->created_at);
            $item->created_at = $date->format('H:i d.m.Y');
        }
        return $data;
    }


    public function getPostMessages($id) {
        $database = Includes::get_database();
        $sql = 'SELECT * FROM ' . $this->getTableName() . ' WHERE `parent_id` = ' . $id;
        $data =  $this->parseResult($database->query($sql));
        return $this->manageDate($data);

    }
}
