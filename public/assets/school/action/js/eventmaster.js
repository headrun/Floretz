(function(a){a.fn.mask=function(c,b){a(this).each(function(){if(b!==undefined&&b>0){var d=a(this);d.data("_mask_timeout",setTimeout(function(){a.maskElement(d,c)},b))}else{a.maskElement(a(this),c)}})};a.fn.unmask=function(){a(this).each(function(){a.unmaskElement(a(this))})};a.fn.isMasked=function(){return this.hasClass("masked")};a.maskElement=function(d,c){if(d.data("_mask_timeout")!==undefined){clearTimeout(d.data("_mask_timeout"));d.removeData("_mask_timeout")}if(d.isMasked()){a.unmaskElement(d)}if(d.css("position")=="static"){d.addClass("masked-relative")}d.addClass("masked");var e=a('<div class="loadmask"></div>');if(navigator.userAgent.toLowerCase().indexOf("msie")>-1){e.height(d.height()+parseInt(d.css("padding-top"))+parseInt(d.css("padding-bottom")));e.width(d.width()+parseInt(d.css("padding-left"))+parseInt(d.css("padding-right")))}if(navigator.userAgent.toLowerCase().indexOf("msie 6")>-1){d.find("select").addClass("masked-hidden")}d.append(e);if(c!==undefined){var b=a('<div class="loadmask-msg" style="display:none;"></div>');b.append("<div>"+c+"</div>");d.append(b);b.css("top",Math.round(d.height()/2-(b.height()-parseInt(b.css("padding-top"))-parseInt(b.css("padding-bottom")))/2)+"px");b.css("left",Math.round(d.width()/2-(b.width()-parseInt(b.css("padding-left"))-parseInt(b.css("padding-right")))/2)+"px");b.show()}};a.unmaskElement=function(b){if(b.data("_mask_timeout")!==undefined){clearTimeout(b.data("_mask_timeout"));b.removeData("_mask_timeout")}b.find(".loadmask-msg,.loadmask").remove();b.removeClass("masked");b.removeClass("masked-relative");b.find("select").removeClass("masked-hidden")}})(jQuery);
function pad(num) {
	var norm = Math.abs(Math.floor(num));
	return (norm < 10 ? '0' : '') + norm;
};
function formatLocalDate(dtobj) {
	var local = dtobj;
	var tzo = -local.getTimezoneOffset();
	var sign = tzo >= 0 ? '+' : '-';
	return local.getFullYear() 
		+ '-' + pad(local.getMonth()+1)
		+ '-' + pad(local.getDate())
		+ 'T' + pad(local.getHours())
		+ ':' + pad(local.getMinutes()) 
		+ ':' + pad(local.getSeconds()) 
		+ sign + pad(tzo / 60) 
		+ ':' + pad(tzo % 60);
}

$('#calendar').fullCalendar({
	header: {
		left: 'prev,next today',
		center: 'title',
		right: 'month'
	},
	//defaultView: 'basicDay',
	selectable: true,
	selectHelper: true,
	editable: true,
	theme: true,
	eventClick: function(calEvent, jsEvent, view) {
		document.forms['evt_frm'].reset();
		document.getElementById('evtid').value = '';
		var cal = $('#calendar'),offset = cal.offset(), drag = $('#draggable'); Ext.get('calendar').mask();
		drag.css({left: (offset.left+20)+'px',top: (offset.top+20)+'px',display: ''});
		$('#evtid').val(calEvent.id);
		$('#eventtype').val(calEvent.className);
		$('#title').val(calEvent.otitle);
		$('#starttime').datepicker('setDate',calEvent.start );
		$('#endtime').datepicker('setDate',calEvent.end);
		calEvent.title = 'sssssssssssss';
		Ext.tempEvent = calEvent;
	},			
	eventRender: function(event, element) {
		//var ele = $(element), type = event.title;
		//ele.attr('title',event.otitle).balloon({position: 'right',css: {opacity: "1",backgroundColor: colors[type],padding: '10px',color: '#FFF','font-size':'14px;','font-weight':'bold'}});
		//ele.find('div.fc-event-inner').prepend('<div class="fc-event-icon"><img src="images/'+type+'.png" width="21" height="17"/></div>');
	},
	events: function(start, end, callback) {
		var dtarr = $('.fc-header-title h2').text().split(' ');
		var date = new Date(dtarr[1]+"/"+dtarr[0]+"/1"), y = date.getFullYear(), m = date.getMonth();
		var firstDay = new Date(y, m, 1);
		var lastDay = new Date(y, m + 1, 0);
		//var startdt = firstDay.getFullYear()+(firstDay.getMonth()+1 < 10 ? "0" : "")+(firstDay.getMonth()+1)+(firstDay.getDate() < 10 ? "0" : "")+firstDay.getDate();
		//var enddt = lastDay.getFullYear()+(lastDay.getMonth()+1 < 10 ? "0" : "")+(lastDay.getMonth()+1)+(lastDay.getDate() < 10 ? "0" : "")+lastDay.getDate();
		Ext.get('calendar').mask('Loading...','x-mask-loading');
		new Ext.data.Connection().request({
			url: Ext.projurl+'/action/adminfloretz.php?m=commonDbCall',method: 'POST',
			params: {resulttype: 'single',query: 'CALL eventprocedure(\'search\',\'<row start="'+firstDay.format('Ymd')+'" end="'+lastDay.format('Ymd')+'"/>\')'},
			success: function(res) {
				var rows = Ext.decode(res.responseText).Rows, events = [];
				for (var i=0,nd; nd = rows[i++];) {
					events.push({id: nd.recid,title: nd.eventtitle,start: nd.eventstart,end: nd.eventend,className: nd.eventtype,otitle: nd.eventtitle });
				}
				callback(events);
				Ext.get('calendar').unmask();
			}
		});
		
		//alert(firstDay);
		//alert(lastDay);

		/*$('#calendar').mask('Loading...');
		var request = '<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">\
		<soap:Body><GetListItems xmlns="http://schemas.microsoft.com/sharepoint/soap/">\
		<listName>Editorial_Calendar</listName>\
		<viewName></viewName><query><Query><Where>\
		<And>\
		<Leq><FieldRef Name="YearMonthStart"></FieldRef><Value Type="Number">'+startdt+'</Value></Leq>\
		<Geq><FieldRef Name="YEarMonthEnd"></FieldRef><Value Type="Number">'+enddt +'</Value></Geq>\
		</And>\
		</Where></Query></query><viewFields></viewFields><rowLimit>0</rowLimit><queryOptions><QueryOptions></QueryOptions></queryOptions></GetListItems></soap:Body></soap:Envelope>'
		$.ajax({
			type: "POST",async: true,
			url: 'http://intranet.hp.com/tsg/ww/ess/tce/EGQuality/egqc/_vti_bin/Lists.asmx?dt='+new Date().getTime(),data: request,
			contentType: "text/xml; charset=utf-8",dataType: "xml",
			success: function (content, txtFunc, xhr) {
				var rows = $(content).find('z\\:row,row'), events = [];
				for (var i=0, row; row = rows[i++];) {
					var nd = $(row);
					var edtime =  new Date(nd.attr('ows_EndTime'));
					events.push({id: nd.attr('ows_ID'),title: nd.attr('ows_EventType'),start: new Date(nd.attr('ows_StartTime')),end: edtime, endtime: edtime,allDay: false,description: nd.attr('ows_Description'),otitle: nd.attr('ows_Title'),className: nd.attr('ows_EventType') });
				}
				callback(events);
				$('#calendar').unmask();
			}
		});*/
	}
});

//$('#starttime').datetimepicker();
$( "#starttime" ).datepicker({dateFormat: 'yy-mm-dd'});
$( "#endtime" ).datepicker({dateFormat: 'yy-mm-dd'});
//$('#endtime').datetimepicker();
$('#draggable').draggable();
$('.fc-button-month').hide();

$('.fc-header-right').prepend('<span class="fc-button ui-state-default ui-corner-left ui-corner-right ui-state-active" id="addevent">Add Event</span>');
$('#addevent').click(function() {
    document.forms['evt_frm'].reset(); document.getElementById('evtid').value = '';
    var cal = $('#calendar'),offset = cal.offset(), drag = $('#draggable'); Ext.get('calendar').mask();
    drag.css({left: (offset.left+20)+'px',top: (offset.top+20)+'px',display: ''});
});
$('#evt_remove').click(function() {
	//alert($('#evtid').val())
	Ext.Msg.show({title:'Confirm?',msg: 'Are you sure to delete this event?',buttons: Ext.Msg.YESNO,fn: function(bool) {
		var id = $('#evtid').val(); $('#evt_close').trigger('click');
		Ext.get('calendar').mask('Removing...','x-mask-loading');
		new Ext.data.Connection().request({
			url:  Ext.projurl+'/action/adminfloretz.php?m=commonDbCall',method: 'post',params: {resulttype: 'single',query: 'CALL eventprocedure(\'removeevent\',\'<row recid="'+id+'"/>\')'},
			success: function(res) {
				$('#calendar').fullCalendar( 'removeEvents',[id]);
				Ext.get('calendar').unmask();
			}
		});
	},icon: Ext.MessageBox.QUESTION});
});
$('#evt_close').click(function() { $('#draggable').css('display','none'); Ext.get('calendar').unmask(); document.forms['evt_frm'].reset(); $('#err').empty(); });

function showError(err) {
	$('#err').html(err);
	var l = 20; for( var i = 0; i < 6; i++ ) $( "#draggable" ).animate( { 'margin-left': "+=" + ( l = -l ) + 'px' }, 50);    
};

function addUpdateList(crrid,title,start,end,type) {
	var s = new Date(start),e = new Date(end);
	Ext.get('calendar').mask('Saving...','x-mask-loading');
	new Ext.data.Connection().request({
		url:  Ext.projurl+'/action/adminfloretz.php?m=commonDbCall',method: 'post',params: {resulttype: 'single',query: 'CALL eventprocedure(\''+(crrid == '' ? 'addevent' : 'updateevent')+'\',\'<row eventstart="'+s.format('Ymd')+'" eventend="'+e.format('Ymd')+'" eventtype="'+type+'" recid="'+crrid+'" eventtitle="'+title+'"/>\')'},
		success: function(res) {
			var res = Ext.decode(res.responseText).Rows;
			if (crrid == '') {
				$('#calendar').fullCalendar('renderEvent',{id: res[0].newkey,title: title,start: start,end: e,className: type,otitle: title});
			} else {
				var evt = Ext.tempEvent;
				evt.title = title; evt.start = start; evt.end = e; evt.className = type; evt.otitle = title;
				$('#calendar').fullCalendar('updateEvent',evt);
				Ext.tempEvent = '';
			}
			Ext.get('calendar').unmask();
		}
	});
}

$('#evt_save').click(function() {
	var stime = $.trim($('#starttime').val()),etime = $.trim($('#endtime').val()),title = $.trim($('#title').val());
	if (stime === '' || etime === '' || title === '') {
	   showError('* Please fill the required fields');
		return; 
	}
	//var fdate = new Date(stime), edate = new Date(etime), desc = $('#description').val(), evt_name = $('#eventname').val(),evt_type = $('#eventtype option:selected').val();
	var fdate = new Date(stime), edate = new Date(etime), evt_name = $('#eventname').val(),evt_type = $('#eventtype option:selected').val();
	if (fdate > edate) { showError('Invalid date time range'); return; }
	$('#draggable').css('display','none');
	addUpdateList($('#evtid').val(),title,stime,etime,evt_type);
});