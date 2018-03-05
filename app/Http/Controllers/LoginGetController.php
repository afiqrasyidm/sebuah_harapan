<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Input;


class LoginGetController extends Controller
{
    
	function index() {
	
			return view("login_get");
	
	}
	public function login(){
			$client = new Client();
			$r = $client->request('POST', 'http://localhost/tanya_in_aja_back/public/api/login', [
					'form_params' => [
						'email' => Input::get('email'),
						'password' => Input::get('password'),
					],
				]);

				
			$json = json_decode($r->getBody(), true);	
				
			return $json['data']['name'];
	}
}
