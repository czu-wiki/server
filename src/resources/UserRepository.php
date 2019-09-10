<?php

class User
{
    public $id;
    public $username;
    public $name;
    public $email;
    public $pass;
    public $fk_id_faculty;
}

class UserRepository extends Repository
{

}
