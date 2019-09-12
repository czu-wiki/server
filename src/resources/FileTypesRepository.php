<?php

use Connection\Connection;

class FileType {
	public $id;
	public $name;
}

class FileTypesRepository extends Repository {
	static function getTableName() {
		return "FILE_TYPES";
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
		self::read($id);
	}

	static function update($fileType) {
		$table = self::getTableName();
		$id = $fileType->id;
		$sql = "UPDATE ${table} SET name=:name WHERE id=${id}";
		$statement = Connection::pdo()->prepare($sql);
		$statement->bindValue(':name', $fileType->name);
		$statement->execute();
	}

	static function create($fileType) {
		$table = self::getTableName();
		$sql = "INSERT INTO ${table} (name)VALUES (:name)";
		$statement = Connection::pdo()->prepare($sql);
		$statement->execute(array(
			':name' => $fileType->name
		));
		return Connection::pdo()->lastInsertId();
	}

	static function createDeep($fileType) {
		return self::create($fileType);
	}
}
