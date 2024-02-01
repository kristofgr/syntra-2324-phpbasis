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

  public function getDBDescription(): array
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

  public function deleteById(int $id): void
  {
    $sql = "DELETE FROM " . $this->getTable() . " WHERE id = :id";
    $stmt = $this->getDB()->prepare($sql);
    $stmt->execute([
      'id' => $id
    ]);
  }

  public function setField(int $id, string $column, int $value): void
  {
    $sql = "UPDATE " . $this->getTable() . " SET " . $column . " = :value WHERE id = :id";
    $stmt = $this->getDB()->prepare($sql);
    $stmt->execute([
      'id' => $id,
      'value' => $value
    ]);
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
        if ($key == "status") {
          $str .= '<td>
          <div class="form-check form-switch">
            <input class="form-check-input switchStatus" type="checkbox" id="switchStatus-' . $record->id . '"' . ($value == 1 ? ' checked' : '') . '  data-bs-id="' . $record->id . '">
          </div>
          </td>';
        } else {
          $str .= '<td>' . $value . '</td>';
        }
      }

      $str .= '<td>
                <a href="../admin/' . $this->table . '/view/' . $record->id . '"><button title="View" type="button" class="btn btn-outline-secondary"><i class="bi bi-eyeglasses"></i></button></a>
                <a href="#"><button title="Edit" type="button" class="btn btn-outline-primary"><i class="bi bi-pencil"></i></button></a>
                
                <button title="Delete" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="' . $record->id . '"  data-bs-table="' . $this->table . '"  data-bs-title="">
                  <i class="bi bi-trash"></i>
                </button>
                
            </td>';

      $str .= '</tr>';
    }

    $str .= '</tbody></table>';

    $str .= '
    <!-- Modal -->
<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a class="modal-confirm" href="#">
                  <button type="button" class="btn btn-danger">Confirm</button>
                </a>
            </div>
        </div>
    </div>
</div>
    ';

    return $str;
  }
}
