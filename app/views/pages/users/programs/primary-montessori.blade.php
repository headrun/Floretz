@extends('layout.frontend.main')
<?php $mainsite='programs'; ?> 

@section('CSS')
@stop


@section('pagedata')
<div class = "container">	
	<div class = "row">
		<div class = "span2">
			<ul class="left_menu unstyled" style = "border: 1px solid #fff">
                <li><a href="toddler-montessori">Toddler Montessori</a></li>
                <li><a href="primary-montessori" class="active">Primary Montessori</a></li>
                <li><a href="postschoolcare-activitycenter">Post School Care & Activity Center</a></li>    
            </ul>
			<div class="hidden-phone">
                <img src="{{url()}}/assets/images/photos/Program-Primary/Primary-LeftPane1.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Program-Primary/Primary-LeftPane2.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Program-Primary/Primary-LeftPane3.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Program-Primary/Primary-LeftPane4.jpg" class="img-rounded"> <br><br>
                            
                <img src="{{url()}}/assets/images/photos/Program-Primary/EPL3.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Program-Primary/EPL5.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Program-Primary/Sensorial.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Program-Primary/Sensorial1.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Program-Primary/Language6.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Program-Primary/Language3.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Program-Primary/Arithmetic.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Program-Primary/Cultural9.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Program-Primary/Cultural4.jpg" class="img-rounded"> <br><br>
            </div>
		</div>
		<div class = "span10">
			<div class="fz_heading2">
                The Floretz Program
            </div>

            <blockquote class="fz_quote maria">
                <img src="{{url()}}/assets/images/Dr-Maria-Montessori.jpg" class="pull-left" style="margin-right:20px;">
                <p>
                	“Knowledge can best be given where there is eagerness to learn, so this is the period when the seed of everything can be sown, the child's mind being like a fertile field, ready to receive what will germinate into knowledge.”
                    <small>Dr. Maria Montessori</small>
                </p>            
                <div class="clearfix"></div>
            </blockquote>
            <p>
            	The Floretz Program is designed to bring learning through observation, self-help, teaching aids, Montessori Materials, Montessori trained adults, spontaneous sharing of knowledge of older children with the younger ones, physical activities and audio-visual modules.
            </p>
                    
                    
            <div class="fz_heading2">
            	Primary Montessori Program – (2 ½ to 6 years of age)
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