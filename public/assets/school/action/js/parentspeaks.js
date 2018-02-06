// JavaScript Document
speaks = Ext.extend(Ext.Window, {
	title: 'Parent Speaks',width: 1100,height: 580,idx: -1,id_ref: 0,
	layout: 'border',
	closable: false,resizable: false,
	initComponent: function() {
		var pan = this;
		function search() {
			showRender();
		};
		function showRender() {
			grid.el.mask('Loading...','x-mask-loading');
			var approve = grid.getTopToolbar().get(2).getValue();
			new Ext.data.Connection().request({
				url: Ext.projurl+'/action/adminfloretz.php?m=commonDbCall',method: 'POST',
				params: {resulttype: 'single',query: 'CALL speaksprocedure(\'selectall\',\'<row status="'+approve+'"/>\')'},
				success: function(res) {
					var rows = Ext.decode(res.responseText);
					grid.store.loadData(rows.Rows);
					Ext.isApproved = approve;
					grid.el.unmask();
				}
			});
		};
		function saveUpdate() {
			var frm = form.getForm();
			if (frm.isValid() === false) {
				alert('Please fill the form');
				return;
			}
			var val = frm.getValues();
			val.isapproved = (val.isapproved == 'Approved' ? '1' : '0');
			val.comments = encodeURIComponent(val.comments).replace(/'/g,"\\'");
			if (grid.idx === -1) {
				alert('Please edit record to update');
				return;
			}
			form.el.mask('Updating...','x-mask-loading');
			new Ext.data.Connection().request({
				url: Ext.projurl+'/action/adminfloretz.php?m=commonDbCall',
				params: {resulttype: 'single',query: 'CALL speaksprocedure(\'update\',\'<row recid="'+val.recid+'" fullname="'+val.fullname+'" comments="'+val.comments+'" isapproved="'+val.isapproved+'"/>\')'},
				success: function(res) {
					var store = grid.store;
					if (val.isapproved == Ext.isApproved) {
						var newrec = new store.recordType(val,val.recid);
						store.removeAt(grid.idx);
						store.insert(grid.idx,newrec);
					} else {
						store.removeAt(grid.idx);
					}
					reset();
					form.el.unmask();
				}
			});
		};
		function reset() {
			form.getForm().reset();
			grid.idx = -1;
		};
		this.on('show',showRender);
		var grid = new Ext.grid.GridPanel({
			region: 'center',idx: -1,
			tbar: ['Status',' ',{xtype: 'combo',fieldLabel: 'Status',hiddenValue: 'approve',editable: false,displayField: 'txt',id: 'status',valueField: 'id',store: new Ext.data.ArrayStore({fields: ['id','txt'],data: [['0','Not Approved'],['1','Approved']] }),mode: 'local',value: '0',triggerAction: 'all'},'-',{text: 'Search',iconCls: 'srh',handler: search}],
			listeners: {
				cellclick: function(gd, rowidx, colidx) {
			    	if (colidx < 2) return;
					if (colidx === 2) {
						var rec = gd.store.getAt(rowidx);
						rec.data.comments = decodeURIComponent(rec.data.comments);
						form.getForm().loadRecord(rec);
						gd.idx = rowidx;
					} else Ext.MessageBox.confirm("Sure?", "Are you sure to delete this record?",function(bool) {
        		    	if (bool === 'no') return;
        			    var el = gd.body;
					    el.mask('Deleting...','x-mask-loading');
						new Ext.data.Connection().request({
							url: Ext.projurl+'/action/adminfloretz.php?m=commonDbCall',
							params: {resulttype: 'single',query: 'CALL speaksprocedure(\'delete\',\'<row recid="'+gd.store.getAt(rowidx).data.recid+'"/>\')'},
							success: function(res) {
								gd.store.removeAt(rowidx);
								el.unmask();
							}
						});
        			})
				}
			},
			columns: [
				{header: 'Comments',dataIndex: 'comments',width: 400,renderer: function(val) { return decodeURIComponent(val); }},
				{header: 'Name',dataIndex: 'fullname',width: 150},
				{header: 'Edit',dataIndex: 'recid',width: 50,renderer: function(val, meta) {meta.css = 'grdedit'; }},
    		    {header: 'Delete',dataIndex: 'recid',width: 50,renderer: function(val, meta) {meta.css = 'grddelete';}}
			],
			store: new Ext.data.JsonStore({fields: ['recid','fullname','comments','isapproved'],idProperty: 'recid'})
		});
		var form = new Ext.form.FormPanel({
			region: 'east',width: 400,labelAlign: 'top',frame: true,
			items: [
				{xtype: 'textarea',fieldLabel: 'Comment',id: 'comments',width: 385,height: 380,allowBlank: false},
				{xtype: 'textfield',id: 'fullname',fieldLabel: 'Full Name',width: 385,allowBlank: false},
				{xtype: 'hidden',id: 'recid'},
				{xtype: 'hidden',id: 'isapproved'},
				{xtype: 'combo',fieldLabel: 'Status',id: 'isapproved',width: 385,editable: false,displayField: 'txt',valueField: 'id',store: new Ext.data.ArrayStore({fields: ['id','txt'],data: [['0','Not Approved'],['1','Approved']] }),mode: 'local',triggerAction: 'all'}
			],
			bbar: ['->',{text: 'Reset',handler: reset},'-',{text: 'Save',iconCls: 'plus',handler: saveUpdate}]
		});
		this.items = [grid,form];
		speaks.superclass.initComponent.call(this);
	}
});

new speaks().show();