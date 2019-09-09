<?php

class TeacherRatings {
    function __construct($id = null,
                         $rating = null,
                         $date_created = null,
                         $teacher_id = null,
                         $author_id = null) {

        $this->id = $id;
        $this->rating = $rating;
        $this->date_created = $date_created;
        $this->teacher_id = $teacher_id;
        $this->author_id = $author_id;
    }
}

class TeacherRatingsRepository extends Repository {

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
