<?php
	require_once 'action/include/mydb.php';
	$dbo = mydb::getInstance(); $dbo->connect("68.178.217.47","floretz","Qwerty@123","floretz");
	$result = $dbo->Multi_Query("CALL bannerprocedure('selectall','')");
	$banner = array(); $birthday = array(); $news = array();
	$flash = array();
	foreach ($result as $value) {
		if (count($value) == 0) continue;
		$ref = $value[0]["keycolumn"];
		if ($ref == "banner") $banner = $value;
		else if ($ref == "birthday") $birthday = $value;
		else if ($ref == "news") $news = $value;
	}
	foreach($news as $value) {
		array_push($flash,urldecode($value["newscontent"]));
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body {font-family: 'Arial'}
#container { position:relative; width:1080px; background-color:#6cb983; height:415px; margin:0 auto; overflow:hidden; }
/* 	=============================================================
	Slider
	============================================================= */
	#bandiv { width:770px; height:338px; margin-left:20px; position: relative;}
	.rslides {
	  position: relative;
	  list-style: none;
	  overflow: hidden;
	  width: 100%;
	  padding: 0;
	  margin: 0;
	  }
	
	.rslides li {
	  -webkit-backface-visibility: hidden;
	  position: absolute;
	  display: none;
	  width: 100%;
	  left: 0;
	  top: 0;
	  }
	
	.rslides li:first-child {
	  position: relative;
	  display: block;
	  float: left;
	  }
	
	.rslides img {
	  display: block;
	  height: auto;
	  float: left;
	  width: 100%;
	  border: 0;
	  }
	  
	  .callbacks1_nav.next, .callbacks1_nav.prev{
	  	display:inline-block;
		position:absolute;
		top:5%;
		width:50px;
		height:50px;
		background:#333;
		text-indent:-1000em;
		z-index:10;
	  }
	  .callbacks1_nav.prev{
	  	left:0px;
		background:#0ba038 url(images/prev.png) no-repeat center center;
	  }
	 .callbacks1_nav.next{
	  	right:0px;
		background:#0ba038 url(images/next.png) no-repeat center center;
	  }
	  #ban_head { height:40px; width: 770px; background-color:#FFFFFF; margin-top:16px;margin-left:20px; margin-bottom:3px; line-height:40px; text-indent:10px; font-size:24px;color:#6cb983; }
	  #bir_head  { height:40px; width:260px; top:16px; position:absolute; left:801px; background-color:#FFFFFF; line-height:40px; font-size:24px; text-indent:10px; color:#6cb983;}
	  #birthdiv { width:260px; height:233px; position:absolute; left:801px; background:url(images/birthdaybg.png); top:59px; }
	  #announcement { height:49px; width:1080px; background-color:#FFFFFF; margin:0 auto; }
	  #downbg { height:100px; width:1080px; background-color:#eee7bb; margin:auto; }
	  #announce { width:220px; display:block; float:left; font-size:24px; line-height:49px; text-indent:20px; }
	  #birthdaycycle {width:200px;height:174px;margin-left:30px;margin-top:27px;}
	  #birthdaycycle img {display:none;}
	  #flashnews { width: 850px; height:34px; margin-top:8px; background-color:#e5e5e5; float:left; line-height:34px; text-indent:3px; font-size:18px !important;}
	  .marquee { width:850px; }
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="js/responsiveslides.min.js"></script>
<script type="text/javascript" src="js/cycle.js"></script>
<script type="text/javascript" src="js/marquee.js"></script>
<script type="text/javascript">
 $(document).ready(function(e) {
    $("#slider1").responsiveSlides({
					auto: true,
					pager: false,
					nav: true,
					speed: 2000,
					namespace: "callbacks",
					/*before: function () {
					  $('.events').append("<li>before event fired.</li>");
					},
					after: function () {
					  $('.events').append("<li>after event fired.</li>");
					}*/
				  });
    if ($('#birthdaycycle img').length > 0) {
		$('#birthdaycycle img').css('display','');				  
		$('#birthdaycycle').cycle();
	}
	$('.marquee').marquee('pointer').mouseover(function () { $(this).trigger('stop');
	}).mouseout(function () { $(this).trigger('start');
	}).mousemove(function (event) {
		  if ($(this).data('drag') == true) {
			this.scrollLeft = $(this).data('scrollX') + ($(this).data('x') - event.clientX);
		  }
	}).mousedown(function (event) {
		  $(this).data('drag', true).data('x', event.clientX).data('scrollX', this.scrollLeft);
	}).mouseup(function () {
		  $(this).data('drag', false);
	});
});
</script>
</head>

<body>

<div id="container">
    <div id="ban_head">Floretz Photos</div>
    <div id="bandiv">
	<ul class="rslides" id="slider1">
    <?php
		foreach($banner as $value) {
			echo '<li><img src="upload/'.$value["imagepath"].'" alt=""></li>'."\n";
		}
	?>
    </ul>
    </div>
    <div id="bir_head">Birthday Corner</div>
    <div id="birthdiv">
      <div id="birthdaycycle">
      <?php
	  	foreach ($birthday as $value) {
			echo '<img src="upload/'.$value["imagepath"].'" width="200" height="174" alt=""/>'."\n";
		}
	  ?>
      </div>
    </div>
</div>
<div id="announcement"><span id="announce">Announcements</span><div id="flashnews"><div class="marquee"><?php echo join(";",$flash)?></div></div></div>
<div id="downbg"></div>
</body>
</html>