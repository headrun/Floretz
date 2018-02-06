@extends('layout.frontend.main')
<?php $mainsite='contactus'; ?> 

@section('CSS')
@stop


@section('pagedata')
<div class="container_container padding_bottom">
<div class = "container">	
	<div class = "row">
		<div class = "span2">
			<ul class="left_menu unstyled" style = "border: 1px solid #fff">
                <li><a href="enquiry" >Enquiry</a></li>
                <li><a href="career" class="active">Career</a></li>
                <li><a href="location">Locations</a></li> 
            </ul>
			<div class="hidden-phone">
                <img src="{{url()}}/assets/images/photos/Contact-Us-Career/LeftPane1.JPG" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Contact-Us-Career/LeftPane2.JPG" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Contact-Us-Career/LeftPane3.JPG" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Contact-Us-Career/LeftPane4.JPG" class="img-rounded"> <br><br>
                <img src="{{url()}}/assets/images/photos/Contact-Us-Career/LeftPane5.JPG" class="img-rounded"> <br><br>
            </div>
		</div>
		<div class = "span10">
			<div class="fz_heading2">
                Career
            </div>

            <div class="row margin_bottom">
                <div class="span10">
                    {{ $page['page_data']}}                   
                </div>
            </div>
                        
            <h2 class="text-center">What do our Montesorri Adults say about Floretz?</h2>
                                 
                <div class="feedback_box_wr">
                    <div class="feedback_box_bottom">
                        <div class="feedback_box_top">
                            <div class="feedback_content">
                                <img src="http://floretz.com/images/photos/Contact-Us-Career/Minu-Dilip.jpg" class="pull-right margin_left">
                                <p>
                                    I have been a part of this glorious journey at Floretz since its inception. I enjoy and cherish all of the moments with the amazing tiny-tots as well as the staff. At Floretz, I enjoy leading a team of teachers and meeting parents. The pilot program that we did on Multiple Intelligences at Floretz was a first of its kind. There are so many lovely memories for me and I am sure there will be more and more in the future for me at Floretz. 
                                </p>
                            </div>
                            <span class="name">Minu Dilip</span>
                        </div>
                    </div>
                </div>
                        
                        
                <div class="feedback_box_wr_2"><div class="feedback_box_bottom_2"><div class="feedback_box_top_2">
                    <div class="feedback_content_2">
                        <img src="http://floretz.com/images/photos/Contact-Us-Career/UmaJayaraman.jpg" class="pull-left margin_right">
                            <p>
                                I have been working in Floretz for the last 5 years. The reason I chose Floretz is that it was love at first sight and I felt that this was where I finally belonged. It is one of the few schools that follows the proper Montessori Method and the freedom that Deepa gives us makes the job a pleasure. Above all, I love the new School infrastructure at Sarjapur Road. The classrooms are really large and extremely well ventilated.
                            </p>
                        </div>
                        <span class="name">Uma Jayaraman</span>
                </div></div></div>
                        
                        
                <div class="feedback_box_wr"><div class="feedback_box_bottom"><div class="feedback_box_top">
                    <div class="feedback_content">
                        <img src="http://floretz.com/images/photos/Contact-Us-Career/Soumya-G.S-Floretz.jpg" class="pull-right margin_left">
                        <p>
                            I am able to innovate at Floretz and offer different activities to children. The learning opportunities are incredible. I like the focus on the Child…for Floretz, the Child is our Customer and everything that we do is for the child. The new School at Sarjapur Road has some of the best facilities that I have seen. I really liked the Play Area that has been imported and built to meet specific age needs of the child. The infrastructure created shows the commitment of Floretz for the Child, the Teaching Staff and its pursuit to create an excellent ecosystem for learning.
                        </p>
                    </div>
                    <span class="name">Soumya GS</span>
                </div></div></div>
                        
                        
                <div class="feedback_box_wr_2"><div class="feedback_box_bottom_2"><div class="feedback_box_top_2">
                    <div class="feedback_content_2">
                        <img src="http://floretz.com/images/photos/Contact-Us-Career/Suguna.jpg" class="pull-left margin_right">
                            <p>
                                Working with children is so fulfilling. Children are very honest, innocent and loving. They have taught me a lot. The individual attention that we are able to give every child is the best part of Floretz. It is great to lead a team of Montessori Adults and I can innovate on the activities that I offer to children.
                            </p>
                    </div>
                    <span class="name">Suguna N</span>        
                </div></div></div>
                        
                        
                <div class="feedback_box_wr"><div class="feedback_box_bottom"><div class="feedback_box_top">
                    <div class="feedback_content">
                        <img src="http://floretz.com/images/photos/Contact-Us-Career/Neelofar.jpg" class="pull-right margin_left">
                        <p>
                            I am strong believer in the Montessori Method. Floretz is a school that does not dilute the Montessori Method. We are also given the freedom to innovate and come up with new ways of working with children. I really enjoy leading a team of Montessori Adults. I am also constantly learning at Floretz. Deepa is a senior Montessorian who has imbibed the principles completely. She guides the team very well and it is fun working with her.
                        </p>
                    </div>
                    <span class="name">Neelofar</span>
                </div></div></div>
                    
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