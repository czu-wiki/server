<?php

class Faculty {
    function __construct($id = null, $name = null, $shortname = null, $color = null, $logo_id = null) {
        $this->id = $id;
        $this->name = $name;
        $this->shortname = $shortname;
        $this->color = $color;
        $this->logo_id = $logo_id;
    }
}

class FacultyRepository extends Repository {

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
