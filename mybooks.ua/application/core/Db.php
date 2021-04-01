<?php

namespace application\core;

/**
 * Class Db
 * @package application\core
 */
class Db
{
    protected $pdo;
    protected static $instance;

    /**
     * Db constructor.
     */
    protected function __construct() {
        $db = require 'config/config_db.php';
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];
        $this->pdo = new \PDO($db['dsn'], $db['user'],$db['pass'], $options);
    }

    /**
     * @return Db
     */
    public static function instance() {
        if(self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * @param $sql
     * @param array $params
     * @return bool
     */
    public function execute($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    /**
     * @param $sql
     * @param array $params
     * @return array
     */
    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute($params);
        if($res !== false) {
            return $stmt->fetchAll();
        }
        return [];
    }
}