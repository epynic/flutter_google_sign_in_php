<?php
# Not for Production use
$response = [];
$response['error'] = true;

#TODO some better validation checks for $_POST
if( isset($_POST) && !empty($_POST) )
{
    $google_auth_url = "https://www.googleapis.com/oauth2/v3/tokeninfo?access_token=".$_POST['access_token'];

    #TODO sanitise - and CURL
    $api_response = json_decode( file_get_contents($google_auth_url) , true );

    #TODO add your own checks from response
    # Register the Email - add to DB - your wish to what ever you want.
    if($api_response['email'] == $_POST['email'])
        $response['error'] = false;
}

echo json_encode($response);
?>