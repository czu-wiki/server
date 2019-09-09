<?php

class OfficialSubject {
    function __construct($id = null, $code = null, $name = null, $faculty_id = null, $subject_id = null) {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->faculty_id = $faculty_id;
        $this->subject_id = $subject_id;
    }
}

class OfficialSubjectRepository extends Repository {

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
