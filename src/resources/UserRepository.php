<?php

class User {
    function __construct($id = null, $username = null, $name = null, $email = null, $pass = null, $fk_id_faculty = null) {
        $this->id_user = $id;
        $this->username = $username;
        $this->name = $name;
        $this->email = $email;
        $this->pass = $pass;
        $this->fk_id_faculty = $fk_id_faculty;
    }
}

class UserRepository extends Repository {

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
