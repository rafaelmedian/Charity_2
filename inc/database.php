<?php



class Database {
	private static $dbNombre = 'charity';
	private static $dbHost = 'localhost';
	private static $dbUsuario = 'root';
	private static $dbContrasena = "1234";

	private static $cont = null;

	public function __construct() {
		die('Funcion de principio no inicio');
	}

	public static function connect() {
		
		if (null == self::$cont){
			try{
				/*self::$cont = new PDO("mysql:host=".self::$dbHost.";"."dbname=". self::$dbNombre, self::$dbUsuario, self::$dbContrasena);*/
				self::$cont = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME ,DB_USER,DB_PASS);
			} catch (PDOException $e){
				die($e->getMessage());
			}
		}
		return self::$cont;
	}
	public static function disconnect() {
		self::$cont = null;
	}
	
}
?>