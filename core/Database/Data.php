<?php

namespace ZeeyN\Core\Database;

class Data extends Database
{

    /**
     * @return array
     */
    public function getData ()
    {
        $data = [];
        $sql = "SELECT * FROM posts";
        $result = $this->query($sql);

        while ($row = mysqli_fetch_array($result)) {
            $data[] = $this->instantiation($row);
        }

        return $data;
    }

    /**
     * @param $parentId
     * @return array
     */
    public function getDataByParentId($parentId)
    {
        $data = [];
        $sql = "SELECT * FROM posts WHERE parent_id = $parentId";
        $result = $this->query($sql);

        while ($row = mysqli_fetch_array($result)) {
            $data[] = $this->instantiation($row);
        }

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

}
