<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Subject extends Model
{
    use HasFactory;

    static public function getSubject()
    {
        $return = Subject::select('subjects.*', 'users.name as created_by_name')
        ->join('users', 'users.id', 'subjects.created_by');
        if(!empty(Request::get('name')))
        {
          $return = $return ->where('subjects.name', 'like', '%'.Request::get('name').'%');
        }

        if(!empty(Request::get('date')))
        {
          $return = $return ->where('subjects.created_at', 'like', '%'.Request::get('date').'%');
        }
        if(!empty(Request::get('type')))
        {
          $return = $return ->where('subjects.type', '=', Request::get('type'));
        }
       $return = $return ->where('subjects.is_delete', '=', '0')
        ->orderBy('subjects.id', 'desc')
        ->paginate(25);

      return $return;
    }

    static public function getSingleSubject($id)
    {
      return self::find($id);
    }

    static public function getSubjectToAssign()
    {
      $return = Subject::select('subjects.*')
                ->join('users', 'users.id', 'subjects.created_by')
                ->where('subjects.is_delete', '=', '0')
                ->where('subjects.status', '=', '0')
                ->orderBy('subjects.name', 'asc')
                ->get();

      return $return;
    }
}
