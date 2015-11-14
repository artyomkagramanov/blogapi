<?php
namespace App\Services;

use GuzzleHttp\Client;
use File;
use App\Contracts\ApiCategoryInterface;

class ApiCategoryService implements ApiCategoryInterface
{
    public function __construct(Client $client)
    {

        $this->client = $client;
        $this->api_domain = env('API_DOMAIN');

    }
    
    /* return all categories*/
    public function getAllCategories()
    {
       
        return $this->client->get( $this->api_domain.'/category')->json();
    }
    
    /* return category by id*/
    public function getCategory($id)
    {
        return $this->client->get($this->api_domain.'/category/'.$id)->json();
    }

    /* create new category*/
    public function createCategory($inputs)
    {   //dd($inputs);
        return $this->client->post($this->api_domain.'/category',['body' => $inputs])->json();
    }

    /* update category by id*/
    public function updateCategory($id,$inputs)
    {
        return $this->client->put($this->api_domain.'/category/'.$id,['body' => $inputs])->json();
    }

    /* delete category by id*/
    public function deleteCategory($id)
    {
        return $this->client->delete($this->api_domain.'/category/'.$id)->json();
    }



   
}


















