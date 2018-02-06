@extends('layout.main')


@section('headCSS')
<style type="text/css">
    #imageDiv{
        float: left;
        border: thin solid #d1d1d1;
        margin: 0 0 1.5em 2em;
   } 
   #MediaGalleryId{
        height: 500px;
        overflow: scroll;;
   }
</style>
@stop

@section('JS')
<script src="{{url()}}/assets/ckeditor/ckeditor.js"></script>
<script src="{{url()}}/assets/js/clipboard.min.js"></script>
<script src="{{url()}}/assets/read_more/readmore.js"></script>
<script type="text/javascript">
	var Global_content = {{$bkp_content}};
    CKEDITOR.replace( 'editor1' );

    //updating post details
    $('#InsertButton').click(function(){
        var data = CKEDITOR.instances.editor1.getData();
        var id = $('#pageId').val();
        if(data != ''){

            $.ajax({
                type: "POST",
                url: "{{URL::to('/quick/InsertTieupsPageContent')}}",
                data: {"data": data, "id": id},
                dataType: "json",
                success: function(response)
                {
                    console.log(response);
                    $('#msgDiv').html("<h4 style = 'color: #fff; background: green; width: 80%;padding: 5px;'>Your Post was successfully updated. Please wait until this page reload.</h4>");
                    setTimeout(function(){
                       window.location.reload(1);
                    }, 1500);  
                }
            });
        }
        else{
            $('#msgDiv').html("<h4 style = 'color: #fff; background: red; width: 60%;padding: 5px;'>Please Put Some content and Click.</h4>");
        }
    });


//for Confirming Delete
function confirmToDelete(id){
    $('#ConfirmDelete').modal('show');
    $('#deleteBtn').click(function(){
        deletePost(id);
    });
}

//deletion
function deletePost(id){

    $('#ConfirmDelete').modal('hide');
    var pageId = id;
    //console.log(newsId);
    $.ajax({
        type: "POST",
        url: "{{URL::to('/quick/deleteThisPost')}}",
        data: {"Nid": pageId},
        dataType:"json",
        success: function (response)
        {
            //console.log(response);
            $('#msgDiv').html("<h4 style = 'color: #fff; background: green; margin-top: 5px; width: 80%; padding: 5px;'>Deleted this Post successfully. Please wait until this page reload.</h4>");
                setTimeout(function(){
                    window.location.reload(1);
                }, 1500);
        }
    });
}



//if click on revert button model show
function revertFunction(sel){
    var temp_content = Global_content[sel]['backup_page_content'];
    //var id = id;
    var id = $('#pageId').val();
    CKEDITOR.replace( 'editor2' );
    $('#revertModal').find('#editor2').html(temp_content);
    $('#revertModal').find('#pageIdToSave').val(id);
    $('#revertModal').modal('show');
}


// for updating  revert back content 
$('#updatePageBtn').click(function(){
    var id = $('#pageIdToSave').val();
    var data = CKEDITOR.instances.editor2.getData();
    //console.log(data);
        if(data != ''){

            $.ajax({
                type: "POST",
                url: "{{URL::to('/quick/InsertTeamPageContent')}}",
                data: {"data": data, "id": id},
                dataType: "json",
                success: function(response)
                {
                    console.log(response);
                    $('#updateMsgDiv').html("<h4 style = 'color: #fff; background: green; width: 80%;padding: 5px;'>Your Post was Reverted back successfully updated. Please wait until this page reload.</h4>");
                    setTimeout(function(){
                       window.location.reload(1);
                    }, 1500);  
                }
            });
        }
        else{
            $('#updateMsgDiv').html("<h4 style = 'color: #fff; background: red; width: 60%;padding: 5px;'>Please Put Some content and Click.</h4>");
        }
});




//for ReadMore Operations
$(document).ready(function () {

    $('#revertModal').modal({ show: false});

    $('div .row').readmore({
        speed: 100,
        Height: 50,
    });
});

function showPopUp(){

    $.ajax({
        type: "POST",
        url : "{{URL::to('/quick/getMediaGallery')}}",
        data: {},
        dataType: "json",
        success: function(response)
        {
            var content = '';
            if(response.status == "success")
            {
                for(i = 0 ; i < response.data.length; i++){
                    var img_path = response.data[i]['image_path'];
                    var id = response.data[i]['id'];
                    content +=    "<div class = 'span3' id = 'imageDiv'>"+
                                        //"<img src = '{{url()}}/"+img_path+"'  width= '130px' height = '125px' onclick = setImagePath('{{url()}}/"+img_path+"') style = 'cursor:pointer'>"+
                                        "<img src = '{{url()}}/"+img_path+"' data-clipboard-text = '{{url()}}/"+img_path+"'  width= '130px' height = '125px' id = '"+id+"' onclick = setImagePath('"+id+"') style = 'cursor:pointer'>"+
                                  "</div>";
                    $('#MediaGalleryId .row').html(content);
                    $('#mediaGalleryModal').modal({ show: true});
                }
            }
        }
    });
    

}

function setImagePath(id){
    //var imagePath = imgUrl;
    //$('#imagePathBox').val(imagePath);
    var img = document.getElementById(id);
    var clipboard = new Clipboard(img);
    clipboard.on('success', function(e) {
        //console.log(e);
        $('#copyMessageDiv').html('<span style = "font-size: 16px;background: green; padding: 6px 0 6px 15px; color: #fff; width: 80%">Copied Image Url Just page any where..!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>')
        setTimeout(function(){
            $('#copyMessageDiv').html('')    
        }, 3600);
    });

    clipboard.on('error', function(e) {
        console.log(e);
    });
}



</script>
@stop

 @section('mainsub')

<div id="page-wrapper">
        <?php $mainpage='contact_us'; $subpage='career'; ?>                          
        <input type = "button" value = "Add Media" onclick = "showPopUp()" style = "background: #4F52BA; color:#fff"><br><br>
		<div class="main-page">
            <div class="row1">
                <div class="col-md-9 col-lg-12" style="background-color:#4F52BA;color:white; margin-bottom: 1em; padding: 3px;">
                    <h3>Career Page CMS</h3>
					<div class="clearfix"> </div>
                </div>
            </div>
        </div>

        <div>
            <textarea name="editor1" id="editor1" rows = "20">
                {{ $page["page_data"] }}
            </textarea>
            <input type = "hidden" value = "{{ $page['page_id'] }}" id = "pageId">
            <input type = "button" value = "Save Content" id = "InsertButton" style="background-color:#4F52BA;color: #fff; float:right; margin-top:1em">
        </div>
        <div id = "msgDiv" style = "margin-top:15px;"></div>


        <!-- displaying Previous Posts in text esitor -->
        <div style = "border: none;margin-top: 4em;">
            <h4 style = "padding: 5px; background: #4F52BA; color: #fff; width: 12%">Previous Posts</h4>
            @for($i=0; $i< count($bkp_content); $i++)
                <div class = "row" >
                    <div class = "col-md-8" style = 'border: none'>
                        {{ $bkp_content[$i]['backup_page_content'] }}
                    </div> 
                    <div class = "col-md-2">
                        <button type = "button"  onclick = "revertFunction('{{$i}}')">Revert Back</button>
                    </div>
                    <div class = "col-md-2">
                        <button  data-toggle="tooltip" onclick = "confirmToDelete('{{ $bkp_content[$i]['id'] }}')" title="Delete"><span class="glyphicon glyphicon-trash" style = ""></span></button>
                    </div>
                </div>
                <hr style = "border: 0.1px solid #ccc">
            @endfor
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


        <!-- for Revert back modal -->
        <div id="revertModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style = "color: #4F52BA">Edit and Revert Here</h4>
                    </div>
                    <div class="modal-body">
                        <textarea name="editor2" id="editor2" cols = "78" >
                
                        </textarea>
                        <input type = "hidden" id = "pageIdToSave" values = "">
                        <div id = "updateMsgDiv" style = "margin-top: 10px; padding: 5px 0 5px 5px"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id = "updatePageBtn">Save</button>
                    </div>
                </div>

            </div>
        </div>


        <!-- for Media Gallry modal -->
        <div id="mediaGalleryModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                   <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <!--<b style = "margin-left: 3.5em">Image path</b><input tyle = "text" id = "imagePathBox" style = "width: 600px; margin-left: 2em">-->
                        <span style = "color: #000; background: #31B0D5;  margin-left:1em; padding: 6px 20px 6px 20px"><b>Note :</b> Please double click on image to copy the url</span>
                        <span id = "copyMessageDiv" style = "margin-left:1em"></span>
                        <div class = "row">
                            <div class = "span12">
                                {{ Form::open(array('action' => 'AdminController@UploadMediaFromCareer', 'files'=>true)) }}
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
                        </div>
                    </div>
                    <div class="modal-body" id = "MediaGalleryId">
                        <div class = "row" align = "center" style = ';'>

                        </div>
                    </div>
                </div>

            </div>
        </div>


        
</div>
 
 @stop