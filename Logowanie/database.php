<?php
class Database
{
    private static $dbName = 'databaseName';
    private static $dbHost = 'Host';
    private static $dbUsername = 'Username';
    private static $dbUserPassword = 'Password';

    private static $cont = null;

    public function __construct() {
        die('Funkcja Init function nie jest dozwolona');
    }

    //Połaczenie za pośrednictwem aplikacji
    public static function connect()
    {
        if ( self::$cont == null )
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