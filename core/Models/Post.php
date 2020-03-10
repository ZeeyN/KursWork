<?php

namespace ZeeyN\Core\Models;
include 'core/inc.php';


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

    /**
     * @return array
     */
    public function getData ()
    {
        $database = get_database();
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

    private function parseResult($result)
    {
        $data = [];
        while ($row = mysqli_fetch_array($result)) {
            $data[] = $this->instantiation($row);
        }

        return $data;
    }
}
