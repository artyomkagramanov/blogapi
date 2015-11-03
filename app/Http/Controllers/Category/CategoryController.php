<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Contracts\ApiCategoryInterface;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ApiCategoryInterface $api_category)
    {
        $categories = $api_category->getAllCategories();
        //dd($categories['categories']);
        //return view('categories.index',['categories' => $categories, 'title' => 'Categories' ]);
        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.form',['title' => 'Create Category' ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request,ApiCategoryInterface $api_category)
    {

        if($api_category->createCategory( $request->all())) {
            
            return redirect('/category')->with('status', 'Category Added');
        } else {

            return redirect('/category')->with('warning', 'Unknown Error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,ApiCategoryInterface $api_category)
    {
        $category = $api_category->getCategory($id);

        return view('categories.show', ['category' => $category, 'title' => $category['title']] ); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,ApiCategoryInterface $api_category)
    {
       $category = $api_category->getCategory($id);
       return view('categories.form',['category' => $category,'title' => 'Create Category' ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id, ApiCategoryInterface $api_category)
    {
        if($api_category->updateCategory($id, $request->all()))
        {
            
            return redirect('/category')->with('status', 'Category Edited');
        }
        else
        {

            return redirect('/category')->with('warning', 'Unknown Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, ApiCategoryInterface $api_category)
    {
        if($api_category->deleteCategory($id))
        {
            
            return redirect('/category')->with('status', 'Category Deleted');
        }
        else
        {

            return redirect('/category')->with('warning', 'Unknown Error');
        }
    }
}
