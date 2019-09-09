<?php

class Post {
    function __construct($id = null, $title = null, $body = null, $date_create = null, $author_id = null, $subject_id = null, $type_id = null) {
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
        $this->date_create = $date_create;
        $this->author_id = $author_id;
        $this->subject_id = $subject_id;
        $this->type_id = $type_id;
    }
}

class PostRepository extends Repository {

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
