<?php

use Connection\Connection;

class PostType {
	public $id;
	public $name;
}

class PostTypeRepository extends Repository {
	static function getTableName() {
		return "POST_TYPES";
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

	static function update($postType) {
		$table = self::getTableName();
		$id = $postType->id;
		$sql = "UPDATE ${table} SET name=:name WHERE id=${id}";
		$statement = Connection::pdo()->prepare($sql);
		$statement->bindValue(':name', $postType->name);
		$statement->execute();
	}

	static function create($postType) {
		$table = self::getTableName();
		$sql = "INSERT INTO ${table} (name)VALUES (:name)";
		$statement = Connection::pdo()->prepare($sql);
		$statement->execute(array(
			':name' => $postType->name
		));
		return Connection::pdo()->lastInsertId();
	}

	static function createDeep($postType) {
		return self::create($postType);
	}
}
