    @extends('layout.main')

@section('CSS')

@stop

@section('JS')
<script src="{{url()}}/assets/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor1' );
</script>
<!-- for Text Area Toggle -->
<script type="text/javascript">
    $("#anouncements_form").hide();
    $(document).ready(function(){
        $("#add").click(function(){
            $("#anouncements_form").toggle('slow');
        });
    });
</script>
<!-- for Tooltip -->
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>

<!-- Swap the content -->
<script type="text/javascript">

//move UP
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
                url: "{{URL::to('/quick/moveToUp')}}",
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


//move Down

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
        console.log(maxId);
        if(orderIndex != maxId || orderIndex < maxId){

            $.ajax({
                type: "POST",
                url: "{{URL::to('/quick/moveToDown')}}",
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


</script>




<!-- for Getting all Flash News -->
<script type="text/javascript">

$(document).ready( function() {

    $('#EditModal').modal({ show: false});

    $.ajax({
        type: "POST",
        url: "{{URL::to('/quick/getAllNews')}}",
        data: {},
        dataType:"json",
        success: function (response)
        {
            //console.log(response.data.data);
            var data = '';
            if(response.status=="success"){
                for (var i = 0; i< response.data.data.length; i++){
                    var id = response.data.data[i]['id'];
                    var orderIndex = response.data.data[i]['order_index'];
                    var content = response.data.data[i]['content'];
                    var maxOrderIndex = response.data.maxOrderIndex;
                    //console.log(maxOrderIndex);
                    data += '<div class = "col-md-9">'+
                                    '<div class="well well-sm">'+content+'</div>'+
                                '</div>'+
                                '<div class = "col-md-1">'+
                                    '<span data-toggle="tooltip" title="Edit" onclick = "editFunction('+id+')"><span class="glyphicon glyphicon-edit" style = "padding-top:10px;"></span></span>'+
                                '</div>'+
                                '<div class = "col-md-1">'+
                                    '<span data-toggle="tooltip" onclick = "confirmToDelete('+id+')" title="Delete"><span class="glyphicon glyphicon-trash" style = "padding-top:10px;"></span></span>'+
                                '</div>'+
                                '<div class = "col-md-1">'+
                                    '<input type= "checkbox" id = "swapId" name = '+id+' value = "'+orderIndex+'" style = "margin-top:10px;">'+
                                    '<input type= "hidden" id = "maxOrderIndex" value = "'+maxOrderIndex+'">'+
                                '</div>';    
                    $('form div.row').html(data);

                }
            }else{
                console.log(response.status);
            }
      
        }
    });
});

function confirmToDelete(id){
    $('#ConfirmDelete').modal('show');
    $('#deleteBtn').click(function(){
        deleteNews(id);
    });
}

//for Deleting Flash News
function deleteNews(id){

    //var r = confirm("Do you want to delete!");
    $('#ConfirmDelete').modal('hide');
    var newsId = id;
    //console.log(newsId);
    $.ajax({
        type: "POST",
        url: "{{URL::to('/quick/deleteThisNews')}}",
        data: {"Nid": newsId},
        dataType:"json",
        success: function (response)
        {
            //console.log(response);
            $('#successDiv').html("<h5 style = 'color: #fff; background: green; margin-top: 5px; width: 80%; padding: auto;'>Deleted this Post successfully. Please wait until this page reload.</h5>");
                setTimeout(function(){
                    window.location.reload(1);
                }, 1500);
        }
    });
}


//for inserting editor data
$('#InsertButton').click(function(e){
    e.preventDefault();
    var data = CKEDITOR.instances.editor1.getData();
    if(data != ''){

        $.ajax({
            type: "POST",
            url: "{{URL::to('/quick/insertFlashNews')}}",
            data: {"data": data},
            dataType: "json",
            success: function(response)
            {
                console.log(response);
                $('#msgDiv').html("<h5 style = 'color: #fff; background: green; width: 80%; margin-bottom: 5px;padding: auto;'>Your Post was successfully added. Please wait until this page reload.</h5>");
                setTimeout(function(){
                       window.location.reload(1);
                    }, 1500);  
            }
        });
    }
    else{
        $('#msgDiv').html("<p style = 'color: red;margin-bottom: 5px;'>Please Createw News and Click.</p>");
    }
});


//for getting data for edit

function editFunction(id){
    //console.log(id);
    $.ajax({
        type: "POST",
        url: "{{URL::to('/quick/getNewsToEdit')}}",
        data: {"Nid": id},
        dataType:"json",
        success: function (response)
        {
            var data = response.content[0]['content'];
            var Fid =  response.content[0]['id'];
            CKEDITOR.replace( 'editor2' );
            //CKEDITOR.instances.editor1.setData(response.content[0]['content'])
            $('#EditModal').find('#editor2').html(data);
            $('#EditModal').find('#FlashNewsId').val(Fid);
            $('#EditModal').modal('show');
        }
    });
}


//updating Flash events

$('#updateFlashBtn').click(function(){
    var data = CKEDITOR.instances.editor2.getData();
    //console.log(data);
    if(data != ''){

        var id = $('#EditModal').find('#FlashNewsId').val();
        //console.log(id);
        $.ajax({
            type: "POST",
            url: "{{URL::to('/quick/updateFlashNews')}}",
            data: {"data": data, "id": id},
            dataType: "json",
            success: function(response)
            {
                //console.log(response);
                $('#updateMsgDiv').html("<h5 style = 'color: #fff; background: green; width: 80%; margin-bottom: 5px;padding: auto;'>Data was successfully Updated. Please wait until this page reload.</h5>");
                setTimeout(function(){
                       window.location.reload(1);
                    }, 1500);  
            }
        });
    }
    else{
        $('#updateMsgDiv').html("<p style = 'color: red;margin-bottom: 5px;'>Please Enter Something and save.</p>");
    }
});




</script>

@stop


 @section('mainsub')
 
 <div id="page-wrapper">
    <?php $mainpage='contents'; $subpage='announcements'; ?>                           
    <div class="main-page" style = "border: none">



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



                           
        <div class="row">
            <div class="col-md-9 col-lg-12" style="background-color:#4F52BA;color:white; margin-bottom: 2em; " >
                <h2>Announcements</h2>
				<div class="clearfix"> </div>
            </div>
        </div>
		

        <!-- texteditor plugin start -->
        <h4 id = "add" style="background-color:#4F52BA;color: #fff; width: 19.3%; padding: 5px; float: right; cursor: pointer;">Click here to Add Another</h4>
        <form id = "anouncements_form" style = "margin: 2.5em 0 1em 0;">
            <textarea name="editor1" id="editor1" rows="10" >
                
            </textarea>
            <input type = "submit" value = "Insert" id = "InsertButton" style="background-color:#DD6777;color: #fff; float:right; margin-top:1em">
        </form>
        <div id = "msgDiv"></div>
        <!-- texteditor plugin end -->
        <h4 style="background-color:#4F52BA;color: #fff; width: 14.3%; padding: 5px; ">Here are the News</h4>
        <div id = "successDiv"></div>
        <form>
            <div class = "row" style = "border: none">
                
            </div>
            <div id = "swapMsg" style = "position: absolute; margin-top: 4em; margin-left: 2em;"></div>
            <div style = "float: right; margin-top: 4em;border: none;">
                
                <button type="button" class="btn btn-primary " id = "moveDown" onclick = "moveDownFunction()">Move Down</button>               
                <button type="button" class="btn btn-primary " id = "moveUp" onclick = "moveUpFunction()">Move Up</button>
                
            </div>
        </form>



        <div id="EditModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style = "color: #4F52BA">Edit Here</h4>
                    </div>
                    <div class="modal-body">
                        <textarea name="editor2" id="editor2" cols = "78" >
                
                        </textarea>
                        <input type = "hidden" id = "FlashNewsId" values = "">
                        <div id = "updateMsgDiv" style = "margin-top: 10px; padding: 5px 0 5px 5px"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id = "updateFlashBtn">Save</button>
                    </div>
                </div>

            </div>
        </div>
        
        </div>

    </div>                         
</div>
 
@stop