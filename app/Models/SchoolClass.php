<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class SchoolClass extends Model
{
    use HasFactory;

    protected $table = 'school_classes';

    static public function getClass()
    {
        $return = SchoolClass::select('school_classes.*', 'users.name as created_by_name')
                  ->join('users', 'users.id', 'school_classes.created_by');
                  if(!empty(Request::get('name')))
                  {
                    $return = $return ->where('school_classes.name', 'like', '%'.Request::get('name').'%');
                  }

                  if(!empty(Request::get('date')))
                  {
                    $return = $return ->where('school_classes.created_at', 'like', '%'.Request::get('date').'%');
                  }
                 $return = $return ->where('school_classes.is_delete', '=', '0')
                  ->orderBy('school_classes.id', 'desc')
                  ->paginate(25);

        return $return;
    }

    static public function getSingleClass($id)
    {
        return self::find($id);
    }
}
