<?php
namespace application\controllers;
use application\core\base\Controller;
use application\models\Books;
use libs\Pagination;

/**
 * Class BooksController The class that is responsible for displaying information on the main page of the library;
 * @package application\controllers
 */
class BooksController extends Controller
{
    public function view()
    {
        //require '/usr/share/nginx/html/mybooks.ua/migrations/migration.php';          //todo At the first start
        //require '/usr/share/nginx/html/mybooks.ua/migrations/join/migration2.php';    //todo Go to 3 tables in the database

        $model = new Books();
        $total = count($model->findAll());
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        if (isset($_GET['id']))
        {
            $label = 'click_get';
            $model->writeInfo(1, $label, $_GET['id']);
        }

        $perPage = 12;
        $pagination = new Pagination($page, $perPage, $total);

        $start = $pagination->getStart();
        $books = $model->find($start, $perPage);
        $this->set(compact('books', 'pagination'));
    }
}