<?php

namespace App\Http\Controllers\Profile;
use App\User;
use App\TravelRequest;
use Illuminate\Http\TrequestRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    protected $user;

    public function __construct(User $user, TravelRequest $travelRequest)
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->travelRequest = $travelRequest;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->user->find(Auth::user()->id);
        return view('profile.requests.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect(route('front.travel.index'))->with('info', array('To Add Request'=>'Please select one of the following travelers to add request!'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrequestRequest $request)
    {
        $input = $request->all();
        $input['message_subject_id'] = $this->createMessage($input['request_message_subject'], array($input['user_id'], $input['traveler_id']));
        $this->travelRequest->create($input);
        return redirect(route('requests.index'))->with('success', array('Request Added'=>'Request has been sent to the traveler!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrequestRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
