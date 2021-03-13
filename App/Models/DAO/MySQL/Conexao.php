<?php

namespace App\Models\DAO\MySQL;

class Conexao
{
    private static $instance;

    public static function getConexao()
    {
        if (!isset(self::$instance)) {

            try {
                $host = getenv('MYSQL_HOST');
                $port = getenv('MYSQL_PORT');
                $user = getenv('MYSQL_USER');
                $pass = getenv('MYSQL_PASS');
                $base = getenv('MYSQL_BASE');
                
                $dsn = "mysql:host={$host};dbname={$base};port={$port}";
    
                self::$instance = new \PDO($dsn, $user, $pass);
                self::$instance->setAttribute(
                    \PDO::ATTR_ERRMODE, 
                    \PDO::ERRMODE_EXCEPTION
                );
                self::$instance->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
                
            } catch(\Exception $e) {
                die(json_encode([
                    'message' => $e->getMessage(),
                    "status" => $e->getCode(),
                ]));
            }
        }

        return self::$instance;
    }
}