<?php

class File {
    function __construct($id = null, $filename = null, $hash = null, $author_id = null, $type_id = null) {
        $this->id = $id;
        $this->filename = $filename;
        $this->hash = $hash;
        $this->author_id = $author_id;
        $this->type_id = $type_id;
    }
}

class FileRepository extends Repository {

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
