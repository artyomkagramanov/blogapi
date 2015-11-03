<?php

return [

    /*
    linkedin application id 
    */

    'app_id' => '774nly9ft78yfr',

    /*
    linkedin applicattion secret code
    */

    'app_secret' => 'IuMvwoBrR8ox0hnr',


    /*
    linkedin applicattion permissions
    */

    'scope' => 'r_basicprofile r_emailaddress',

    /*
    linkedin callback url
    */

    'redirect_uri' => 'http://blogapi.dev/linkedin-callback',

     /*
    linkedin Oauth url
    */

    'o_auth_url' => 'https://www.linkedin.com/uas/oauth2/authorization?',

     /*
    linkedin Oauth url
    */

    'o_auth_access_token_url' => 'https://www.linkedin.com/uas/oauth2/accessToken?',

    /*
    user fields
    */
    'fields' => 'firstName,lastName,email-address',

];
