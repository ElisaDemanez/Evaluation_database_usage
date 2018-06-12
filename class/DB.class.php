<?php

class DB {

    public static function connect() {
        
        $dsn = 'mysql:dbname=evaluation4;host=127.0.0.1';
        $user = 'root';
        $password = 'sqlroot';
        
        try {
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
        die('Erreur : '. $e->getMessage());
        }
            return $dbh;
        }
    }


