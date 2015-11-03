<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use App\Contracts\ApiPostInterface;
use App\Contracts\ApiCategoryInterface;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ApiPostInterface $api_post)
    {
        $posts = $api_post->getAllPosts();
        return $posts;
       // return view('posts.index', ['posts' => $posts, 'title' => 'Posts'] );
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ApiCategoryInterface $api_category)
    {
        $categories = $api_category->getAllCategories();
        return view('posts.form', ['categories' => $categories,'title' => 'Create Post'] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request,ApiPostInterface $api_post)
    {
        if($api_post->createPost( $request ))
        {
            
            return redirect('/post')->with('status', 'Post Added');
        }
        else
        {

            return redirect('/post')->with('warning', 'Post Error');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,ApiPostInterface $api_post)
    {
        $post = $api_post->getPost($id);
        return $post;

        //return view('posts.show', ['post' => $post, 'title' => $post['title']] );        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, ApiPostInterface $api_post, ApiCategoryInterface $api_category)
    {   
        $post_with_category_ids = $api_post->getPostwithCategoryIds($id);
        $categories = $api_category->getAllCategories();
        return view('posts.form', ['post' => $post_with_category_ids, 'categories' => $categories,'title' => 'Create Post'] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id ,ApiPostInterface $api_post)
    {
       //dd($request->all());
        if($api_post->updatePost($id, $request ))
        {
            
            return redirect('/post')->with('status', 'Post Edited');
        }
        else
        {

            return redirect('/post')->with('warning', 'Post Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,ApiPostInterface $api_post)
    {
        //$image_name = $api_post->deletePost($id);
        if($api_post->deletePost($id)){
            
            return redirect('/post')->with('status', 'Post Deleted');
            
            } else {
                return redirect('/post')->with('warning', 'Unknown Error');
            }
    }
}