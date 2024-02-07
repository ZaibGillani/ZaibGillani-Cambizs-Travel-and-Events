<?php

namespace App\Http\Controllers;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Hash;
  
class EventController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create_event()
    {
		
        return view('create_event');
    }  
	
	public function event_backend() {
		echo"this is test";
	}
    
	public function add(Request $request) {
		$event_json = $request->post();
		$path = 'public\images';
	
		//$event_json_ary = json_decode($event_json,TRUE);
		$get_event = $request->input();
		$user_id = Auth::user()->id;
		
		if ($files1 = $request->file('filename1')) {
			$files1->move(base_path("$path"), $files1->getClientOriginalName());
			$name = $files1->getClientOriginalName();
		}
		if ($files2 = $request->file('filename2')) {
			$files2->move(base_path("$path"), $files2->getClientOriginalName());
			$name = $files2->getClientOriginalName();
		}
		if ($files3 = $request->file('filename3')) {
			$files3->move(base_path("$path"), $files3->getClientOriginalName());
			$name = $files3->getClientOriginalName();
		}
	
		/*  echo"<pre>";
		print_r($_FILES);
		die; */ 
	
		//die;
		$standard = $get_event['standard'];
		$premium = $get_event['premium'];
		$vip = $get_event['vip'];
		
		$standard_price = $get_event['standard_price'];
		$premium_price = $get_event['premium_price'];
		$vip_price = $get_event['vip_price'];
		
		$standard_tickets = $get_event['standard_tickets'];
		$premium_tickets = $get_event['premium_tickets'];
		$vip_tickets = $get_event['vip_tickets'];
		
		$guest_details = $get_event['special_guest'];
		
		$guest_json = json_encode($guest_details);
		
		$json_tickets = '[{"ticket_name":"'.$standard.'","price":"'.$standard_price.'","total_tickets":"'.$standard_tickets.'"},{"ticket_name":"'.$premium.'","price":"'.$premium_price.'","total_tickets":"'.$premium_tickets.'"},{"ticket_name":"'.$vip.'","price":"'.$vip_price.'","total_tickets":"'.$vip_tickets.'"}]';
		
		
		
		$date_get = $get_event['event_date'].' '.$get_event['event_time'];
		//$lastupdated = date('Y-m-d H:i:s');
		$event = new Event;
		$lastupdated = date('Y-m-d H:i:s');

		/* echo $get_event['event_category'];
		die; */
		$event->category_name = $get_event['event_category'];
		$event->user_id = $user_id;
		$event->event_type = $get_event['event_type'];
		$event->event_time = $date_get;
		$event->event_title = $get_event['event_title'];
		//$event->keynote = $get_event['keynotesnt_title'];
		$event->keynote = $get_event['keynotesnt_title'];
		//$event->about_event = $get_event['about_event'];
		$event->about_event = $get_event['about_event'];
		$event->event_image = $name;
		$event->event_location = $get_event['address'];
		$event->guest_name = $guest_json;
		$event->ticket_details = $json_tickets;
		
		$event->save();
		
		/* echo"<pre>";
		print_r($_POST);*/
		$response = array(
					'status' => false,
					'message' => 'success',
				);
				echo json_encode( $response );
				die;
	}
	function get_event($id){
		$event_data = DB::table('events_table')
						->where('id', $id)
						->get();
		$event_data_list = DB::table('events_table')->orderBy('id',"DESC")->take(5)->get();

		return view('events.event_details', ['event_data_single' => $event_data,'event_data'=>$event_data_list]);
	}
	function event_list(){
		$event_data = DB::table('events_table')->orderBy('id',"DESC")->take(5)->get();
		return view('welcome', ['event_data' => $event_data]);
	}
	function event_single($id){		
		$event_data = DB::table('events_table')->where('id', $id)->get();
		return view('event_user/edit',['event_data'=>$event_data]);
	}
	function add_bank(){
		echo"11";
		die;
	}
	function event_user_setting($id){
		$user_data = DB::table('users')
						->where('id', $id)
						->get();
		if(!empty($user_data)){
			$email = $user_data[0]->email;
			$name = $user_data[0]->name;
		}

		return view('event_user/setting', ["user_id"=>$id,"name"=>$name,"email"=>$email]);
	}
	
}