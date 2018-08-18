<?php

namespace App\Http\Controllers\Profile;
use App\User;
use App\ProductRequest;
use App\Http\Requests\RequestTravelerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    protected $user;
    protected $productRequest;

    public function __construct(User $user, ProductRequest $productRequest)
    {
        $this->middleware('auth');
        $this->middleware('request.owner')->only('show', 'edit');
        $this->user = $user;
        $this->productRequest = $productRequest;
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
        $requests = $user->requests()->whereNull('accepted')->search($search)->orderBy('created_at', 'desc')->paginate(30);
        return view('profile.requests.index', compact('requests', 'user', 'search'));
    }

    public function accepted()
    {
        $user = $this->user->find(Auth::user()->id);
        $search = \Request::get('search');
        $requests = $user->requests()->whereNotNull('accepted')->search($search)->orderBy('created_at', 'desc')->paginate(30);
        return view('profile.requests.approved', compact('requests', 'user', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect(route('front.travel.index'))->with('info', array('To Add Request'=>'Please select one of the following travel schedules to add request!'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestTravelerRequest $request)
    {
        $input = $request->all();
        $input['message_subject_id'] = $this->createMessage((empty($input['request_message_subject']) ? "Request for ".$input['product_name']  : $input['request_message_subject']), array($input['user_id'], $input['traveler_id']));
        $this->productRequest->create($input);
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
        $request = $this->productRequest->findOrFail($id);
        $user = Auth::user();
        return view('profile.requests.show', compact('user', 'request'));
    }



    public function addImage(Request $request)
    {
        /*$this->validate(request(),[
            'image' => 'required|image|dimensions:min_width=100,min_height=200|max:500'
        ]);
        $order_image = $this->order_image;
        $image = $this->uploadImage($request->file('image'), 'all_images/order_images/', 350, 300);
        $order_image->src = $image;
        $order_image->alt = "Order Image ".md5(uniqid(rand(), true));
        $order_image->order_id = $request->id;
        $order_image->save();
        Session::flash('success', array('Image has been added!'=>''));*/
    }  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $request = $this->productRequest->findOrFail($id);
        $user = Auth::user();
        return view('profile.requests.edit', compact('user', 'request'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestTravelerRequest $request, $id)
    {
        $input = $request->all();
        $productRequest = $this->productRequest->findOrFail($id);
        $productRequest->update($input);
        return redirect()->route('requests.show', $id)->with('success', array('Success'=>'Request has been updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productRequest = $this->productRequest->findOrFail($id);
        $productRequest->delete();
        return redirect()->route('requests.index')->with('success', array('Success'=>'Request has been deleted!'));
    }
}
