@extends('layout.frontend.main')
<?php $mainsite='aboutus'; ?> 

@section('CSS')
@stop
<!--{{ $page["page_data"] }}-->

@section('pagedata')
<div class = "container">
	<div class = "row">
		<div class = "span2">
            <ul class="left_menu unstyled" style = "border: 1px solid #fff">
                <li><a href="vision" >Our Vision & Values</a></li>
                <li><a href="the-team">The Team</a></li>
                <li><a href="school-tieups" class="active">School Tie-Ups</a></li>
                <li><a href="our-centers">Our Schools</a></li>
                <li><a href="montessori">Montessori</a></li>
            </ul>

			<div class="hidden-phone">
                <img src="{{url()}}/assets/images/photos/About-Us-SchoolTie-Ups/TieUpLeftPane1.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/About-Us-SchoolTie-Ups/TieUpLeftPane2.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/About-Us-SchoolTie-Ups/TieUpLeftPane3.jpg" class="img-rounded"> <br><br>
            </div>
		</div>
		<div class = "span10">
			<div class="fz_heading2">
                School Tie-Ups
            </div>

			{{ $page["page_data"] }}
			<div class="row">                        
                <div class="span3">
                	<div class="tie-up">
                    	<a href="http:/www.zeeschool-southbangalore.org" target="_blank"><img src="{{url()}}/assets/images/tie-ups/mount-logo.png"></a>
                    </div>
                </div>
                <div class="span3">
                	<div class="tie-up">
                    	<a href="http://www.ssrvm.org" target="_blank"><img src="{{url()}}/assets/images/tie-ups/sri-sri-ravishankar-vidya-mandir-logo.png"></a>
                    </div>
                </div>
                        
                <div class="span3">
                	<div class="tie-up">
                    	<a href="http://www.sherwoodhigh.com" target="_blank"><img src="{{url()}}/assets/images/tie-ups/sherwood-high-logo.jpg"></a>
                    </div>
                </div>
                <div class="span3">
                	<div class="tie-up">
                    	<a href="http://www.harvestinternationalschool.com" target="_blank"><img src="{{url()}}/assets/images/tie-ups/harvest-logo-2013.jpg"></a>
                    </div>
                </div>
                <div class="span3">
                	<div class="tie-up">
                    	<a href="http://www.oakridge.in" target="_blank"><img src="{{url()}}/assets/images/tie-ups/Oakridge.jpg"></a>
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