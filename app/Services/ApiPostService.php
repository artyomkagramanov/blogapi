<?php
namespace App\Services;

use GuzzleHttp\Client;
use File;
use App\Contracts\ApiPostInterface;


class ApiPostService implements ApiPostInterface
{
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->api_domain = env('API_DOMAIN');
    }
    
    /* return all posts*/
    public function getAllPosts()
    {
        return $this->client->get( $this->api_domain.'/post')->json();
    }
    
    /* return post by id*/
    public function getPost($id)
    {
        
        $post = $this->client->get($this->api_domain.'/post/'.$id)->json();

        $post_categories_ids = array();
        foreach($post['categories'] as $category)
        {
            $post_categories_ids[] = $category['id'];
        }
        $post['categories_ids'] = $post_categories_ids;

        return $post;
    }

        /* return category by id*/
    public function getPostwithCategoryIds($id)
    {
        
        $post = $this->client->get($this->api_domain.'/post/'.$id)->json();
        

        $post_category_ids = array();

        foreach($post['categories'] as $category)
        {
            $post_category_ids[] = $category['id'];
        }
        $post['categories'] = $post_category_ids;

        return $post;
    }



    /* create new category*/
    public function createPost($request)
    {   

/*        $image_name = 'default.jpg';
        if( $request->hasFile('image') )
        {
            $file = $request->file('image');
            $image_name = time().$file->getClientOriginalName();
            $file->move('images',$image_name);
        }

        $inputs = $request->all();
        $inputs['image'] = $image_name;
        return $this->client->post($this->api_domain.'/post',['body' => $inputs])->json();*/

        $default_image_name = 'default.jpg';
        $inputs = $request->all();
        if(!isset($inputs['image'])){
            $inputs['image'] = $default_image_name;
        }
        return $this->client->post($this->api_domain.'/post',['body' => $inputs])->json(); 


    }

    /* update category by id*/
    public function updatePost($id,$request)
    {   
/*        $image_name = $this->getPost($id)['image'];
        
        if($image_name !== 'default.jpg')
        {
            File::delete(realpath('images').'\\'.$image_name);
        }
        $inputs = $request->all();

        if( $request->hasFile('image') ){
   
            $file = $request->file('image');
            $image_name = time().$file->getClientOriginalName();
            $file->move('images',$image_name);
        } else  $image_name = 'default.jpg';

        $inputs['image'] = $image_name;
        return $this->client->put($this->api_domain.'/post/'.$id,['body' => $inputs])->json();*/
        $default_image_name = 'default.jpg';
        $inputs = $request->all();
        if($inputs['image'] != $default_image_name){
            $image_name = $this->getPost($id)['image'];
            if($image_name != $inputs['image']){
                File::delete(realpath('images').'\\'.$image_name);
            }
        }
        return $this->client->put($this->api_domain.'/post/'.$id,['body' => $inputs])->json();
    }

    /* delete category by id*/
    public function deletePost($id)
    {   
        $image_name = $this->client->delete($this->api_domain.'/post/'.$id)->json();
        if($image_name){
            if($image_name !== 'default.jpg')
                File::delete(realpath('images').'\\'.$image_name);
            return true;
        } else return false;

    }  





   
}


















