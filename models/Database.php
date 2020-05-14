<?php

class Database {
    public static $db_name = 'todo_list';
    public static $db_user = 'ty';
    public static $db_pass = 'Soon2b100';
    public static $db_host = 'localhost';
    public static $db;
    public static function connect() {
        self::$db = new mysqli( self::$db_host, self::$db_user, self::$db_pass, self::$db_name );
        if( self::$db->connect_errno ) {
            die('Database connection failed: ' . self::$db->connect_error);
        } else {
            return self::$db;
        }
    }
}

?>