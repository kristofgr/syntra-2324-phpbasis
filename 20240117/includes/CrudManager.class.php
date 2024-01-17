<?php

class CrudManager
{

    private $table;
    private $db;


    public function __construct($table)
    {
        $this->table = $table;
        $this->db = $this->connectToDB();
    }


    private function connectToDB()
    {
        $DB_HOST = "127.0.0.1";
        $DB_USER = "root";
        $DB_PASSWORD = "root";
        $DB_DB = "php_mysql";
        $DB_PORT = "8889";

        try {
            $db = new PDO('mysql:host=' . $DB_HOST . '; port=' . $DB_PORT . '; dbname=' . $DB_DB, $DB_USER, $DB_PASSWORD);
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);

        return $db;
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM " . $this->getTable() . " ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function getDb()
    {
        return $this->db;
    }

    public function getTable()
    {
        return $this->table;
    }
}
