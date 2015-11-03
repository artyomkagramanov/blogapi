<?php
namespace App\Services;

use App\Contracts\FacebookInterface;
use \Facebook\Facebook;
use App\User;
use Illuminate\Contracts\Auth\Guard;


class FacebookService implements FacebookInterface
{
    protected $facebook; 
    protected $user;
    protected $auth;

    public function __construct(User $user,Guard $auth)
    {
		  if(session_id() == '') {
   			session_start();
		  }

		$this->facebook = new Facebook([
           'app_id' => config('facebook.app_id'),
           'app_secret' => config('facebook.app_secret'),
           'default_graph_version' => 'v2.5'
       ]);
		$this->user = $user;
		$this->auth = $auth;
    }
    
    /*return login with facebook url*/
    public function getLoginUrl()
    {
		$helper = $this->facebook->getRedirectLoginHelper();
		$permissions = ['email']; // optional
		$login_url = $helper->getLoginUrl(url("/fb-callback"),  $permissions);
		return $login_url;
    }
    
    /*return user data - input parameters = fields example('name','email','last_name')*/
    public function getUserData($fb_user_data_fields)
    {
		$helper = $this->facebook->getRedirectLoginHelper();
 
       try {  
           $accessToken = $helper->getAccessToken();  
       } catch(Facebook\Exceptions\FacebookResponseException $e) {  
           // When Graph returns an error  
           echo 'Graph returned an error: ' . $e->getMessage();  
           exit;  
       } catch(Facebook\Exceptions\FacebookSDKException $e) {  
           // When validation fails or other local issues  
           echo 'Facebook SDK returned an error: ' . $e->getMessage();  
           exit;  
       }  

       if (! isset($accessToken)) {  
           if ($helper->getError()) {  
               header('HTTP/1.0 401 Unauthorized');  
               echo "Error: " . $helper->getError() . "\n";
               echo "Error Code: " . $helper->getErrorCode() . "\n";
               echo "Error Reason: " . $helper->getErrorReason() . "\n";
               echo "Error Description: " . $helper->getErrorDescription() . "\n";
           } else {  
               header('HTTP/1.0 400 Bad Request');  
               echo 'Bad request';  
           }  
         exit;  
       }  

		$this->facebook->setDefaultAccessToken($accessToken->getValue());
		$profile_request = $this->facebook->get('/me?fields='.$fb_user_data_fields);

		$users_data = $profile_request->getGraphNode()->asArray();  
		return $users_data;
    }

    /*if in table users exist row that equals fb_user email - login ,else register after that login*/ 

    public function loginOrRegister()
    {
		$users_data = $this->getUserData('name,first_name,last_name,email');
		if(isset($users_data['email'])){
			$user = $this->user->where('email', $users_data['email'])->first();
			if($user){
				$this->auth->login($user);
				return true;
			} else {
				$users_table_inputs = array('name' => $users_data['name'], 'email' => $users_data['email'], 'password' => '');
				$user = $this->user->create($users_table_inputs);
				if($user){
					$this->auth->login($user);
					return true;
				}
			}
		
		}
		return false;		
    }
   
}


















