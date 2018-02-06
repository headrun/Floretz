@extends('layout.main')

@section('CSS')

@stop
@section('JS')
<script type="text/javascript">

//Move DOwn Function

function moveDownFunction(){
   var getLength = $("#swapId:checked").length;
    //console.log(getLength);
    if(getLength === '' || getLength > 1){
        $('#swapMsg').html('<h4 style = "color: #fff; background: red; padding: 8px">Please select only one row and move</h4>');
    }else{
        $('#swapMsg').html('');
        var orderIndex = $("#swapId:checked").val();
        var id = $("#swapId:checked").attr('name'); 
        var maxId = $('#maxOrderIndex').val();
        //console.log(maxId);
        if(orderIndex != maxId || orderIndex < maxId){

            $.ajax({
                type: "POST",
                url: "{{URL::to('/quick/moveBirthdayImageDown')}}",
                data: {'id': id, 'orderIndex': orderIndex},
                dataType:"json",
                success: function (response)
                {
                    //console.log(response);
                    setTimeout(function(){
                        window.location.reload(1);
                    }, 1500);
                }
            });
        }else{
            $('#swapMsg').html("<h4 style = 'color: #fff; background: red; padding: 8px'>You con't move Down</h4>");
        }
    }    
}



//moving up banner Images
function moveUpFunction(){
    var getLength = $("#swapId:checked").length;
    //console.log(getLength);
    if(getLength === '' || getLength > 1){
        $('#swapMsg').html('<h4 style = "color: #fff; background: red; padding: 8px">Please select only one row and move</h4>');
    }else{
        $('#swapMsg').html('');
        var orderIndex = $("#swapId:checked").val();
        var id = $("#swapId:checked").attr('name');
        console.log(orderIndex);
        //console.log(id);
        if(orderIndex != 1 || orderIndex > 1){

            $.ajax({
                type: "POST",
                url: "{{URL::to('/quick/moveBirthdayImageUp')}}",
                data: {'id': id, 'orderIndex': orderIndex},
                dataType:"json",
                success: function (response)
                {
                    //console.log(response);
                    setTimeout(function(){
                        window.location.reload(1);
                    }, 1500);
                }
            });
        }else{
            $('#swapMsg').html("<h4 style = 'color: #fff; background: red; padding: 8px'>You con't move up</h4>");
        }
    }
}






//Getting all Banner data when page loads

    $(document).ready( function() {

        $.ajax({
        type: "POST",
        url: "{{URL::to('/quick/getBirthdayImages')}}",
        data: {},
        dataType:"json",
        success: function (response)
        {   
           console.log(response.data.data);
            var data = '';
            if(response.status=="success"){
                for (var i = 0; i< response.data.data.length; i++){
                    var id = response.data.data[i]['id'];
                    var orderIndex = response.data.data[i]['order_index'];
                    var imgUrl = response.data.data[i]['image_path'];
                    var maxOrderIndex = response.data.maxOrderIndex;

                    data += '<div class = "row" style = "border: none" align= "center">'+
                                '<div class = "col-md-4" style = "padding: 5px; border: none">'+
                                    '<img src="{{url()}}/'+imgUrl+'" width = "50%">'+
                                '</div>'+
                                '<div class = "col-md-2" style = "padding: 5px">'+
                                    '<button type="button" class="btn btn-danger btn-sm" onclick = "confirmToDelete('+id+')" style = "margin-top: 18px; margin-top: 55px;">Delete</button>'+
                                '</div>'+
                                '<div class = "col-md-2" style = "padding: 5px">'+
                                    '<input type= "checkbox" id = "swapId" name = '+id+' value = "'+orderIndex+'" style = "margin-top:20px;  margin-top: 62px; width: 40px"><b>Select</b>'+
                                    '<input type= "hidden" id = "maxOrderIndex" value = "'+maxOrderIndex+'">'+
                                '</div>'+
                                '<div class = "col-md-4" style = "padding: 5px">'+
                                '</div>'+
                            '</div>';
                    $('#BirthdayContent').html(data);
                }
            }else{
                console.log(response.status);
            }
        }       
    });
});


//confirmation to delete

function confirmToDelete(id){
    $('#ConfirmDelete').modal('show');
    $('#deleteBtn').click(function(){
        deleteNews(id);
    });
}


//for Deleting Birthday Images
function deleteNews(id){

    //var r = confirm("Do you want to delete!");
    $('#ConfirmDelete').modal('hide');
    var birthdayId = id;
    //console.log(newsId);
    $.ajax({
        type: "POST",
        url: "{{URL::to('/quick/deleteThisBirthday')}}",
        data: {"Bid": birthdayId},
        dataType:"json",
        success: function (response)
        {
            //console.log(response);
            $('#successDiv').html("<h4 style = 'color: #fff; background: green; padding: 10px;'> Deleted this Banner successfully. Please wait until this page reload.</h4>");
                setTimeout(function(){
                    window.location.reload(1);
                }, 1500);
        }
    });
}



</script>
@stop





 @section('mainsub')
  <?php $mainpage='contents'; $subpage='birthday'; ?>
 <div id="page-wrapper">                           
	<div class="main-page" style = "margin-bottom: 2em">   
        <div class="row">
            <div class="col-md-9 col-lg-12" style="background-color:#4F52BA;color:white;  " >
                <h2>Birthday Images</h2>
				<div class="clearfix"> </div>
            </div>
        </div>


        <!-- Insering  images  -->
        <div class="row" style = "margin: 3em 0 3em 0">
            {{ Form::open(array('action' => 'AdminController@UploadBirthdayImages', 'files'=>true)) }}
                <div class = "col-md-2">
                    <label style = "margin-top: 5px;">Add Attachment:</label>
                </div>
                <div class = "col-md-6">
                    <span >{{Form::file('image',array('required', 'class'=>'form-control'))}}</span> 
                </div>
                <div class = "col-md-4">
                    <input type="submit" class="btn btn-sm btn-primary" value="Upload banner Image"/>
                </div>
            {{Form::close()}}
        </div>

        <div id = "successDiv" style = "width: 100%; margin-bottom: 2em" class = "pull-left"></div>


        <!-- displaying images  -->
        <form id = "BirthdayContent" style = "border: 3px solid #ccc; border-radius: 5px;padding-bottom: 2em">
        </form>
        
        <div style = "border: none; margin: 1em 0 5em 0;">

            <div id = "swapMsg" style = "position: absolute; margin-left: 2em; border: 1px solid red"></div>
            <div style = "float: right;border: none;">   
                <button type="button" class="btn btn-primary " id = "moveDown" onclick = "moveDownFunction()">Move Down</button>               
                <button type="button" class="btn btn-primary " id = "moveUp" onclick = "moveUpFunction()">Move Up</button>
            </div>
        </div>



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
                        <p>Are you Sure! you want to delete ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type = "button" class = "btn btn-primary" id = "deleteBtn">Delete</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- for delete confirmation modal end -->


    </div>
</div>
 
 @stop