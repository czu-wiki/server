<?php

use Connection\Connection;

class Teacher
{
    public $id;
    public $name;
}

class TeacherRepository extends Repository
{
    static function getTableName(){
        return "TEACHERS";
    }
    static function readAll($lim=99) {
        $sql = "SELECT * FROM ". self::getTableName()." LIMIT " . $lim;
        $statement =Connection::pdo()->prepare($sql);
        $statement->execute();
        $i=0;
        while($teachers[$i]=$statement->fetch(PDO::FETCH_ASSOC)){
            $i++;
        }
        return $teachers;
    }

    static function readAllDeep($lim) {
        return self::readAll($lim);
    }

    static function readAllRearDeep($lim, $deep) {
        return self::readAll($lim);
    }

    static function read($id) {
        $sql = "SELECT * FROM ". self::getTableName() . " WHERE id=".$id ;
        $statement = Connection::pdo()->prepare($sql);
        $statement->execute();
        $tmp=$statement->fetch(PDO::FETCH_ASSOC);
        return $tmp;
    }

    static function readDeep($id) {
        // TODO: Implement readDeep() method.
    }

    static function readRearDeep($id, $deep) {
        // TODO: Implement readRearDeep() method.
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

    static function createDeep($Data) {
        // TODO: Implement createDeep() method.
    }
}
