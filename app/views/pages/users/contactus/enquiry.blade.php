@extends('layout.frontend.main')
<?php $mainsite='contactus'; ?> 

@section('CSS')
@stop


@section('pagedata')
<div class="container_container padding_bottom">
<div class = "container">	
	<div class = "row">
		<div class = "span2">
			<ul class="left_menu unstyled" style = "border: 1px solid #fff">
                <li><a href="enquiry" class="active">Enquiry</a></li>
                <li><a href="career">Career</a></li>
                <li><a href="location">Locations</a></li> 
            </ul>
			<div class="hidden-phone">
                <img src="{{url()}}/assets/images/photos/Contact-Us-Enquiry/EnquiryLeftPane1.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Contact-Us-Enquiry/EnquiryLeftPane2.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Contact-Us-Enquiry/EnquiryLeftPane3.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Contact-Us-Enquiry/EnquiryLeftPane4.jpg" class="img-rounded"> <br><br>
            </div>
		</div>
		<div class = "span10">
			<div class="fz_heading2">
                Enquiry
            </div>


			<div class="row">
                <div class="span10 postcard">
                    <h2 class="post_heading">Post your enquiry</h2>
                        <div class="row">
                            <form id="myform" name="myform" method="post">
                                <div class="span5" >
                                    <div class="message_area">
                                        <textarea id="message" placeholder="Write Message here" msg="Message"></textarea>
                                    </div>
                                </div>
                                <div class="span5">
                                    <img src="{{url()}}/assets/images/stamp.png" class="stamp">
                                    <div class="address_area">
                                        <div class="post_card_row"><input type="text" placeholder="Name" id="name" msg="Name"></div>
                                        <div class="post_card_row"><input type="text" id="email" placeholder="Email" msg="Email" ></div>
                                        <div class="post_card_row"><input type="text" id="ph" placeholder="Contact No" msg="Contact No" ></div>
                                        <div class="post_card_row"><textarea id="address" placeholder="Address" msg="Address" ></textarea></div>
                                                    
                                        <div class="post_card_row noborder">
                                            <input type="radio" name="enquiry_for" value="School"> School  &nbsp; &nbsp; <span class="nextline"></span>
                                            <input type="radio" name="enquiry_for" value="Day care"> Day care &nbsp;&nbsp; <span class="nextline"></span>
                                            <input type="radio" name="enquiry_for" value="Activities"> Activities &nbsp;&nbsp; <span class="nextline"></span>
                                        </div>
                                        <hr style="color:f1f1f1;">
                                        <div class="post_card_row noborder"><input type="radio" name="enquirytype" value="Hsr Layout"> HSR Layout  &nbsp; &nbsp; <span class="nextline"></span>
                                            <input type="radio" name="enquirytype" value="Kasavanahalli"> Kasavanahalli &nbsp;&nbsp; <span class="nextline"></span>
                                        </div>
                                        <div class="post_card_row noborder"><button type="button" class="btn" id = "submit">Post</button> 
                                            <span style="" class="message_box"></span>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
        if($('#name').val() != '' && $('#email').val() != '' && $('#ph').val() != '' && $('#address').val() != '' && $('#message').val() != '' && $('input[name=enquiry_for]:checked').val() != '' && $('input[name=enquirytype]:checked').val() != ''){
            
            $.ajax({
                type: "POST",
                url: "{{URL::to('/quick/enquiryPost')}}",
                data: {'name': $('#name').val(), 'email': $('#email').val(), 'contact_no': $('#ph').val(), 'address': $('#address').val(), 'message': $('#message').val(), 'enquiry_for': $('input[name=enquiry_for]:checked').val(), 'enquirytype': $('input[name=enquirytype]:checked').val()},
                dataType:"json",
                success: function (response)
                {
                    console.log(response);
                    $('.message_box').html('<span style = "color: #fff; margin-left: 10px; background: green; padding: 3px">Thank you for contacting Floretz.</span>');
                    setTimeout(function(){
                        window.location.reload(1);
                    }, 2000);
                }
            });
        }
        else{
            $('.message_box').html('<span style = "color: #fff; margin-left: 10px; background: red;  padding: 3px">Please Fill all required fields.</span>');
        }
});
</script>
@stop