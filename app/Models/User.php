<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    static public function getEmailSingle($email)
    {
        return User::where('email', '=', $email)->first();
    }

    static public function getTokenSingle($remember_token)
    {
        return User::where('remember_token', '=', $remember_token)->first();
    }

    static public function getAdmin()
    {
        $return = self::select('users.*')
                     ->where('user_type', '=', 1)
                     ->where('is_delete', '=', 0);
                     if(!empty(Request::get('name')))
                     {
                        $return = $return->where('name','like', '%'.Request::get('name').'%');
                     }
                     if(!empty(Request::get('email')))
                     {
                        $return = $return->where('email','like', '%'.Request::get('email').'%');
                     }
                     if(!empty(Request::get('date')))
                     {
                        $return = $return->where('created_at','like', '%'.Request::get('date').'%');
                     }
        $return = $return->orderBy('id', 'desc')
                     ->paginate(25);
        return $return;
    }

    static public function getParent()
    {
        $return = self::select('users.*')
                     ->where('user_type', '=', 4)
                     ->where('is_delete', '=', 0);
                     if(!empty(Request::get('name')))
                     {
                        $return = $return->where('name','like', '%'.Request::get('name').'%');
                     }
                     if(!empty(Request::get('email')))
                     {
                        $return = $return->where('email','like', '%'.Request::get('email').'%');
                     }
                     if(!empty(Request::get('date')))
                     {
                        $return = $return->where('created_at','like', '%'.Request::get('date').'%');
                     }
        $return = $return->orderBy('id', 'desc')
                     ->paginate(25);
        return $return;
    }

    
    
    static public function getStudent()
    {
        $return = self::select('users.*', 'school_classes.name as class_name')
                     ->join('school_classes', 'school_classes.id', '=', 'users.class_id', 'left')
                     ->where('users.user_type', '=', 3)
                     ->where('users.is_delete', '=', 0);
                    //  if(!empty(Request::get('name')))
                    //  {
                    //     $return = $return->where('name','like', '%'.Request::get('name').'%');
                    //  }
                    //  if(!empty(Request::get('email')))
                    //  {
                    //     $return = $return->where('email','like', '%'.Request::get('email').'%');
                    //  }
                    //  if(!empty(Request::get('date')))
                    //  {
                    //     $return = $return->where('created_at','like', '%'.Request::get('date').'%');
                    //  }
        $return = $return->orderBy('users.id', 'desc')
                     ->paginate(25);
        return $return;
    }

    static public function getSearchStudent()
    {
       if(!empty(Request::get('name')) || !empty(Request::get('email')))
       {
        $return = self::select('users.*', 'school_classes.name as class_name', 'parent.name as parent_name')
                ->join('users as parent', 'parent.id', '=', 'users.parent_id')
                ->join('school_classes', 'school_classes.id', '=', 'users.class_id', 'left')
                ->where('users.user_type', '=', 3)
                ->where('users.is_delete', '=', 0);
                if(!empty(Request::get('name')))
                {
                $return = $return->where('users.name','like', '%'.Request::get('name').'%');
                }
                if(!empty(Request::get('email')))
                {
                $return = $return->where('users.email','like', '%'.Request::get('email').'%');
                }
            //  if(!empty(Request::get('date')))
            //  {
            //     $return = $return->where('created_at','like', '%'.Request::get('date').'%');
            //  }
            $return = $return->orderBy('users.id', 'desc')
                ->limit(50)
                ->get();
    return $return;
       }
    }

    static public function getParentStudent($parent_id)
    {
   
         $return = self::select('users.*', 'school_classes.name as class_name', 'parent.name as parent_name')
                 ->join('users as parent', 'parent.id', '=', 'users.parent_id')
                 ->join('school_classes', 'school_classes.id', '=', 'users.class_id', 'left')
                 ->where('users.user_type', '=', 4)
                 ->where('users.is_delete', '=', 0)
                 ->where('users.parent_id', '=', $parent_id)
                 ->orderBy('users.id', 'desc')
                 ->get();
     return $return;
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    public function getProfile()
    {
        if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic))
        {
            return url('upload/profile/'.$this->profile_pic);
        }
        else
        {
            return "";
        }
    }


}
