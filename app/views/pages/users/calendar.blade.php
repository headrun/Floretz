@extends('layout.frontend.main')
<?php $mainsite='calendar'; ?> 

@section('CSS')
<link href='{{url()}}/assets/fullcalendar/fullcalendar.css' rel='stylesheet' />

<style type="text/css">
  .panel-heading{
    border: 0.1px solid #ccc;
  }
</style>

@stop


@section('pagedata')
<div class="container_wr">
    <div class="container_container padding_bottom">
        <div class="container_" style = "background: #EEE7BB">
            <div class="row">        
                <div class="span12">
                    <div class="fz_heading2">
                        Events & Calendar
                    </div>
                </div>
            </div><br>
            <div class = "row">
                <div class = "span7">
                    <div id='calendar1'></div>
                </div>
                <div class = "span5">
                    <h2 style = "color: #E6008B; margin-bottom: 20px;" align = "center">Events</h2>
                    <div class="panel-group" id="accordion">
                        <?php
                            for ($i=0; $i < count($EventsWithDesc); $i++) { 
                                $EveTitle =  $EventsWithDesc[$i]['title'];
                                $EveStart =  $EventsWithDesc[$i]['eventstart'];
                                $EveEnd =  $EventsWithDesc[$i]['eventend'];
                                $EveDesc =  $EventsWithDesc[$i]['description'];
                                $EveId =  $EventsWithDesc[$i]['id'];
                            
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading" style = "background: #ddd; cursor: pointer" onclick = "clickToggle(this)">
                                <h4 class="panel-title" >
                                    <p style = "padding-left: 15px;">{{$EveTitle}}</p>
                                </h4>
                            </div>
                            <div id="collapsed{{$EveId}}" class = "eventData" style = 'background: #fff'>
                                <div class="panel-body" style = "padding: 0.7em;">
                                    <span><span style = "font-weight: bold">Event Start Date :</span> &nbsp; {{$EveStart}} </span><br>
                                    <span><span style = "font-weight: bold">Event End Date :</span> &nbsp; {{$EveEnd}} </span><br>
                                    <span><span style = "font-weight: bold">Event Description :</span> &nbsp; {{$EveDesc}} </span>
                                    
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

<!-- JavaSctipt will start Here -->
@section('JS')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src='{{url()}}/assets/fullcalendar/fullcalendar.min.js'></script>
    <script type='text/javascript' src='{{url()}}/assets/fullcalendar/gcal.js'></script>
    

    <!--<script type="text/javascript" src="{{url()}}/assets/js/custom.js"></script>-->
<script type="text/javascript">

    $(document).ready(function(){
        $('.eventData').hide();
    });
    function clickToggle(row){
        $(row).siblings().slideToggle();
    }


$(document).ready(function() {

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    $('#calendar1').fullCalendar({
        editable: true,
        header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
         events: {{$allEventsForCalendar}},
   
    })

});

</script>
        
        

@stop