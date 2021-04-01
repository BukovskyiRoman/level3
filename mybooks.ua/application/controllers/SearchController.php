<?php
namespace application\controllers;
use application\core\base\Controller;
use application\models\Search;

/**
 * Class SearchController The class responsible for displaying search results;
 * @package application\controllers
 */
class SearchController extends Controller
{
    public function view()
    {
        $model = new Search();
        $books = $model->search($_POST['title']);
        $this->set(compact('books'));
    }
}