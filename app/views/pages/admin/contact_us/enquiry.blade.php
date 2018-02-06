@extends('layout.main')

@section('CSS')
<style type="text/css">
	th{
		color: red;
	}
</style>
@stop


@section('JS')
<script type="text/javascript">

function confirmToDelete(id){
    $('#ConfirmDelete').modal('show');
    $('#deleteBtn').click(function(){
        deleteEnquiry(id);
    });
}


function  deleteEnquiry(id) {
  $('#ConfirmDelete').modal('hide');
	var Eid = id;
	$.ajax({
		type : "POST",
		url  : "{{URL::to('/quick/deleteEnquiry')}}",
		data : {'id': Eid},
		dataType : "json",
		success: function(response)
		{
			if(response.status == 'success'){
				console.log(response);
        $('#successDiv').html("<h4 style = 'color: #fff; background: green; width: 80%; padding: 8px;'>Deleted this Parent Post successfully. Please wait until this page reload.</h4>");
                setTimeout(function(){
                    window.location.reload(1);
                }, 1500);
			}
		}
	});
}
</script>
@stop

@section('mainsub')

<div id="page-wrapper">
        <?php $mainpage='contact_us'; $subpage='enquiry'; ?>                          
		<div class="main-page">
            <div class="row1">
                <div class="col-md-9 col-lg-12" style="background-color:#4F52BA;color:white; margin-bottom: 2em; padding: 5px 0 5px 10px;">
                    <h3>All Enquiries</h3>
					<div class="clearfix"> </div>
                </div>
            </div>
            <div class = "row">
            	<div class="panel-group" id="accordion">
    			<?php 
    				for($i = 0; $i< count($getAllEnquiries); $i++){
    					$id = $getAllEnquiries[$i]['id'];
    					$name = $getAllEnquiries[$i]['name'];
    					$email = $getAllEnquiries[$i]['email'];
    					$contact_no = $getAllEnquiries[$i]['contact_no'];
    					$address = $getAllEnquiries[$i]['address'];
    					$message = $getAllEnquiries[$i]['message'];
    					$enquiry_for = $getAllEnquiries[$i]['enquiry_for'];
    					$enquiry_type = $getAllEnquiries[$i]['enquiry_type'];
    					$color = '';
    					if ($i%2 == 0 ) {
    						$color = "#DFF0D8";
    					}
    					else{
    						$color = "#F2DEDE";
    					}
    			?>
  					<div class="panel panel-default">
    					<div class="panel-heading" style = "background: {{$color}}">
      						<h2 class="panel-title">
        						<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$id}}" style = "font-size: 18px; Color: Green; text-decoration:none">
        							{{$name}}
        						</a>
                    <span class = "glyphicon glyphicon-trash pull-right" style = "margin-right: 2em;" onclick = "confirmToDelete({{$id}})"></span>
      						</h2>
    					</div>
    					<div id="collapse{{$id}}" class="panel-collapse collapse">
    						<table class="table" style = "margin: 1em;" cell-spacing = "0" cell-padding = "0">
    							<tbody>
      								<tr>
        								<th>Name</th>
        								<td>:</td>
        								<td>{{$name}}</td>
      								</tr>
      								<tr>
        								<th>Email</th>
        								<td>:</td>
        								<td><a href="mailto:{{$email}}">{{$email}}</a></td>
      								</tr>
      								<tr>
        								<th>Mobile Number</th>
        								<td>:</td>
        								<td>{{$contact_no}}</td>
      								</tr>
      								<tr>
        								<th>Address</th>
        								<td>:</td>
        								<td>{{$address}}</td>
      								</tr>
      								<tr>
        								<th>Enquiry For</th>
        								<td>:</td>
        								<td>{{$enquiry_for}}</td>
      								</tr>
      								<tr>
        								<th>Enquiry Type</th>
        								<td>:</td>
        								<td>{{$enquiry_type}}</td>
      								</tr>
      								<tr>
        								<th>Massage</th>
        								<td>:</td>
        								<td>{{$message}}</td>
      								</tr>
    							</tbody>
  							</table>
    					</div>
  					</div>
      			<?php } ?>
    					
            	</div>
            </div>
            <div id = "successDiv"></div>

            <!-- for delete confirmation modal -->
            <!-- Modal -->
            <div id="ConfirmDelete" class="modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Confirmation</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you Sure! you want to Delete ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type = "button" class = "btn btn-primary" id = "deleteBtn">Delete</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>


            </div>
        </div>
</div>

@stop