<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UrlShortener extends Model
{
    protected $dates = ['created_at', 'updated_at', 'last_requested'];

    public static function generateId64($id=0, $mode=0)
    {
    	$data = '';
    	if (!empty($id)) {
    		switch ($mode) {
    			case '0':
    				$data =  base64_encode($id);
    				break;
    			case '1':
    				$data =  base64_decode($id);
    				break;
    			
    			default:
    				// code...
    				break;
    		}    		
    	}
    	return $data;
    }

    public function getTopUrls($top=100)
    {
        $data = UrlShortener::take($top)->orderBy('times_requested', 'desc')->get();
        return $data;
    }
}
