<?php

namespace Terawatt\Greenhouse\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
	public function index(Request $request)
	{
	    $valid_passwords = array ('test' => 'test');
	    $valid_users = array_keys($valid_passwords);

	    $user = $_SERVER['PHP_AUTH_USER'];
	    $pass = $_SERVER['PHP_AUTH_PW'];

	    if (isset($_SERVER['PHP_AUTH_USER']) || isset($_SERVER['PHP_AUTH_PW'])) {
	    	$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

	    	if (!$validated) {
	    		header('WWW-Authenticate: Basic realm="Test Complex"');
	    		header('HTTP/1.0 401 Unauthorized');
	    		echo (json_encode(['status'=>'ERROR', 'data'=> 'Not autorized!']));
	    		die;
	    	} else {
	    		if (isset($_GET)) {
	    			$parsedData = json_decode(file_get_contents('php://input'), true);

	    			$headers = getallheaders();
	    			$date = time();
	    			$outputArray = [
	    				'status'=>'OK',
	    				'data' => [
	    					'data_recieved' => json_encode($parsedData),
	    					'headers' => json_encode($headers),
	    					// 'timestamp' => $headers[timestamp],
	    					'server_time' => $date,
	    					'sanchous' => 'top',
	    					'command' => [
	    						'svet1'=>'on',
	    						'wait'=>5,
	    						'svet2'=>'off'
	    					]
	    				]
	    			];

	    			echo(json_encode($outputArray));
	    		}
	    	}
	    } else {
	    	header('WWW-Authenticate: Basic realm="Test Complex"');
	    	header('HTTP/1.0 401 Unauthorized');
	    	echo (json_encode(['status'=>'ERROR', 'data'=> 'Not autorized!']));
	    	die;
	    }
	}
}