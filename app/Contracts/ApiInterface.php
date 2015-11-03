<?php

namespace App\Contracts;

interface ApiInterface
{
	/*methods of categories*/

	public function getAllCategories();
	public function getCategory($id);
	public function createCategory($inputs);
	public function updateCategory($id,$inputs);
	public function deleteCategory($id);


	/*methods of Posts*/

	public function getAllPosts();
	public function getPost($id);
	public function createPost($inputs);
	public function editPost($id,$inputs);
	public function deletePost($id);	
}