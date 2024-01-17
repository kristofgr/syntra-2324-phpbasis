<?php

class ProductManager extends CrudManager
{

    public function getAll(): array
    {
        $sql = "SELECT * FROM " . $this->getTable() . " ORDER BY id DESC";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
