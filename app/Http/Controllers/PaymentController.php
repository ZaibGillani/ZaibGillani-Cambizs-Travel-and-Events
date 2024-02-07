<?php

namespace App\Http\Controllers;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Hash;
use Stripe;
  
class PaymentController extends Controller {
	
	public function stripe() {
        return view('stripe');
    }
	
	public function order_details($id){
		//echo $id;
		$order_data = DB::table('order')
						->where('id', $id)
						->get();
		$tic_details = array();
		$event_name = '';
		foreach($order_data as $odata){
			
			$ticket_info = $odata->ticket_information;
			$event_name = $odata->event_name;
			$email = $odata->order_email;
			$ticket_total_price = $odata->ticket_total_price;
			$json_encode = json_decode($ticket_info);
			
			$ticket_price = explode(',',$json_encode->ticket_price);
			$ticket_name = explode(',',$json_encode->ticket_name);
			$quantity = explode(',',$json_encode->ticket_quantity);
			
			foreach($ticket_name as $tic_ky => $tick){
				$tick_name = $tick;
				$tick_price = $ticket_price[$tic_ky];
				$tick_quantity = $quantity[$tic_ky];
				$tic_details[]=array('ticket_name'=>$tick_name,'ticket_price'=>$tick_price,'ticket_quantity'=>$tick_quantity);
				
			}
			
				$details = [
				'order_id' => $id,
				'event_name' => $event_name,
				'booking_info_new' => $tic_details,
			];
		   
			\Mail::to($email)->send(new \App\Mail\MyMail($details));
			
			return view('booking_success/booking',["order_id"=>$id,"event_name"=>$event_name,"booking_info"=>$tic_details,"total_price"=>$ticket_total_price]);
			
		}
		/* if(!empty($order_data)){
			$email = $user_data[0]->email;
			$name = $user_data[0]->name;
		} */
		/* if(!empty($user_data)){
			$email = $user_data[0]->email;
			$name = $user_data[0]->name;
		}

		return view('event_user/setting', ["user_id"=>$id,"name"=>$name,"email"=>$email]); */
		die;
	}
	
	public function payment_form(Request $request){		
		$req = $request->all();
		$ticket_price = $req['ticket_price'];
		$ticket_name = $req['ticket_name'];
		$total_tickets = $req['total_tickets'];
		$uid = $req['uid'];
		$ticket_id = $req['ticket_id'];
		$quantity = $req['quantity_1'];
		//$ticket_n_total_price = $req['ticket_total_price_c'];
		$ticket_nam = implode(',', $ticket_name);
		$ticket_priz = implode(',', $ticket_price);
		$quantity_tot = implode(',', $quantity);
		/* echo"<pre>";
		print_r($quantity);
		print_r($ticket_price);
		print_r($total_tickets);
		die; */
		$ticket_total_price = 0;
		if(!empty($quantity)){
			foreach($quantity as $qty => $quant_vl){
				if($quant_vl>=1){
					$ticket_total_price += $ticket_price[$qty]*$quant_vl;
				}
				if($quant_vl>$total_tickets[$qty]){
					$ticket_nmm = $ticket_name[$qty];
					return back()->with('error', "Sorry, Selected Ticket($ticket_nmm) not available with quantity $quant_vl");
				}
			}
		}
		
		/* echo $ticket_total_price;
		die; */
		if($ticket_total_price<1){
			return back()->with('error', 'Select at least one ticket with quantity');

		}
		
		$cre_array = array("ticket_name"=>$ticket_nam,"ticket_price"=>$ticket_priz,"quantity_1"=>$quantity_tot,"ticket_id"=>$ticket_id);
	
		return view('payment_form/stripe',['ticket_details' => $cre_array,"ticket_total_price"=>$ticket_total_price,"uid"=>$uid]);
	}
	
	
	public function stripe_test(){
		
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
		  'business_type' => 'individual',
		  'business_profile' => [
    		    # Industry: Software 
    		    'mcc' => '5734',
    		    'name' => '5734',
    		    'support_email' => 'abc@gmail.com',
    		    'support_phone' => '9041345002',
    		    'product_description' => "testing",
    		    
    		 ],
			'individual' => [	
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
		
		
		/* $account =  $stripe->accounts->update(
		  'acct_1KiM9YQ24GsuFai8',
		  'capabilities' => [
			'card_payments' => ['requested' => true],
		  ]
		); */
		
/* 	 	$paymentIntent = \Stripe\PaymentIntent::create([
		  'amount' => 10000,
		  'currency' => 'usd',
		  'payment_method_types' => ['card'],
		  'transfer_group' => '{ORDER10}',
		]);*/

		// Create a Transfer to a connected account (later):
		/* $transfer = \Stripe\Transfer::create([
		  'amount' => 7000,
		  'currency' => 'usd',
		  'destination' => 'acct_1KiM9YQ24GsuFai8',
		  'transfer_group' => '{ORDER10}',
		]); */
 	
		/* echo"<pre>";
		print_r($account);
		die; */
		//sam: acct_1KjppEQRdUPNTxGy
		$stripe_veri = Stripe\AccountLink::Create([
			'account' => 'acct_1KjpugG39qm20xPR',
			'refresh_url' => 'https://example.com/reauth',
			'return_url' => 'https://example.com/return',
			'type' => 'account_onboarding',
			'collect' => 'eventually_due']);
		/* $stripe->accountLinks->create(
		  [
			'account' => 'acct_1KjppEQRdUPNTxGy',
			'refresh_url' => 'https://example.com/reauth',
			'return_url' => 'https://example.com/return',
			'type' => 'account_onboarding',
			'collect' => 'eventually_due',
		  ]
		); */
		echo"<pre>";
		print_r($stripe_veri);
		die;
	}
	
	public function payment_process(Request $request){	
		$req = $request->all();
		/*  */
		/* echo"<pre>";
		print_r($req); */
		//die;
		$email = $req['email'];
		$ticket_price = explode(',',$req['ticket_price']);
		$ticket_name = explode(',',$req['ticket_name']);
		$quantity = explode(',',$req['quantity_1']);
		$ticket_id = $req['ticket_id'];
		$ticket_n_total_price = $req['ticket_total_price_c'];
	
		$uid = $req['uid'];
		$order_ticket_name = $req['ticket_name'];
		$order_ticket_price = $req['ticket_price'];
		$order_ticket_quantity = $req['quantity_1'];
		
		/* echo"11111";
		echo"<pre>";
		print_r($order_ticket_name);
		print_r($order_ticket_price);
		print_r($order_ticket_quantity);
		die; */
		$new_value=array();
		$select_ticket = DB::table('events_table')
			->where('id','=',$ticket_id)
            ->get();
		$event_name = $select_ticket[0]->event_title;
		/* echo"<pre>";
		print_r($select_ticket);
		die; */
		
		$ic=0;
		$total_price_tickets=0;
		$check_qty = true;
		foreach($select_ticket as $slct_tic) {
			$ticket_details = $slct_tic->ticket_details;
			$ticket_details_ary = json_decode($ticket_details, TRUE);
			foreach($ticket_details_ary as $tic_key => $ticket_det){
				if($ticket_det['total_tickets']!=0){
						
					$ticket_total = $ticket_det['total_tickets'];
					/* echo $ticket_name[$ic];
					die; */
					if($ticket_name[$ic]==$ticket_det['ticket_name']){
						if($ticket_total>=$quantity[$ic]){
							$total_price_tickets+=$ticket_price[$ic]*$quantity[$ic];
							$check_qty = false;
						}
						$ticket_total = $ticket_det['total_tickets']-$quantity[$ic];
						//echo $quantity[$ic].'<br/>';
						$total_price_tickets+=$ticket_price[$ic]*$quantity[$ic];
					}
					$new_value[] = array("ticket_name"=>$ticket_det['ticket_name'],"price"=>$ticket_det['price'],"total_tickets"=>$ticket_total);
					$ic++;
				}
				
			}
		}		
	
			if(!empty($new_value)){
				$ticket_details_ary_new = json_encode($new_value, TRUE);

				$update = DB::table('events_table')
						->where('id', $ticket_id)
						->update(['ticket_details' => $ticket_details_ary_new]);
						
				
						
				Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
				$strip_n = Stripe\Charge::create ([
						"amount" => 100 * $ticket_n_total_price,
						"currency" => "GBP",
						"source" => $request->stripeToken,
						"description" => "Ticket Booking with event name: " 
				]);
				if(isset($strip_n->status)){
					//echo"Booking confirmed successfully";
						
					$value_ticket = array("ticket_name"=>$order_ticket_name,"ticket_price"=>$order_ticket_price,"ticket_quantity"=>$order_ticket_quantity);
					$json_tik = json_encode($value_ticket);
					$values = array('order_email' => $email,'uid'=>$uid,'ticket_total_price'=>$ticket_n_total_price,'ticket_information'=>$json_tik,'event_name'=>$event_name,'event_id'=>$ticket_id);
					$last_id = DB::table('order')->insert($values);
					$id = DB::getPdo()->lastInsertId();
					//echo "last_id = ".$id;
					/* if($id!=''){
						foreach($quantity as $qty_key => $qty_vl){
							if($qty_vl!=0){
								$price_n=$ticket_price[$qty_key]; 
								$ticket_name_n=$ticket_name[$qty_key]; 
								$values = array('order_id' => $id,"ticket_name"=>$ticket_name_n,"ticket_price"=>$price_n,"ticket_quantity"=>$qty_vl);
								$last_id = DB::table('order_items')->insert($values);
							}
							
						}
						
					} */
					//die;
					return redirect()->to("https://flymyt.com/laravel/public/order/$id");
				}
			}
		
			/* $event_data = DB::table('events_table')
						->where('id', $ticket_id)
						->get();
			$event_data_list = DB::table('events_table')->orderBy('id',"DESC")->where('status', '1')->take(5)->get(); */
			
			//die;

		//return view('events.event_details', ['event_data_single' => $event_data,'event_data'=>$event_data_list])->with('message', "Your booking successfull");
			
			//return view('payment_form/stripe',['ticket_details' => $req]);
		//}
		
		
	}
	
	public function send_mail_new(){
		echo"ddsc";
		
		$details = [
        'title' => 'Test',
        'body' => 'Test24443'
    ];
   
    \Mail::to('kushalk26@gmail.com')->send(new \App\Mail\MyTestMail($details));
	}
	
}