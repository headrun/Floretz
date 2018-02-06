<?php

class Enquiry extends \Eloquent {
	protected $fillable = [];
	protected $table = 'enquiry';

	static function insertPost($vals){
		
		$e = new Enquiry();
		$e->name = $vals['name'];
		$e->email = $vals['email'];
		$e->contact_no = $vals['contact_no'];
		$e->address = $vals['address'];
		$e->message = $vals['message'];
		$e->enquiry_for = $vals['enquiry_for'];
		$e->enquiry_type = $vals['enquirytype'];
	    $e->save();
		return $e;
	}

	static function getAllEnquiries(){
		return Enquiry::all();
	}

	static function deleteEnquiry($data){
		$temp =  Enquiry::find($data['id']);
		return $temp->delete();
	}

}