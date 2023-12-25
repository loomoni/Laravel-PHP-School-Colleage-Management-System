<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function list()
    {
        $data['header_title'] = "Subject List";
        $data['getRecord'] = Subject::getSubject();
        return view('admin.subject.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Subject";

        return view('admin.subject.add', $data);
    }

    public function insert(Request $request)
    {
        $subject = new Subject();

        $subject->name = trim($request->name);
        $subject->type = trim($request->type);
        $subject->status = trim($request->status);
        $subject->created_by = Auth::user()->id;

        $subject->save();
        return redirect(url('admin/subject/list'))->with('success', 'Subject added successfully');
    }

    public function edit($id)
    {
       
        $data['getRecord'] = Subject::getSingleSubject($id);
        if(!empty($data['getRecord']))
        {
             $data['header_title'] = "Edit Subject";
            return view('admin.subject.edit', $data);
        }
        else
        {
            abort(404);
        }
        
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::getSingleSubject($id);

        $subject->name = $request->name;
        $subject->type = $request->type;
        $subject->status = $request->status;

        $subject->save();
        return redirect(url('admin/subject/list'))->with('success', 'Subject updated successfully');

    }

    public function delete($id)
    {
        $subject = Subject::getSingleSubject($id);

        $subject->is_delete = 1;

        $subject->save();
        return redirect()->back()->with('error', 'Subject delete successfully');
    }
}
