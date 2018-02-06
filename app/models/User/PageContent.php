<?php

class PageContent extends \Eloquent {
	protected $fillable = [];
	protected $table='page_content';


	static function updatePageContent($val){
		$id = $val['id'];
		$content = $val['data'];

		$find_in_content_tab = PageContent::where('page_id', '=', $id)->get();

		PageContentBackup::insert($find_in_content_tab);

		$update = PageContent::where('page_id', '=', $id)->update(array('page_data' => $content));
		return $update;
		
	}









}