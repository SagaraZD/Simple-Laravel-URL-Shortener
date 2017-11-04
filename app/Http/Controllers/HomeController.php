<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\link as Link;
use App\hit as hit;
use App\location as location;
use App\connect_location as c_location;

use App\Http\Requests;

class HomeController extends Controller
{
   
	public function index(){
		
		return View('home');
	}


	public function details($id){

			$get_link_id = Link::where('code', '=', $id);

			if($get_link_id->count() === 1){

						//Get hit count for short link
					 	$link_id = $get_link_id->first()->id;
					 	$hits = hit::where('link_id', '=', $link_id)->get();
						
						//get Locations for short link
						$check_location = c_location::where('link_id', '=', $link_id)->get();
						//print_r($check_location);
						if($check_location->count() > 0){
							$locations =$check_location;							
						}

						return view('details')->with('hits', $hits)->with('locations', $locations);

					 }

			 }	


	}


