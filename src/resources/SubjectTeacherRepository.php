<?php

class SubjectTeacher {
    function __construct($subject_id = null, $teacher_id = null) {
        $this->subject_id = $subject_id;
        $this->teacher_id = $teacher_id;
    }
}

class SubjectTeacherRepository extends Repository {

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

