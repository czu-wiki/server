<?php

use Connection\Connection;

class User {
	public $id;
	public $username;
	public $name;
	public $email;
	public $password;
	public $avatarId;
}

class UserRepository extends Repository {
	static function getTableName() {
		return "USERS";
	}

	static function readAllDeep($lim) {
		$users = parent::readAll($lim);
		foreach ($users as $user) {
			$user->avatarId = FileRepository::read($user->id);
		}
		return $users;
	}

	static function readAllRearDeep($lim, $deep) {
		$users = parent::readAll($lim);
		if (--$deep) {
			foreach ($users as $user) {
				$user->avatarId = FileRepository::readRearDeep($user->id, $deep);
			}
		} else {
			foreach ($users as $user) {
				$user->avatarId = FileRepository::read($user->avatarId);
			}
		}
		return $users;
	}

	static function readDeep($id) {
		$user = parent::read($id);
		$user->avatarId = FileRepository::readDeep($id);
		return $user;
	}

	static function readRearDeep($id, $deep) {
		$user = parent::read($id);
		if (--$deep) {
			$user->avatarId = FileRepository::read($user->avatarId);
		}
	}

	static function update($user) {
		Connection::pdo()->beginTransaction();
		$table = self::getTableName();
		$id = $user->id;
		if ($user->username) {
			$sql = "UPDATE ${table} SET username=(:username) WHERE id=(:id)";
			$statement = Connection::pdo()->prepare($sql);
			$statement->execute(array(
				'username' => $user->username,
				'id' => $user->id
			));
		}
		if ($user->name) {
			$sql = "UPDATE ${table} SET name=(:name) WHERE id=(:id)";
			$statement = Connection::pdo()->prepare($sql);
			$statement->execute(array(
				'name' => $user->name,
				'id' => $user->id
			));
		}
		if ($user->email) {
			$sql = "UPDATE ${table} SET email=(:email) WHERE id=(:id)";
			$statement = Connection::pdo()->prepare($sql);
			$statement->execute(array(
				'email' => $user->email,
				'id' => $user->id
			));
		}
		if ($user->password) {
			$sql = "UPDATE ${table} SET password=(:password) WHERE id=(:id)";
			$statement = Connection::pdo()->prepare($sql);
			$statement->execute(array(
				'password' => password_hash($user->password, PASSWORD_DEFAULT),
				'id' => $user->id
			));
		}
		if ($user->avatarId) {
			$sql = "UPDATE ${table} SET username=(:username) WHERE id=(:id)";
			$statement = Connection::pdo()->prepare($sql);
			$statement->execute(array(
				'username' => $user->username,
				'id' => $user->id
			));
		}
		Connection::pdo()->commit();
	}

	static function create($user) {
		$hash = password_hash($user->password, PASSWORD_DEFAULT);
		$table = self::getTableName();
		$sql =
			"INSERT INTO USERS (username, name, email, password, avatarId)VALUES (:username, :name, :email, :password, :avatarId)";
		$statement = Connection::pdo()->prepare($sql);
		$statement->execute(array(
			':username' => $user->username,
			':name' => $user->name,
			'email' => $user->email,
			'password' => $hash,
			'avatarId' => $user->avatarId
		));
		return Connection::pdo()->lastInsertId();
	}

	static function createDeep($user) {
		$user->avatarId = FileRepository::create($user->avatarId);
		return self::create($user);
	}
}
