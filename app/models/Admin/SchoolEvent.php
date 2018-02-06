<?php


class SchoolEvent extends \Eloquent {
	protected $fillable = [];
        protected $table='events';
        protected $guarded = array();
        
    public static function addEvent($inputs){
      

       $event = new SchoolEvent();
       $event->title = $inputs['event_title'];
       $event->type = $inputs['event_type'];
       $event->eventstart = $inputs['event_startdate'];
       $event->eventend= $inputs['event_enddate'];
       $event->description= $inputs['event_description'];
       $event->createdby= Session::get('userId');
       $event->save(); // returns false
       return $event;
       //var_dump($inputs) ;
      
    }
    static function getSchoolEvents(){
        //return SchoolEvent::select('title','eventstart','eventend', 'description')->get();
        return SchoolEvent::all();
    }


    static function getSchoolEventsForFrontend(){
        return SchoolEvent::select('title','eventstart','eventend')
                            ->where('eventstart', '>=', Carbon::now()->startOfMonth())
                            ->get();
    }

    static function getCountOfThisMonth(){
      $events =  SchoolEvent::where('eventstart', '>=', Carbon::now()->startOfMonth())
                          ->where('eventstart', '<=', Carbon::now()->endOfMonth())
                          ->get();
      return count($events);
      //return Carbon::now()->startOfMonth();
    }

}