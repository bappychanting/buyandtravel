<?php

namespace App\Http\Controllers\Profile;
use App\OfferMessage;
use App\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    protected $offer;
    protected $message;

    public function __construct(OfferMessage $message, Offer $offer)
    {
        $this->middleware('auth');
        $this->message = $message;
        $this->offer = $offer;
    }

    public function offerMessages()
    {
        return view('profile.messages.offer');
    }
}
