@extends('layout.frontend.main')
<?php 
    $mainsite='viewphotos'; 
    $album_id = isset($_GET['album_id']) ? $_GET['album_id'] : die('Album ID not specified.');
    $album_name = isset($_GET['album_name']) ? $_GET['album_name'] : die('Album name not specified.');
    
    $page_title = "{$album_name} Photos";
?> 

@section('CSS')

<!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> -->
<!-- blue imp gallery -->
<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<link rel="stylesheet" href="Bootstrap-Image-Gallery-3.1.1/css/bootstrap-image-gallery.min.css">
<style>
    .photo-thumb{
        width:230px;
        height:230px;
        border: thin solid #d1d1d1;
        margin: 0 0 2em 0;
    }
 
    div#blueimp-gallery div.modal {
        overflow: visible;
    }

</style>
@stop

@section('pagedata') 
<div class="container" >
    <?php
        echo "<h3 class='page-header'>";
            echo "<a href='photos' style = 'color: #E6008B'>Albums</a> / {$page_title}";
        echo "</h3>";

        echo "<div class = 'row' align = 'center'>";
        $access_token="439923416218800|recSnF8zZBN_pagPMPD1geRbEwk";
        $json_link = "https://graph.facebook.com/v2.3/{$album_id}/photos?fields=source,name&access_token=439923416218800|recSnF8zZBN_pagPMPD1geRbEwk";
        //echo $json_link;
        $json = file_get_contents($json_link);
 
        $obj = json_decode($json, JSON_BIGINT_AS_STRING);
        //echo var_dump($obj);
        $photo_count = count($obj['data']);

        for($x=0; $x<$photo_count; $x++){

            $img = $obj['data'][$x]['source'];
        ?>
            <div class = "span3">
            <a href='{{$img}}' data-gallery >
                <div class='photo-thumb' style='background: url({{$img}}) 50% 50% no-repeat;'>
                   
                </div>
            </a>
            </div>


  <?php  } ?>
          </div>
</div>
 
<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev"></a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('JS')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <script src="Bootstrap-Image-Gallery-3.1.1/js/bootstrap-image-gallery.min.js"></script>
    
    <script>
        $('#blueimp-gallery').data('useBootstrapModal', false);
        $('#blueimp-gallery').toggleClass('blueimp-gallery-controls', true);
    </script>
@stop
 
