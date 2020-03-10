<?php

namespace ZeeyN\Core\Database;



class Database
{
    use Config;
    /**
     * @var
     */
    private $connect;
    private $db;

    /**
     * Database constructor.
     */
    function __construct()
    {
        $this->db = $this->openDbConnection();
        $this->query('SET NAMES utf8');
    }

    /**
     * @return \mysqli
     */
    public function openDbConnection()
    {
        $this->connect = new \mysqli(
            $this->getHost(),
            $this->getUsername(),
            $this->getPassword(),
            $this->getDbName()
        );

        if($this->connect->connect_errno) {
            die('Database connection failed ' . $this->connect->connect_error);
        }

        return $this->connect;
    }

    /**
     * @param $sql
     * @return bool|\mysqli_result
     */
    public function query($sql)
    {
        $result = $this->db->query($sql);
        $this->confirmQuery($result);
        return $result;
    }

    /**
     * @param $query
     */
    public function confirmQuery($query)
    {
        if(!$query){
            die('Query failed ' . $this->db->error );
        }
    }
}
