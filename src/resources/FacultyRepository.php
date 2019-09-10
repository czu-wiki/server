<?php

require_once "Repository.php";
require_once "Connection.php";

use Connection\Connection;

class Faculty
	{
		public $id;
		public $name;
		public $shortName;
		public $color;
		public $logo_id;
}

class FacultyRepository extends Repository
{
    static function getTableName(){
        return "FACULTIES";
    }

	static function update($faculty)        //tested
	{
	    Connection::pdo()->beginTransaction();
        if ($faculty->name){
            $sql="UPDATE ". self::getTableName(). " SET name=(:name) WHERE id=".$faculty->id;
            $statement=Connection::pdo()->prepare($sql);
            $statement->bindValue(':name', $faculty->name);
            $statement->execute();
        }
        if($faculty->shortname){
            $sql="UPDATE ". self::getTableName(). " SET shortname=(:shortname) WHERE id=".$faculty->id;
            $statement=Connection::pdo()->prepare($sql);
            $statement->bindValue(':shortname', $faculty->shortname);
            $statement->execute();
        }
        if($faculty->color){
            $sql="UPDATE ". self::getTableName(). " SET color=(:color) WHERE id=".$faculty->id;
            $statement=Connection::pdo()->prepare($sql);
            $statement->bindValue(':color', $faculty->color);
            $statement->execute();
        }
        if($faculty->logo_id){
            $sql="UPDATE ". self::getTableName(). " SET logo_id=(:logo_id) WHERE id=".$faculty->id;
            $statement=Connection::pdo()->prepare($sql);
            $statement->bindValue(':logo_id', $faculty->logo_id);
            $statement->execute();
        }
        Connection::pdo()->commit();
	}

	static function delete($id)         //tested
	{

	}

	static function create($faculty)    //tested
	{
	    $sql="INSERT INTO ". self::getTableName() . "(name, shortname, color, logo_id) 
	    VALUES (:name, :shortname, :color, :logo_id)";
	    $statement=Connection::pdo()->prepare($sql);
	    $statement->execute(array(
	        ':name'=>$faculty->name,
            ':shortname'=>$faculty->shortName,
            ':color'=>$faculty->color,
            ':logo_id'=>$faculty->logo_id
        ));
	    return Connection::pdo()->lastInsertId();
	}

    static function readAllDeep($lim) {
        $faculties=parent::readAll($lim);
        foreach ($faculties as $faculty){
            $faculty->logo_id=FileRepository::readDeep($faculty->logo_id);
        }
        return $faculties;
    }

    static function readDeep($id) {
        $faculty=parent::read($id);
        $faculty->logo_id=FileRepository::readDeep($faculty->logo_id);
        return $faculty;
    }

    static function createDeep($faculty) {
        $logo_id=FileRepository::createDeep($faculty->logo_id);
        $faculty->logo_id=$logo_id;
        return self::create($faculty);
    }

    static function readAllRearDeep($lim, $deep) {
        $faculties=parent::readAll($lim);
        if (--$deep){
            foreach ($faculties as $faculty) {
                $faculty->logo_id=FileRepository::readRearDeep($faculty->logo_id, $deep);
            }
        }
        else{
            foreach ($faculties as $faculty) {
                $faculty->logo_id=Repository::read($faculty->logo_id);
            }
        }
        return $faculties;
    }

    static function readRearDeep($id, $deep) {
        $faculty=self::read($id);
        if (--$deep){
            $faculty->logo_id=FileRepository::readRearDeep($faculty->logo_id, $deep);
        }
        else{
            $faculty->logo_id=FileRepository::read($faculty->logo_id);
        }
        return $faculty;

    }

}
