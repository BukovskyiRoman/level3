<?php

namespace application\controllers;

use application\core\base\Controller;
use application\core\Router;
use application\models\Admin;
use libs\Pagination;

class AdminController extends Controller
{
    public function view()
    {
        $perPage = 12;
        $model = new Admin();
        $total = count($model->findAll());

        $uri = explode('?', $_SERVER['REQUEST_URI']);
        $numPage = explode('=', $uri[1]);

        $page = isset($numPage) ? (int)$numPage[1] : 1;

        $pagination = new Pagination($page, $perPage, $total);
        $start = $pagination->getStart();

        $books = $model->find($start, $perPage);
        $this->set(compact('books', 'pagination'));
    }

    public function add()
    {
        $upLoadDir = 'libs/books-page/books-page_files/';
        $model = new Admin();

        $title = $_POST['title'];
        //$author = $_POST['author1'] . " " . $_POST['author2'];
        $year = $_POST['year'];
        $sheets = $_POST['sheets'];
        $description = $_POST['description'];

        $sql = "INSERT INTO book(title, year_pub, sheets, description) VALUES (?, ?, ?, ?)";
        $model->query($sql, [$title, $year, $sheets, $description]);

        $maxId = $model->maxId('book');

        foreach ($_POST as $key => $value) {
            if (strncasecmp($key, 'author', 6) === 0) {
                $addAuthor = "INSERT INTO authors(author) VALUES(?)";                                         //todo
                $model->query($addAuthor, [$value]);

                $max = $model->maxId("authors");
                $max = intval($max[0]['MAX(id)']);
                $maxBook = intval($maxId[0]['MAX(id)']);

                $addConnections = "INSERT INTO books_authors(author_id, book_id) VALUES(?, ?)";
                $model->query($addConnections, [$max, $maxBook]);
            }
        }
        //$sql = "INSERT INTO books(title, author, year_pub, sheets, description) VALUES ('$title', '$author', '$year', '$sheets', '$description')";

        $upLoadFile = $upLoadDir . $maxId[0]['MAX(id)'] . ".jpg";
        move_uploaded_file($_FILES['file']['tmp_name'], $upLoadFile);
    }

    public function delete()
    {
        $model = new Admin();
        $route = Router::getRoute();
        $id = $route['alias'];

        $label = "deleted";
        $deleteDate = date('Y-m-d H:i:s');

        $model->writeInfo($id, $label, $deleteDate);
        $model->writeDeleteDate($id,$label, $deleteDate);
    }
}