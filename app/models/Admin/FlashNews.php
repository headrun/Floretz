<?php

class FlashNews extends \Eloquent {
	protected $fillable = [];
  protected $table='flashnews';


  static function getAllFlashNews(){
        $data = FlashNews::orderBy('order_index')->get();
        $maxOrderIndex = FlashNews::max('order_index');
        return array("data" => $data, "maxOrderIndex" => $maxOrderIndex);
    }

    static function getNewsToEdit($id){
        return FlashNews::select('content', 'id')->where('id', $id)->get();
    }


    static function updateFlashNews($id){
        //return FlashNews::select('content', 'id')->where('id', $id)->get();
        $news = FlashNews::find($id['id']);
        $news->content = $id['data'];
        return$news->save();
    }


    static function movingUp($details){
        //return FlashNews::select('content', 'id')->where('id', $id)->get();
        $cur_OId = $details['orderIndex'];
        $cur_id = $details['id'];
        $prev_OId = $cur_OId - 1;

        $prev_row_update = FlashNews::where('order_index', '=', $prev_OId)->update(array('order_index' => $cur_OId));

        $cur_row_update = FlashNews::where('id', '=', $cur_id)->update(array('order_index' => $prev_OId));

        return $cur_row_update;
        
    }



    static function movingDown($details){

       $cur_OId = $details['orderIndex'];
        $cur_id = $details['id'];
        $next_OId = $cur_OId + 1;

        $next_row_update = FlashNews::where('order_index', '=', $next_OId)->update(array('order_index' => $cur_OId));

        $cur_row_update = FlashNews::where('id', '=', $cur_id)->update(array('order_index' => $next_OId));

        return $cur_row_update;
                
    }



  static function DeletingNews($id){
      $res = FlashNews::find($id);
      $orderIndex = $res->order_index;
      $remainOrderIndex = FlashNews::where('order_index', '>', $orderIndex)->get();
      
      for ($i=0; $i < count($remainOrderIndex); $i++) { 
          $vals[$i]['id'] = $remainOrderIndex[$i]['id'];
          $vals[$i]['order_index'] = $remainOrderIndex[$i]['order_index'];

          $r = FlashNews::find($vals[$i]['id']);
          $r->order_index = $vals[$i]['order_index'] - 1;
          $r->save();

      }
      //return $r;    

      return $res->delete();
      
  }



  static function insertNews($inputs){
    $news = new FlashNews();
    $getId = FlashNews::max('order_index');
    $news->content = $inputs['content'];
    $news->created_by = Session::get('userId');
    $news->updated_by = Session::get('userId');
    $news->order_index = $getId + 1;
    $news->save();
    return $news;
    //return $getId + 1;
  }
}