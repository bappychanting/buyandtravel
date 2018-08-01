<?php

namespace App\Http\Controllers\Profile;
use App\Message;
use App\MessageSubject;
use App\MessageParticipant;
use App\MessageViewer;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    protected $user;
    protected $message;
    protected $messageSubject;
    protected $messageParticipant;
    protected $messageView;

    public function __construct(Message $message, MessageSubject $messageSubject, MessageParticipant $messageParticipant, MessageViewer $messageView, User $user)
    {
        $this->middleware('auth');
        $this->middleware('message.participant')->only('show');
        $this->message = $message;
        $this->messageSubject = $messageSubject;
        $this->messageParticipant = $messageParticipant;
        $this->messageView = $messageView;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->user->find(Auth::user()->id);
        $search = \Request::get('search');
        // $messages = $user->messages()->search($search)->orderBy('created_at', 'desc')->paginate(30);
        return "okay";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        return view('profile.messages.messages', compact('user'));;
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
    public function update(Request $request, $id)
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
