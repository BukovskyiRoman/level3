<?php
namespace application\core\base;
use application\core\Db;

/**
 * Class Model The class responsible for working with the database;
 * @package application\core\base
 */
abstract class Model
{
    protected $pdo;
    protected $table;
    protected $primaryKey = 'id';


    public function __construct()
    {
        $this->pdo = Db::instance();
    }


    public function query($sql, $params = [])
    {
        return $this->pdo->execute($sql, $params);
    }


    public function findAll()
    {
        $sql = "SELECT * FROM book";
        return $this->pdo->query($sql);
    }

    public function find($start, $perPage)
    {
        //$sql = "SELECT * FROM {$this->table} LIMIT $start, $perPage";
        $sql = "SELECT  B.id as id, B.title as title, B.description as description, GROUP_CONCAT(A.author SEPARATOR ', ') 
        as author, B.sheets as sheets,B.year_pub as year_pub, B.click_book as click_book, B.click_get as click_get, 
        B.deleted as deleted
                     FROM book B 
                     JOIN books_authors BA 
                     ON B.id = BA.book_id 
                     JOIN authors A 
                     ON BA.id = A.id 
		             GROUP BY BA.book_id
		             LIMIT $start, $perPage";
        return $this->pdo->query($sql);
    }


    public function findOne($id)
    {
        //$sql = "SELECT * FROM {$this->table} WHERE $this->primaryKey = ? LIMIT 1";

        $sql = "SELECT  B.id as id, B.title as title, B.description as description, GROUP_CONCAT(A.author SEPARATOR ', ')
        as author, B.sheets as sheets,B.year_pub as year_pub
                     FROM book B
                     JOIN books_authors BA
                     ON B.id = BA.book_id
                     JOIN authors A
                     ON BA.id = A.id
                     WHERE B.id = ?
		             GROUP BY BA.book_id";
        return $this->pdo->query($sql, [$id]);
    }


    public function search($title)
    {
        $param = '%' . $title . '%';
        //$sql = "SELECT * FROM {$this->table} WHERE title LIKE ?";
        $sql = "SELECT  B.id as id, B.title as title, B.description as description, GROUP_CONCAT(A.author SEPARATOR ', ') 
        as author, B.sheets as sheets,B.year_pub as year_pub
                     FROM book B 
                     JOIN books_authors BA 
                     ON B.id = BA.book_id 
                     JOIN authors A 
                     ON BA.id = A.id 
                     WHERE B.title LIKE ?
		             GROUP BY BA.book_id";
        return $this->pdo->query($sql, [$param]);
    }


    public function maxId($table)
    {
        $sql = "SELECT MAX(id) FROM $table";
        return $this->pdo->query($sql);
    }


    public function findId($id, $label)
    {
        //$sql = "SELECT $label FROM {$this->table} WHERE $this->primaryKey = ?";
        $sql = "SELECT $label FROM `book` WHERE $this->primaryKey = ?";
        return $this->pdo->query($sql, [$id]);
    }


    public function writeInfo($id, $label, $info)
    {
        //$sql = "UPDATE {$this->table} SET $label = ? WHERE id = ?";
        $sql = "UPDATE book SET $label = ? WHERE id = ?";
        return $this->pdo->execute($sql, [$info, $id]);
    }


    public function writeDeleteDate($id, $label, $info)
    {
        //$sql = "UPDATE {$this->table} SET $label = ? WHERE id = ?";
        $sql = "UPDATE books_authors SET $label = ? WHERE book_id = ?";
        return $this->pdo->execute($sql, [$info, $id]);
    }
}