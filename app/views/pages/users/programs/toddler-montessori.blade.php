@extends('layout.frontend.main')
<?php $mainsite='programs'; ?> 

@section('CSS')
@stop


@section('pagedata')
<div class = "container">	
	<div class = "row">
		<div class = "span2">
			<ul class="left_menu unstyled" style = "border: 1px solid #fff">
                <li><a href="toddler-montessori" class="active">Toddler Montessori</a></li>
                <li><a href="primary-montessori">Primary Montessori</a></li>
                <li><a href="postschoolcare-activitycenter" >Post School Care & Activity Center</a></li>    
            </ul>
			<div class="hidden-phone">
                <img src="{{url()}}/assets/images/photos/Program-Toddler/program-toddler-LeftPane1.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Program-Toddler/program-toddler-LeftPane2.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Program-Toddler/program-toddler-LeftPane3.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Program-Toddler/program-toddler-LeftPane4.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Program-Toddler/Toddler2.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Program-Toddler/Toddler3.jpg" class="img-rounded"> <br><br>
            </div>
		</div>
		<div class = "span10">
			<div class="fz_heading2">
                The Floretz Program
            </div>

            <blockquote class="fz_quote maria">
                <img src="http://floretz.com/images/Dr-Maria-Montessori.jpg" class="pull-left img-rounded" style="margin-right:20px;">
                <p>
                	“Knowledge can best be given where there is eagerness to learn, so this is the period when the seed of everything can be sown, the child's mind being like a fertile field, ready to receive what will germinate into knowledge.”
                   	<small>Dr. Maria Montessori</small>
                </p>
                            
                <div class="clearfix"></div>
            </blockquote>
            <p>
            	The Floretz Programme is designed to bring learning through observation, self-help, teaching aids, Montessori Materials, Montessori trained adults, spontaneous sharing of knowledge of older children with the younger ones, physical activities and audio-visual modules.
            </p>
                    
                    
            <div class="fz_heading2">
            	Toddler Montessori Program (2 to 2 ½ years of age)
            </div>
                        
            <blockquote class="fz_quote maria">
            	<img src="http://floretz.com/images/Dr-Maria-Montessori.jpg" class="pull-left img-rounded" style="margin-right:20px;"><br>
                <p>
                	“Our aim is not merely to make the child understand...but to so touch (the child's) imagination as to create enthusiasm to (the) inmost core”
                    <small>Dr. Maria Montessori</small>
                </p>
                            
                <div class="clearfix"></div>
            </blockquote>
                        
            <div class="row margin_bottom">
            	<div class="span10">
                    {{ $page["page_data"] }}      	
                </div>
            </div>
                        
            <blockquote class="fz_quote maria">
            	<img src="http://floretz.com/images/Dr-Maria-Montessori.jpg" class="pull-left img-rounded" style="margin-right:20px;">
                <p>
                	<br>
                    “Our work as adults does not consist in teaching, but in helping the infant mind in its work of development.”
                    <small>Dr. Maria Montessori</small>
                </p>
                            
               	<div class="clearfix"></div>
            </blockquote>
            
			                        
		</div>
	</div>
</div>
@stop

<!-- JavaSctipt will start Here -->
@section('JS')
<script type="text/javascript">
	
</script>
@stop