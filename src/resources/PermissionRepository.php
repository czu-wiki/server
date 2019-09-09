<?php

class Permission {
    function __construct($id = null, $name = null) {
        $this->id = $id;
        $this->name = $name;
    }
}

class PermissionRepository extends Repository {

    static function readAll($lim) {
        // TODO: Implement readAll() method.
    }

    static function read($id) {
        // TODO: Implement read() method.
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
}

