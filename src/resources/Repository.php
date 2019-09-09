<?php


abstract class Repository {
    function __construct() {

    }

    static abstract function readAll($lim);

    static abstract function read($id);

    static abstract function update($Data);

    static abstract function delete($id);

    static abstract function create($Data);

}