<?php
class Database
{
    private static $dbName = 'databaseName' ;
    private static $dbHost = 'host' ;
    private static $dbUsername = 'Username';
    private static $dbUserPassword = 'Password';
    private static $cont = null;

    public function __construct() {
        die('Funkcja Init function nie jest dozwolona');
    }

    public static function connect()
    {
        // Jedno połaczenie za pośrednictwem aplikacji
        if ( null == self::$cont )
        {
            try
            {
                self::$cont = new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername,
                    self::$dbUserPassword);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>