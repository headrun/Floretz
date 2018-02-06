@extends('layout.frontend.main')
<?php $mainsite='parentscorner'; ?> 

@section('headCSS')
@stop


@section('pagedata')
<div class="container_wr">
            <div class="container_container padding_bottom">
            <div class="container">
                <div class="row">
                	<div class="span2">
                        <ul class="left_menu unstyled">
                            <li><a href="#" >Events</a></li>
                            <li><a href="feedback" class="active">Parent's Speak</a></li>
                        </ul>
                    </div>
                    
                    <div class="span10">
                    
                    	<div class="fz_heading2">
                        	Parent's speak
                        </div>
                        @for($i = 0; $i < count($page);$i++)
                        <div class="feedback_box_wr"><div class="feedback_box_bottom"><div class="feedback_box_top">
                        	<div class="feedback_content">
                                <img src="{{url()}}/assets/images/photos/parents_feedback/parent-feedback-{{rand(1,14)}}.jpg" class="pull-right margin_left">
                                <p>
                                    {{$page[$i]['parent_comments']}}
                                </p>
                            </div>
                            <span class="name">{{$page[$i]['name']}}</span>
                        </div></div></div>
                        <?php //$i += $i++; ?>

                        <div class="feedback_box_wr_2"><div class="feedback_box_bottom_2"><div class="feedback_box_top_2">
                        	<div class="feedback_content_2">
                               	<img src="{{url()}}/assets/images/photos/parents_feedback/parent-feedback-{{rand(1,14)}}.jpg" class="pull-left margin_right">
                                <p>
                                    {{$page[$i]['parent_comments']}}
                                </p>
                            </div>
                            <span class="name">{{$page[$i]['name']}}</span>  
                        </div></div></div>
                        @endfor
                    
                    
                
                        <br><br><br><br>

                        <div class = "row">
                            <h2 align = "center">Speak Here</h2>
                            <div class = "col-md-12">
                                <table border="0" cellpadding="0" cellspacing="0" width="800" align="center" id="frmtable">
                                    <tr><td><b>Your Full Name :</b></td></tr>
                                    <tr><td><input type="text" style="width:500px;" id="fullname"></td></tr>
                                    <tr><td><b>Your Comment :</b></td></tr>
                                    <tr><td><textarea style="width:800px;height:100px;" id="comments"></textarea></td></tr>
                                    <tr><td><div id = "msgDiv"></div></td></tr>
                                    <tr><td align="center" height="50"><input type="button" value="Submit" id="submit"></td></tr>
                                </table>
                            </div>
                        </div>
                    </div>  
                </div> 
            </div>
        </div>
    </div>
@stop

<!-- JavaSctipt will start Here -->
@section('JS')
<script type="text/javascript">
    $('#submit').click(function(){
        if($('#fullname').val() != '' && $('#comments').val() != ''){
            $.ajax({
                type: "POST",
                url: "{{URL::to('/quick/ParentSpeakFromUserEnd')}}",
                data: {'full_name': $('#fullname').val(), 'comments': $('#comments').val()},
                dataType:"json",
                success: function (response)
                {
                    //console.log(response);
                    if(response.status == "success"){
                        $('#msgDiv').html('<h4 style = "padding: 5px; background: green; color: #fff;" align= "center">Your Post was successfully uploaded. This comment will be displayed when Admin approved. Please wait untill page reload.</h4>');            
                        setTimeout(function(){
                            window.location.reload(1);
                        }, 4000);
                    }
                    else{
                        console.log(response);
                    }
                }
            });
        }
        else{
            $('#msgDiv').html('<h4 style = "padding: 5px; background: red; color: #fff;" align= "center">Please fill all fields before Submit</h4>');
        }
    });
</script>
@stop