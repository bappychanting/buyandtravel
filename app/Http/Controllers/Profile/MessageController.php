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
        return "to be developed";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "to be developed";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'message' => 'required|max:5000'
        ]);
        $input = $request->all();
        $this->message->create($input);
        return redirect()->route('messages.show', $request->message_subject_id)->with('success', array('Success'=>'Message has been added!'));
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
        $conversation = $this->messageSubject->findOrFail($id);
        $messages = $this->message->where('message_subject_id', '=', $id)->orderBy('created_at', 'desc')->paginate(15);
        return view('profile.messages.messages', compact('user', 'conversation', 'messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = $this->message->findOrFail($id);
        return json_encode(array('message'=>$message->message, 'last_updated'=>date('l d F Y, h:i A', strtotime($message->updated_at))));
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
        $input = $request->all();
        $message = $this->message->findOrFail($id);
        $message->update($input);
        return redirect()->route('messages.show', $message->message_subject_id)->with('success', array('Success'=>'Message has been updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = $this->message->findOrFail($id);
        $message->delete();
        return redirect()->route('messages.show', $id)->with('success', array('Success'=>'Message has been deleted!'));
    }
}
