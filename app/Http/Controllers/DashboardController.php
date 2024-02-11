<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    
    public function index()
    {
        return view('dashboard');
    }
  public function buyer_dashboard(){

    return view('buyer.dashboard');
  }
    /**
     * Show the application Events dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function events_dashboard()
    {
        $user_data = auth()->user();
        $id = $user_data->id;
			
        $get_artist_events = DB::table('users')->join('events_table', 'users.id', '=', 'events_table.user_id')->select('events_table.user_id', DB::raw('count(*) as total,users.name,users.email'))->where("users.role","=","role_event")->where("users.id","=",$id)->groupBy('events_table.user_id')->get();
        $pricing=array();
        if(!empty($get_artist_events)){
            foreach($get_artist_events as $event_d){
                $user_iid=$event_d->user_id;
                //$total_earning = DB::table('order')er_ride.driver_id')->where('order_ride.driver_id','=', $id)->get();
                $total_earning = DB::table('order')->select(DB::raw('SUM(order.ticket_total_price) as ticket_total_price'))->where("uid","=",$user_iid)->get();
                foreach($total_earning as $tearning){
                    $pricing[$user_iid]=$tearning->ticket_total_price;
                }
            }
        } 	
        
        $get_events = DB::table('events_table')->where("user_id","=",$id)->get();
        $total_events = $get_events->count();
        
        //total sold events
        
        $total_sold_events = DB::table('order')->select(DB::raw('SUM(order.ticket_total_price) as ticket_total_price'))->where("uid","=",$id)->first();
        
        $get_sold_events = DB::table('order')->join('events_table', 'order.event_id', '=', 'events_table.id')->select('events_table.id', DB::raw('sum(order.ticket_total_price) as total,events_table.event_title,events_table.event_time'))->where("events_table.user_id","=",$id)->groupBy('events_table.id')->get();  

        return response()->view('event_user/dashboard', ["user_id"=>$id,"total_events"=>$total_events,"event_users"=>$get_artist_events,"events_list"=>$get_events,"user_order_pricing"=>$pricing,"total_sold_events"=>$total_sold_events,"sold_events"=>$get_sold_events]);
        
    }

    /**
     * Show the application Driver dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function driver_dashboard()
    {
        $user_data = auth()->user();
        $id = $user_data->id;
        $get_driver_profile = DB::table('driver_profile')->where('driver_id', $id)->get();
        if(count($get_driver_profile) > 0) {
            //$date = date('Y-m-d');
            $date = date('Y-m-d');
            $n_date = date('d-m-Y');
            
            //$today_ride_data = DB::table('cab_ride_infos')->where('journey_date', "$date")->where("driver_id","=",$id)->get();
            //$today_ride_data = DB::table('cab_ride_infos')->where("driver_id","=",$id)->get();
            $today_ride_data = DB::table('cab_ride_infos')->join('order_ride','cab_ride_infos.driver_id','=','order_ride.driver_id')->where('order_ride.booking_date','=', $n_date)->where('cab_ride_infos.journey_date','=', $date)
            //->paginate(1);
            ->get();
            $today_ride_count = DB::table('order_ride')->where('driver_id','=', $id)
            ->get();
            $total_rides = $today_ride_count->count();
            $today_ride_total = DB::table('order_ride')
            ->select('booking_price', DB::raw('SUM(booking_price) AS booking_price'))->where("driver_id",'=',$id)
            ->get();
            
            //getting total ride data overall
            
            $total_ride_earning = DB::table('cab_ride_infos')->join('order_ride','cab_ride_infos.driver_id','=','order_ride.driver_id')->where('order_ride.driver_id','=', $id)->get();
            $total_ride_earning = $total_ride_earning->unique('id');
            
            
            $total_rides_overall = DB::table('cab_ride_infos')->where('driver_id','=', $id)->paginate(8);
            
            $total_ride_data = DB::table('cab_ride_infos')->join('order_ride','cab_ride_infos.driver_id','=','order_ride.driver_id')->where('order_ride.driver_id','=', $id)->get();
            $total_ride_data = $total_ride_data->unique('id');
            
            /* echo"<pre>";
            print_r($total_ride_data);
            die; */
            
            $today_earning = DB::table('order_ride')
            ->select('booking_price', DB::raw('SUM(booking_price) AS booking_price'))->where("driver_id",'=',$id)->where('booking_date','=', $n_date)
            ->get();
            
            
            return response()->view('driver/dashboard_driver', ['today_ride' => $today_ride_data,"total_rides"=>$total_rides,"total_ride_price"=>$today_ride_total,"today_earning"=>$today_earning,"total_ride_earning"=>$total_ride_earning,"total_rides_overall"=>$total_rides_overall]);
            
        } else {
            return redirect("complete_driver_registration/$id");
        }
    }
}
