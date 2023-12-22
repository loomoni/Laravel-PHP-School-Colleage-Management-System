<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function list()
    {
        $data['header_title'] = "Class List";
        $data['getRecord'] = SchoolClass::getClass();
        return view('admin.class.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Class";

        return view('admin.class.add', $data);
    }

    public function insert(Request $request)
    {
        $class = new SchoolClass();

        $class->name = $request->name;
        $class->status = $request->status;
        $class->created_by = Auth::user()->id;
        $class->save();

        return redirect(url('admin/class/list'))->with('success', 'Class Created successfully');
    }

    public function edit($id)
    {
        
        $data['getRecord'] = SchoolClass::getSingleClass($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Class";
            return view('admin.class.edit', $data);
        }
        else
        {
            abort(404);
        }
        
    }

    public function update(Request $request, $id)
    {
        $class = SchoolClass::getSingleClass($id);
        $class->name = $request->name;
        $class->status = $request->status;
        $class->save();

        return redirect(url('admin/class/list'))->with('success', 'Class Updated successfully');
    }

    public function delete($id)
    {
        $class = SchoolClass::getSingleClass($id);
        $class->is_delete = 1;
        $class->save();

        return redirect(url('admin/class/list'))->with('success', 'Class Deleted successfully');
    }
}
