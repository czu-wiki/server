<?php

class PostFile {
    function __construct($post_id = null, $file_id = null) {
        $this->post_id = $post_id;
        $this->file_id = $file_id;
    }
}

class PostFileRepository extends Repository {

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
