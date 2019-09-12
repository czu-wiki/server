<?php

use Connection\Connection;

class Teacher {
	public $id;
	public $name;
}

class TeacherRepository extends Repository {
	static function getTableName() {
		return "TEACHERS";
	}

	static function readAllDeep($lim) {
		return parent::readAll($lim);
	}

	static function readAllRearDeep($lim, $deep) {
		return parent::readAll($lim);
	}
	static function readDeep($id) {
		return parent::read($id);
	}

	static function readRearDeep($id, $deep) {
		return parent::read($id);
	}

	static function update($data) {
		$table = self::getTableName();
		$id = $data->id;
		$sql = "UPDATE ${table} SET name=:name WHERE id=${id}";
		$statement = Connection::pdo()->prepare($sql);
		$statement->bindValue(':name', $data->name);
		$statement->execute();
	}

	static function create($data) {
		$table = self::getTableName();
		$sql = "INSERT INTO ${table} (name)VALUES (:name)";
		$statement = Connection::pdo()->prepare($sql);
		$statement->execute(array(
			':name' => $data->name
		));
		return Connection::pdo()->lastInsertId();
	}

	static function createDeep($data) {
		return self::create($data);
	}
}
