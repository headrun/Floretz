@extends('layout.main')
@section('CSS')

@stop
@section('JS')

<script type="text/javascript">

$('#updateProfile').click(function(event){
		event.preventDefault();
      if(($('#email').val()!='')&&($('#password').val()!='')){
        $.ajax({
        type: "POST",
        url: "{{URL::to('/quick/updateProfile')}}",
        data: {'id': $("#id").val(),'firstname': $("#firstname").val(), 'lastname': $("#lastname").val(), 'email': $("#email").val(), 'password': $("#password").val(), 'mobileNo': $('#mobileNo').val()},
        dataType:"json",
        success: function (response)
        {   
           console.log(response);
          if(response.status=='success'){
				$('#userMessage').css('background-color','yellowgreen');
                $('#userMessage').html('<p>Your details updated successfully. Please wait till this page reloads</p>');
                setTimeout(function(){
					   window.location.reload(1);
					}, 3500);   
           }else{
               console.log(response.status);
           } 
            
        }

    });
    }else{
    	$('#msgdiv').html('<p style="color:red;"> please enter all required details</p>');
    }

});

</script>
<script>

$('#updatecredintials').click(function(e){
		e.preventDefault();
		
      if(($('#newpassword').val()!='')&&($('#confirmpassword').val()!='')&&($('#newpassword').val()===$('#confirmpassword').val())){
        $.ajax({
        type: "POST",
        url: "{{URL::to('/quick/updatecredintials')}}",
        data: {'id': $("#id1").val(),'newpassword': $("#newpassword").val(), 'confirmpassword': $("#confirmpassword").val()},
        dataType:"json",
        success: function (response)
        {   
           //console.log(response);
           if(response.status=='success'){
				$('#userMessage1').css('background-color','yellowgreen');
                $('#userMessage1').html('<p>Your details updated successfully. Please wait till this page reloads</p>');
                setTimeout(function(){
					   window.location.reload(1);
					}, 3500);   
           }else{
               console.log(response.status);
           } 
            
        }

    });
    }else{
    	$('#msgdiv1').html('<p style="color:red;">New Password and Confirm Passwords are not maching</p>');
    }

});

</script>

@stop

@section('mainsub')
  	<div id="page-wrapper">
      <?php $mainpage='users'; $subpage='viewusers'; ?>                           
		<div class="main-page">
           <div class="sign-up-row widget-shadow">                
            	<div>
                    <center>
                    	<h2 style="background-color:#4F52BA;color:white;">Your Profile</h2>
                    </center>
                    <br>
                    <h4><b>Change Profile Details</b></h4>
                </div>
                <div class="msgdiv" id="msgdiv"></div>
                <div class="mobilemsgdiv" id="mobilemsgdiv"></div>
                <div class="passwdmsgdiv" id="passwdmsgdiv"></div>

				<form name = "urProfileForm" id = "urProfileForm" method = "POST">

					<input type="hidden" id="id" class="id" name="id" value = "{{ Auth::user()->id; }}">
					<div class="sign-u">
						<div class="sign-up1">
							<h4>First Name* :</h4>
						</div>
						<div class="sign-up2">
								<input type="text" id="firstname" class="firstname" name="firstname" value = "{{ Auth::user()->first_name; }}">
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Last Name* :</h4>
						</div>
						<div class="sign-up2">
								<input type="text" id="lastname" class="lastname" name="lastname" value = "{{ Auth::user()->last_name; }}">
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Email* :</h4>
						</div>
						<div class="sign-up2">
								<input type="text" id="email" class="email" name="email" value = "{{ Auth::user()->email; }}">
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Current Password* :</h4>
						</div>
						<div class="sign-up2">
								<input type="password" id="password" class="password" name="password" value = "">
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Mobile Number* :</h4>
						</div>
						<div class="sign-up2">
								<input type="text" id="mobileNo" class="mobileNo" name="mobileNo" value = "{{ Auth::user()->mobile_no; }}">
						</div>
						<div class="clearfix"> </div>
					</div>

					<div class="sub_home">
                        <input id="updateProfile" class="updateProfile" name="updateProfile" type="submit" value="Update" >
						<div class="clearfix"> </div>
					</div>
					
				</form>
				<br>
				<div id = "userMessage"></div>

			</div>


			 <div class="sign-up-row widget-shadow">                
            	<div>
                    
                    	<h4><b>Change Credential Details</b></h4>
                   
                </div>
                <div class="msgdiv" id="msgdiv1"></div>

				<form name = "urProfileForm" id = "urProfileForm" method = "POST">
					<input type="hidden" id="id1" class="id" name="id" value = "{{ Auth::user()->id; }}">
					<div class="sign-u">
						<div class="sign-up1">
							<h4>New Password* :</h4>
						</div>
						<div class="sign-up2">
								<input type="password" id="newpassword" class="password1" name="password1">
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Confirm Password* :</h4>
						</div>
						<div class="sign-up2">
								<input type="password" id="confirmpassword" class="password" name="password">
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Current Password* :</h4>
						</div>
						<div class="sign-up2">
								<input type="password" id="currentpassword" class="password" name="password" value = "">
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sub_home">
                        <input id="updatecredintials" class="updatecredintials" name="updateProfile" type="submit" value="Update" >
						<div class="clearfix"> </div>
					</div>
					
				</form>
				<br>
				<div id = "userMessage1"></div>
			
		</div>
	</div>		
@stop
