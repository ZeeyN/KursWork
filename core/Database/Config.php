<?php

namespace ZeeyN\Core\Database;

trait Config
{
    private $DB_USERNAME = 'root';
    private $DB_PASSWORD = '';
    private $DB_NAME = 'forum_pechersk';
    private $DB_HOST = 'localhost';


    /**
     * @return string
     */
    public function getHost()
    {
        return $this->DB_HOST;
    }

    /**
     * @return string
     */
    public function getDbName()
    {
        return $this->DB_NAME;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->DB_USERNAME;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->DB_PASSWORD;
    }

}
