<?php

namespace Terawatt\Greenhouse\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
	public function index(Request $request)
	{
		try {
		    $valid_passwords = array ('test' => 'test');
		    $valid_users = array_keys($valid_passwords);

		    if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
		    	$validated = (in_array($_SERVER['PHP_AUTH_USER'], $valid_users)) && ($_SERVER['PHP_AUTH_PW'] == $valid_passwords[$_SERVER['PHP_AUTH_USER']]);

		    	if (!$validated) {
		    		header('WWW-Authenticate: Basic realm="Test Complex"');
		    		header('HTTP/1.0 401 Unauthorized');
		    		return response()->json(['status'=>'ERROR', 'data'=> 'Not autorized!']);
		    		die;
		    	} else {
		    		if (isset($_GET)) {
		    			$parsedData = json_decode(file_get_contents('php://input'), true);

		    			$headers = getallheaders();
		    			$outputArray = [
		    				'status'=>'OK',
		    				'data' => [
		    					'data_recieved' => json_encode($parsedData),
		    					'headers' => json_encode(getallheaders()),
		    					// 'timestamp' => $headers[timestamp],
		    					'server_time' => time(),
		    					'command' => [
		    						'svet1'=>'on',
		    						'wait'=>5,
		    						'svet2'=>'off'
		    					]
		    				]
		    			];

		    			return response()->json($outputArray);
		    		}
		    	}
		    } else {
		    	header('WWW-Authenticate: Basic realm="Test Complex"');
		    	header('HTTP/1.0 401 Unauthorized');
		    	return response()->json(['status'=>'ERROR', 'data'=> 'Not autorized!']);
		    	die;
		    }
		} catch (\Throwable $e) {
		    \Log::alert($e->getMessage());
		    return response()->json(['status'=>'ERROR', 'data'=> $e->getMessage()]);
		}
	}
}