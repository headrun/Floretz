Ext.ux.MonthPickerPlugin=function(){function e(){return o=Date.defaults.d,Date.defaults.d=1,!0}function t(e){return Date.defaults.d=o,e}function n(){var e=a.menu.picker;e.activeDate=e.activeDate.getFirstDateOfMonth(),e.value&&(e.value=e.value.getFirstDateOfMonth()),e.showMonthPicker(),e.disabled||(e.monthPicker.stopFx(),e.monthPicker.show(),e.mun(e.monthPicker,"click",e.onMonthClick,e),e.mun(e.monthPicker,"dblclick",e.onMonthDblClick,e),e.onMonthClick=e.onMonthClick.createSequence(c),e.onMonthDblClick=e.onMonthDblClick.createSequence(i),e.mon(e.monthPicker,"click",e.onMonthClick,e),e.mon(e.monthPicker,"dblclick",e.onMonthDblClick,e))}function c(e,t){var n=new Ext.Element(t);if(n.is("button.x-date-mp-cancel"))a.menu.hide();else if(n.is("button.x-date-mp-ok")){var c=a.menu.picker;c.setValue(c.activeDate),c.fireEvent("select",c,c.value)}}function i(e,t){var n=new Ext.Element(t);if(n.parent()&&(n.parent().is("td.x-date-mp-month")||n.parent().is("td.x-date-mp-year"))){var c=a.menu.picker;c.setValue(c.activeDate),c.fireEvent("select",c,c.value)}}var a,o;this.init=function(c){a=c,a.onTriggerClick=a.onTriggerClick.createSequence(n),a.getValue=a.getValue.createInterceptor(e).createSequence(t),a.beforeBlur=a.beforeBlur.createInterceptor(e).createSequence(t)}};
Ext.preg('monthPickerPlugin', Ext.ux.MonthPickerPlugin);

Ext.override(Ext.grid.GridPanel,{
	moveSelectedRow: function(direction) {
		var record = this.getSelectionModel().getSelected();
		if (!record) { return; }
		var index = this.getStore().indexOf(record);
		var old_idx = index;
		if (direction < 0) {
			index--;
			if (index < 0) { return; }
		} else {
			index++;
			if (index >= this.getStore().getCount()) { return; }
		}
		this.getStore().remove(record);
		this.getStore().insert(index, record);
		this.getSelectionModel().selectRow(index, true);
	}
});
birthWin =  Ext.extend(Ext.Window, {
	title: 'Birtday Master',width: 900,height: 550,
	layout: 'border',
	closable: false,idx: -1,id_ref: 0,resizable: false,
	initComponent: function() {
		var winref = this;
		function moveUpDown() {
			picGrid.moveSelectedRow(this.key);
		};
		function loadGrid() {
			var grid = winref.get(0);
			grid.body.mask('Loading...','x-mask-loading'); 
			new Ext.data.Connection().request({
				url: Ext.projurl+'/action/adminfloretz.php?m=getCommonCall&option=birthdaysearch&month='+parseInt(winref.getTopToolbar().get(1).getValue().format('m'),10),
				success: function(res) {
					var result = Ext.decode(res.responseText);
					this.getStore().loadData(result.Rows);
					picGrid.getStore().removeAll();
					this.body.unmask();
				},scope:grid
			});
		};
		this.on('show',function() {
			loadGrid();
		});
		function addBirthday() {
			var pgrd = winref.get(1);
			var firstday = winref.getTopToolbar().get(1).getValue();
			var lastday = new Date(firstday.getFullYear(), firstday.getMonth() + 1, 0)
			picGrid.store.removeAll();
			var upwin = new Ext.Window({
				width: 600,
				title: 'Birtday upload',modal: true,
				/*listeners: {
					show: function() { this.get(0).get(0).setValue(''); }
				},*/
				items: new Ext.form.FormPanel({
					autoHeight: true,labelWidth: 80, defaults: {anchor: '95%'},frame: true,fileUpload: true,
					items: [{
						xtype: 'datefield',ctCls: 'spaces',fieldLabel: 'Birthday Date',anchor: '40%',format: 'Y-M-d',value: firstday,minValue: firstday,maxValue: lastday,
					},{
						xtype: 'fileuploadfield', id: 'photo1',emptyText: 'Select an image', fieldLabel: 'Photo 1',ctCls: 'spaces',
            			name: 'files[]', buttonText: 'Browse...'//, buttonCfg: { iconCls: 'upload-icon' }
					},{
						xtype: 'fileuploadfield', id: 'photo2',emptyText: 'Select an image', fieldLabel: 'Photo 2',ctCls: 'spaces',
            			name: 'files[]', buttonText: 'Browse...'//, buttonCfg: { iconCls: 'upload-icon' }
					},{
						xtype: 'fileuploadfield', id: 'photo3',emptyText: 'Select an image', fieldLabel: 'Photo 3',ctCls: 'spaces',
            			name: 'files[]', buttonText: 'Browse...'//, buttonCfg: { iconCls: 'upload-icon' }
					},{
						xtype: 'fileuploadfield', id: 'photo4',emptyText: 'Select an image', fieldLabel: 'Photo 4',ctCls: 'spaces',
            			name: 'files[]', buttonText: 'Browse...'//, buttonCfg: { iconCls: 'upload-icon' }
					},{
						xtype: 'fileuploadfield', id: 'photo5',emptyText: 'Select an image', fieldLabel: 'Photo 5',ctCls: 'spaces',
            			name: 'files[]', buttonText: 'Browse...'//, buttonCfg: { iconCls: 'upload-icon' }
					},{
						xtype: 'hidden',id: 'shortdatestring'
					},{
						xtype: 'hidden',id: 'shortdate'
					},{
						xtype: 'hidden',id: 'shortmonth'
					}],
					bbar: ['->',{text: 'Save',iconCls: 'plus',handler: function() {
						var frm = upwin.get(0),seldate = frm.get(0).getValue();
						frm.get('shortdate').setValue(seldate.format('md').replace('0',''));
						frm.get('shortmonth').setValue(parseInt(seldate.format('m'),10));
						frm.get('shortdatestring').setValue(seldate.format('md'));
						upwin.get(0).getForm().submit({
							url: Ext.projurl+'/action/adminfloretz.php?m=birthdayUpload',
							waitMsg: 'Uploading photos...',
							success: function(fp, o) {
								var res = o.result;
								var ids = res.key.split(','), img = res.img.split(','), dtstring = frm.get('shortdatestring').getValue();
								var store = pgrd.getStore(), allrec = [];
								for (var i=0,nd; nd = ids[i++];) {
									var r = new store.recordType({'recid': nd,'birthdayshort': dtstring,'imagepath': Ext.projurl+'/upload/'+img[i-1]}, nd);
									allrec.push(r);
								}
								store.add(allrec);
								var upgrid = winref.get(0), uprec = upgrid.getStore().getById(dtstring);
								if (uprec === undefined) {
									upgrid.store.add( new upgrid.store.recordType({'recid': dtstring,'totalcnt': (i - 1)+' birthday','eventdate': seldate.format('Y-M-d')}), dtstring);
								} else {
									uprec.set('totalcnt',store.getRange().length+' birthday');
									uprec.commit();
								}
								upwin.close(true);
							}
						});
					}}]
				})
			});
			upwin.show();
			
		};
		this.tbar = [' Select Date',{xtype: 'datefield',format: 'Y-M',plugins: 'monthPickerPlugin',value: new Date(),listeners: {
			select: function(dt) {
				loadGrid();
			}
		}},'-',{text: 'Search',iconCls: 'abc'},'->',{text: 'Add Birtday',iconCls: 'abc',handler: addBirthday}];
		detailPanel = new Ext.grid.GridPanel({
			region: 'center',
			listeners: {
				cellclick: function(g, r, c) {
					if (c < 2) return;
					var prewin = winref.get(1);
					prewin.body.mask('Loading...','x-mask-loading');
					new Ext.data.Connection().request({
						url: Ext.projurl+'/action/adminfloretz.php?m=getCommonCall&option=bithdayimages&url='+Ext.projurl+'/upload/&recid='+g.getStore().getAt(r).data.recid,
						success: function(res) {
							prewin.getStore().loadData(Ext.decode(res.responseText).Rows);
							prewin.body.unmask();
						}
					});
					//picGrid.getStore().loadData([{recid: 1,imagepath: 'images/birthday.png'},{recid: 2,imagepath: 'images/birthday.png'},{recid: 3,imagepath: 'images/birthday.png'}])
				}
			},
			store: new Ext.data.JsonStore({fields: ['recid','totalcnt','eventdate'],idProperty: 'recid'}),
			columns: [
				{header: 'Date',dataIndex: 'eventdate',width: 120,css: 'font-weight:bold;color:#0096d6;'},
				{header: 'Total Birtday',width: 120,dataIndex: 'totalcnt',css: 'font-weight:bold;'},
				{dataIndex: 'recid',header: 'View',align: 'center',width: 40,renderer: function(val,meta) { meta.css = "srhico"; }}
			]
		});
		picGrid = new Ext.grid.GridPanel({
			region: 'east',split: true,width: 560,
			//bbar:['->',{text: 'Move Down',iconCls: 'movedown',handler: moveUpDown,key: 1},'-',{text: 'Move Up',iconCls: 'moveup',handler: moveUpDown,key: -1}],
			listeners: {
				cellclick: function(g, r, c) {
					if (c === 0) return;
					Ext.Msg.show({title:'Confirm?',msg: 'Are you sure to delete this event?',buttons: Ext.Msg.YESNO,
		            	fn: function(bool) {
							if (bool === 'no') return;
							g.body.mask('Deleting...','x-mask-loading');
							var rec = g.getStore().getAt(r).data;
							var pt = rec.imagepath.split('/');
							new Ext.data.Connection().request({
								url: Ext.projurl+'/action/adminfloretz.php?m=deleteFile&option=removebirthday&filename='+pt.pop()+'&dir='+pt.pop()+'&recid='+rec.recid+'&birthdayshort='+rec.birthdayshort,
								success: function(res) {
									var rows = Ext.decode(res.responseText).Rows;
									var grd = winref.get(0),store = grd.getStore();
									if (rows.length === 0) {
										store.remove(grd.getSelectionModel().getSelected());
									} else {
										var row = rows[0], totalcnt = row.totalcnt, recid = row.recid;
										var rec = grd.getStore().getById(recid);
										rec.set('totalcnt',totalcnt);
										rec.commit(true);
									}
									g.getStore().removeAt(r);
									g.body.unmask();
								}
							});
							
						},
					icon: Ext.MessageBox.QUESTION});
									
				}
			},
			store: new Ext.data.JsonStore({fields: ['recid','birthdayshort','imagepath'],idProperty: 'recid'}),
			columns: [
				{header: 'Picture',dataIndex: 'imagepath',width: 480,css: 'height: 190px;',renderer: function(d) { return '<img src="'+d+'" width="200" height="174" alt=""/>'; }},
				{header: 'Delete',dataIndex: 'recid',align: 'center',width: 40,renderer: function(val,meta) { meta.css = "grddelete"; }}
			]
		});
		this.items = [detailPanel,picGrid];
		birthWin.superclass.initComponent.call(this);
	}
});
new birthWin().show();

//detailPanel.getStore().loadData([{'recid': '1','totalcnt': '2 birtday','eventdate': '2015-March-04'},{'recid': '1','totalcnt': '2 birtday','eventdate': '2015-March-04'}])