@extends('layout.main')


@section('headCSS')
<link href="{{url()}}/assets/css/clndr.css" rel='stylesheet' type='text/css' />
<script src="{{url()}}/assets/js/underscore-min.js" type="text/javascript"></script>
<script src= "{{url()}}/assets/js/moment-2.2.1.js" type="text/javascript"></script>
<script src="{{url()}}/assets/js/clndr.js" type="text/javascript"></script>

<!--for date picker -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
@stop


@section('JS')


<script>  

//bro one min  

   var  eventcount=0;
   var  eventcount1 = 50;
 
function addeventmodalcall(){    
       $('#addeventmodal').modal({show: true});
    }
  $(function() {
    $( "#startdatepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });
  $(function() {
    $( "#enddatepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });  


</script>

<script>

// for displaying Events in  calendar
$(document).ready( function() {

var calendars = {};
  var thisMonth = moment().format('YYYY-MM'); 
  $.ajax({
        type: "POST",
        url: "{{URL::to('/quick/getAllEvents')}}",
        data: {},
        dataType:"json",
        success: function (response)
        {
      if(response.status=="success"){
        //console.log('got Events');
        eventArray=response.data;
                                event(eventArray);
                                
        
      }else{
        console.log(response.status);
      }
      
        }
    });
  
  function event(events){
   calendars.clndr1 = $('.cal1').clndr({
    events: events,
    clickEvents: {
      click: function(target) {
        console.log(target);
        if($(target.element).hasClass('inactive')) {
          console.log('not a valid datepicker date.');
        } else {
          console.log('VALID datepicker date.');
        }
      },
      nextMonth: function() {
        console.log('next month.');
      },
      previousMonth: function() {
        console.log('previous month.');
      },
      onMonthChange: function() {
        console.log('month changed.');
      },
      nextYear: function() {
        console.log('next year.');
      },
      previousYear: function() {
        console.log('previous year.');
      },
      onYearChange: function() {
        console.log('year changed.');
      }
    },
    multiDayEvents: {
      startDate: 'eventstart',
      endDate:   'eventend',
      singleDay: 'singleDay'
    },
    showAdjacentMonths: false,
    adjacentDaysChangeMonth: true
  });
  
    }

  $(document).keydown( function(e) {
    if(e.keyCode == 37) {
      // left arrow
      calendars.clndr1.back();
   //   calendars.clndr2.back();
    }
    if(e.keyCode == 39) {
      // right arrow
      calendars.clndr1.forward();
    //  calendars.clndr2.forward();
    }
  });

}); 


//for Adding Events more than 1 at a time
function multipleTextBoxes(){
        //console.log(eventcount);
        //console.log(eventcount1);
       var data= "<div class='row'>"+
                        "<div class='col-md-2' >"+
                            "<select id='eventType' name = 'eventType[]'>"+
                              "<option value='default'>Select Event Type</option>"+
                              "<option value='Holiday'>Holiday</option>"+
                              "<option value='Others'>Others</option>"+
                            "</select>"+
                        "</div>"+
                        "<div class='col-md-2'>"+
                                "<input id='EventTitle' required name='title[]' type='text' placeholder = 'Title'/>"+
                        "</div>"+
                        "<div class='col-md-2'>"+
                                "<input id='"+eventcount+"' classs='k-input' placeholder = 'Start Date' required name='startday[]' type='text' />"+
                        "</div>"+
                        "<div class='col-md-2'>"+
                                 "<input id='"+eventcount1+"' classs='k-input' placeholder = 'End Date' required name='endday[]' type='text' />"+
                        "</div>"+
                        "<div class='col-md-3'>"+
                                 "<textarea id='description' classs='k-input' placeholder = 'Enter Description' required name='description[]' rows = '2' cols = '25'></textarea>"+
                        "</div>"+
                        "<div class='col-md-1'>"+
                            "<a href='javascript:void(0);' class='remove badge' style = 'background: red; color: #fff'> &times; </a>"
                        "</div>"+
                    "</div>";
                    
            $('#controls').append(data);

            $("#"+eventcount).datepicker({ dateFormat: 'yy-mm-dd' });
            $("#"+eventcount1).datepicker({ dateFormat: 'yy-mm-dd' });
            eventcount+=1;
            eventcount1 +=1;

            $('input').css({'padding-left': '5px'});
            $('select').css({'padding': '3px'});

            $(document).on("click", "a.remove" , function() {
            $(this).parent().parent(".row").remove();
        });
            //console.log(data); where ur appendin
    }

 
$('#addMultipleEvents').click(function(e){
    e.preventDefault();

    var rowCount = $("#addEventForm div.row").length;
    //console.log(rowCount);
    var type = $('select[name="eventType[]"]').map(function() {
                        return this.value
                   }).get();
    var title = $('input[name="title[]"]').map(function() {
                        return this.value
                   }).get();
    var startdate = $('input[name="startday[]"]').map(function() {
                        return this.value
                   }).get();
    var enddate = $('input[name="endday[]"]').map(function() {
                        return this.value
                   }).get();
    var description = $('textarea[name="description[]"]').map(function() {
                        return this.value
                   }).get();
    

    $.ajax({
        type: "POST",
        url: "{{URL::to('/quick/addMultipleEvents')}}",
        data: {'rowCount': rowCount, 'event_type': type,'event_title': title,'event_startdate': startdate,'event_enddate': enddate, 'description': description},
        dataType:"json",
        success: function (response)
        {   
          //console.log(response);
           if(response.status=='success'){
                $('#eventDiv').html('<h4 style = "color: #fff; background: green; width: 80%; padding: 8px;"">Event added successfully. Please wait till this page reloads</h4>');
                setTimeout(function(){
             window.location.reload(1);
          }, 1500);    
           }else{
               console.log(response.status);
           }
            
        }
    });

});

    
</script>
@stop
 @section('mainsub')
<div id="page-wrapper">
  <?php $mainpage='contents'; $subpage='events'; ?>                           
      <div class="main-page">
        <div class="cal1" style = "height: 470px"></div>
        
      </div>

    <!-- for Add  Multiple Event -->
    <div>
      <h4 style = "background:#6164c1; color: #fff; width: 27.5%; padding: 5px; cursor: pointer;" onclick="multipleTextBoxes()">Click Here to Add Multiple Events &nbsp;&nbsp;<span  class = "fa fa-plus"></span></h4>
      <form id = "addEventForm" class = "form-inline" style = "margin-bottom: 1em">
        <div id = "controls" style = "margin-bottom: 2em;">
        </div>

        <input type = "submit" value = "Add" id = "addMultipleEvents" style = "background:#6164c1; color: #fff;"><br><br>
        <div id = "eventDiv"></div>
      </form><br><br><br>
    </div>
    <!-- for Add Multiple Event -->
  </div>


 @stop