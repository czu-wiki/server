<?php

class File
{
    public $id;
    public $filename;
    public $hash;
    public $author_id;
    public $type_id;

}

class FileRepository extends Repository
{

    static function readAll($lim) {
        // TODO: Implement readAll() method.
    }

    static function readAllDeep($lim) {
        // TODO: Implement readAllDeep() method.
    }

    static function readAllRearDeep($lim, $deep) {
        // TODO: Implement readAllRearDeep() method.
    }

    static function read($id) {
        // TODO: Implement read() method.
    }

    static function readDeep($id) {
        // TODO: Implement readDeep() method.
    }

    static function readRearDeep($id, $deep) {
        // TODO: Implement readRearDeep() method.
    }

    static function update($Data) {
        // TODO: Implement update() method.
    }

    static function delete($id) {
        // TODO: Implement delete() method.
    }

    static function create($Data) {
        // TODO: Implement create() method.
    }

    static function createDeep($Data) {
        // TODO: Implement createDeep() method.
    }

    static function createRearDeep($Data, $deep) {
        // TODO: Implement createRearDeep() method.
    }
}
