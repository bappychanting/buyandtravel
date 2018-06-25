<?php
namespace App\Http\Controllers\Profile;
use Session;
use Illuminate\Support\Facades\Auth;
use App\User;
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
        $this->validate(request(),[
            'password' => 'required|string|min:6|confirmed',
        ]);  
        $user->password = Hash::make($request->password);
        $user->save();
        Session::flash('success', array('Password Successfully updated!'));
        return redirect(route('user.userinfo'));
    }
}
