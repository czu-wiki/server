<?php

use Connection\Connection;

class Group {
	public $id;
	public $name;
}

class GroupRepository extends Repository {
	static function getTableName() {
		return "GROUPS";
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

	static function update($group) {
		$table = self::getTableName();
		$id = $group->id;
		$sql = "UPDATE ${table} SET name=:name WHERE id=${id}";
		$statement = Connection::pdo()->prepare($sql);
		$statement->bindValue(':name', $group->name);
		$statement->execute();
	}

	static function create($group) {
		$table = self::getTableName();
		$sql = "INSERT INTO ${table} (name)VALUES (:name)";
		$statement = Connection::pdo()->prepare($sql);
		$statement->execute(array(
			':name' => $group->name
		));
		return Connection::pdo()->lastInsertId();
	}

	static function createDeep($group) {
		return self::create($group);
	}
}
