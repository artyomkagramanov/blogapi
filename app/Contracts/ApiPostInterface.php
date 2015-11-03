<?php

namespace App\Contracts;

interface ApiPostInterface
{
	public function getAllPosts();
	public function getPost($id);
	public function createPost($inputs);
	public function updatePost($id,$inputs);
	public function deletePost($id);	
}