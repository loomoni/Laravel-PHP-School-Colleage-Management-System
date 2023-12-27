<?php

namespace App\Http\Controllers;

use App\Models\ClassSubject;
use App\Models\SchoolClass;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassSubjectController extends Controller
{
    public function list()
    {
        $data['header_title'] = "Subject Assign List";
        $data['getRecord'] = ClassSubject::getAssignedSubject();
        return view('admin.assign_subject.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Assign Subject Add";

        $data['getClass'] = SchoolClass::getClassToAssign();
        $data['getSubjects'] = Subject::getSubjectToAssign();

        return view('admin.assign_subject.add', $data);
    }

    public function insert(Request $request)
    {
        if(!empty($request->subject_id))
        {
            foreach($request->subject_id as $subject_id)
            {
                $getAlreadyFirst = ClassSubject::getAlreadyFirst($request->class_id, $subject_id);
                if(!empty($getAlreadyFirst))
                {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }
                else
                {
                    $save = new ClassSubject;
                    $save->class_id = $request->class_id;
                    $save->subject_id = $subject_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }


                
            }

            return redirect('admin/assign_subject/list')->with('success', 'Subject assigned to class successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'No subject Selected');
        }
    }

    public function edit($id)
    {
        
        $getRecord = ClassSubject::getSingleClassSubjectAssign($id);
        if(!empty($getRecord))
        {
            $data['getRecord'] = $getRecord;
            $data['getAssignedSubjectID'] = ClassSubject::getAssignedSubjectID($getRecord->class_id);
            $data['header_title'] = "Edit Assign Subject";
            $data['getClass'] = SchoolClass::getClassToAssign();
            $data['getSubjects'] = Subject::getSubjectToAssign();
            return view('admin.assign_subject.edit', $data);
        }

        else
        {
            abort(404);
        }

    }

    public function update(Request $request, $id)
    {
        ClassSubject::deleteSubject($request->classs_id);

        foreach($request->subject_id as $subject_id)
            {
                $getAlreadyFirst = ClassSubject::getAlreadyFirst($request->class_id, $subject_id);
                if(!empty($getAlreadyFirst))
                {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }
                else
                {
                    $save = new ClassSubject;
                    $save->class_id = $request->class_id;
                    $save->subject_id = $subject_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
                
            }

            return redirect('admin/assign_subject/list')->with('success', 'Subject assign update successfully');
        }



    public function delete($id)
    {
        $data = ClassSubject::getSingleClassSubjectAssign($id);

        $data->is_delete = 1;
        $data->save();

        return redirect(url('admin/assign_subject/list'))->with('success', 'Class subject assign Deleted successfully');
    }
}
