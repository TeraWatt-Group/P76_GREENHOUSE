<?php

namespace Terawatt\Greenhouse\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\History;

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
		    		return response()->json(['status' => 'ERROR', 'data' => 'Not autorized!'], 401);
		    		die;
		    	} else {
		    		if (isset($_GET)) {
		    			$parsedData = json_decode((string)file_get_contents('php://input'), true);

		    			$headers = getallheaders();
		    			$outputArray = [
		    				'status'=>'OK',
							'data_recieved' => $parsedData,
	    					'headers' => $headers,
	    					'timestamp' => $headers['timestamp'],
	    					'server_time' => time(),
		    			];

		    			\DB::transaction(function () use ($outputArray) {
		    			    History::insert([
		    			    	[
		    			    		'itemid' => 1,
		    			    		'clock' => $outputArray['server_time'],
		    			    		'value' => $outputArray['data_recieved']['FIRST'],
		    			    	],
		    			    	[
		    			    		'itemid' => 2,
		    			    		'clock' => $outputArray['server_time'],
		    			    		'value' => $outputArray['data_recieved']['SECOND'],
		    			    	]
		    			    ]);
		    			});

		    			// \Log::debug($outputArray['data_recieved']['payload']);
		    			return response()->json($outputArray, 200);
		    		}
		    	}
		    } else {
		    	header('WWW-Authenticate: Basic realm="Test Complex"');
		    	header('HTTP/1.0 401 Unauthorized');
		    	return response()->json(['status' => 'ERROR', 'data' => 'Not autorized!'], 401);
		    	die;
		    }
		} catch (\Throwable $e) {
		    \Log::alert($e->getMessage());
		    return response()->json(['status' => 'ERROR', 'data' => $e->getMessage()], 500);
		}
	}
}