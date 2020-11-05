<?php

class EloquentOrm implements QueryCapabilities, 
	ExternalOrmConnection
{
	public function select($statement) {
		return DB::select($statement)->all();
	}
public function delete($statement)
	{
		return DB::delete($statement);
	}

	public function connect()
	{
		//connection logic 
	}
}

class DoctrineDbalOrm implements QueryCapabilities,
	ExternalOrmConnection
{
	public function delete($statement)
	{
		$stmt = $this->connect()->delete($statement);
		return $stmt->execute();
	}

	public function select($statement)
	{
		$stmt = $this->connect()->prepare($statement);
		return $stmt->fetchAll();
	}
	public function connect()
	{
		return $this->getConnection(‘default’);
	}
}
