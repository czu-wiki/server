<?php

class Comment
{
    public $id;
	public $body;
    public $author_id;
    public $reply_to_id;
    public $subject_id;
    public $post_id;
}

class CommentRepository extends Repository {

}
