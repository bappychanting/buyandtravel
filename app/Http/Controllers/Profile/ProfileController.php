<?php
namespace App\Http\Controllers\Profile;
use Session;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\VerifyUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $user;
     
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('profile.summery', compact('user'));
    }

    public function userinfo()
    {
        $user = Auth::user();
        return view('profile.userinfo.index', compact('user'));
    }

    public function verificationMail()
    {
        // $user = Auth::user();
        // Mail::to($user->email)->send(new VerifyMail($user));
        return redirect()->back()->with('success', array('Mail has been sent'=>'Please open your mail and check your inbox for verification link'));
    }


    public function verifyUser($token)
    {

        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Your account is now verified!";
            }else{
                $status = "The account associated with this email is already verified!";
            }
        }else{
            $status = "Sorry, there was a problem with verifying your account.";
            return view('profile.userinfo.verify', compact('status'));
        }
        return view('profile.userinfo.verify', compact('status'));
    }


    public function edituser()
    {
        $user = Auth::user();
        return view('profile.userinfo.updateuserinfo', compact('user'));
    }


    public function updateuser(Request $request, $id)
    {
        $user = $this->user->findorfail($id);
        $this->validate(request(),[
            'name' => 'required|string|max:255',
            'gender' => 'required',
            'dob' => 'required|date_format:d/m/Y|before_or_equal:'.Carbon::now()->subYears(18)->format('d/m/Y'),
        ]);      
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->dob = Carbon::createFromFormat('d/m/Y', $request->dob)->toDateTimeString();
        $user->save();
        Session::flash('success', array('User Information Successfully updated!'));
        return redirect(route('user.userinfo'));
    }

    public function editcontact()
    {
        $user = Auth::user();
        return view('profile.userinfo.updatecontactinfo', compact('user'));
    }

    public function updatecontact(Request $request, $id)
    {
        $user = $this->user->findorfail($id);
        $this->validate(request(),[
            'email' => 'required|string|email|max:50|unique:users,email,'.$id,
            'contact' => 'required|string|max:20|min:17|unique:users,contact,'.$id,
            'address' => 'required',
        ]);  
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->address = $request->address;
        $user->save();
        Session::flash('success', array('Contact Information Successfully updated!'));
        return redirect(route('user.userinfo'));
    }

    public function editpassword()
    {
        $user = Auth::user();
        return view('profile.userinfo.updatepassword', compact('user'));
    }

    public function updatepassword(Request $request, $id)
    {
        $user = $this->user->findorfail($id);
        $messages = [
            'old_password.required' => 'Please enter current password',
            'password.required' => 'Please enter new password',
        ];
        $this->validate(request(),[
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed',   
          ], $messages);

        if(Hash::check($request->old_password, Auth::User()->password)){ 
            $user->password = Hash::make($request->password);
            $user->save();
            Session::flash('success', array('Password Successfully updated!'));
            return redirect(route('user.userinfo'));
        }
        else{
            return redirect()->back()->withErrors(['old_password'=> 'Please enter correct current password']);
        }  
    }
}
