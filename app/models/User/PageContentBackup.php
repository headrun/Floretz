<?php

class PageContentBackup extends \Eloquent {
	protected $fillable = [];
	protected $table = 'page_content_backup';


	static function insert($val){
		$id = $val[0]['page_id'];
	    $content = $val[0]['page_data'];

		$tab = new PageContentBackup();
		$tab->page_id = $id;
		$tab->backup_page_content = $content;
		$tab->save();
		return $tab;
	}

	static function getAllContents($id){
		return PageContentBackup::where('page_id', '=', $id)->get();
	}

	static function DeletingPost($id){
		$res =  PageContentBackup::find($id);
		return $res->delete();

	}



}