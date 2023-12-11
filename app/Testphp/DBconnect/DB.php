<?php
namespace Testphp\DBconnect;

class DB
{
	private $pdo;

	private static $instance = null;

	public function __construct()
	{
		$dsn = 'mysql:dbname='. $_ENV['DB_NAME'] .';host='. $_ENV['DB_HOST'];
		$user = $_ENV['DB_USER'];
		$password = $_ENV['DB_PASSWORD'];


		$this->pdo = new \PDO($dsn, $user, $password);
	}

	/** 
	 * @return self||\PDO
	 */
	public static function getInstance()
	{
		if (null === self::$instance) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}

	/**
	 * Selects data from the database using the given SQL query.
	 *
	 * @param string $sql The SQL query to be executed.
	 * @throws PDOException If there is an error executing the query.
	 * @return array An array containing all the fetched rows.
	 */
	public function select($sql)
	{
		$sth = $this->pdo->query($sql);
		return $sth->fetchAll();
	}

	/**
	 * Executes an SQL statement and returns the number of affected rows.
	 *
	 * @param string $sql The SQL statement to be executed.
	 * @throws PDOException If an error occurs while executing the SQL statement.
	 * @return int The number of affected rows.
	 */
	public function exec($sql)
	{
		return $this->pdo->exec($sql);
	}

	/**
	 * Get the last inserted ID from the database.
	 *
	 * @return string The last inserted ID.
	 */
	public function lastInsertId(): int
	{
		return $this->pdo->lastInsertId();
	}
}