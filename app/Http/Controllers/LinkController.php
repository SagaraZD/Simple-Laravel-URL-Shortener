<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\link as Link;
use App\hit as hit;
use App\location as location;
use App\connect_location as c_location;
use App\ip as IP;
use Illuminate\Support\Facades\Redirect;

class LinkController extends Controller
{
   
	public function make(Request $request){
		
			// Validate
		    $this->validate($request, [
		      'url' => 'required|url|max:255',
		    ]);

		    $url = Input::get('url');
		    $code = null;

		    //Checking URL is existing in the DB
		    $exists = Link::where('url', '=', $url);

		    if($exists->count() ===1){
		   		
		    	$code = $exists->first()->code;

		    }else{
		    	//Other wise create a record
		    	$created = Link::create(array(
		    			'url' => $url
		    		));

		    	if($created) {
		    			$code = base_convert($created->id, 10, 36);

		    			Link::where('id', '=', $created->id)->update(array(
		    				'code' => $code
		    			));
		    	}
		    	
		    }

		    //If code is set redirect
		    if($code){
		    		return redirect()->route('home')->with([ 'code' => $code]);

		    	}
		   			return redirect()->route('home')->with(['message'=>'Somthing Went Wrong Please Check']);
			}

	





	//Manage The Get requests from Short URLS

		public function get($code, Request $request){

				//Chekc the Code on DB
				$link = Link::where('code', '=', $code);

				//If code is in db redirect to full url
				if($link->count() === 1){
					$link_id = $link->first()->id;
					$this->hits($link_id);// Calling to hits 
					//Call to location
					$ipAddress = $request->ip();
					$this->location($ipAddress, $link_id);

					return Redirect::to($link->first()->url);
				}
				
				return Redirect::action('home');
			}
	
	
		
		//Hits
		public function hits($link_id){

				$hits = hit::where('link_id', '=', $link_id);
				
				if($hits->count() === 1){
					$hit_id = $hits->first()->id;
					$UpdateHits = hit::find($hit_id);

					$current_hits = $UpdateHits->hit_count;
					$new_hits = $current_hits + 1 ;

					$UpdateHits->hit_count = $new_hits;
					$UpdateHits->update();
						
				}else{

						$Addhit = new hit();
					 	$Addhit->link_id = $link_id;
    					$Addhit->hit_count = 1;
    					$Addhit->save();

				}

		}


		//Location 

		public function location($ipAddress, $link_id){

			 	$IP = new IP();
			 	$ipAddress ="123.231.106.116";
			 	$country = $IP->ip_info($ipAddress, "Country" );

			 	$check_location = location::where('name', '=', $country);
				
				if($check_location ->count() === 1){ 

						$location_id = $check_location->first()->id;
						$check_connect = c_location::where([ ['location_id', '=', $location_id], ['link_id', '=', $link_id] ]);

						if($check_connect ->count() === 1){ 
								

						} else{
						//Add Connect location with link id
						$add_connect = new c_location();
						$add_connect->link_id = $link_id;
						$add_connect->location_id = $location_id;
						$add_connect->save();

						}


				} else{

					$AddLocation = new location();
					$AddLocation->name = $country;
					
					if($AddLocation->save() ){
						$check_new_location = location::where('name', '=', $country);
						echo $new_location_id = $check_new_location->first()->id;

						//Add Connect location with link id
						$add_connect = new c_location();
						$add_connect->link_id = $link_id;
						$add_connect->location_id = $new_location_id;
						$add_connect->save();

					}

				}

		}




}

?>