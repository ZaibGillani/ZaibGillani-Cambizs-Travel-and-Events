<?php

namespace App\Http\Controllers;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Hash;
  
class EventEditController extends Controller
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
    
	public function edit11(Request $request) {
		
		$event_json = $request->post();
		$path = 'public\images';

		$get_event = $request->input();
		$name="";
		if ($files2 = $request->file('filename2')) {
			$files2->move(base_path("$path"), $files2->getClientOriginalName());
			$name = $files2->getClientOriginalName();
		}

		$ticket_name = $get_event['ticket_name'];
		$price = $get_event['price'];
		$no_of_tickets = $get_event['no_of_tickets']; 
		
		$guest_details = $get_event['special_guest'];
		
		$guest_json = json_encode($guest_details);
		$final_ary=array();
		foreach($ticket_name as $key => $ticket){
			$price_n = $price[$key];
			$no_tickets = $no_of_tickets[$key];
			$final_ary[] = array("ticket_name"=>$ticket,"price"=>$price_n,"total_tickets"=>$no_tickets);
			
		}
		$json_vl = json_encode($final_ary);
		
		$date_get = $get_event['event_date'].' '.$get_event['event_time'];
		$event = new Event;
		$lastupdated = date('Y-m-d H:i:s');

		$event->category_name = $get_event['event_category'];
		$id = $get_event['event_id'];
		$event->event_type = $get_event['event_type'];
		$event->event_time = $date_get;
		$event->event_title = $get_event['event_title'];
		$event->keynote = $get_event['keynotesnt_title'];
		$event->about_event = $get_event['about_event'];
		$event->event_location = $get_event['address'];
		
		if($name!=""){
			DB::update('update events_table set category_name = ?,event_type=?,event_time=?,event_title=?,keynote=?,about_event=?,event_image=?,event_location=?,guest_name=?,ticket_details=? where id = ?',[$event->category_name,$event->event_type,$event->event_time,$event->event_title,$event->keynote,$event->about_event,$name,$event->event_location,$guest_json,$json_vl,$id]);
		} else{
			DB::update('update events_table set category_name = ?,event_type=?,event_time=?,event_title=?,keynote=?,about_event=?,event_location=?,guest_name=?,ticket_details=? where id = ?',[$event->category_name,$event->event_type,$event->event_time,$event->event_title,$event->keynote,$event->about_event,$event->event_location,$guest_json,$json_vl,$id]);
		}
		
		$event_data = DB::table('events_table')->where('id', $id)->get();
		
		//return view("dashboard/$id",['event_data'=>$event_data]);
		$event_data_list = DB::table('events_table')->orderBy('id',"DESC")->take(5)->get();

		return back()->with('message', 'Event updated successfully');
	}

}