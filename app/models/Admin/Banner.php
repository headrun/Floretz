<?php

class Banner extends \Eloquent {
	protected $fillable = [];
	protected $table='banner';

	static function getBannerImages(){
        $data = Banner::orderBy('order_index')->get();
        $maxOrderIndex = Banner::max('order_index');
        return array("data" => $data, "maxOrderIndex" => $maxOrderIndex);
    }


    static function DeletingBanner($id){
      $res = Banner::find($id);
      $orderIndex = $res->order_index;
      $remainOrderIndex = Banner::where('order_index', '>', $orderIndex)->get();
      
      for ($i=0; $i < count($remainOrderIndex); $i++) { 
          $vals[$i]['id'] = $remainOrderIndex[$i]['id'];
          $vals[$i]['order_index'] = $remainOrderIndex[$i]['order_index'];

          $r = Banner::find($vals[$i]['id']);
          $r->order_index = $vals[$i]['order_index'] - 1;
          $r->save();

      }  

      return $res->delete();
      
  	}


  	static function movingDown($details){

        $cur_OId = $details['orderIndex'];
        $cur_id = $details['id'];
        $next_OId = $cur_OId + 1;

        $next_row_update = Banner::where('order_index', '=', $next_OId)->update(array('order_index' => $cur_OId));

        $cur_row_update = Banner::where('id', '=', $cur_id)->update(array('order_index' => $next_OId));

        return $cur_row_update;
                
    }


    static function movingUp($details){
        //return FlashNews::select('content', 'id')->where('id', $id)->get();
        $cur_OId = $details['orderIndex'];
        $cur_id = $details['id'];
        $prev_OId = $cur_OId - 1;

        $prev_row_update = Banner::where('order_index', '=', $prev_OId)->update(array('order_index' => $cur_OId));

        $cur_row_update = Banner::where('id', '=', $cur_id)->update(array('order_index' => $prev_OId));

        return $cur_row_update;
        
    }



    static function insertBannerData($inputs){
    $Bdata = new Banner();
    $getId = Banner::max('order_index');
    $Bdata->image_path = $inputs;
    $Bdata->created_by = Session::get('userId');
    $Bdata->order_index = $getId + 1;
    $Bdata->save();
    return $Bdata;
    //return $getId + 1;
  }


}