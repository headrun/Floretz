@extends('layout.frontend.main')
<?php $mainsite='aboutus'; ?> 

@section('CSS')
<link href="{{url()}}/assets/css/custom_responsive.css" rel="stylesheet">
<link href="{{url()}}/assets/css/custom_grid.css" rel="stylesheet">
<link href="{{url()}}/assets/floretz.css" rel="stylesheet">
@stop


@section('pagedata')
<div class="container_wr">
<div class="container_container padding_bottom">
<div class = "container">	
	<div class = "row">
		<div class = "span2">
			<ul class="left_menu unstyled" style = "border: 1px solid #fff">
                <li><a href="vision" >Our Vision & Values</a></li>
                <li><a href="the-team">The Team</a></li>
                <li><a href="school-tieups">School Tie-Ups</a></li>
                <li><a href="our-centers" class="active">Our Schools</a></li>
                <li><a href="montessori" >Montessori</a></li>
            </ul>
			<div class="hidden-phone">
               <img src="{{url()}}/assets/images/photos/About-Us-Our-Schools/OurSchoolsLeftPane1.jpg" class="img-rounded"> <br><br>
               <img src="{{url()}}/assets/images/photos/About-Us-Our-Schools/OurSchoolsLeftPane2.jpg" class="img-rounded"> <br><br>
               <img src="{{url()}}/assets/images/photos/About-Us-Our-Schools/OurSchoolsLeftPane3.jpg" class="img-rounded"> <br><br>
               <img src="{{url()}}/assets/images/photos/About-Us-Our-Schools/OurSchoolsLeftPane4.jpg" class="img-rounded"> <br><br>
            </div>
		</div>
		
		<div class="span10">
                    	<div class="fz_heading2">
                        	Our Schools
                        </div>
                        
                        <h2 class="fz_heading1">HSR Layout</h2>
                        <div class="row margin_bottom">
                        	<div class="span4">
                            	<img src="{{url()}}/assets/images/photos/About-Us-Our-Schools/OurSchools-HSR-Layout.JPG" class="img-polaroid img-rounded">
                            </div>
                            <div class="span6 our_school">
                                <address>
                                    <span class="address">
                                        # 408, 22nd Cross, 2nd Sector HSR Layout,<br>
                                        Bangalore – 560102, India. <br>
                                        <a href="https://www.google.co.in/maps?q=floretz+bangalore&ie=UTF-8&ei=EsMFU7JqxJeuB-rVgGg&ved=0CAkQ_AUoAQ" target="_blank" class="btn btn-small btn-success" style="margin-top:5px">Location Map </a>
                                    </span>
                                    <span class="ph">
                                    	+91-80-2258 0019,
                                        +91 98451 32819
                                    </span>
                                    <span class="email"> 
                                        <a href="mailto:floretz.hsr@gmail.com"> floretz.hsr@gmail.com</a>
                                    </span>
                                </address>
                            </div>
                            
                        </div>
                        
                        <p>
                        	The School at HSR Layout was among the first Montessori Schools in the locality. The school was set up in 2005 and has facilities that are on par with any Montessori school in the world. Located in the heart of HSR Layout, this school has gained the reputation as one of the best schools in South East Bangalore. A school that does not dilute the Montessori Method. A school that provides an environment where children not only learn but also are given the freedom to innovate. The school teaches children "how to think" and not "what to think". 
                        </p>
                        
                        
                        <h3 class="text-center" >Programs Offered <span style="color:#fff;">Floretz </span></h3>
                        <div class="row margin_bottom" style="margin-bottom:60px">
                            <div class="span3">
                            	<div class="program_box">
                            		<span class="prm_name toddler">Toddler</span>
                                    <div class="prm_img toddler"></div>
                                    <div class="prm_content">
                                    	<p><a href="toddler-montessori" class="btn">More Details</a></p>
                                    </div>
                                </div>
                                <p class="text-center">for children of age group 2 years to 2 years 6 months</p>
                            </div>
                            <div class="span3">
                            	<div class="program_box">
                                    <span class="prm_name primary">Primary</span>
                                    <div class="prm_img primary"></div>
                                    <div class="prm_content">
                                    	<p><a href="primary-montessori" class="btn">More Details</a></p>
                                    </div>
                                </div>
                                <p class="text-center">Montessori primary education for age group 2 years 6 months to 6 years</p>
                            </div>
                            <div class="span4">
                            	<div class="program_box">
                                    <span class="prm_name activity">Extra Curricular Activities</span>
                                    <div class="prm_img eca"></div>
                                    <div class="prm_content">
                                    	<p><a href="postschoolcare-activitycenter" class="btn">More Details</a></p>
                                    </div>
                                </div>
                                <ul class="unstyled text-center">
                                    <li>Accelerated Maths</li>
                                    <li>Music (Key Boards)</li>
                                    <li>Dance (Bharathanatyam and Western Style)</li>
                                    <li>Self-Defence <br> (Karate)</li>
                                </ul>
                            </div>
                        </div>
                        
                        <hr class="margin_bottom">
                        
                        
                        <h2 class="fz_heading1">Sarjapur Road</h2>
                        <div class="row margin_bottom">
                        	<div class="span4">
                            	<img src="{{url()}}/assets/images/photos/About-Us-Our-Schools/OurSchools-Sarjapur-Road.JPG" class="img-polaroid img-rounded">
                            </div>
                        	<div class="span6 our_school">
                                <address>
                                	<span class="address">
                                    	# 26-B, Kasavanahalli Road, Off Sarjapur Road, <br>
										Bangalore – 560035, India.<br>
                                        <a href="https://mapsengine.google.com/map/viewer?mid=zSvcfVpdBKDs.kIrIRPMgOnfo" target="_blank" class="btn btn-small btn-success" style="margin-top:5px">Location Map </a>
                                    
                                    </span>
                                    <span class="ph">
                                        +91-80-42134819,
                                        +91 98451 32819
                                    </span>
                                    <span class="email">
                                        <a href="mailto:floretz.sarjapur@gmail.com">floretz.sarjapur@gmail.com</a>
                                    </span>
                                </address>
                            </div>
                        </div>
                        
                        <p>
                        	The School on Sarjapur Road opened in February, 2014. With large, well ventilated and spacious classrooms, library facilities, purposefully designed indoor and outdoor play areas and a 250 seater Auditorium, this school has infrastructure that is on par with, if not better than, most other Montessori Schools in the world.
                        </p>
                        
                        <h3 class="text-center" >Programs Offered <span style="color:#fff;">Floretz </span></h3>
                        <div class="row margin_bottom">
                            <div class="span3">
                            	<div class="program_box">
                            		<span class="prm_name toddler">Toddler</span>
                                    <div class="prm_img toddler">
                                    	
                                    </div>
                                    <div class="prm_content">
                                    	<p><a href="toddler-montessori" class="btn">More Details</a></p>
                                    </div>
                                </div>
                                <p class="text-center">for children of age group 2 years to 2 years 6 months</p>
                            </div>
                            <div class="span3">
                            	<div class="program_box">
                                    <span class="prm_name primary">Primary</span>
                                    <div class="prm_img primary"></div>
                                    <div class="prm_content">
                                    	<p><a href="primary-montessori" class="btn">More Details</a></p>
                                    </div>
                                </div>
                                <p class="text-center">Montessori primary education for age group 2 years 6 months to 6 years</p>
                            </div>
                            <div class="span4">
                            	<div class="program_box">
                                    <span class="prm_name activity">Post School Care & Activity <br> Centre</span>
                                    <div class="prm_img eca"></div>
                                    <div class="prm_content">
                                    	<p><a href="postschoolcare-activitycenter" class="btn">More Details</a></p>
                                    </div>
                                </div>
                                
                                <ul class="unstyled text-center">
                                    <li>Post School Care</li>
                                    <li>Multiple Intelligence</li>
                                    <li>Accelerated Maths</li>
                                    <li>Dance (Bharathanatyam and Western Style)</li>
                                    <li>Music (Key Boards)</li>
                                </ul>
                                
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
	
</script>
@stop