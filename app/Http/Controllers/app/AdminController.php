<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_verify_email');
    }

    public function list()
    {
        $title = "Admin List";
        if ((Auth::user()->admin->role) == "Super Admin") {
            $adminList = Admin::get();
            
            return view('app.admin.admin_list', compact('adminList', 'title'));
        } else {
            return view('app.errors.404');
        }
    }

    public function create()
    {
        if ((Auth::user()->admin->role) == "Super Admin") {
            $key = "Create";
            $title = "Add Admin";
            return view('app.admin.admin_form', compact('key', 'title'));
        } else {
            return view('app.errors.404');
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:30',
            'email_id' => 'required|min:3|email|unique:users,email,NULL,id,deleted_at,NULL',
            'username' => 'required|min:5|unique:users,username,NULL,id,deleted_at,NULL',
            'phone' => 'required|unique:users,phone,NULL,id,deleted_at,NULL',
            'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        ]);
        
        DB::beginTransaction();
        $adminInput = new User;
        $adminInput->name = $validatedData['name'];
        $adminInput->email = $validatedData['email_id'];
        $adminInput->username = $validatedData['username'];
        $adminInput->password = Hash::make($validatedData['password']);
        $adminInput->phone = isset($request->phone) ? $request->phone : '';

        if ($request->hasFile('profile_image')) {
            $adminInput->profile_image = Helper::uploadFile($request->profile_image, 'uploads/admin/profile_image/', 'admin');
        }
        $token = Str::random(64);
        $adminInput->token = $token;
        if ($adminInput->save()) {
            $admin = new Admin;
            $admin->user_id = $adminInput->id;
            $admin->role = $request->role;
            if($admin->save()){
                DB::commit();
                Mail::send('app.auth.verify', ['token' => $token], function ($message) use ($request) {
                    $message->to($request->email_id);
                    $message->subject('Email Verification Mail');
                });
                if (Mail::failures()) {
                    DB::rollBack();
                    return back()->withInput()->withErrors('Some error occurred while sending email, Please try after some time..!');
                }
                session()->flash('success', $request->role. ' ' . $adminInput->name . '" has been added successfully');
                return redirect(Helper::sitePrefix() . 'administration');
            }
        } else {
            DB::rollBack();
            return back()->with('message', 'Error while creating admin');
        }
    }

    public function edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Admin Update";
        $admin = User::find($id);
        if ($admin != NULL) {
            return view('app.admin.admin_form', compact('key', 'admin', 'title'));
        } else {
            return view('app.errors.404');
        }
    }

    public function view(Request $request, $id)
    {
        $key = "View";
        $admin = User::find($id);
        if ($admin != NULL) {
            $title = "Admin View - " . $admin->name;
            return view('app.admin.admin_view', compact('key', 'admin', 'title'));
        } else {
            return view('app.errors.404');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:30',
            'email_id' => 'required|min:3|email|unique:users,email,' . $id .',id,deleted_at,NULL',
            'username' => 'required|min:5|max:30|unique:users,username,' . $id .',id,deleted_at,NULL',
            'phone' => 'required|unique:users,phone,' . $id .',id,deleted_at,NULL',
            'password' => 'min:8|max:30|',
        ]);

        $adminInput = User::find($id);
        $adminInput->name = $validatedData['name'];
        $adminInput->email = $validatedData['email_id'];
        $adminInput->phone = isset($request->phone) ? $request->phone : '';
                 
        if($request->password){
            $adminInput->password = Hash::make($validatedData['password']);
        }
        
        if ($request->hasFile('profile_image')) {
            if (File::exists($adminInput->profile_image)) {
                File::delete($adminInput->profile_image);
            }
            $adminInput->profile_image = Helper::uploadFile($request->profile_image, 'uploads/admin/profile_image/', 'admin');
        }

        $emailData = User::where([['email', $validatedData['email_id']], ['id', '!=', $id]])->count();
        if ($emailData == 0) {
            $usernameData = User::where([['username', $validatedData['username']], ['id', '!=', $id]])->count();
            if ($usernameData == 0) {
                $adminInput->username = $validatedData['username'];
                if ($adminInput->save()) {
                    $admin = Admin::where('user_id', $adminInput->id)->first();
                    $admin->role = $request->role;
                    if($admin->save()) {
                        session()->flash('success', 'Admin "' . $adminInput->name . '" has been updated successfully');
                        return redirect(Helper::sitePrefix() . 'administration');
                    }
                } else {
                    return back()->with('message', 'Error while updating admin');
                }
            } else {
                return back()->withInput($request->input())->withErrors("E-mail ID '" . $validatedData['email_id'] . "' has been already taken");
            }
        } else {
            return back()->withInput($request->input())->withErrors("E-mail ID '" . $validatedData['email_id'] . "' has been already taken");
        }
    }

    public function reset_password($id)
    {
        if (Auth::user()->admin->role == "Super Admin") {
            $admin = User::find($id);
            if ($admin != NULL) {
                $key = "Reset Password - " . $admin->name;
                $title = "Reset Password - " . $admin->name;
                return view('app.admin.reset_password', compact('key', 'title', 'admin'));
            } else {
                return view('app.errors.404');
            }
        } else {
            return view('app.errors.404');
        }
    }

    public function reset_password_store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            'confirm_password' => 'required|same:password',
        ]);

        if ($validatedData['password'] == $validatedData['confirm_password']) {
            $admin = User::find($id);
            $admin->password = Hash::make($validatedData['password']);
            if ($admin->save()) {
                session()->flash('success', 'Password has been updated successfully');
                return  redirect('admin/administration');
            } else {
                return back()->with('message', 'Error while resetting the password');
            }
        } else {
            return back()->withInput($request->input())->withErrors("Password mis-match");
        }
    }

    public function delete_admin(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $user = User::find($request->id);
            if ($user) {
                if ($user->admin->role == 'Super Admin') {
                    return response()->json([
                        'status' => false,
                        'message' => "Not permitted to delete the 'Super Admin' user"
                    ]);
                } else {
                    $admin = $user->admin;
                    $deleted = $user->delete();
                    $admin->delete();
//                    if (File::exists($admin->profile_image)) {
//                        File::delete($admin->profile_image);
//                    }
                    if ($deleted == true) {
                        echo(json_encode(array('status' => true)));
                    } else {
                        echo(json_encode(array('status' => false, 'message' => 'Some error occurred,please try after sometime')));
                    }
                }
            } else {
                echo(json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        }
    }

    public function profile()
    {
        $title = "Profile";
        $admin = Auth::user();
        if ($admin) {
            return view('app.admin.profile', compact('admin', 'title'));
        } else {
            return view('backend.error.404');
        }
    }

    public function profile_store(Request $request)
    {
        $user_id = Auth::id();
        $admin = Auth::user();
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user_id,
            'email_id' => 'required|string|max:255|unique:users,email,' . $user_id,
            'phone' => 'required|max:255|unique:users,phone,' . $user_id,
            'profile_image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($request->hasFile('profile_image')) {
            if (File::exists(public_path($admin->profile_image))) {
                File::delete(public_path($admin->profile_image));
            }
            if (File::exists(public_path($admin->profile_image_webp))) {
                File::delete(public_path($admin->profile_image_webp));
            }
            $admin->profile_image_webp = Helper::uploadWebpImage($request->profile_image, 'uploads/admin/profile_image/webp/', $request->username);
            $admin->profile_image = Helper::uploadFile($request->profile_image, 'uploads/admin/profile_image/', $request->username);

        }
        $admin->name = $request->name;
        $admin->email = $request->email_id;
        $admin->username = $request->username;
        $admin->phone = $request->phone;
        $admin->image_attribute = $request->image_attribute;
        $admin->updated_at = now();
        if ($admin->save()) {
            return redirect(Helper::sitePrefix() . 'administration/profile')->with('success', "Profile has been updated successfully");
        } else {
            return back()->with('message', 'Error while updating the profile');
        }
    }
}
