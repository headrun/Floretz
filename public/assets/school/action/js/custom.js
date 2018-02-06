$('html').domReady(function() {
	$('body').prepend($('<div id="mask"></div><div id="popup"><div style="width:100%;" class="close"><a id="closepopup" class="closenew">Exit</a></div><div id="popcontent"></div></div>'));
	//$('#leftNav').next().next().click(function() {
	$('#calpopup').click(function() {
		showPopup('<div style="padding-top:60px;"><img src="http://intranet.hp.com/tsg/ww/ess/tce/EGQuality/egqc/AllImages/ImageBlock/CommunicationRoadmap.png" width="1000" height="531" alt=""/></div>');
	});
});
function showPopup(content) {
	$('#popcontent').html(content);
	$(".close").hide();
	$("#mask").fadeTo(1000, 0.75);
    $(window).scrollTop(0);
    $("#popup").show();$("#popup").addClass('showPopup');
    $("#popup").css({top: '100px',left: '50%','margin-left':'-500px'});
    $("#popup").show();
	$(".close").show();
						
	$("#closenew").mouseover(function(){
		$(this).css("background-position","center left");
	}).mouseout(function(){
		$(this).css("background-position","top left");
	});							
	$("#closepopup").click(function() {
		$("#popup").hide();
		$("#mask").hide();
		$(".close").hide();
		$('#popcontent').html('');
	});
}
