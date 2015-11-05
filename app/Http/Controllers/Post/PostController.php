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


    public function imageUpload(){

        $file = $_FILES[key($_FILES)];

        $image_name = time().$file['name'];
        $upload_dir = '/images/'.$image_name;
        $upload_dir ="D:/xampp/htdocs/blog-api/public/images/".$image_name;
       if (move_uploaded_file($file['tmp_name'], $upload_dir)){
            return response()->json(['status'=>'Image Uploaded','image_name'=>$image_name]);
        } else {
            return response()->json(['status'=>'Error at image upload','message'=>'error']);
        }

        //return response()->json(['status'=>'Image Uploaded','message'=>$file['tmp_name']]);

        
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
            return response()->json(['status'=>'success','message'=>'Post added']);
            //return redirect('/post')->with('status', 'Post Added');
        }
        else
        {
            return response()->json(['status'=>'error','message'=>'Error in Add Post']);
            //return redirect('/post')->with('warning', 'Post Error');
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
             return response()->json(['status'=>'success','message'=>'Post edited']);
            //return redirect('/post')->with('status', 'Post Edited');
        }
        else
        {
             return response()->json(['status'=>'success','message'=>'Post edited']);
            //return redirect('/post')->with('warning', 'Post Error');
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
        if($api_post->deletePost($id))
        {    
            return response()->json(['status'=>'success','message'=>'Post Deleted']);
            //return redirect('/post')->with('status', 'Post Deleted');   
        } 
        else 
        {
            return redirect('/post')->with('warning', 'Error in post delete process');
        }
    }
}
