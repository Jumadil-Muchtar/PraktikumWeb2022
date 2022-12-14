<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Session;
use Redirect;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    static function getColumnTable($table)
	{
		$columns = array();
		$prefix  = \DB::getTablePrefix();
		foreach (\DB::getSchemaBuilder()->getColumnListing($prefix.$table) as $column) {
		   //print_r($column);
		    $columns[$column] = '';
		}

		$object = (object) $columns;
		return $object;
	}

    public function return_output($type, $status_title, $message, $redirect_url, $status_code = '')
    {


        
        if ($type=='error') {
            if ($redirect_url == 'back') {
                return Redirect::back()->withErrors($message)->withInput();
            } elseif ($redirect_url != '') {
                return Redirect::to($redirect_url)->withErrors($message)->withInput();
            }
        } else {
            if ($redirect_url == 'back') {
                return Redirect::back()->with($status_title, $message);
            } elseif ($redirect_url != '') {
                return Redirect::to($redirect_url)->with($status_title, $message);
            } elseif ($redirect_url == '') {
                return Session::flash($status_title, $message);
            }
        }
        
    }
}

