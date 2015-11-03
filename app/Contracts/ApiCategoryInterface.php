<?php

namespace App\Contracts;

interface ApiCategoryInterface
{

	public function getAllCategories();
	public function getCategory($id);
	public function createCategory($inputs);
	public function updateCategory($id,$inputs);
	public function deleteCategory($id);
	
}