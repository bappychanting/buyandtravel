<?php

namespace App\Http\Controllers;
use Storage;
use App\User;
use App\MessageSubject;
use App\MessageParticipant;
use App\Notifications\GeneralNotification;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function uploadImage($image, $path, $resizeX, $resizeY)
    {        
        $ext = explode('.', $image->getClientOriginalName()); 
        $filename = md5(uniqid())."." . $ext[count($ext) -1];
        $image_resize = Image::make($image->getRealPath()); 
        $image_resize->resize($resizeX, $resizeY);             
        /*$image_resize->resize($resizeX, $resizeY, function ($constraint) {
            $constraint->aspectRatio();                 
        });*/
        $image_resize->stream(); 
        Storage::disk('local')->put('public/'.$path.$filename, $image_resize, 'public');
        return 'storage/'.$path.$filename;
    }

    protected function createMessage($subject='New Message', $participants=array()){
        $newMessage = new MessageSubject();
        $newMessage->subject = $subject;
        $newMessage->save();
        $message = $newMessage->orderBy('created_at', 'desc')->first();
        if(count($participants)>0){
            foreach($participants as $participant){
                $messageParticipants = new MessageParticipant();
                $messageParticipants->message_subject_id = $message->id;
                $messageParticipants->user_id = $participant;
                $messageParticipants->save();
            }
        }
        return $message->id;
    }

    protected function send_notification($recievers, $notification_details='You have got a new notification!', $redirect_link='javascript:void(0)', $icon='bell'){
        if(is_array($recievers) && count($recievers) > 0){
            foreach($recievers as $reciever){
                $user = $this->user->findOrFail($reciever);
                $user->notify(new GeneralNotification(['notification_details' => $notification_details, 'redirect_link' => $redirect_link, 'icon' => '<i class="fa fa-'.$icon.'"></i>']));
            }
        }
    }
}
