<?php

namespace application\controllers;

use application\core\base\Controller;
use application\core\Router;
use application\models\Book;
use application\models\Search;

/**
 * Class BookController
 * @package application\controllers
 */
class BookController extends Controller
{
    /**
     * Function responsible for outputting information about one book;
     */
    public function view()
    {
        $model = new Book();
        $route = Router::getRoute();
        $id = $route['alias'];

        $book = $model->findOne($id);

        $label = 'click_book';
        $lastView = $model->findId($id, $label);
        $lastView = $lastView[0]['click_book'] + 1;

        $this->set(compact('book'));
        $model->writeInfo($id, $label, $lastView);
    }

    /**
     * Output of search results;
     */
    public function search()
    {
        $model = new Search();
        $books = $model->search($_POST['title']);
        $this->set(compact('books'));
    }

    /**
     * Function for counting the number of clicks on the "Take a book" button;
     */
    public function count()
    {
        $model = new Book();
        $route = Router::getRoute();
        $id = $route['alias'];

        $label = 'click_get';
        $lastGet = $model->findId($id, $label);
        $lastGet = $lastGet[0]['click_get'] + 1;

        $model->writeInfo($id, $label, $lastGet);
    }
}