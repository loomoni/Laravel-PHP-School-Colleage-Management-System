<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ParentController extends Controller
{
    public function list()
    {
        $data['header_title'] = "Parent List";
        $data['getRecord'] = User::getParent();
        return view('admin.parent.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Student";
        // $data['getClass'] = SchoolClass::getClassToAssign();
        return view('admin.parent.add', $data);
    }

    public function insert(Request $request)
    {


        request()->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:15|min:10',
        ]);

        $student = new User();

        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->occupation = trim($request->occuption);
        $student->address = trim($request->address);
        $student->gender = trim($request->gender);
    
        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile', $filename);

            $student->profile_pic = $filename;
        }
        $student->mobile_number = trim($request->mobile_number);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->user_type = 4;
        $student->password = Hash::make($request->password);

        $student->save();
        return redirect(url('admin/parent/list'))->with('success', 'Parent added successfull');
    }

    public function edit($id)
    {
      
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Parent";
            // $data['getClass'] = SchoolClass::getClassToAssign();
            return view('admin.parent.edit', $data);
        }
        else
        {
            abort(404);
        }

    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
         
          
        ]);

        $student = User::getSingle($id);;

        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->occupation = trim($request->occuption);
        $student->address = trim($request->address);
        $student->gender = trim($request->gender);
       
        if(!empty($request->file('profile_pic')))
        {
            if(!empty($student->getProfile()))
            {
                unlink('upload/profile/'.$student->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('dmYhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile', $filename);

            $student->profile_pic = $filename;
        }
    
        $student->mobile_number = trim($request->mobile_number);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        if(!empty($request->password))
        {
            $student->password = Hash::make($request->password);
        }
        
        $student->save();
        return redirect(url('admin/parent/list'))->with('success', 'Parent updated successfull');
    }

    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if(!empty($getRecord))
        {
    
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect()->back()->with('success', 'Parent deleted successfull');
        }
        else
        {
            abort(404);
        }
    }
}
