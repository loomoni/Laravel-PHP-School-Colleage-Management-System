<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ClassSubject extends Model
{
    use HasFactory;

    protected $table = 'class_subjects';

    static public function getAssignedSubject()
    {
        $return = self::select('class_subjects.*', 'subjects.name as subject_name', 'school_classes.name as class_name', 'users.name as created_by_name')
                    ->join('subjects', 'subjects.id', 'class_subjects.subject_id')
                    ->join('school_classes', 'school_classes.id', 'class_subjects.class_id')
                    ->join('users', 'users.id', 'class_subjects.created_by')
                    ->where('class_subjects.is_delete', '=', 0);
                    if(!empty(Request::get('class_name')))
                    {
                      $return = $return ->where('school_classes.name', 'like', '%'.Request::get('class_name').'%');
                    }
                    if(!empty(Request::get('subject_name')))
                    {
                      $return = $return ->where('subjects.name', 'like', '%'.Request::get('subject_name').'%');
                    }
                    if(!empty(Request::get('date')))
                    {
                      $return = $return ->where('class_subjects.created_at', 'like', '%'.Request::get('date').'%');
                    }
       $return = $return -> orderBy('class_subjects.id', 'desc')
                    ->paginate(25);
        return $return;

        
    }

    static public function getAlreadyFirst($class_id, $subject_id)
    {
        return self::where('class_id', '=', $class_id)->where('subject_id', '=', $subject_id)->first();
    }

    
    static public function getSingleClassSubjectAssign($id)
    {
      return self::find($id);
    }

    static public function getAssignedSubjectID($class_id)
    {
      return self::where('class_id', '=', $class_id)->where('is_delete', '=', 0)->get();
    }
    static public function deleteSubject($class_id)
    {
      return self::where('class_id', '=', $class_id)->delete();
    }

}
