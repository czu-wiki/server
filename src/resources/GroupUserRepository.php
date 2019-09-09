<?php

class GroupUser {
    function __construct($group_id = null, $user_id = null) {
        $this->group_id = $group_id;
        $this->user_id = $user_id;
    }
}

class GroupUserRepository extends Repository {

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
