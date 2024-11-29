<?php
class Database {
    private static $dsn = "mysql:host=localhost;dbname=duan1;charset=utf8";
    private static $username = "your_username";
    private static $password = "your_password";
    private static $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    private static $instance = null;

    public static function getConnection() {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(self::$dsn, self::$username, self::$password, self::$options);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
?>
