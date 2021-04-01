<?php
namespace migrations;

use application\core\Db;

$site_path= realpath(dirname(__FILE__)).'/';
$allFiles = glob($site_path . '*.sql');

foreach ($allFiles as $file)
{
    $command = 'mysql'
        . ' --host=' . 'localhost'
        . ' --user=' . 'buka'
        . ' --password=' . 'buka'
        . ' --database=' . 'books-bd'
        . ' --default-character-set=utf8'
        . ' --execute="SOURCE ' . $file . '"';
    debug($command);
    shell_exec($command);
}

$model = Db::instance();

$allAuthors = $model->query('SELECT `author`, `id` FROM `books`');
$idAuthor = 1;

foreach ($allAuthors as $author)
{
    if(strstr($author['author'], ','))
    {
        $separateAuth = explode(',', $author['author']);
        foreach ($separateAuth as $oneAuth)
        {
            $writer = trim($oneAuth, " ");
            $id = $author['id'];
            $model->execute("INSERT INTO `books_authors`(`author_id`, `book_id`) VALUES('$idAuthor', '$id')");
            $model->execute("INSERT INTO `authors`(`author`) VALUES ('$writer')");
        }

    } else {
        $oneAuth = $author['author'];
        $id = $author['id'];
        $model->execute("INSERT INTO `books_authors`(`author_id`, `book_id`) VALUES('$idAuthor', '$id')");
        $model->execute("INSERT INTO `authors`(`author`) VALUES ('$oneAuth')");
    }
    $idAuthor++;
}




