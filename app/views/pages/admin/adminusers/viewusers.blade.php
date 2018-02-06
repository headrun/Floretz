@extends('layout.main')
@section('CSS')

@stop
@section('JS')

<script>
$(document).ready( function() {
	$.ajax({
		type: "POST",
		url: "{{URL::to('/quick/getAllAdminUsers')}}",
		data :{},
        dataType:"json",
        success: function (response){
        	if (response.status=="success") {
        		// i am not getting
        		//console.log(response.data[0]['first_name']);
        		// not lyk this array start from 0 and ends at n-1 got it ?

        		
        		var data='';
        		for (var i = 0; i< response.data.length; i++){
        			data+="<tr>"+
        			     "<td>"+response.data[i]['first_name']+ "</td>"+
        			     "<td>"+response.data[i]['last_name']+ "</td>"+
        			     "<td>"+response.data[i]['email']+ "</td>"+
        			     "<td>"+response.data[i]['mobile_no']+ "</td>"+
        			     +"</tr>";
                   $('#adminUsers').html(data);
        		}
        		//console.log(data);
        		//$('#adminUsers').html(data);
/*

          		$('.fname').append("response->first_name");
          		$('.lname').append("response.data['last_name']");
          		$('.email').append("response.data['email']");
          		$('.mobile').append("response.data['mobile_no']");
          		*/
			}else{
				alert(response.status);
			}
			
        }
	});
});

</script>

@stop
 @section('mainsub')
  <div id="page-wrapper">
      <?php $mainpage='users'; $subpage='viewusers'; ?>                           
		<div class="main-page">
          <div class="widget-shadow">                   
            <div class="row">
                <div class="col-md-9 col-lg-12" style="background-color:#4F52BA;color:white;margin-bottom: 2em;" >
                    <center><h2>Users Details</h2></center>
					<div class="clearfix"> </div>
		</div>		
					<table class="table table-hover" >
    					<thead>
      						<tr>
        						<th>Firstname</th>
        						<th>Lastname</th>
       							<th>Email</th>
       							<th>Mobile Number</th>
      						</tr>
    					</thead>
    					<tbody id='adminUsers'>
      						<tr >
        						<td class = "fname"></td>
        						<td class = "lname"></td>
        						<td class = "email"></td>
        						<td class = "mobile"></td>
      						</tr>
      					</tbody>
    					
  					</table>

                </div>
            </div>
            </div>                     
    
  </div>
 @stop