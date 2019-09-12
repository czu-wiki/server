<?php

use Connection\Connection;

class Permission {
	public $id;
	public $name;
}

class PermissionRepository extends Repository {
	static function getTableName() {
		return "PERMISSIONS";
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

	static function update($permission) {
		$table = self::getTableName();
		$id = $permission->id;
		$sql = "UPDATE ${table} SET name=:name WHERE id=${id}";
		$statement = Connection::pdo()->prepare($sql);
		$statement->bindValue(':name', $permission->name);
		$statement->execute();
	}

	static function create($permission) {
		$table = self::getTableName();
		$sql = "INSERT INTO ${table} (name)VALUES (:name)";
		$statement = Connection::pdo()->prepare($sql);
		$statement->execute(array(
			':name' => $permission->name
		));
		return Connection::pdo()->lastInsertId();
	}

	static function createDeep($permission) {
		self::create($permission);
	}
}
