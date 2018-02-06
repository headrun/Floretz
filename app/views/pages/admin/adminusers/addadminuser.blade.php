@extends('layout.main')
@section('CSS')

@stop
@section('JS')

<script>
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function phonenumber(inputtxt)  
{  
  var phoneno = /^\d{10}$/;  
  return phoneno.test(inputtxt);
}  

    $('#emailaddress').change(function(){
       
        if(validateEmail($('#emailaddress').val())==false){
            $('#msgdiv').html('<p style="color:red;">*invalid email</p>');
        }else{
            $('#msgdiv').html('');
        }
        
        if($('#emailaddress').val()==''){
               $('#msgdiv').html('');
        }
        
    });
    
    $('#mobileNumber').change(function(){
    console.log('working');
    if((phonenumber($('#mobileNumber').val()))==false){
        $('#mobilemsgdiv').html('<p style="color:red;">*Invalid Mobile Number</p>');
    
    }else{
        $('#mobilemsgdiv').html('');   
        
    }
        if($('#mobileNumber').val()==''){
            $('#mobilemsgdiv').html('');
        }
    });
    
    $('#password').change(function(){
          if($('#confirmpassword').val()!==''){
              if($('#password').val()!==$('#confirmpassword').val()){
                  $('#passwdmsgdiv').html('<p style="color:red;">*password and confirm password should be same</p>');
              }
          }
          if($('#confirmpassword').val()===''){
                 $('#passwdmsgdiv').html('');
          }
          if($('#password').val()===''){
             $('#passwdmsgdiv').html('');
         }
    });
    
    $('#confirmpassword').change(function(){
        if($('#password').val()!==''){
            if($('#password').val()!==$('#confirmpassword').val()){
                 $('#passwdmsgdiv').html('<p style="color:red;">*password and confirm password should be same</p>');
            }
        }
        if($('#confirmpassword').val()===''){
                 $('#passwdmsgdiv').html('');
          }
       if($('#password').val()===''){
             $('#passwdmsgdiv').html('');
         }
      
    });
    
   /* $('#addAdminUser').click(function(e){
           e.preventDefault();
       if(($('#mobilemsgdiv').val()==='')&&($('#msgdiv').val()==='')&&($('#passwdmsgdiv').val()==='')){
           console.log($('#addadminform').serialize());
           //alert($('#addadminform').serialize());
       }
       else{
           alert('please fill the form without Errors');
       }
   });*/
</script>
<script>

$('#addAdminUser').click(function(event){
		event.preventDefault();
    // make modal to display user added succesfully
      //check password and email is not empty
      if(($('#emailaddress').val()!='')&&($('#password').val()!='')){
        $.ajax({
        type: "POST",
        url: "{{URL::to('/quick/addUser')}}",
        data: {'firstname': $("#firstname").val(), 'lastname': $("#lastname").val(), 'emailaddress': $("#emailaddress").val(), 'mobilenumber': $("#mobilenumber").val(), 'Gender': $('#Gender').val(), 'password': $('#password').val()},
        dataType:"json",
        success: function (response)
        {   
           //alert(response);
           if(response.status=='success'){
				$('#userMessage').css('background-color','yellowgreen');
				//alertify.success("User added successfully");
                $('#userMessage').html('<p>User added successfully. Please wait till this page reloads</p>');
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
@stop
 @section('mainsub')
  <div id="page-wrapper">
      <?php $mainpage='users'; $subpage='addadminuser'; ?>                           
			<div class="main-page">
                            <!--{{ Form::open(array('url' => '','id'=>'addadminform','name'=>'addadminform', 'method'=>'POST')) }}-->
                            <div class="sign-up-row widget-shadow">
                                        <div>
                                        <center>
                                        	
                                            <h2 style="background-color:#4F52BA;color:white;">Add admin User</h2>
                                        </center>
                                        </div>
                                        <br clear="all">
					<h5 style="color:#4F52BA">Personal Information :</h5>
                                        <div class="msgdiv" id="msgdiv"></div>
                                        <div class="mobilemsgdiv" id="mobilemsgdiv"></div>
                                        <div class="passwdmsgdiv" id="passwdmsgdiv"></div>
                                        
					<div class="sign-u">
						<div class="sign-up1">
							<h4>First Name* :</h4>
						</div>
						<div class="sign-up2">
								<input type="text" id="firstname" class="firstname" name="firstname"  required>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Last Name* :</h4>
						</div>
						<div class="sign-up2">
								<input type="text" id="lastname" class="lastname" name="lastname" required>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Email Address* :</h4>
						</div>
						<div class="sign-up2">
								<input type="text" id="emailaddress" class="emailaddress" name="emailaddress" required>
						</div>
						<div class="clearfix"> </div>
					</div>
                                        
                                        <div class="sign-u">
						<div class="sign-up1">
							<h4>Mobile No* :</h4>
						</div>
						<div class="sign-up2">
                                <input type="text" id='mobilenumber' class="mobileNumber" name = "mobilenumber" required>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Gender* :</h4>
						</div>
						<div class="sign-up2">
							<label>
								<input type="radio" name="Gender" id='Gender' class='Gender' value="Male" required>
								Male
							</label>
							<label>
								<input type="radio" name="Gender" id='Gender' class='Gender' value="Female" required>
								Female
							</label>
						</div>
						<div class="clearfix"> </div>
					</div>
					<h5 style="color:#4F52BA">Login Information :</h5>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Password* :</h4>
						</div>
						<div class="sign-up2">
								<input type="password" id="password" class="password" name="password" required>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Confirm Password* :</h4>
						</div>
						<div class="sign-up2">
                                                            <input type="password" id="confirmpassword" class="confirmpassword" name="confirmpassword" required>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sub_home">
                                                    <input id="addAdminUser" class="addAdinUser" name="addAdminUser" type="submit" value="Add" >
						<div class="clearfix"> </div>
					</div>
          
                                </div>
          <div id = "userMessage"></div>
                          <!--{{ Form::close() }}-->
                        </div>
                        
                        
        </div>
 
 @stop