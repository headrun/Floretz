@extends('layout.frontend.main')
<?php $mainsite='aboutus'; ?> 

@section('CSS')
@stop


@section('pagedata')
<div class = "container">	
	<div class = "row">
		<div class = "span2">
			<ul class="left_menu unstyled" style = "border: 1px solid #fff">
                <li><a href="vision" >Our Vision & Values</a></li>
                <li><a href="the-team">The Team</a></li>
                <li><a href="school-tieups">School Tie-Ups</a></li>
                <li><a href="our-centers">Our Schools</a></li>
                <li><a href="montessori" class="active">Montessori</a></li>
            </ul>
			<div class="hidden-phone">
                <img src="{{url()}}/assets/images/photos/About-Us-Montessori/Montessori-left-pane.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/About-Us-Montessori/Montessori-left-pane1.jpg" class="img-rounded"><br><br>
                <img src="{{url()}}/assets/images/photos/About-Us-Montessori/Montessori-left-pane2.jpg" class="img-rounded"><br><br>
                <img src="{{url()}}/assets/images/photos/About-Us-Montessori/Montessori-left-pane3.JPG" class="img-rounded"><br><br>
            </div>
		</div>
		<div class = "span10">
			<div class="fz_heading2">
                Montessori
            </div>
            
			{{ $page["page_data"] }}                        
		</div>
	</div>
</div>
@stop

<!-- JavaSctipt will start Here -->
@section('JS')
<script type="text/javascript">
	
</script>
@stop