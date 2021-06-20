<?php

namespace app\Core;

use PDO;
use PDOException;
use app\Helpers\Utility;

class Database
{


	// TODO: Query Builder
	private PDO $dbHandler;
	private object $statement;
	private string $dbHost = "localhost";
	private string $dbUser = "root";
	private string $dbPass = "";
	private string $dbName = "panel";


	public function __construct()
	{
		$dsn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
		try
		{
			$this->dbHandler = new PDO($dsn, $this->dbUser, $this->dbPass);
			$this->dbHandler->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		} catch (PDOException $e)
		{
			Utility::throwException($e->getMessage(), 500);
		}
	}


	public function prepare($sql) : void
	{
		$this->statement = $this->dbHandler->prepare($sql);
	}


	public function execute(array $param = null) : bool
	{
		return $this->statement->execute($param);
	}


	public function fetch(array $param = null) : mixed
	{
		$this->execute($param);
		return $this->statement->fetch();
	}


	public function fetchAll(array $param = null) : mixed
	{
		$this->execute($param);
		return $this->statement->fetchALl();
	}


	public function rowCount(array $param = null) : int
	{
		$this->execute($param);
		return $this->statement->rowCount();
	}


}