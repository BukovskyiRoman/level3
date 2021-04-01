<?php
namespace migrations;

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
    shell_exec($command);
}

