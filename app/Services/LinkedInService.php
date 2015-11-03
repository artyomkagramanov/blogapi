<?php
namespace App\Services;

use App\Contracts\LinkedInInterface;
use App\User;
use Illuminate\Contracts\Auth\Guard;


class LinkedInService implements LinkedInInterface
{
     
    protected $user;
    protected $auth;

    public function __construct(User $user,Guard $auth)
    {
		  if(session_id() == '') {
   			session_start();
		  }

		$this->user = $user;
		$this->auth = $auth;
    }
    
    /*return login with facebook url*/
    public function getLoginUrl()
    {
		$params = array(
	        'response_type' => 'code',
	        'client_id' => config('linkedin.app_id'),
	        'scope' => config('linkedin.scope'),
	        'state' => uniqid('', true), // unique long string
	        'redirect_uri' => config('linkedin.redirect_uri'),
	    );
 		
 		$_SESSION['state'] = $params['state'];
    	// Authentication request
    	$login_url = config('linkedin.o_auth_url') . urldecode(http_build_query($params));
		return $login_url;
    }
    
    private function getUserData($method, $resource, $body = '') {
	    
	 
	    $opts = array(
	        'http'=>array(
	            'method' => $method,
	            'header' => "Authorization: Bearer " . $_SESSION['access_token'] . "\r\n" . "x-li-format: json\r\n"
	        )
	    );
	 
	    // Need to use HTTPS
	    $url = 'https://api.linkedin.com' . $resource;
	 
	    // Append query parameters (if there are any)
	    
	 
	    // Tell streams to make a (GET, POST, PUT, or DELETE) request
	    // And use OAuth 2 access token as Authorization
	    $context = stream_context_create($opts);
	 
	    // Hocus Pocus
	    $response = file_get_contents($url, false, $context);
	 
	    // Native PHP object, please

	    return (array) json_decode($response);
	
	}

    public function loginOrRegister()
    {
    	if($this->getAccessToken())
    	{
	        $users_data = $this->getUserData('GET', '/v1/people/~:('.config('linkedin.fields').')');
	        $email = $users_data['emailAddress'];
	        $name = $users_data['firstName'].' '.$users_data['lastName'];
	        if(isset($email)){
	            $user = $this->user->where('email', $email)->first();
	            if($user){
	                $this->auth->login($user);
	                return true;
	            } else {
	                $users_table_inputs = array('name' => $name, 'email' => $email, 'password' => '');
	                $user = $this->user->create($users_table_inputs);
	                if($user){
	                    $this->auth->login($user);
	                    return true;
	                }
	            }
	        }    		
    	}

        return false;
    }

    private function getAccessToken()
    {
    	if ($_SESSION['state'] != $_GET['state'] || !isset($_GET['code']) )
		    return false;
		    
	    $params = array(
	        'grant_type' => 'authorization_code',
	        'client_id' => config('linkedin.app_id'),
	        'client_secret' => config('linkedin.app_secret'),
	        'code' => $_GET['code'],
	        'redirect_uri' => config('linkedin.redirect_uri'),
	    );
	     
	    // Access Token request
	    $url =  config('linkedin.o_auth_access_token_url'). urldecode(http_build_query($params));
	     
	    // Tell streams to make a POST request
	    $context = stream_context_create(
	        array('http' => 
	            array('method' => 'POST',
	            )
	        )
	    );
	 
	    // Retrieve access token information
	    $response = file_get_contents($url, false, $context);
	 
	    // Native PHP object, please
	    $token = json_decode($response);
	 
	    // Store access token and expiration time
	    $_SESSION['access_token'] = $token->access_token; // guard this! 
	    $_SESSION['expires_in']   = $token->expires_in; // relative time (in seconds)
	    $_SESSION['expires_at']   = time() + $_SESSION['expires_in']; // absolute time
	    
	    return true;
		    
    	
    }
   
}


















