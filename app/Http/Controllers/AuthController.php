<?php

namespace App\Http\Controllers;
  
use App\Http\Controllers\Controller;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Session;
use App\Models\User;
use App\Models\Bank;
use App\Models\RequestPayment;
use App\Models\RequestPaymentManager;
use App\Models\BankDetails;
use Stripe;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\CursorPaginator;
use App\Models\DriverProfile;
use App\Mail\Registration;
use App\Mail\UserApproval;
use File;
use Hash;
use Mail;
  

/**
 * AuthController
 */
class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }  
	
	public function bank_register(Request $request){
		//echo"rrrrr";
		$post_data = $request->post();
		/* echo"<pre>";
		print_r($post_data);
		die; */
		$bank_data = new Bank();
		$bank_data->account_number = $post_data['account_number'];
		$bank_data->account_holder_name = $post_data['account_holder_name'];
		$bank_data->routing_number = $post_data['routing_number'];
		$bank_data->save();
		die;
	}
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
		
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
		
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
			
			$response = array('message' => 'success');
			
            return redirect()->intended('after_login')
                       ->withSuccess('You have Successfully loggedin');
        }
	
		if(!Auth::check()){
			
				$response = array(
					'status' => false,
					'message' => 'fail',
				);
				echo json_encode( $response );
				die;
			
		}
		
  /*  echo"<pre>";
   echo".....";
		print_r($_REQUEST);
		die; */
       // return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
		$data = $request->all();
	
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        return $this->create($data);
        // return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
	 
	public function after_login()
    {
		$data = session()->all();
        if(Auth::check()){
			$id = Auth::user()->id;
			$user_role = Auth::user()->role;
			
			if($id!=''){
				$response = array(
					'status' => true,
					'message' => 'success',
					'role'=>$user_role
				);
				echo json_encode( $response );
				//dir;
				//return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
				die;
			}
			         
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }


	/**
	 * Forget Password
	 * @param Request $request
	 * @return view()
	 */
	public function forgot_password(Request $request){
		return view('auth.forgot-password');
	}

	/**
	 * Forget Password 
	 * @param Request $request
	 * @return response()
	 */
	public function forgotPassword(Request $request){
		$validate = Validator::make($request->all(), [
			'email' => 'required|email',
		]);

		if ($validate->fails()) {
			return response()->json(['status' => false, 'message' => 'fail', 'data' => $validate->errors()]);
		}

		$email = $request->email;

		$status = Password::sendResetLink(
			$request->only('email')
		);
	 
		return $status === Password::RESET_LINK_SENT
					? response()->json(['status' => true, 'message' => 'success', 'data' => 'Email sent successfully'])
					: response()->json(['status' => true, 'message' => 'success', 'data' => 'Email sent successfully']);
		
	}

	/**
	 * Reset Password
	 * @param Request $request
	 * @return view()
	 */
	public function reset_password(Request $request){
		$token = $request->token;
		$email = $request->email;
		return view('auth.reset-password', ['token' => $token, 'email' => $email]);
	}

	/**
	 * Reset Password 
	 * @param Request $request
	 * @return response()
	 */
	public function resetPassword(Request $request){

		
		$request->validate([
			'token' => 'required',
			'email' => 'required|email',
			'password' => 'required|confirmed',
		]);

		$status = Password::reset(
			$request->only('email', 'password', 'password_confirmation', 'token'),
			function ($user, $password) {
				$user->forceFill([
					'password' => Hash::make($password)
				])->setRememberToken(Str::random(60));
	 
				$user->save();
	 
				// event(new PasswordReset($user));
			}
		);

		// return redirect to route with #login in the url

		$url = route('event_list').'#login';

		return $status === Password::PASSWORD_RESET
                ? redirect()->to($url)->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
	}
	
	public function user_update(Request $request){
		$params = request()->all();
		$id = Auth::user()->id;
		$user = Auth::user();
		
		//if(isset($file->getClientOriginalName()=== false)){
		if($request->hasFile('user_image')){
			$file = $request->file('user_image');
			$destinationPath = "/home/li910edqd900/public_html/laravel/public/images/$id";
			if(!File::isDirectory($destinationPath)){
				$result = File::makeDirectory("/home/li910edqd900/public_html/laravel/public/images/$id", 0777);
			}

			$file->move($destinationPath,$file->getClientOriginalName());
			$usr_img = $file->getClientOriginalName();
			$user->image = $usr_img;
		}
		
		
		$data = $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        $user->name = $data['name'];
        $user->email = $data['email'];
        

        $user->save();
        return redirect('/dashboard/setting/'.Auth::user()->id)->with('success', 'User has been updated!!');
		
	}
	
	public function add_bank(){
		return view('admin/bankdetails');
		//return view('event_user/bankdetails', []);
	}
	
	public function admin_payout_ride(){
		//return view('admin/admin_payout_ride');
		$order_data = array();
		if(Auth::check()){
			$id=Auth::user()->id;
			$order_data = DB::table('order_ride')->join('payment_info', 'order_ride.id', '=', 'payment_info.order_id')->paginate(10);
			
		}
		return view('admin/admin_payout_ride')->with('request_payment',$order_data);
	}
	
	public function submit_payment_driver(Request $request){
		$get_data = $request->post();
		
		$request_Payment = RequestPayment::find($get_data['payment_id']);
		$request_Payment->status = 'complete';
		$request_Payment->update();
		return redirect()->back()->with('message', 'Your payment confirmed successully');
	}
	
	public function confirm_payment() {
		return view('admin/confirm_payment');
	}
	
	public function admin_payout(){
		return view('admin/admin_payout');
	}
	
	
    public function dashboard()
    {
		$data = session()->all();
        if(Auth::check()){
			$id = Auth::user()->id;
			$role = Auth::user()->role;
			
			if($id!=''){
				$response = array(
					'status' => true,
					'message' => 'success',
				);

			}
			if($role=="role_event"){
				$event_data = DB::table('events_table')->orderBy('id',"DESC")->where('user_id', $id)->cursorPaginate(10);
				
				return view('event_user/dashboard', ['event_data' => $event_data,"user_id"=>$id]);
			}           
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

	/**
	 * User Dashboard
	 * @param Request $request
	 * @return view()
	 */
	public function user_dashboard(Request $request)
	{
		$event_users = array();
		$events_list = array();
		$sold_events = array();
		return view('dashboard', [
			'event_users' => $event_users, 
			'events_list' => $events_list, 
			'sold_events' => $sold_events]);
	}

    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
		$details = [
			'order_id' => 'test',
			'event_name' => 'test',
			'booking_info_new' => 'test',
		];
		
		$user =  User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			// 'role' => $data['role'],
			'role' => 'role_event',
			'password' => Hash::make($data['password'])
		]);

		$user_id = $user->id;

		if($user_id){
			$response = array(
				'status' => true,
				'message' => 'success',
			);
			
			$to_name = $data['name'];
			$to_email =  $data['email'];
			$data = array('details'=>['name'=>$to_name]);
		//	Mail::send('emails.Registration', $data, function($message) use ($to_name, $to_email) {
		//		$message->to($to_email, $to_name)->subject('Laravel Test Mail');
		//		$message->from('kushalk26@gmail.com','New User Registration');
		//	});

			event(new Registered($user));
			// Login the user
			Auth::login($user);
			return response()->json($response);
		}else{
			$response = array(
				'status' => false,
				'message' => 'fail',
			);
			return response()->json($response);
		}
	}
	  
	/**
	 * Write code on Method
	 *
	 * @return response()
	 */
	public function logoutUser() {
		Session::flush();
		Auth::logout();
  
		return Redirect('/');
	}
		
	
	public function posted_event(Request $request){
		
		$data = session()->all();
		$search = '';
		$artist_id = '';
		$event_data=array();
		if(isset($request->search)){
			$search = $request->search;
		}
		if(isset($request->artist_id)) {
			$artist_id = $request->artist_id;
		}
		if(Auth::check()){
			$user_role = Auth::user()->role;
			
			if($user_role=="role_admin") {
				if($search==''){ 
					$event_data = DB::table('events_table')->orderBy('id',"DESC")->paginate(10);
				} else if($artist_id!=''){
					$event_data =  DB::table('events_table')->where('user_id',$artist_id)->orderBy('id',"DESC")->paginate(10);
				} else {
					$event_data =  DB::table('events_table')->where('event_title','LIKE',"%{$search}%")->orderBy('id',"DESC")->paginate(10);
				}
				return view('admin/posted_event',['event_data' => $event_data]);
			} else{
				
				return response()->view('404');
			}
		}
	}
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
	
	public function event_backend() {
		echo"this is test";
	}
	public function send_mail(){
		$details = [
        'title' => 'Test',
        'body' => 'Test2'
    ];
   
    \Mail::to('kushalk26@gmail.com')->send(new \App\Mail\MyTestMail($details));
	}
	
	public function my_wallet(Request $request){
		$get_user_data=array();
		if(Auth::check()){
			$id = Auth::user()->id;
			
			$get_user_data = BankDetails::where('user_id',$id)->first();
			/* echo"<pre>";
			print_r($get_user_data);
			die; */
			
		}
		return view('auth.my_wallet')->with("user_data",$get_user_data);
	}
	
	public function add_bank_details(Request $request){
		$get_user_data=array();
		if(Auth::check()){
			$id = Auth::user()->id;
			
			$get_user_data = BankDetails::where('user_id',$id)->first();
			/* echo"<pre>";
			print_r($get_user_data);
			die; */
			
		}
		return view('event_user.my_wallet')->with("user_data",$get_user_data);
	}
	
	public function bank_add_data(Request $request){
		$get_data = $request->post();
		if(Auth::check()){
			$id = Auth::user()->id;
			//$user_check = BankDetails::whereUserId($id)->first();
			$user_check = BankDetails::where('user_id',$id)->first();
			
			if(!empty($user_check)){
				$bank_details = BankDetails::find($user_check->id);
				$bank_details->user_id = $id;
				$bank_details->name = $get_data['name'];
				$bank_details->address = $get_data['address'];
				$bank_details->routing_number = $get_data['routing_number'];
				$bank_details->email = $get_data['email'];
				$bank_details->city = $get_data['city'];
				$bank_details->account_number = $get_data['account_number'];
				$bank_details->state = $get_data['state'];
				$bank_details->zip = $get_data['zip_code'];
				$bank_details->update();
				
				
				
				return redirect()->back()->with('message', 'Your details updated successfully');
			} else{
				
				
			Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
		
		/* $customer = Stripe\Customer::create([
		  'description' => 'My First Test Customer (created for API docs)',
		  'email'=>"abc@gmail.com"
		]); */
		
			$account = Stripe\Account::create([
		  'type' => 'custom',
		  'country' => 'US',
		  'email' => 'abc@gmail.com',
		  'capabilities' => [
			'card_payments' => ['requested' => true],
			'transfers' => ['requested' => true],		
		  ],
		  'business_type' => 'company',
		  'business_profile' => [
    		    # Industry: Software 
    		    'mcc' => '5734',
    		    'name' => '5734',
    		    'support_email' => 'abc@gmail.com',
    		    'support_phone' => '9041345002',
    		    'product_description' => "testing",
    		    
    		 ],
			'company' => [	
    			'address' => [
    			    'city' => 'test',
    				'line1' => 'test',
    				'line2' => 'test',
    				'postal_code' => '99950',
    				'state' => 'Alaska',
    			],
    			
    			'first_name' => 'test',
    			'last_name' => ' ',
    			'dob' => [
    				'day'	=> '12',
    				'month'	=> '09',
    				'year'	=> '1989',
    			],			
    			'id_number' => '111111111',
    			'email' => 'ttt@gmail.com',
    			'phone' => '9041345002',
    		],
			'tos_acceptance' => [
    			'date' => time(),
    			'ip' => $_SERVER['REMOTE_ADDR'],
    		],
    		'external_account' => [
    			"object" =>  "bank_account",
    			"country" =>  "US",
    			"currency" =>  "usd",
    			'account_number' => '000123456789',
    			"account_holder_name" =>  'test',
    			"account_holder_type" =>  'individual',
    			"bank_name" =>  'test bank',
    			"routing_number" =>  '110000000',
    		],
		]);
			
			echo"<pre>";
			print_r($account);
			die;
			
			$bank_details = new BankDetails;
				
			$bank_details->user_id = $id;
			$bank_details->name = $get_data['name'];
			$bank_details->address = $get_data['address'];
			$bank_details->routing_number = $get_data['routing_number'];
			$bank_details->email = $get_data['email'];
			$bank_details->city = $get_data['city'];
			$bank_details->account_number = $get_data['account_number'];
			$bank_details->state = $get_data['state'];
			$bank_details->zip = $get_data['zip_code'];
			$bank_details->save();
				
				return redirect()->back()->with('message', 'Your details created successfully');
			}
			
			
		}
		
	}
	
	public function payout_request(Request $request){
		return view('admin.payout_request');
	}
	//request payment for manager
	public function request_payment_manager(Request $request){
		
		$order_data=array();
		$o_data=array();
		$o_data=array();
		$pay_oid_d=array();
		if(Auth::check()){
			$id=Auth::user()->id;
			$order_data = DB::table('events_table')->join('order', 'order.event_id', '=', 'events_table.id')->where('events_table.user_id', $id)->paginate(10);
			foreach($order_data as $odata){
				$ordered_id[] = $odata->id;
				
			}
			if(!empty($ordered_id)){
				$o_ids = implode(',', $o_data);
				
				$o_data = DB::table('payment_info_event_new')->whereIn('order_event_id', $ordered_id)->get();
				/* echo"<pre>";
		print_r($o_data);
		die; */
				foreach($o_data as $pay_oid){
					if($pay_oid->status=='waiting'){
						$pay_oid_d[] = $pay_oid->order_event_id;
					}
				}
			}
		}
		
		//return view('event_user.request_payment_manager')->with('request_payment',$order_data);
		return view('event_user.request_payment_manager',['request_payment' => $order_data,"payment_order"=>$pay_oid_d]);
		
	}
	
	public function request_payment_manager_submit(Request $request){
		$get_data = $request->post();
		/* echo"<pre>";
		print_r($get_data);
		die; */
		$data = RequestPaymentManager::where('order_event_id',$get_data['order_event_id'])->first();
		
		if(empty($data)){
			$payment = new RequestPaymentManager;
			$payment->user_id = $get_data['user_id'];
			$payment->event_id = $get_data['event_id'];
			$payment->order_event_id = $get_data['order_event_id'];
			$payment->status = 'waiting';
			$payment->save();
			
			return redirect()->back()->with('message', 'Your request was successfully submitted for the payment');
		} else{
			return redirect()->back()->with('error', 'Sorry, your request already in process');
		}
	}
	
	public function admin_payout_artist(Request $request){
		//return view('admin/admin_payout_ride');
		$order_data = array();
		if(Auth::check()){
			$id=Auth::user()->id;
			$order_data = DB::table('order')->join('payment_info_event_new', 'order.id', '=', 'payment_info_event_new.order_event_id')->paginate(10);
			
		}
		/* echo"<pre>";
		print_r($order_data);
		die; */
		return view('admin/admin_payout_artist')->with('request_payment',$order_data);
	}

	public function submit_payment_artist(Request $request){
		$get_data = $request->post();
		
		$request_Payment = RequestPaymentManager::find($get_data['payment_id']);
		$request_Payment->status = 'complete';
		$request_Payment->update();
		return redirect()->back()->with('message', 'Your payment confirmed successully');
	}
	
	public function list_drivers(){
		//return view('admin/admin_payout_artist')->with('request_payment',$order_data);
		
		$user = Auth::user();
		$id = Auth::id();
		$get_role = '';
		$get_driver=array();
		if($id!=''){
			$user_data = DB::table('users')->where('id', $id)->first();
			if($user_data->role){
				$get_role = $user_data->role;
			} else{  
				$get_role = '';
			}
		} 
		
		if($get_role=="role_admin"){
			$get_driver = DB::table('users')->where('role', 'role_driver')->get();
		}
		return view('admin/list_drivers')->with("driver_data",$get_driver);
	}
	
	public function view_driver($id){
		$get_driver = DB::table('users')->where('id', $id)->first();
		$today_ride_count = DB::table('order_ride')->where('driver_id','=', $id)->get();
		$total_rides = $today_ride_count->count();
		$ride_total = DB::table('order_ride')->select('booking_price', DB::raw('SUM(booking_price) AS booking_price'))->where("driver_id",'=',$id)->first();
		/* echo"<pre>";
		print_R($get_driver);
		print_R($total_rides);
		print_R($ride_total);
		die; */
		return view('admin/view_driver',['get_driver' => $get_driver,"total_rides"=>$total_rides,"ride_total"=>$ride_total]);
	}
	
	public function delete_driver($id){
		DB::table('users')->delete($id);
		return redirect()->back()->with('delete_user', 'Driver deleted successfully');
	}
	
	public function save_driver_admin(Request $request){
		$get_data = $request->post();
		$id = $get_data['id'];
		$driver_user = User::find($id);
		$driver_user->name=$get_data['name'];
		$driver_user->update();
		return redirect()->back()->with('user_update', 'Name updated successfully');
	}
	
	public function view_driver_profile_admin($id){
		$driver_profile_data = DB::table('driver_profile')->where('driver_id', $id)->get();
		return view('admin.view_driver_profile',["driver_profile_data"=>$driver_profile_data]); 
	}
	
	public function driver_profile_update_admin(Request $request){
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
	
	
	/***dashboard for driver from admin****/
	
	public function driver_dashboard_admin(Request $request){
		//$get_data = $request->post(Request $request);
		if(Auth::check()){
			$id=Auth::user()->id;
			$user_data = DB::table('users')->where('id', $id)->first();
			if($user_data->role){
				$get_role = $user_data->role;
				
				if($get_role=="role_admin"){
		
					$date = date('Y-m-d');
					$n_date = date('d-m-Y');
					
					//$today_ride_data = DB::table('cab_ride_infos')->where('journey_date', "$date")->where("driver_id","=",$id)->get();
					//$today_ride_data = DB::table('cab_ride_infos')->where("driver_id","=",$id)->get();
					$today_ride_data = DB::table('cab_ride_infos')->join('order_ride','cab_ride_infos.driver_id','=','order_ride.driver_id')->where('order_ride.booking_date','=', $n_date)->where('cab_ride_infos.journey_date','=', $date)
					//->paginate(1);
					->get();
					$today_ride_count = DB::table('order_ride')->get();
					$total_rides = $today_ride_count->count();
					
					
					$total_rides_overall = DB::table('cab_ride_infos')->paginate(8);
					
					$total_ride_data = DB::table('cab_ride_infos')->join('order_ride','cab_ride_infos.driver_id','=','order_ride.driver_id')->get();
					$total_ride_data = $total_ride_data->unique('id');
					
					/* echo"<pre>";
					print_r($total_ride_data);
					die; */
					
					$today_earning = DB::table('order_ride')
					->select('booking_price', DB::raw('SUM(booking_price) AS booking_price'))->where('booking_date','=', $n_date)
					->get();
					
					$get_driver = DB::table('users')->where('role', 'role_driver')->get();
					
					$total_drivers = $get_driver->count();
					
					$today_ride_total = DB::table('order_ride')
				->select('booking_price', DB::raw('SUM(booking_price) AS booking_price'))
				->get();
					
					$get_driver_rides = DB::table('users')->join('cab_ride_infos', 'users.id', '=', 'cab_ride_infos.driver_id')->select('cab_ride_infos.driver_id', DB::raw('count(*) as total,users.name,users.email,sum(price) as price_total'))->where("users.role","=","role_driver")->groupBy('cab_ride_infos.driver_id')->take(10)->get();
					
					
					$get_rides = DB::table('cab_ride_infos')->take(10)->get();
					
					$total_ride_earning = DB::table('cab_ride_infos')->join('order_ride','cab_ride_infos.driver_id','=','order_ride.driver_id')->take(10)->get();
					$total_ride_earning = $total_ride_earning->unique('id');
					
					/* echo"<pre>";
					print_r($get_rides);
					die; */
					
					return response()->view('admin/dashboard_driver', ['today_ride' => $today_ride_data,"total_rides"=>$total_rides,"total_ride_price"=>$today_ride_total,"today_earning"=>$today_earning,"total_ride_earning"=>$total_ride_earning,"total_rides_overall"=>$total_rides_overall,"total_drivers"=>$total_drivers,"driver_rides"=>$get_driver_rides,"ride_list"=>$get_rides]);
			
					//return view('admin/dashboard_driver')->with('request_payment',"dd");
				}
			} else{
				return response()->view('404');
			}
		} else{
			return response()->view('404');
		}
		
	}
	
	public function update_driver(Request $request){
		$post_data = $request->post();
		/* echo "<pre>"; print_r($post_data);
		die; */
		$user = User::find($post_data['id']);
		$booking_ride=array();
		if(isset($user->id)){
			$user->name = $post_data['name'];
			$user->save();
		}
		return redirect()->back()->with('message', 'Name updated successfully');
	}
	
	//artist_id
	
	public function view_artist(Request $request){
		$get_artist=array();
		if(Auth::check()){
			$id=Auth::user()->id;
			$user_data = DB::table('users')->where('id', $id)->first();
			if($user_data->role){
				$get_role = $user_data->role;
				
				if($get_role=="role_admin"){
					$get_artist = DB::table('users')->where("role","=","role_event")->paginate(10);
					return response()->view('admin/view_artist', ["total_artist"=>$get_artist]);
				} else{
					return response()->view('404');
				}
			} else{
				return response()->view('404');
			} 
		} else{
			return response()->view('404');
		}
	}
	 
	public function update_user_status(Request $request){
		$user_details = User::find($request->user_id);	
		$user_details->status = $request->user_status;
		$user_details->update();
		if($request->user_status=='1'){
			$MailData = [
				'name' =>  $user_details->name,
				'email' =>  $user_details->email,
				'subject' =>  "Account approval",
			];
			Mail::to($user_details->email)->send(new UserApproval($MailData));
		}
	}
	
	public function view_artist_single($id){
		$user = User::find($id);
		if(Auth::check()){
			$id=Auth::user()->id;
			$user_data = DB::table('users')->where('id', $id)->first();
			if($user_data->role){
				$get_role = $user_data->role;
				
				if($get_role=="role_admin"){
					/* echo $user->name;
					echo"<pre>";
					print_r($user);
					die; */
					return response()->view('admin/artist_single', ["user"=>$user]);
				} else{
					return response()->view('404');
				}
			} else{
				return response()->view('404');
			} 
		} else{
			return response()->view('404');
		}
	}
	public function remove_artist($id){
		User::find($id)->delete();
		return redirect()->back()->with('message', 'Driver deleted successfully');
		//return Redirect::route('managecategory');
	}
	
}