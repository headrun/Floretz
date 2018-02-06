<?php

class MediaGallery extends \Eloquent {
	protected $fillable = [];
	protected $table = "media_gallery";

	static function InsertImage($path){
		$mediaGallery = new MediaGallery();
		$mediaGallery->image_path = $path;
		$mediaGallery->created_by = Session::get('userId');
		$mediaGallery->save();
		return $mediaGallery;
	}

	static function getMediaGallery(){
		return MediaGallery::all();
	}

	static function deleteImages($id){
		$delete = MediaGallery::find($id['id']);
		return $delete->delete();
	}


}