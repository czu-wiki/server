<?php

class Comment {
    function __construct($id = null,
                         $body = null,
                         $author_id = null,
                         $reply_to_id = null,
                         $subject_id = null,
                         $post_id = null) {

        $this->id = $id;
        $this->body = $body;
        $this->author_id = $author_id;
        $this->reply_to_id = $reply_to_id;
        $this->subject_id = $subject_id;
        $this->post_id = $post_id;
    }
}

class CommentRepository extends Repository {

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
