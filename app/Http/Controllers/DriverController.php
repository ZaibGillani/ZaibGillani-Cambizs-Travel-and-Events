<?php

namespace App\Http\Controllers;
  
use App\Http\Controllers\Controller;
use App\Models\cab_ride_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\OrderRide;
use App\Models\RequestPayment;
use App\Models\DriverProfile;
use Illuminate\Support\Facades\DB;
use Hash;
use Stripe;
  
class DriverController extends Controller {
	
	public function post_a_ride(){
		if(!Auth::check()) 
		{
			return view('404');
		}
		return view('driver.post_ride');
	}
	
	public function dashboard_driver(){
		return view('driver.dashboard_driver');
	}
	
	
	public function dashboard_driver_rides(){
		if(Auth::check()){
			$id=Auth::user()->id;
			
			
			if($id!=''){
				$get_total_rides = DB::table('users')->join('cab_ride_infos','cab_ride_infos.driver_id','=','users.id')->where('users.id', $id)
				->paginate(10);
				
				/* $get_total_rides = DB::table('users')->join('cab_ride_infos','cab_ride_infos.driver_id','=','users.id')
				
				->paginate(1); */
				
				return view('driver.my_rides', ['ride_info'=>$get_total_rides]);
			}
			
		}
		return view('404');
	}
	
	public function search_ride(Request $request){
		$search_ride = $request->post();
		$source = $search_ride['source'];
		$destination = $search_ride['destination'];
		$date = $search_ride['date'];
		$no_of_passenger = $search_ride['no_of_passenger'];
		//echo $date;
		$get_ride_info = DB::table('users')->join('cab_ride_infos','cab_ride_infos.driver_id','=','users.id')->where('cab_ride_infos.pickup_location', $source)
		->where('cab_ride_infos.drop_location', $destination)
		//->where('journey_date', $date)
		->take(5)
		->get();
		
		/* echo"<pre>";
		print_r($get_ride_info);  
		die; */
		
		if(!empty($search_ride)){
			$ride_info = "No ride available";
		}
		$driver_ratings=array();
		foreach($get_ride_info as $ride_info){
			$dri_id = $ride_info->driver_id;
			$driver_ratings[$dri_id] = DB::table('driver_ratings')->where('driver_id',"=", $dri_id)->avg('ratings');
		
		}
		/* echo"<pre>";
		print_r($search_ride);
		print_r($get_ride_info);
		die; */
		return view('driver.ride_list', ['ride_list'=>$get_ride_info,"driv_rating"=>$driver_ratings]);
		
		
	}
	
	public function driver_profile(Request $request){
		$ride_data = $request->post();
		
		$ride_id = $ride_data['driver_ride_id'];
		$driver_id = $ride_data['driver_id'];
		$get_ride_info = DB::table('users')->join('cab_ride_infos','cab_ride_infos.driver_id','=','users.id')
		->where('cab_ride_infos.id', $ride_id)
		->get();
		
		$driver_ratings = DB::table('driver_ratings')->where('driver_id',"=", $driver_id)
		->avg('ratings');
		
		$driver_member = DB::table('users')->where('id',"=", $driver_id)
		->first('created_at');
		
		$driver_profile_telno = DB::table('driver_profile')->select("tel_no")->where('driver_id',"=", $driver_id)
		->first();
		
		$timestamp = strtotime($driver_member->created_at);
		$year = date('Y', $timestamp);
		$month = date('M', $timestamp);
		$final = $month.' '.$year;
		
		if($driver_ratings==''){ 
			$driver_ratings="No feedback given";   
		}
		
		
		return view('driver.driver_profile',['ride_info'=>$get_ride_info,"driver_ratings"=>$driver_ratings,"driver_member"=>$final,"driver_profile_telno"=>$driver_profile_telno]);
	}
	
	public function book_ride($id){
		$cab_ride_info = cab_ride_info::find($id);
		
		$booking_ride=array();
		
		if(isset($cab_ride_info->id)){
			
			$id = $cab_ride_info->id;
			$journey_type = $cab_ride_info->journey_type;
			$price = (float)$cab_ride_info->price;
			$pickup_location = $cab_ride_info->pickup_location;
			$drop_location = $cab_ride_info->drop_location;
			$journey_date = $cab_ride_info->journey_date;
			$pickup_time = $cab_ride_info->pickup_time;
			$drop_time = $cab_ride_info->drop_time;
			$luggage = $cab_ride_info->luggage;
			$car_make = $cab_ride_info->car_make;
			$registration_number = $cab_ride_info->registration_number;
			$car_type = $cab_ride_info->car_type;
			$car_seat = $cab_ride_info->car_seat;
			$driver_id = $cab_ride_info->driver_id;
			
			//$p_time = date("h:i A", $pickup_time);
			$p_time = $pickup_time;
			
			//$d_time = date("h:i A", $drop_time);
			$d_time = $drop_time;
			$ride_order_data = DB::table('order_ride')->where('ride_id', $id)->get();
			$count = count($ride_order_data);
			$arr=array();
			for($i=0;$i<$count;$i++){
				 $booking_seat = $ride_order_data[$i]->booking_seat;
				 $temp_arr = explode(',', $booking_seat);
				 $arr = array_merge($arr,$temp_arr);
			}
			$total_cat_seat_available = explode(',', $car_seat);
			//$final_ary_booking = array_combine($total_cat_seat_available,$arr);
			$final_ary_booking = array();
			foreach($total_cat_seat_available as $value) {
				if(!in_array($value, $arr)) {
					array_push($final_ary_booking, $value);
				}
			}
			/* echo"<pre>";
			print_r($final_ary_booking);
			//print_r($car_seat);
			die; */
			//return $arr;
			/* foreach($ride_order_data as $ride_d){
				$booking_seat = $ride_d->booking_seat;
				$booked_seat[] = explode(',', $booking_seat);
			}
			$booked_seat = array_combine($booked_seat);
			echo"<pre>";
			print_r($booked_seat);
			die; */
			$booking_ride = array("id"=>$id,"journey_type"=>$journey_type,"price"=>$price,"pickup_location"=>$pickup_location,"drop_location"=>$drop_location,"journey_date"=>$journey_date,"pickup_time"=>$p_time,"drop_time"=>$d_time,"luggage"=>$luggage,"car_make"=>$car_make,"registration_number"=>$registration_number,"car_type"=>$car_type,"car_seat"=>$final_ary_booking,"driver_id"=>$driver_id);
			
		} 

		//echo"<pre>";print_r($cab_ride_info);die;
		if(!empty($booking_ride)){
			return view('driver.ride_view',["ride_information"=>$booking_ride]);
		} else{
			
			return view('404');
		}
		
	}
	public function ride_payment_process(Request $request){
		$post_data = $request->post();
		
		
		//die;
		$stripe_token = $post_data['stripeToken'];
		$order_ride = new OrderRide();
		$order_ride->name = $post_data['name'];
		$order_ride->email = $post_data['email'];
		$order_ride->booking_seat = $post_data['booking_seat'];
		$order_ride->booking_date = $date = date('d-m-Y');
		$order_ride->driver_id = $post_data['driver_id'];
		$order_ride->ride_id = $post_data['ride_id'];
		$order_ride->booking_price = $post_data['ride_price'];
		
		Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
		$strip_n = Stripe\Charge::create ([
			"amount" => 100 * $post_data['ride_price'],
			"currency" => "usd",
			"source" => $request->stripeToken,
			"description" => "Ride Booking with name: ".$post_data['name']. " and email: ". $post_data['email']
		]);
		
		$order_ride->save();
		$order_id = $order_ride->id;
		//return view('driver.order_ride');
		
		if($order_id){
			return redirect("order_ride/$order_id")->withSuccess('Your order is placed successfully.'); 
		}
		
		echo"<pre>";
		print_r($strip_n);
		die;
	}
	public function book_ride_form(Request $request){
		
		$post_data = $request->post();
		return view('driver.book_ride_form',["ride_data"=>$post_data]);
		/* echo"<pre>";
		print_R($post_data);
		die; */
	}
	public function insert_data(Request $request){
		$post_data = $request->post();
		
		//echo $post_data['pickup_time'];
		//die;
		$cab_ride_info = new cab_ride_info();
		$cab_ride_info->journey_type = $post_data['journey_type'];
		$cab_ride_info->journey_date = $post_data['journey_date'];
		$cab_ride_info->price = $post_data['price'];
		
		$cab_ride_info->pickup_location = $post_data['pickup_location']; 
		$cab_ride_info->drop_location = $post_data['drop_location'];
		
		$cab_ride_info->pickup_time = date("h:i A", strtotime($post_data['pickup_time']));
		
		$cab_ride_info->drop_time = date("h:i A", strtotime($post_data['drop_time']));
		$difference = round(abs(strtotime($post_data['drop_time']) - strtotime($post_data['pickup_time'])) / 3600,2);
		$cab_ride_info->time_difference =  $difference;
		$cab_ride_info->return_pickup_location = '';
		$cab_ride_info->return_drop_location = '';
		$cab_ride_info->return_journey_date = '';
		$cab_ride_info->return_pickup_time = '';
		$cab_ride_info->return_drop_time = '';
		$cab_ride_info->return_luggage = '';
		$cab_ride_info->luggage = $post_data['luggage'];
		if(isset($post_data['return_pickup_location'])){
			$cab_ride_info->return_pickup_location = $post_data['return_pickup_location'];
			$cab_ride_info->return_drop_location = $post_data['return_drop_location'];
			$cab_ride_info->return_journey_date = $post_data['return_journey_date'];
			$cab_ride_info->return_pickup_time = $post_data['return_pickup_time'];
			$cab_ride_info->return_drop_time = $post_data['return_drop_time'];
			$cab_ride_info->return_luggage = $post_data['return_luggage'];
		}
		$cab_ride_info->car_make = $post_data['car_make'];
		$cab_ride_info->registration_number = $post_data['registration_number'];
		$cab_ride_info->car_type = $post_data['car_type'];
		$cab_ride_info->driver_id = $post_data['driver_id'];
		
		$sear_data = implode(",",$post_data['car_seat']);
		$cab_ride_info->car_seat = $sear_data;
		
		/* echo"<pre>";
		print_r($post_data);
		die; */
		
		$cab_ride_info->save();
		return back()->with("success","Your ride posted successfully");
	}
	
	public function complete_registration($id){
		return view('driver.complete_profile',["id"=>$id]);
	}
	public function complete_driver_registration_submit(Request $request){
		$post_data = $request->post();
		$driver_profile_s = new DriverProfile;
		$driver_profile_s->driver_id = $post_data['driver_id'];
		$driver_profile_s->address = $post_data['address'];
		$driver_profile_s->dob = $post_data['dob'];
		$driver_profile_s->license_number = $post_data['license_number'];
		$driver_profile_s->expiration_date = $post_data['expiration_date'];
		$driver_profile_s->owner_name = $post_data['owner_name'];
		$driver_profile_s->owner_address = $post_data['owner_address'];
		$driver_profile_s->year = $post_data['year'];
		$driver_profile_s->make = $post_data['make'];
		$driver_profile_s->license_plate_no = $post_data['license_plate_no'];
		$driver_profile_s->registration_express = $post_data['registration_express'];
		$driver_profile_s->seating_capacity = $post_data['seating_capacity'];
		$driver_profile_s->no_seatbelts = $post_data['no_seatbelts'];
		$driver_profile_s->insurance_information = $post_data['insurance_information'];
		$driver_profile_s->policy_number = $post_data['policy_number'];
		$driver_profile_s->tel_no = $post_data['tel_no'];
		$driver_profile_s->insurance_expiration_date = $post_data['insurance_expiration_date'];
		$driver_profile_s->liability_limits_policy = $post_data['liability_limits_policy'];
		$name='';
		$path = 'public/documents';
		/* echo"<pre>";
		print_r($request->file('filename'));
		die; */
		if ($files1 = $request->file('filename')) {
			$files1->move(base_path("$path"), $files1->getClientOriginalName());
			$name = $files1->getClientOriginalName();
		}
		
		$driver_profile_s->driver_document = $name;
		$driver_profile_s->save();
		echo"sdsd";
		return redirect("driver/dashboard")->withSuccess('Great! You have Successfully loggedin'); 
	}
	
	public function dashboard_driver_profile(Request $request){
		if(Auth::check()){
			$id=Auth::user()->id;
			echo $id;
			$driver_profile_data = DB::table('driver_profile')->where('driver_id', $id)->get();
			/* echo"<pre>";
			print_r($driver_profile_data);
			die; */
			return view('driver.dashboard_driver_profile',["driver_profile_data"=>$driver_profile_data]); 
		} 
		return view('404');
	}
	
	public function driver_profile_update(Request $request){
		$post_data = $request->post();
		$id = $post_data['id'];
		$driver_profile_s = DriverProfile::find($id);
		
				$driver_profile_s->address = $post_data['address'];
		$driver_profile_s->dob = $post_data['dob'];
		$driver_profile_s->license_number = $post_data['license_number'];
		$driver_profile_s->expiration_date = $post_data['expiration_date'];
		$driver_profile_s->owner_name = $post_data['owner_name'];
		$driver_profile_s->owner_address = $post_data['owner_address'];
		$driver_profile_s->year = $post_data['year'];
		$driver_profile_s->make = $post_data['make'];
		$driver_profile_s->license_plate_no = $post_data['license_plate_no'];
		$driver_profile_s->registration_express = $post_data['registration_express'];
		$driver_profile_s->seating_capacity = $post_data['seating_capacity'];
		$driver_profile_s->no_seatbelts = $post_data['no_seatbelts'];
		$driver_profile_s->insurance_information = $post_data['insurance_information'];
		$driver_profile_s->policy_number = $post_data['policy_number'];
		$driver_profile_s->tel_no = $post_data['tel_no'];
		$driver_profile_s->insurance_expiration_date = $post_data['insurance_expiration_date'];
		$driver_profile_s->liability_limits_policy = $post_data['liability_limits_policy'];
		$driver_profile_s->update();
		return redirect()->back()->with('status','Driver Profile Updated Successfully');
		
	}
	
	public function order_ride($id){
		
		$order_data = DB::table('order_ride')->join('users', 'order_ride.driver_id', '=', 'users.id')->join('driver_profile', 'driver_profile.driver_id', '=', 'order_ride.driver_id')->where('order_ride.id', $id)->get();
		
		
		
		$rating_data = DB::table('driver_ratings')->where('order_id', '=', $id)->first();
		
		
		if(!empty($rating_data)){
			$data = "data found";
		} else{
			$data = "no data";
		}
		
		/* echo"<pre>";
		print_r($rating_data);
		die; */
		
		//if(Auth::check()){
			return view('driver.order_ride',["order_data"=>$order_data,"data"=>$data]);
		//}
		//return view('404');
	}
	
	public function driver_ratings(Request $request)
	{
		$order_id = $request->query('order_id');
		$driver_id = $request->query('driver_id');
		$ratings = $request->query('ratings');
		
		$values = array('order_id' => $order_id,'driver_id' => $driver_id,"ratings"=>$ratings);
		DB::table('driver_ratings')->insert($values);
		echo"done";
		die;
		
	}
	
	public function request_payment(Request $request){
		$order_data=array();
		$o_data=array();
		$o_data=array();
		$pay_oid_d=array();
		if(Auth::check()){
			$id=Auth::user()->id;
			$order_data = DB::table('cab_ride_infos')->join('order_ride', 'order_ride.ride_id', '=', 'cab_ride_infos.id')->where('cab_ride_infos.driver_id', $id)->paginate(10);
			
			foreach($order_data as $odata){
				$ordered_id[] = $odata->id;
				
			}
			if(!empty($ordered_id)){
				//$o_ids = implode(',', $o_data);
				
				$o_data = DB::table('payment_info')->whereIn('order_id', $ordered_id)->get();
				/* echo"<pre>";
		print_r($o_data);
		die; */
				foreach($o_data as $pay_oid){
					if($pay_oid->status=='waiting'){
						$pay_oid_d[] = $pay_oid->order_id;
					}
				}
			}
			
		}
		//return view('driver.request_payment')->with('request_payment',$order_data);
		
		return view('driver.request_payment',['request_payment' => $order_data,"payment_order"=>$pay_oid_d]);
	}
	
	public function request_payment_submit(Request $request){
		$get_data = $request->post();
		
		$data = RequestPayment::where('order_id',$get_data['order_id'])->first();
		
		if(empty($data)){
			$payment = new RequestPayment;
			$payment->user_id = $get_data['user_id'];
			$payment->ride_id = $get_data['ride_id'];
			$payment->order_id = $get_data['order_id'];
			$payment->status = 'waiting';
			$payment->save();
			
			return redirect()->back()->with('message', 'Your request was successfully submitted for the payment');
		} else{
			return redirect()->back()->with('error', 'Sorry, your request already in process');
		}
	}
	
}