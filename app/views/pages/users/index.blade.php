@extends('layout.frontend.main')
<?php 
$mainsite='home';
 ?> 

@section('CSS')
<link href="{{url()}}/assets/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="{{url()}}/assets/owl-carousel/owl.theme.css" rel="stylesheet">

<style type="text/css">
    #bottom-slider .item{
        margin: 3px;
    }
    #bottom-slider .item img{
        display: block;
        width: 220px;
        height: 146px;
    }
    .item{
        width: 220px;
        height: 165px;
    }  

    #phone{
        width: 275px;
        height: 95px; 
        margin-top: 0.8em; 
        background-image:url('{{url()}}/assets/images/bee_phone.png'); background-repeat:no-repeat; background-color: #efefc9;
    }    
    #phone span{
       color: #0ba038; 
       margin-left: 95px; 
       font-size: 20px; 
       font-weight:bold; 
    }
    #ourProgramHeading {
        background: none; 
        margin-right: 5px; 
        font-size: 24px; 
        color: #57A038; 
        padding: 10px 0 10px;
    }
    #programImage {
        padding: 14px 0 14px 10px;
    }
    #bannerRightHeading{
        margin-right: 5px; 
        font-size: 24px; 
        color: #57A038; 
        padding: 10px 0 10px
    }

    .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 26px;
            height: 26px;
            background: url('{{url()}}/assets/images/b05.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

        .jssora12l, .jssora12r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 56px;
            cursor: pointer;
            background: url('{{url()}}/assets/images/a12.png') no-repeat;
            overflow: hidden;
        }
        .jssora12l { background-position: -16px -37px; }
        .jssora12r { background-position: -75px -37px; }
        .jssora12l:hover { background-position: -136px -37px; }
        .jssora12r:hover { background-position: -195px -37px; }
        .jssora12l.jssora12ldn { background-position: -256px -37px; }
        .jssora12r.jssora12rdn { background-position: -315px -37px; }
</style>
@stop

@section('pagedata')

<?php 
//------------------- logic for Announcememnts ---------------//
$announce = '';
for($i = 0; $i < count($allAnnouncements['data']); $i++){ 
    if($i == count($allAnnouncements['data'])-1){
        $announce .= $allAnnouncements['data'][$i]['content'];   
    }
    else{
        $announce .= $allAnnouncements['data'][$i]['content']." || ";      
    }
}
$final = strip_tags($announce);
//------------------- logic for Announcememnts End---------------//

//------------------- logic for Parent Speaks ---------------//
for($i = 0; $i < count($allAllParentSpeaks); $i++){ 
        $speaks = $allAllParentSpeaks[$i]['parent_comments'];
        $parentNames = $allAllParentSpeaks[$i]['name'];   
}
//------------------- logic for Parent Speaks End---------------//
?>
<div class="container_wr">
    <div class = "container">
    <div style = "background: #0BA038;">
        <div class = "row" style = "padding: 1em 1em 0 1em">
            <div class = "span8.2" style = "height: 365px;">
                <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1000px; height: 500px; overflow: hidden; visibility: hidden;">
        
                    <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1000px; height: 500px; overflow: hidden;">
                    <?php
                        for($i = 0; $i < count($BannerImagesForHomepage['data']); $i++){ 
                            $image = $BannerImagesForHomepage['data'][$i]['image_path'];
                    ?>
                        <div data-p="112.50" style="display: none;">
                            <img data-u="image" src="{{url()}}/{{$image}}" />
                        </div>
                    <?php } ?>        
                    </div>
                    <!-- Bullet Navigator -->
                    <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
                    <!-- bullet navigator item prototype -->
                        <div data-u="prototype" style="width:16px;height:16px;"></div>
                    </div>
                    <!-- Arrow Navigator -->
                    <span data-u="arrowleft" class="jssora12l" style="top:0px;left:0px;width:30px;height:46px;" data-autocenter="2"></span>
                    <span data-u="arrowright" class="jssora12r" style="top:0px;right:0px;width:30px;height:46px;" data-autocenter="2"></span>
                </div>
            </div>
            <div class = "span2.8" style = "border:none">
                <center><span style = "color: #fff; font-size:18px; font-style: italic; cont-weight: bold">Birthday Images</span></center>
                <ul class="rslides" id="slider1">
                    <?php
                        for($i = 0; $i < count($BirtdayImagesForHomepage['data']); $i++){ 
                            $image = $BirtdayImagesForHomepage['data'][$i]['image_path'];
                    ?>
                    <li>
                        <img src="{{url()}}/{{$image}}" style = "width: 275px; height: 225px;"><br>
                    </li>
                    <?php } ?>
                </ul>
                <div id = "phone">
                        <span><br></span>
                        <span>+91-80-22580019</span><br>
                        <span>+91-80-42134819</span><br>
                        <span>+91 98451 32819</span><br>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class = "row" style = "padding-left: 11%; margin: 5px">
            <div class = "span2" style = "background: #F7F7F7; font-size: 24px; padding-top: 10px; padding-bottom: 10px;" ><span>Announcements</span></div>
            <div class = "span10" style = "background: #E5E5E5; padding-top: 10px; padding-bottom: 5px;font-size: 20px;"><marquee onmouseover="this.stop();" onmouseout="this.start();"><b>{{$final}}</b></marquee></div>
        </div>
    <div class="container_container" style = "background: #EEE7BB"><br>
       <div class="container">
          <div class = "row">
            <div class = "span6" >
              <div style = "padding-left: 20px;">
                <div class = "row" >
                    <div class = "span3" id = "ourProgramHeading">Our Programs</div>
                </div>
                <div class = "row" style = "background: #77D0DE" align = "center">
                    <div class = "span1" id = "programImage"><img src="http://floretz.com/images/ourprogram1.jpg"></div>
                    <div class = "span4" style = "padding: 25px"><a href = "program/toddler-montessori" style = "font-size: 25px; color: #605151">Toddler Montessori Program<br> (2 to 2 ½ years of age)</a></div>
                </div>
                <div class = "row" style = "background: #C7F845" align = "center">
                    <div class = "span1" id = "programImage"><img src="http://floretz.com/images/ourprogram2.jpg"></div>
                    <div class = "span4" style = "padding: 25px;"><a href = "program/primary-montessori" style = "font-size: 25px; color: #605151">Primary Montessori Program<br> (2 to 2 ½ years of age)</a></div>
                </div>
                <div class = "row" style = "background: #EFCC4C" align = "center">
                    <div class = "span1" id = "programImage"><img src="http://floretz.com/images/ourprogram3.jpg"></div>
                    <div class = "span4" style = "padding: 25px;"><a href = "program/postschoolcare-activitycenter" style = "font-size: 25px; color: #605151">Post School Care & <br> Activity Center</a></div>
                </div>
               </div> 
            </div>
            

            <div class = "span6" >
              <div style = "padding-left: 20px;">
                <div class = "row" style = "">
                    <div class = "span2" id = "bannerRightHeading">School Events</div>
                    <div class = "span2" style = "padding-top: 10px; float: right"><a href="calendar" class = "btn" style = "color: #fff;float: right; margin-right: 10px; background: #51A351; font-size: 13px; padding: 2px">More Events</a></div>
                </div>
                <div class = "row" style = "background: #4F4F4D; height: 120px;">
                    
                        <marquee direction="up" scrolldelay = "2" onmouseover="this.stop();" onmouseout="this.start();">
                        <ul style = "color: #fff; height: 110px">    
                        <?php
                        for($i = 0; $i < count($allEventsForCalendar); $i++){ 
                            $title = $allEventsForCalendar[$i]['title'];
                            $start = $allEventsForCalendar[$i]['eventstart'];
                            $end = $allEventsForCalendar[$i]['eventend'];
                        ?>
                        <li> &nbsp;{{$title}} &nbsp;-&nbsp; {{$start}} &nbsp;-&nbsp; {{$end}}   </li>
                        <?php } ?>
                         </ul>
                        </marquee>
                   

                </div>

                <div class = "row" >
                    <div class = "span2" id = "bannerRightHeading">Parents Speak</div>
                    <div class = "span2" style = "padding-top: 10px; float: right"><a href="parentscorner/feedback" class = "btn" style = "color: #fff;float: right; margin-right: 10px; background: #51A351;  font-size: 13px; padding: 2px">Read All</a></div>
                </div>
                <div class = "row" style = "background: #E8FB87; height: 134px;">
                    <ul class="rslides" id="slider3">
                        <?php
                        for($i = 0; $i < count($allAllParentSpeaks); $i++){ 
                            $speaks = $allAllParentSpeaks[$i]['parent_comments'];
                            $parentNames = $allAllParentSpeaks[$i]['name'];
                        ?>
                        <li>
                            <div style = "padding: 7px; fon-size: 10px;">
                                <span  style = "font-size: 15px;">{{$speaks}}...</span><br>
                                <span style = "float: right; color: #FD9F0B; margin-right: 10px;">{{$parentNames}}</span>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                                
               </div> 
            </div>
        </div>
        <div style = "background: #EEE7BB">
            {{ $page["page_data"] }}
        
            <div  class="row gallery_container">
                <div class="span6" style="position:relative"><h2 class="fz_heading1">Photo Gallery</h2></div>
                <div class="span6" style="position:relative"><a href="photos" class = "pull-right" style = "font-size: 18px; margin-right: 2em; margin-top: 1em">more photos</a></div>
                    <div class="span12" style="position:relative">
                
                <div id="bottom-slider" >
                        <div class="item"><img   width="220px" height= "146px"  src="{{url()}}/assets/images/gallery_thumbnail/floretz-01.JPG" alt="floretz"></div>
                        <div class="item"><img   width="220px" height= "146px"  src="{{url()}}/assets/images/gallery_thumbnail/floretz-02.JPG" alt="floretz"></div>
                        <div class="item"><img   width="220px" height= "146px"  src="{{url()}}/assets/images/gallery_thumbnail/floretz-03.JPG" alt="floretz"></div>
                        <div class="item"><img   width="220px" height= "146px"  src="{{url()}}/assets/images/gallery_thumbnail/floretz-04.JPG" alt="floretz"></div>
                        <div class="item"><img   width="220px" height= "146px"  src="{{url()}}/assets/images/gallery_thumbnail/floretz-05.JPG" alt="floretz"></div>
                        <div class="item"><img   width="220px" height= "146px"  src="{{url()}}/assets/images/gallery_thumbnail/floretz-06.JPG" alt="floretz"></div>
                        <div class="item"><img   width="220px" height= "146px"  src="{{url()}}/assets/images/gallery_thumbnail/floretz-07.JPG" alt="floretz"></div>
                        <div class="item"><img   width="220px" height= "146px"  src="{{url()}}/assets/images/gallery_thumbnail/floretz-08.JPG" alt="floretz"></div>
                        <div class="item"><img   width="220px" height= "146px"  src="{{url()}}/assets/images/gallery_thumbnail/floretz-09.JPG" alt="floretz"></div>
                        <div class="item"><img   width="220px" height= "146px"  src="{{url()}}/assets/images/gallery_thumbnail/floretz-10.JPG" alt="floretz"></div>
 
                </div>
                  
                        
                    </div>
                </div> 
            </div>         
       </div>
    </div>
</div>

@stop

@section('JS')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{url()}}/assets/js/responsiveslides.min.js"></script>
<script src="{{url()}}/assets/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{url()}}/assets/js/jssor.slider.min.js"></script>


<script>
        jQuery(document).ready(function ($) {
            
            var jssor_1_SlideshowTransitions = [
              {$Duration:1200,$Opacity:2}
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 730);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>





<script type="text/javascript">

$(document).ready(function() {
 
  $("#bottom-slider").owlCarousel({
 
      autoPlay: 5000, //Set AutoPlay to 5 seconds
      items : 4,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3]
 
  });
 
});



$(function () {
    // Slideshow 4
    $("#slider3").responsiveSlides({
        auto: true,
        pager: false,
        nav: false,
        speed: 600,
        namespace: "callbacks",
        before: function () {
            $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
            $('.events').append("<li>after event fired.</li>");
        }
    });

   /* $("#slider2").responsiveSlides({
        auto: true,
        pager: false,
        nav: false,
        speed: 600,
        namespace: "callbacks",
        before: function () {
            $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
            $('.events').append("<li>after event fired.</li>");
        }
    });*/

    $("#slider1").responsiveSlides({
        auto: true,
        pager: false,
        nav: false,
        speed: 600,
        namespace: "callbacks",
        before: function () {
            $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
            $('.events').append("<li>after event fired.</li>");
        }
    });
});
</script>

@stop





