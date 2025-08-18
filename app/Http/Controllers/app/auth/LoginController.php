<?php

namespace App\Http\Controllers\app\auth;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\SiteInformation;
class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/admin/dashboard';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
        
    }

    public function showLoginForm()
    {
        $siteInformation = SiteInformation::first();
        return view('app.auth.login',compact('siteInformation'));
    }

    /**
     * Handle an authentication attempt.Authenticate a user
     *
     * @param Request $request
     *
     * @return Renderable | RedirectResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (is_numeric($request->get('username'))) {
            $field = 'phone_number';
        } elseif (filter_var($request->get('username'), FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        } else {
            $field = 'username';
        }
        if (Auth::attempt([$field => $request->username, 'password' => $request->password])) {
            //if authentication become success
            $request->session()->regenerate();
            if (Auth::user()->status == 'Active') {
                return redirect($this->redirectTo);
            } else {
                Auth::logout();
                return redirect()->back()->withInput($request->only($this->username(), 'remember'))->withErrors([
                    $this->username() => 'Your account is inactive',
                ]);
            }
        } else {
            //if authentication fails
            return redirect()->back()->withInput($request->only($this->username(), 'remember'))->withErrors([
                $this->username() => 'Invalid Username/Password.',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin');
    }

    public function username()
    {
        return 'username';
    }

    public function authenticated(Request $request, $user)
    {
        if ($user->status != 'Active') {
            Auth::logout();

            return redirect()->back()->withInput($request->only($this->username(), 'remember'))->withErrors([
                $this->username() => 'Your account is inactive',
            ]);
        }
    }

    public function forgot_password(Request $request)
    {
        $email_username = User::where('email', $request->email)->orWhere('username', $request->email)->first();
        if ($email_username) {
            $token = bin2hex(random_bytes(64));
            $email_username->token = $token;
            $link = url('/admin/reset-password/' . $token);
            DB::beginTransaction();
            if ($email_username->save()) {
                if (Helper::forgotMail($email_username)) {
                    DB::commit();
                    echo json_encode(array('status' => true, 'message' => 'Password reset link has been sent to your registred email ID'));
                } else {
                    DB::rollBack();
                    echo json_encode(array('status' => false, 'message' => "Some network error occurred while senting the password reset link, Please try after some time"));
                }
            } else {
                DB::rollBack();
                echo json_encode(array('status' => false, 'message' => "Some error occurred, Please try after some time..!"));
            }
        } else {
            echo json_encode(array('status' => false, 'message' => "Username/Email '" . $request->email . "' doesn't match with our records"));
        }
    }

    public function verifyAccount($token)
    {
        $verifyUser = User::where('token', $token)->first();
        $message = 'Sorry your email cannot be identified.';

        if (!is_null($verifyUser)) {
            if (!$verifyUser->email_verified_at) {
                $verifyUser->email_verified_at = now();
                $verifyUser->token = NULL;
                $verifyUser->save();
                session()->flash('success', 'Your e-mail is verified. You can now login.');
                $message = "Your e-mail is verified. You can now login.";
            } else {
                session()->flash('success', 'Your e-mail is already verified. You can now login.');
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
        return redirect()->route('login')->with('message', $message);
    }

    public function reset_password($token)
    {
        if ($token) {
            $user = User::where('token', $token)->first();
            if ($user) {
                return view('app.auth.reset_password', compact('user'));
            } else {
                abort(404, "Token doesn't match with any entries");
            }
        } else {
            abort(404, 'Token not found');
        }
    }

    public function reset_password_store(Request $request)
    {
        if ($request->id) {
            $admin = User::find($request->id);
            if ($admin->token != NULL) {
                $admin->password = Hash::make($request['password']);
                $admin->token = NULL;
                if ($admin->save()) {
                    echo json_encode(array('status' => true, 'message' => 'Password has been reset successfully, Please sign-in using your new password'));
                } else {
                    echo json_encode(array('status' => false, 'message' => "Some error occurred, Please try after some time..!"));
                }
            } else {
                echo json_encode(array('status' => false, 'message' => "Admin not requested for password reset"));
            }
        } else {
            echo json_encode(array('status' => false, 'message' => "Admin not found"));
        }
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()->withInput($request->only($this->username(), 'remember'))->withErrors([
            $this->username() => 'Incorrect username/password',
        ]);
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
