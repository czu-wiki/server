<?php

class File {
	public $id;
	public $filename;
	public $hash;
	public $authorId;
	public $typeId;
}

class FileRepository extends Repository {
	static function readAllDeep($lim) {
		$files = parent::readAll($lim);
		foreach ($files as $file) {
			$file->author_id = UserRepository::read($file->authorId);
			$file->typeId = FileTypesRepository::read($file->typeId);
		}
		return $files;
	}

	static function readAllRearDeep($lim, $deep) {
	}

	static function readDeep($id) {
		// TODO: Implement readDeep() method.
	}

	static function readRearDeep($id, $deep) {
		// TODO: Implement readRearDeep() method.
	}

	static function update($data) {
		// TODO: Implement update() method.
	}

	static function create($data) {
		// TODO: Implement create() method.
	}

	static function createDeep($data) {
		// TODO: Implement createDeep() method.
	}
}
