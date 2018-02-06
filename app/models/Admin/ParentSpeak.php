<?php

class ParentSpeak extends \Eloquent {
	protected $fillable = [];
	protected $table='parents_speak';

	static function getAllParentDetails(){
        return ParentSpeak::all();
    }

    static function DeletingParentPost($id){
      $res = ParentSpeak::find($id);
      $res->delete();
      return $res;
    }

    static function changingStats($id){
      //$res = ParentSpeak::find($id['id']);
      $update = ParentSpeak::where('id', '=', $id['id'])->update(array('status' => $id['data']));
      return $update;
    }

    static function EditingParentPost($id){
      //$res = ParentSpeak::find($id['id']);
      $update = ParentSpeak::where('id', '=', $id['id'])->update(array('parent_comments' => $id['data']));
      return $update;
    }

    static function approving($id){
      //$res = ParentSpeak::find($id['id']);
      $update = ParentSpeak::where('id', '=', $id['id'])->update(array('is_approved' => 1));
      return $update;
    }


    static function getParentsSpeaksForFrontend(){
        return ParentSpeak::where('status', '=', 'Active')
                            ->where('is_approved', '=', '1')->get();
    }

    static function InsertParentSpeak($values){
      $Pspeak = new ParentSpeak();
      $Pspeak->name = $values['full_name'];
      $Pspeak->parent_comments = $values['comments'];
      $Pspeak->status = 'Inactive';
      $Pspeak->is_approved = '0';
      $Pspeak->save();
      return $Pspeak;

    }

    static function getAllParentDetailsLimit(){
        return ParentSpeak::where('status', '=', 'Active')
                            ->where('is_approved', '=', '1')
                            ->select(DB::raw('substr(parent_comments, 1, 350) as parent_comments'), 'name')->get();
    }


}