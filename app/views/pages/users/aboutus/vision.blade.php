@extends('layout.frontend.main')
<?php $mainsite='aboutus'; ?> 

@section('CSS')
@stop


@section('pagedata')
<div class = "container">	
	<div class = "row">
		<div class = "span2">
			<ul class="left_menu unstyled">
                <li><a href="vision" class="active">Our Vision & Values</a></li>
                <li><a href="the-team">The Team</a></li>
                <li><a href="school-tieups">School Tie-Ups</a></li>
                <li><a href="our-centers">Our Schools</a></li>
                <li><a href="montessori">Montessori</a></li>
            </ul>

			<div class="hidden-phone">
                <img src="{{url()}}/assets/images/photos/About-Us-Vision-Values/Vision-LeftPane.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/About-Us-Vision-Values/VisionWorld.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/About-Us-Vision-Values/ValuesLeftPane.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/About-Us-Vision-Values/ValuesLeftPane2.jpg" class="img-rounded"> <br><br>
            </div>
		</div>
		
		<div class="span10">
                    	<div class="row margin_bottom">
                            <div class="span10">
                                <div class="fz_heading2">
                                    Our Vision
                                </div>
                                
                                <div class="vision">
                                	{{ $page["page_data"] }}
                                    
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row margin_bottom">
                            <div class="span10">
                                <div class="fz_heading2">
                                    Our Values
                                </div>
                                
                                <img src="http://floretz.com/images/ourvalues.png" atl="floretz Values">
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