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

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    protected function getDB()
    {
        return $this->db;
    }

    public function getTable()
    {
        return $this->table;
    }

    protected function getDBDescription(): array
    {
        $sql = "DESCRIBE " . $this->getTable();
        $stmt = $this->getDB()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById(int $id): object|false
    {
        $sql = "SELECT * FROM " . $this->getTable() . " WHERE id = :id";
        $stmt = $this->getDB()->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getAdminTable()
    {
        $records = $this->getAll();
        $columns = $this->getDBDescription();

        // print '<pre>';
        // print_r($columns);
        // exit;

        $str = '<table class="table"><thead><tr>';

        foreach ($columns as $column) {
            $str .= '<th scope="col">' . $column->Field . '</th>';
        }

        $str .= '<th scope="col">Actions</th></tr></thead>';

        $str .= '<tbody class="table-group-divider">';

        if (sizeof($records) < 1) {
            $str .= '<tr><td colspan="' . sizeof($columns) . '">There are no records for this entity</td></tr>';
        }

        foreach ($records as $record) {
            $str .= '<tr>';

            foreach (get_object_vars($record) as $key => $value) {
                $str .= '<td>' . $value . '</td>';
            }

            $str .= '<td>view - edit - delete</td>';

            $str .= '</tr>';
        }

        $str .= '</tbody></table>';

        return $str;
    }
}
