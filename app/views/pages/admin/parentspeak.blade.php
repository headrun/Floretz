@extends('layout.main')


@section('CSS')

@stop

@section('JS')
<script src="{{url()}}/assets/ckeditor/ckeditor.js"></script>

<!-- for Getting all Flash News -->
<script type="text/javascript">

$(document).ready( function() {

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});



    //$('#EditModal').modal({ show: false});

    $.ajax({
        type: "POST",
        url: "{{URL::to('/quick/getAllParentSpeaks')}}",
        data: {},
        dataType:"json",
        success: function (response)
        {
            //console.log(response.data);
            var data = '';
            if(response.status=="success"){
                for (var i = 0; i< response.data.length; i++){
                    var name = response.data[i]['name'];
                    var id = response.data[i]['id'];
                    var image = response.data[i]['image_path'];
                    var comments = response.data[i]['parent_comments'];
                    var status = response.data[i]['status'];
                    var is_approved = response.data[i]['is_approved'];
                    var button = '';
                    var one, two = '';
                    if(status == "Active"){
                        one = "Active";
                        two = "Inactive";
                    }
                    else{
                        one = "Inactive";
                        two = "Active";
                    }
                    if(is_approved == 1){
                        button = '<button type = "button" class = "btn btn-xs btn-primary" style = "margin-left: 30px;" disabled>Approved</button>';
                    }
                    else{
                        button = '<button type = "button" class = "btn btn-xs btn-primary" style = "margin-left: 30px;" onclick = ApproveFunction('+id+')>Approve</button>';
                    }
                    //console.log(image);
                    data += '<tr>'+
                                '<td width = "10%">'+name+'</td>'+
                                '<td width = "50%">'+comments+'</td>'+
                                //'<td width = "10%"><img src = "{{url()}}/'+image+'" style = "width: 32px; height: 32px; cursor: pointer" onclick = imagePopup("'+image+'")></td>'+
                                '<td width = "10%">'+
                                    '<select onchange = "changeStatus(this, '+id+');" style = "margin-top: 10px">'+
                                        '<option value="'+one+'">'+one+'</option>'+
                                        '<option value="'+two+'">'+two+'</option>'+
                                    '</select>'+
                                '</td>'+
                                '<td width = "30%">'+
                                    '<span class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit" style = "padding-top:10px;margin-left: 30px; cursor: pointer" onclick = editParentPost(this) id = "'+id+'" name = "'+comments+'"></span>'+
                                    button+
                                    '<span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete" style = "cursor: pointer; margin-left: 30px;" onclick = "confirmToDelete('+id+')"></span>'+
                                '</td>'+
                            '</tr>';
                    //console.log(data);
                    $('tbody').html(data);

                }
            }else{
                console.log(response.status);
            }
      
        }
    });
});


//Approving function

function ApproveFunction(id){

    $.ajax({
        type: "POST",
        url : "{{URL::to('/quick/approvingPost')}}",
        data: {'id': id},
        dataType: "json",
        success: function(response){
            console.log(response);
            $('#successDiv').html("<h4 style = 'color: #fff; background: green; width: 80%; padding: 5px;'>Approved successfully. Please wait until this page reload.</h4>");
                setTimeout(function(){
                    window.location.reload(1);
                }, 1500);
        }
    }); 
}




//for Editing Parent Post

function editParentPost(sel){
    var id = $(sel).attr('id');
    var content = $(sel).attr('name');
    $('#editcommentModal').modal('show');
    $('.modal-body textarea').text(content);
    $('.modal-body #postId').val(id);

}


$('#save').click(function(){
    var data = $('.modal-body textarea').val();
    var id = $('.modal-body #postId').val();
    
    $.ajax({
        type: "POST",
        url : "{{URL::to('/quick/updateParentComment')}}",
        data: {'data': data, 'id': id},
        dataType: "json",
        success: function(response){
            console.log(response);
            $('#modalDiv').html("<h5 style = 'color: #fff; background: green; width: 100%; padding: 5px;'>Updated Post successfully. Please wait until this page reload.</h5>");
                setTimeout(function(){
                    window.location.reload(1);
                }, 1500);
        }
    }); 
});


function changeStatus(sel, id){
    var data = sel.value;

    $.ajax({
        type: "POST",
        url : "{{URL::to('/quick/statusChange')}}",
        data: {'data': data, 'id': id},
        dataType: "json",
        success: function(response){
            console.log(response);
            $('#successDiv').html("<h4 style = 'color: #fff; background: green; width: 80%; padding: 8px;'>Updated Status successfully. Please wait until this page reload.</h4>");
                setTimeout(function(){
                    window.location.reload(1);
                }, 1500);
        }
    });

}



/*image popup modal
function imagePopup(Url){    
    var imageUrl = "{{url()}}/"+Url
    $('#showBigImage').modal('show');
    $('.modal-body img').attr("src", imageUrl);
}*/


//confirmation to delete
function confirmToDelete(id){
    $('#ConfirmDelete').modal('show');
    $('#deleteBtn').click(function(){
        deleteNews(id);
    });
}


//for Deleting Banner Images
function deleteNews(id){

    //var r = confirm("Do you want to delete!");
    $('#ConfirmDelete').modal('hide');
    var bannerId = id;
    //console.log(newsId);
    $.ajax({
        type: "POST",
        url: "{{URL::to('/quick/deleteThisParentSpeak')}}",
        data: {"Bid": bannerId},
        dataType:"json",
        success: function (response)
        {
            //console.log(response);
            $('#successDiv').html("<h4 style = 'color: #fff; background: green; width: 80%; padding: 8px;'>Deleted this Parent Post successfully. Please wait until this page reload.</h4>");
                setTimeout(function(){
                    window.location.reload(1);
                }, 1500);
        }
    });
}



</script>


@stop

 @section('mainsub')
 
 <div id="page-wrapper">
        <?php $mainpage='contents'; $subpage='parentspeak'; ?>                          
		<div class="main-page">
            <div class="row">
                <div class="col-md-9 col-lg-12" style="background-color:#4F52BA;color:white; margin-bottom: 1em;">
                    <h2>Parents Speak</h2>
					<div class="clearfix"> </div>
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
                            <p>Are you Sure! you want to Delete ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type = "button" class = "btn btn-primary" id = "deleteBtn">Delete</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- for Edit Parent Post modal -->
            <!-- Modal -->
            <div id="editcommentModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Here</h4>
                        </div>
                        <div class="modal-body">
                            <textarea style = "width: 100%; height: 200px"></textarea>
                            <input type = "hidden" id = "postId" >
                        </div>
                        <div class="modal-footer">
                            <div id = "modalDiv" class = "pull-left"></div>
                            <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Cancel</button>
                            <button type = "button" class = "btn btn-primary pull-right" id = "save">Save</button>
                        </div>
                    </div>
                </div>
            </div>



            <!-- for Big image displaying modal -->
            <!-- Modal
            <div id="showBigImage" class="modal fade" role="dialog">
                <div class="modal-dialog"> -->
                    <!-- Modal content
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">See Image</h4>
                        </div>
                        <div class="modal-body">
                            <img src="" width = "100%">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>-->

            
            <!-- Displaying parents table data -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Parents Speaks</th>
                        <!--<th>Image</th>-->
                        <th>Status</th>
                        <th style = "border: none; padding-left: 90px;">Action</th>
                    </tr>
                </thead>
                <tbody >
                    
                </tbody>
            </table>
            <hr style = "border: 0.1px solid #ccc">
            <div id = "successDiv" style = "margin-top: 0.5em"></div>


        </div>
</div>
 
 @stop