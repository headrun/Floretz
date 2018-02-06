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
flash = Ext.extend(Ext.Window, {
	title: 'Birtday Master',width: 630,height: 450,idx: -1,id_ref: 0,
	layout: 'border',
	closable: false,resizable: false,
	initComponent: function() {
		var winref = this;
		this.on('show',function() {
			this.body.mask('Loading...','x-mask-loading');
			new Ext.data.Connection().request({
				url: Ext.projurl+'/action/adminfloretz.php?m=commonDbCall',method: 'POST',
				params: {resulttype: 'single',query: "CALL newscontentprocedure('selectnews','')"},
				success: function(res) {
					var arr = Ext.decode(res.responseText).Rows;
					for (var i=0,nd; nd = arr[i++];) {
						nd.newscontent = decodeURIComponent(nd.newscontent);
					}
					ngrid.store.loadData(arr);
					this.body.unmask();
				},scope: this
			});
		});
		function addNews() {
			npanel.body.mask('Saving...','x-mask-loading');
			var frm = npanel, query = '';
			if (winref.idx == -1) {
				query = "CALL newscontentprocedure('addnew','<row newscontent=\""+encodeURIComponent(frm.get(0).getValue())+"\" orderindex=\""+(ngrid.store.getRange().length + 1)+"\"/>')";
			} else {
				query = "CALL newscontentprocedure('updatenews','<row newscontent=\""+encodeURIComponent(frm.get(0).getValue())+"\" recid=\""+winref.id_ref+"\"/>')";
			}
			new Ext.data.Connection().request({
				url: Ext.projurl+'/action/adminfloretz.php?m=commonDbCall',method: 'POST',
				params: {resulttype: 'single',query: query},
				success: function(res) {
					var grd = ngrid;
					if (this.idx === -1) {
						var newkey = Ext.decode(res.responseText).Rows[0].newkey;
						var nrec = new grd.store.recordType({recid: newkey, newscontent: frm.get(0).getValue()},newkey);
						grd.store.add(nrec);
					} else {
						var rec = grd.store.getById(this.id_ref); rec.beginEdit(); rec.set('newscontent',frm.get(0).getValue()); rec.endEdit(); rec.commit();
						this.idx = -1; this.id_ref = 0;
					}
					npanel.getForm().reset();
					npanel.body.unmask();
//					alert(res.responseText);
				},scope: winref
			});
		};
		function moveUpDown() {
			var key = this.key;
			ngrid.moveSelectedRow(key,function(crr, move) {
				var sql = "CALL newscontentprocedure('updateindex','<row recid=\""+crr[0].data.recid+"\" orderindex=\""+crr[1]+"\"/><row recid=\""+move[0].data.recid+"\" orderindex=\""+move[1]+"\"/>')";
				ngrid.el.mask('Saving...','x-mask-loading');
				new Ext.data.Connection().request({
					url: Ext.projurl+'/action/adminfloretz.php?m=commonDbCall',method: 'POST',
					params: {resulttype: 'single',query: sql},
					success: function(res) { ngrid.el.unmask(); }
				});
			});
		};
		var ngrid = new Ext.grid.GridPanel({
			region: 'center',
			store: new Ext.data.JsonStore({fields: ['recid','newscontent'],idProperty: 'recid'}),
			listeners: {
				cellclick: function(gd, rowidx, colidx) {
			    	if (colidx < 1) return;
			    	if (colidx === 1) {
						var dt = gd.getStore().getAt(rowidx).data;
						winref.idx = rowidx; winref.id_ref = dt.recid;
						npanel.get(0).setValue(dt.newscontent);
			    	} else Ext.MessageBox.confirm("Sure?", "Are you sure to delete this record?",function(bool) {
        		    	if (bool === 'no') return;
        			    var el = gd.body;
					    el.mask('Deleting...','x-mask-loading');
						var arr = gd.store.getRange(rowidx+1), len = arr.length, xml = [];
						for (var i=0, nd; nd = arr[i++];) {
							var rec = nd.data;
							xml.push("<row recid=\""+rec.recid+"\" orderindex=\""+(rowidx + i)+"\"/>");
						}
						xml.push("<cnt ttl=\""+(i - 1)+"\" recid=\""+gd.store.getAt(rowidx).data.recid+"\"/>");
						new Ext.data.Connection().request({
							url: Ext.projurl+'/action/adminfloretz.php?m=commonDbCall',
							method: 'POST',params: {resulttype: 'single',query: "CALL newscontentprocedure('deletenews','"+xml.join('')+"')"},
							success: function(res) {
								gd.store.removeAt(rowidx);
								el.unmask();
							}
						});
        			})
			    }
			},
			columns: [
				{header: 'News',dataIndex: 'newscontent',width: 485},
				{header: 'Edit',dataIndex: 'recid',width: 50,renderer: function(val, meta) {meta.css = 'grdedit'; }},
    		    {header: 'Delete',dataIndex: 'recid',width: 50,renderer: function(val, meta) {meta.css = 'grddelete';}}
			],
			bbar:['->',{text: 'Move Down',iconCls: 'movedown',handler: moveUpDown,key: 1},'-',{text: 'Move Up',iconCls: 'moveup',handler: moveUpDown,key: -1}],
		});
		var npanel = new Ext.form.FormPanel({
			region: 'south',split: true,height: 198,labelAlign: 'top',frame: true,
			items: [{xtype: 'htmleditor',width: 600,height: 150,fieldLabel: 'test',hideLabel: true}],
			bbar: ['->',{text: 'Save',iconCls: 'plus',handler: addNews}]
		});
		this.items = [ngrid,npanel];
		
		flash.superclass.initComponent.call(this);
	}
});
new flash().show();

