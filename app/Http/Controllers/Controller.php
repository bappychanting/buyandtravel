<?php

namespace App\Http\Controllers;
use Storage;
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
}
