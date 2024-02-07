<div class="row mb-4">
   <div class="col-sm-7">
	  <form class="short-filter d-flex align-items-center">
		 <input class="form-control" placeholder="SEARCH" /><button class="btn"><i class="icofont-search-1"></i></button>
		 <div class="custom-select-form">
			<select class="wide">
			   <option value="" selected>All</option>
			   <option value="">4</option>
			</select>
		 </div>
	  </form>
   </div>
	   @if (Auth::check())
		   <div class="col-sm-5">
			  <a  href="create_event" class="text-uppercase btn btn-dark float-end">Create Event <i class="icofont-plus pl-10"></i></a>
		   </div>
	   @endif
</div>
<div class="event-info-block">
   <div class="table-responsive">
	@if(!$event_data->isEmpty())
	  <table class="table custom-event-table table-borderless">
		 <thead>
			<tr>
			   <th>Event</th>
			   <th>Sold</th>
			   <th>Ticket Price</th>
			   <th>Status</th>
			   <th></th>
			</tr>
		 </thead>
		 <tbody>
			@foreach($event_data as $event_key => $event_val)
				<?php
					$input = $event_val->event_time;
					$date = strtotime($input);
					$date_vl = date('D, dM, Y h:i:s', $date);
					$ticket_details = $event_val->ticket_details;
					$url = url('/images');
					$img_nm = $event_val->event_image;
					$imgurl = $url.'/'.$img_nm;
					//echo $ticket_details;
					$ticket_data = json_decode($ticket_details,true);
					/* echo"<pre>";
					print_r($ticket_data);
					echo"</pre>"; */
					$ticket_price='';
					$total_tickets='';
					if(!empty($ticket_data)){
						$ticket_price = $ticket_data[0]['price'];
						$total_tickets = $ticket_data[0]['total_tickets'];
					}
				?>
				<tr>
					<td>
						<div class="event-info">
							<div class="avatar">
								<img src="{{$imgurl}}" alt="Avatar" class="avatar-img">
							</div>
							<div class="media-body">
								<span class="js-lists-values-employee-name"><a href="event/{{$event_val->id}}">{{$event_val->event_title}}</a></span>
								<span class="poster-tem">{{$event_val->keynote}}</span>
								<span class="event-date">{{$date_vl}}</span>
							</div>
						</div>
					</td>
					<td>{{$total_tickets}}</td>
				    <td>{{$ticket_price}}</td>
				    <td>Active</td>
				</tr>
			@endforeach
		
		 </tbody>
	  </table>
		@else
			<div class="no_event">No event available currently</div>
		@endif
   </div>
</div>