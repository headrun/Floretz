<?php

class Birthday extends \Eloquent {
	protected $fillable = [];
	protected $table='birthday';

	static function insertBirthdayData($inputs){
    	$Bdata = new Birthday();
    	$getId = Birthday::max('order_index');
    	$Bdata->image_path = $inputs;
    	$Bdata->created_by = Session::get('userId');
    	$Bdata->order_index = $getId + 1;
    	$Bdata->save();
    	return $Bdata;
    	//return $getId + 1;
  	}


  	static function getBirtdayImages(){
        $data = Birthday::orderBy('order_index')->get();
        $maxOrderIndex = Birthday::max('order_index');
        return array("data" => $data, "maxOrderIndex" => $maxOrderIndex);
    }



    static function DeletingBirthday($id){
      $res = Birthday::find($id);
      $orderIndex = $res->order_index;
      $remainOrderIndex = Birthday::where('order_index', '>', $orderIndex)->get();
      
      for ($i=0; $i < count($remainOrderIndex); $i++) { 
          $vals[$i]['id'] = $remainOrderIndex[$i]['id'];
          $vals[$i]['order_index'] = $remainOrderIndex[$i]['order_index'];

          $r = Birthday::find($vals[$i]['id']);
          $r->order_index = $vals[$i]['order_index'] - 1;
          $r->save();
      	}  
		return $res->delete();
    }


    static function movingDown($details){

        $cur_OId = $details['orderIndex'];
        $cur_id = $details['id'];
        $next_OId = $cur_OId + 1;

        $next_row_update = Birthday::where('order_index', '=', $next_OId)->update(array('order_index' => $cur_OId));

        $cur_row_update = Birthday::where('id', '=', $cur_id)->update(array('order_index' => $next_OId));

        return $cur_row_update;
                
    }


    static function movingUp($details){
        //return FlashNews::select('content', 'id')->where('id', $id)->get();
        $cur_OId = $details['orderIndex'];
        $cur_id = $details['id'];
        $prev_OId = $cur_OId - 1;

        $prev_row_update = Birthday::where('order_index', '=', $prev_OId)->update(array('order_index' => $cur_OId));

        $cur_row_update = Birthday::where('id', '=', $cur_id)->update(array('order_index' => $prev_OId));

        return $cur_row_update;
        
    }


}