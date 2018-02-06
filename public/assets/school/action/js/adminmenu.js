Ext.menuHandler = function() {
	switch(this.link) {
		case 'birthday': window.location.href = "admin.php"; break;
		case 'flashnews': window.location.href = "flashnews.php"; break;
		case 'banner': window.location.href = "banner.php"; break;
		case 'event': window.location.href = "event.php"; break;
		case 'comment': window.location.href = "parentspeaks.php"; break;
	}
};
new Ext.Toolbar({id: 'topmenu',items: [
	{xtype: 'box',autoEl: {cn: '<div id="welcomeUser">Welcome Administartor</div>'}},'->',
	{text: 'Birthday Master',iconCls: 'menu-mod',link: 'birthday',handler: Ext.menuHandler},'-',
	{text: 'FlashNew Master',iconCls: 'menu-mod',link: 'flashnews',handler: Ext.menuHandler},'-',
	{text: 'Banner Master',iconCls: 'menu-mod',link: 'banner',handler: Ext.menuHandler},'-',
	{text: 'Event Master',iconCls: 'menu-mod',link: 'event',handler: Ext.menuHandler},'-',
	{text: 'Comment Master',iconCls: 'menu-mod',link: 'comment',handler: Ext.menuHandler}
],renderTo: 'menu_bar'});