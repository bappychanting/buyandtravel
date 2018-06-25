<?php
namespace App\Http\Controllers\Profile;
use Session;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
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
        return view('profile.userinfo', compact('user'));
    }

    public function updateuserInfo(ProfileRequest $request, $id)
    {
        $user = $this->user->findorfail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->gender = $request->gender;
        $user->dob = strtotime($request->dob);
        $user->address = $request->address;
        $user->save();
        Session::flash('success', array('Profile Successfully updated!'));
        return view('profile.summery', compact('user'));
    }

    public function updatecontactinfo(ProfileRequest $request, $id)
    {
        /*$user = $this->user->findorfail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->gender = $request->gender;
        $user->dob = strtotime($request->dob);
        $user->address = $request->address;
        $user->save();
        Session::flash('success', array('Profile Successfully updated!'));*/
        return view('profile.summery', compact('user'));
    }
}
