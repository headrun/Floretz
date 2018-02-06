@extends('layout.frontend.main')
<?php 
	$mainsite='photos'; 
	$page_title = "Floretz Photo Albums";
?> 

@section('CSS')
<style>
    
</style>
@stop

@section('pagedata')
<div class="container" style = "">
	<div class = "row" style = "">
 		<div class='span12' style = 'padding-left: 1em;'>
    		<h3 class='page-header'>{{ $page_title }}</h3>
		</div>
 		<?php
			$access_token="439923416218800|recSnF8zZBN_pagPMPD1geRbEwk";
 
			$fields="id,name,description,link,cover_photo,count";
			$fb_page_id = "277783892406872";
 
			$json_link = "https://graph.facebook.com/v2.3/{$fb_page_id}/albums?fields={$fields}&access_token={$access_token}";

			$json = file_get_contents($json_link);
 
			$obj = json_decode($json, JSON_BIGINT_AS_STRING);
 
			$album_count = count($obj['data']);

			for($x=0; $x<$album_count; $x++){
 
    			$id = isset($obj['data'][$x]['id']) ? $obj['data'][$x]['id'] : "";
    			$name = isset($obj['data'][$x]['name']) ? $obj['data'][$x]['name'] : "";
    			$url_name=urlencode($name);
    			$description = isset($obj['data'][$x]['description']) ? $obj['data'][$x]['description'] : "";
    			$link = isset($obj['data'][$x]['link']) ? $obj['data'][$x]['link'] : "";
 
    			$cover_photo = isset($obj['data'][$x]['cover_photo']) ? $obj['data'][$x]['cover_photo'] : "";
    			// use this for newer access tokens:
    			// $cover_photo = isset($obj['data'][$x]['cover_photo']['id']) ? $obj['data'][$x]['cover_photo']['id'] : "";
    			$count = isset($obj['data'][$x]['count']) ? $obj['data'][$x]['count'] : "";
 
    			// if you want to exclude an album, just add the name on the if statement
    			if($name!=""){
 
        			$show_pictures_link = "viewphotos.php?album_id={$id}&album_name={$name}";

			        echo "<div class='span3' style = 'border: none;margin-bottom:2em;' align= 'center'>";
            			echo "<a href='{$show_pictures_link}'>";
                			echo "<img class='img-responsive' src='https://graph.facebook.com/v2.3/{$id}/picture?access_token={$access_token}' alt='' style  ='border: thin solid #d1d1d1; width: 230px; height: 230px;'>";
            			echo "</a>";
            			echo "<h4 style = 'color: #000'>";
                			echo "<a href='{$show_pictures_link}'>{$name}</a>";
            			echo "</h4>";
 
           				$count_text="Photo";
            			if($count>1){ $count_text="Photos"; }
 
            			echo "<b><p>";
                			echo "<div style = 'color: #E6008B'>{$count} {$count_text} / <a href='{$link}' target='_blank' style = 'color: #0090D5'>View on Facebook</a></div>";
                			echo $description;
            			echo "</p></b>";
        			echo "</div>";
    			}
			}

		?>
	</div>
</div>
@stop


@section('JS')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
@stop