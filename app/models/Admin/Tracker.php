<?php

class Tracker extends \Eloquent {
	protected $fillable = ['ip', 'date'];
	public $attributes = [ 'hits' => 0 ];
	protected $table = 'visitors';


	public static function boot() {
        // Any time the instance is updated (but not created)
        static::saving( function ($tracker) {
            $tracker->time = date('H:i:s');
            $tracker->hits++;
        } );
    }

    public static function hit() {
        static::firstOrCreate([
                  'ip'   => $_SERVER['REMOTE_ADDR'],
                  'date' => date('Y-m-d'),
              ])->save();
    }



    static function getVisitorsCount(){
    	$today_count = Tracker::where('date', '=', DB::raw('curdate()'))->get();
    	$total_count = Tracker::all();
    	return  $counts = array('today_count' => count($today_count), 'total_count' => count($total_count));
    }

}