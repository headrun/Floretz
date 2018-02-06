Ext.override(Ext.grid.GridPanel,{
	moveSelectedRow: function(direction, callback) {
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
		if (callback) callback([record,(index + 1)],[this.getStore().getAt(old_idx),(old_idx + 1)]);
	}
});
banner = Ext.extend(Ext.Window, {
	title: 'Birtday Master',width: 700,height: 480,idx: -1,id_ref: 0,
	layout: 'border',
	closable: false,resizable: false,
	initComponent: function() {
		this.on('show',function() {
			bangrid.body.mask('Loading...','x-mask-loading'); 
			new Ext.data.Connection().request({
				url: Ext.projurl+'/action/adminfloretz.php?m=commonDbCall',method: 'POST',
				params: {resulttype: 'single',query: 'CALL bannerprocedure(\'selectbanner\',\'\')'},
				success: function(res) {
					var result = Ext.decode(res.responseText);
					this.getStore().loadData(result.Rows);
					this.body.unmask();
				},scope:bangrid
			});
		});
		function moveUpDown() {
			var key = this.key;
			bangrid.moveSelectedRow(key,function(crr, move) {
				var sql = "CALL bannerprocedure('updateindex','<row recid=\""+crr[0].data.recid+"\" orderindex=\""+crr[1]+"\"/><row recid=\""+move[0].data.recid+"\" orderindex=\""+move[1]+"\"/>')";
				bangrid.el.mask('Saving...','x-mask-loading');
				new Ext.data.Connection().request({
					url: Ext.projurl+'/action/adminfloretz.php?m=commonDbCall',method: 'POST',
					params: {resulttype: 'single',query: sql},
					success: function(res) { bangrid.el.unmask(); }
				});
			});
		};
		var bangrid = new Ext.grid.GridPanel({
			region: 'center',
			listeners: {
				cellclick: function(gd, rowidx, colidx) {
			    	if (colidx < 1) return;
			    	Ext.MessageBox.confirm("Sure?", "Are you sure to delete this record?",function(bool) {
        		    	if (bool === 'no') return;
        			    var el = gd.body;
					    el.mask('Deleting...','x-mask-loading');
						var arr = gd.store.getRange(rowidx+1), len = arr.length, xml = [];
						for (var i=0, nd; nd = arr[i++];) {
							var rec = nd.data;
							xml.push("<row recid=\""+rec.recid+"\" orderindex=\""+(rowidx + i)+"\"/>");
						}
						var crec = gd.store.getAt(rowidx).data;
						xml.push("<cnt ttl=\""+(i - 1)+"\" recid=\""+crec.recid+"\"/>");
						
						new Ext.data.Connection().request({
							url: Ext.projurl+'/action/adminfloretz.php?m=deleteFile',
							method: 'POST',params: {option: 'removebanner',filename: crec.imagepath.split('/').pop(),query: "CALL bannerprocedure('removebanner','"+xml.join('')+"')"},
							success: function(res) {
								gd.store.removeAt(rowidx);
								el.unmask();
							}
						});
        			})
				}
			},
			columns: [
				{header: 'Image',dataIndex: 'imagepath',width: 500,renderer: function(d) { return '<img src="'+Ext.projurl+"/upload/"+d+'" width="400" height="176" alt=""/>'; }},
    		    {header: 'Delete',dataIndex: 'recid',width: 50,renderer: function(val, meta) {meta.css = 'grddelete';}}
			],
			store: new Ext.data.JsonStore({fields: ['recid','imagepath']}),
			bbar:['->',{text: 'Move Down',iconCls: 'movedown',handler: moveUpDown,key: 1},'-',{text: 'Move Up',iconCls: 'moveup',handler: moveUpDown,key: -1}]
		});
		var upfrm = new Ext.form.FormPanel({
			region: 'south',height: 80, defaults: {anchor: '95%'},frame: true,fileUpload: true,
			items: [{
				xtype: 'fileuploadfield', id: 'photo1',emptyText: 'Select an image',fieldLabel: 'Select banner',ctCls: 'spaces',
            	name: 'files', buttonText: 'Browse...'
			},{
				xtype: 'hidden',id: 'orderindex'
			},{
				xtype: 'button',text: 'Submit',anchor: '10%',style: 'margin-left:87%',iconCls: 'plus',handler: function() {
					upfrm.get(1).setValue(bangrid.store.getRange().length + 1);
					upfrm.getForm().submit({
						url: Ext.projurl+'/action/adminfloretz.php?m=bannerUpload',
						waitMsg: 'Uploading photos...',
						success: function(fp, o) {
							var res = o.result;
							var ids = res.key, img = res.img;
							var rec = new bangrid.store.recordType({recid: ids,imagepath: img},ids);
							bangrid.store.add(rec);
							upfrm.getForm().reset();
						}
					});
				}
			}]
		});
		this.items = [bangrid,upfrm];
		banner.superclass.initComponent.call(this);
	}
});
new banner().show();