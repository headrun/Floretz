@extends('layout.frontend.main')
<?php $mainsite='programs'; ?> 

@section('CSS')
<style>

</style>
@stop


@section('pagedata')
<div class = "container">	
	<div class = "row">
		<div class = "span2">
			<ul class="left_menu unstyled" style = "border: 1px solid #fff">
                <li><a href="toddler-montessori" >Toddler Montessori</a></li>
                <li><a href="primary-montessori">Primary Montessori</a></li>
                <li><a href="postschoolcare-activitycenter" class="active">Post School Care & Activity Center</a></li>    
            </ul>
			<div class="hidden-phone">
                <img src="{{url()}}/assets/images/photos/Program-PostSchoolCare/PostSchoolCareLeftPane1.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Program-PostSchoolCare/PostSchoolCareLeftPane2.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Program-PostSchoolCare/PostSchoolCareLeftPane3.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Program-PostSchoolCare/PostSchoolCareLeftPane4.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Program-PostSchoolCare/PostSchoolCareLeftPane5.jpg" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Program-PostSchoolCare/PostSchoolCare3.jpg" class="img-rounded"> <br><br>
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
            	Post School Care & Activity Center
            </div>
                        
            <div class="row margin_bottom">        	
                <div class="span10">
            		{{ $page["page_data"] }}                	
				</div>
            </div>
                        
                        
            <div class="fz_heading2">
            	List of Holidays
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