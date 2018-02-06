@extends('layout.frontend.main')
<?php $mainsite='contactus'; ?> 

@section('CSS')
@stop


@section('pagedata')
<div class = "container">	
	<div class = "row">
		<div class = "span2">
			<ul class="left_menu unstyled" style = "border: 1px solid #fff">
                <li><a href="enquiry" >Enquiry</a></li>
                <li><a href="career">Career</a></li>
                <li><a href="location" class="active">Locations</a></li> 
            </ul>
			<div class="hidden-phone">
                <img src="{{url()}}/assets/images/photos/Contact-Us-Locations/HSRLeftPane1.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Contact-Us-Locations/HSRLeftPane3.jpg" class="img-rounded"> <br><br>
                <img src="images/photos/Contact-Us-Locations/HSRLeftPane4.jpg" class="img-rounded"> <br><br>
                            
                <img src="{{url()}}/assets/images/photos/Contact-Us-Locations/SarjapurLeftPane1.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Contact-Us-Locations/SarjapurLeftPane2.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Contact-Us-Locations/SarjapurLeftPane3.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Contact-Us-Locations/SarjapurLeftPane4.jpg" class="img-rounded"> <br><br>
            </div>
		</div>
		<div class = "span10">
			        <div class="row margin_bottom">

                        
                            <div class="span10">
                                <div class="fz_heading2">
                                    HSR Layout School
                                </div>
                                
                                <div class="row">
                                    <div class="span4">
                                        <address>
                                            <span class="address">
                                                # 408, 22nd Cross, <br> 2nd Sector HSR Layout,<br>
                                                Bangalore – 560102, India.
                                            </span>
                                        </address>
                                    </div>
                                    <div class="span3">
                                        <address>
                                            <span class="ph">
                                                +91-80-2258 0019<br>
                                                +91 98451 32819
                                            </span>
                                        </address>
                                    </div>
                                    <div class="span3">
                                        <address>
                                            <span class="email">
                                                <a href="mailto:floretz.hsr@gmail.com">floretz.hsr@gmail.com</a>
                                            </span>
                                        </address>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="span10">
                                    </div>
                            <!-- End facebook -->
                        
                                </div>
                    
                             </div>
                    </div>

                    <div class="row margin_bottom">
                            <div class="span10">
                                <div class="fz_heading2">
                                    Sarjapur Road School
                                </div>
                                
                                <div class="row">
                                    <div class="span4">
                                        <address>
                                            <span class="address">
                                                # 26-B, Kasavanahalli Road, Off Sarjapur Road <br/>
                                                Bangalore – 560035, India 
                                            </span>
                                        </address>
                                    </div>
                                    <div class="span3">
                                        <address>
                                            <span class="ph">
                                                +91-80-42134819 
                                            </span>
                                        </address>
                                    </div>
                                    <div class="span3">
                                        <address>
                                            <span class="email">
                                                <a href="mailto:floretz.sarjapur@gmail.com">floretz.sarjapur@gmail.com</a>
                                            </span>
                                        </address>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="span10">
                                    </div>
                            <!-- End facebook -->
                        
                                </div>
                    
                        </div>         
			                        
		</div>
	</div>
</div>
@stop

<!-- JavaSctipt will start Here -->
@section('JS')
<script type="text/javascript">
	
</script>
@stop