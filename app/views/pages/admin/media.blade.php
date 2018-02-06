@extends('layout.main')


@section('headCSS')
<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<link rel="stylesheet" href="Bootstrap-Image-Gallery-3.1.1/css/bootstrap-image-gallery.min.css">
<style>
   #imageDiv{
   	float: left;
   	border: thin solid #d1d1d1;
   	margin: 0 0 1.5em 2em;
   } 

   div#blueimp-gallery div.modal {
        overflow: visible;
    }
</style>
@stop

@section('JS')
    <script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <script src="Bootstrap-Image-Gallery-3.1.1/js/bootstrap-image-gallery.min.js"></script>
    <script>
        $('#blueimp-gallery').data('useBootstrapModal', false);
        $('#blueimp-gallery').toggleClass('blueimp-gallery-controls', true);
    </script>

    <script type="text/javascript">
        function MultipleDelete(){
            var idlength = $('input:checkbox[name=CheckBoxId]:checked').length;
            if (idlength >= 1){
            var getLength = [];
            getLength = $('input:checkbox[name=CheckBoxId]:checked').map(function() {
                        return $(this).next('input').val();
                   }).get();
            //console.log(getLength);
            
            $.ajax({
                type: "POST",
                url: "{{URL::to('/quick/DeleteMultipleImages')}}",
                data: {'ids': getLength},
                dataType:"json",
                success: function (response)
                {
                    if(response.status == "success"){
                        $('#MsgDiv').html('<h4 style = "color: #fff; background: green; width: 80%; padding: 5px; text-align: center">Images Deleted Successfully. Please wait until page reloads.</h4>');
                        setTimeout(function(){
                            window.location.reload(1);
                        }, 2000);    
                    }else{
                        console.log(response.status);
                    }
                }
            });
        }
        else{
            $('#MsgDiv').html('<h4 style = "color: #fff; background: red; width: 80%; padding: 5px; text-align: center">please select images and delete.</h4>');
            setTimeout(function(){
                $('#MsgDiv').html('');
            }, 3500);
            
        }
        }
    </script>
@stop

 @section('mainsub')

<div id="page-wrapper">
        <?php $mainpage=''; $subpage='media'; ?>                          
		<div class="main-page">
            <div class="row1">
                <div class="col-md-9 col-lg-12" style="background-color:#4F52BA;color:white; margin-bottom: 1em; padding: 3px;">
                    <h3>Admin Gallery</h3>
					<div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <div class = "container">
        <div class="row" style = "margin: 3em 0 10px 0">
            {{ Form::open(array('action' => 'AdminController@UploadMedia', 'files'=>true)) }}
                <div class = "col-md-2">
                    <label style = "margin-top: 5px;">Add Attachment:</label>
                    </div>
                <div class = "col-md-5">
                    <span >{{Form::file('image',array('required', 'class'=>'form-control'))}}</span> 
                </div>
                <div class = "col-md-2" style = "border-right: 1px solid #000">
                    <input type="submit" class="btn btn-sm btn-primary" value="Upload banner Image"/>
                </div>
            {{Form::close()}}
                <div class = "col-md-3" style = "padding-left: 40px">
                    <input type="button" class="btn btn-sm btn-danger" onclick = "MultipleDelete()" value="Delete"/>
                </div>

        </div>
        <div id = "MsgDiv" style = "margin: 0 0 3em 2em"></div>
        <div class = "row" align = "center" >
        	<?php
        	for($x=0; $x < count($getMediaGallery); $x++){
				$img = $getMediaGallery[$x]['image_path'];
                $id  = $getMediaGallery[$x]['id'];
        	?>
            <div class = "span3" id = "imageDiv">
            	<a href='{{url()}}/{{$img}}' data-gallery >
            		<img src="{{url()}}/{{$img}}" width= "160px" height = "160px">
            	</a><br>
                <input type = "checkbox" id = "CheckBoxId" name = "CheckBoxId" style = "zoom: 1.4; cursor:pointer;">
                <input type = "hidden" value = "{{$id}}">
            </div>
			<?php  } ?>
        </div>


        <div id = "errorMsg"><h4 style = "color: #fff; padding: 8px; width: 50%">@if (Session::has('errorMsg')) {{Session::get('errorMsg')}} @endif</h4> </div>
	</div>
</div>
<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev"></a>
    <a class="next"></a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
 
 @stop