@extends('layout.main')


 @section('mainsub')
  <?php $mainpage='dashboard'; $subpage=''; ?>
<div id="page-wrapper">
                            
	<div class="main-page">
                           
    	<div class="row-one">
			<div class="col-md-4 widget">
				<div class="stats-left ">
					<h5>Today's</h5>
					<h4>visitors</h4>
				</div>
				<div class="stats-right">
					<label>{{$visit_count['today_count']}}</label>
				</div>
				<div class="clearfix"> </div>	
			</div>
			
			<div class="col-md-4 widget states-mdl">
				<div class="stats-left">
					<h5>Total</h5>
					<h4>Visitors</h4>
				</div>
				<div class="stats-right">
					<label>{{$visit_count['total_count']}}</label>
				</div>
				<div class="clearfix"> </div>	
			</div>
			<a href="dashboard/events"><div class="col-md-4 widget states-last">
				<div class="stats-left">
					<h5>This month</h5>
					<h4>Events</h4>
				</div>
				<div class="stats-right">
					<label>{{$event_count}}</label>
				</div>
				<div class="clearfix"> </div>	
			</div></a>
			<div class="clearfix"> </div>	
		</div>
				
                            
    </div>
                             
</div>
@stop

