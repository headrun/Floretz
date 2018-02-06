<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Montessori School - Administartor</title>
<link href="css/ext-all.css" rel="stylesheet" type="text/css" />
<link href='css/fullcalendar.css' rel='stylesheet' />
<link href='css/cupertino/jquery-ui-1.9.2.custom.min.css' rel='stylesheet' />
<style type="text/css">
/**Mask**/
.loadmask { z-index: 100;position: absolute;top:0;left:0;-moz-opacity: 0.5;opacity: .50;filter: alpha(opacity=50);background-color: #CCC;width: 100%;height: 100%;zoom: 1; }
.loadmask-msg { z-index: 20001;position: absolute;top: 0;left: 0;border:1px solid #6593cf;background: #c3daf9;padding:2px; }
.loadmask-msg div { padding:5px 10px 5px 25px;background: #fbfbfb url('images/indicator.gif') no-repeat 5px 5px;line-height: 16px;border:1px solid #a3bad9;color:#222;font:normal 11px tahoma, arial, helvetica, sans-serif;cursor:wait; }
.masked { overflow: hidden !important; }
.masked-relative { position: relative !important; }
.masked-hidden { visibility: hidden !important; }
/**/
#calendar { width: 850px;  margin: 0 auto;background-color:#FFF; padding-top:50px; }
/*.fc-other-month .fc-day-number { display:none;}*/
/* css for timepicker */
.ui-timepicker-div .ui-widget-header { margin-bottom: 8px; }
.ui-timepicker-div dl { text-align: left; }
.ui-timepicker-div dl dt { float: left; clear:left; padding: 0 0 0 5px; }
.ui-timepicker-div dl dd { margin: 0 10px 10px 45%; }
.ui-timepicker-div td { font-size: 90%; }
.ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }

.ui-timepicker-rtl{ direction: rtl; }
.ui-timepicker-rtl dl { text-align: right; padding: 0 5px 0 0; }
.ui-timepicker-rtl dl dt{ float: right; clear: right; }
.ui-timepicker-rtl dl dd { margin: 0 45% 10px 10px; }
.grab { cursor: url(https://mail.google.com/mail/images/2/openhand.cur) 8 8, move; }
*.grab { cursor: url(https://mail.google.com/mail/images/2/openhand.cur), move; }
#draggable input,textarea,select { border:1px #CCC solid;  }
#draggable input[type="text"] {  height:22px;}
.err { color:Red;}
.Video { background-color:#0096d6; }
.BrownBag { background-color:#D7410B; }
.ShortArticles { background-color:#822980; }
.CallContent { background-color:#FF0000; }
.NewsFlash { background-color:#000000; }
.fc-event-icon {
	float:left; width:21px; height:17px; padding-right:3px; 	
}
.Holiday { background-color:#e97230; font-size:.95em; color:#000; padding:3px 0px;border:none !important; }
.Other { background-color:#FFEC06; font-size:.95em; color:#000; padding:3px 0px; border:none !important; }
</style>
<script type="text/javascript" src="js/ext-base.js"></script>
<script type="text/javascript" src="js/ext-all.js"></script>
<script type="text/javascript">
Ext.projurl = "<?php echo "http://".$_SERVER['SERVER_NAME'].($_SERVER['SERVER_PORT'] == "80" ? "" : ":".$_SERVER['SERVER_PORT'])."/school"?>";
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/fullcalendar.min.js" type="text/javascript"></script>
<!--<script src="js/jquery-ui-timepicker-addon.js" type="text/javascript"></script>-->
<script src="js/jquery.balloon.min.js" type="text/javascript"></script>
</head>

<body>

<div id="header">
  <div class="api-title">Floretz - ControlPanel</div>
</div>
<div id="menu_bar"></div>
<div id='calendar'></div>


<div style="position:absolute;top:50px;left:20px;z-index:100;display:none;" id="draggable">
 <div style="overflow:hidden;width:462px;padding:10px 0px;" class="grab">
  <div style="float:right;"><img src="images/Close_RGB_blue_NT.png" style="cursor:pointer;" id="evt_close" alt=""/></div>
 </div>
 <div style="width:450px;border:2px #0096d6 solid;background-color:#FFF;padding-left:10px;padding-top:10px;overflow:hidden;">
  <form id="evt_frm" name="evt_frm">
   <div style="text-align:left;overflow:hidden;height:20px;">
     <div style="float:left;color:Red;" id="err"></div>
   </div>
   <div style="text-align:left;overflow:hidden;">
   	 <div style="float:left;width:100px;"><label style="">Event Type <span class="err">*</span></label></div>
     <div style="float:left;">
       <input type="hidden" id="evtid" name="evtid" value=""/>
       <select name="eventtype" id="eventtype" style="width:320px;height:25px;">
       	<option value="Holiday">Holiday</option>
       	<option value="Other">Other</option>
       </select>
     </div>
   </div>
   <div style="text-align:left;overflow:hidden;margin-top:10px;">
     <div style="float:left;width:100px;"><label style="">Title <span class="err">*</span></label></div>
     <div style="float:left;"><input type="text" style="width:320px;" id="title"/></div>
   </div>
   <div style="text-align:left;margin-top:10px;overflow:hidden;">
     <div style="float:left;width:100px;"><label style="">Start Time <span class="err">*</span></label></div>
     <div style="float:left;"><input type="text" style="width:320px;" id="starttime"/></div>
   </div>
   <div style="text-align:left;margin-top:10px;overflow:hidden;">
     <div style="float:left;width:100px;"><label style="">End Time <span class="err">*</span></label></div>
     <div style="float:left;"><input type="text" style="width:320px;" id="endtime"/></div>
   </div>
   <!--<div style="text-align:left;padding-top:10px;">
      <label>Description</label><br />
      <textarea style="width:330px;height:150px;margin-top:5px;" id="description"></textarea>
   </div>-->
   <div style="padding:30px 10px 10px 10px;overflow:hidden;" id="submitblock">
     <div style="float:left;color:Red;"><input type="button" value="Delete Event" id="evt_remove" style="padding:5px 10px;"/></div>
     <div style="float:right;"><input type="button" value="Save Event" id="evt_save" style="padding:5px 10px;"/></div>
   </div>
   </form>
  </div>
</div>
<script type="text/javascript" src="js/adminmenu.js"></script>
<script type="text/javascript" src="js/eventmaster.js"></script>

</body>
</html>
