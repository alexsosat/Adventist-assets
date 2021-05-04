<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Publication;
use App\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;



class ImageViewer extends Controller
{
      /**
     * Show the user profile picture
     *
     * @return \Illuminate\Http\Response
     */
    public function showUserPhoto($id)
    {
        $User = User::select('user_image')->find($id);
        if($User === null){
            abort(404);
        }
        if($User->user_image !== null){
            list($empty, $storage,$img, $users, $file) = explode("/", $User->user_image);

            $path = $img."/".$users."/".$file;
        
            if (!Storage::disk('public')->exists($path)) {
                abort(404);
            }

            $file = Storage::disk('public')->get($path);
            $type = Storage::disk('public')->mimeType($path);

            
            $response = Response::make($file, 200);
            $response->header("Content-Type", $type);

            return $response;
        }   else{
            
            $file = file_get_contents(public_path('img/defaults/user.png'));
            
            
            $response = Response::make($file, 200);
            $response->header("Content-Type", 'image/png');

            return $response;

        }
    }

      /**
     * Show a picture from publication id
     *
     * @return \Illuminate\Http\Response
     */
    public function showPublicationThumbnail($id)
    {
        $Publication = Image::select('image_file')->where('pub_id','=',$id)->first();
        if($Publication === null){
            $file = file_get_contents(public_path('img/defaults/publication.png'));
               
            $response = Response::make($file, 200);
            $response->header("Content-Type", 'image/png');

            return $response;
        }

        if($Publication->image_file !== null){

        list($empty, $storage,$img, $publications, $file) = explode("/", $Publication->image_file);

        $path = $img."/".$publications."/".$file;
        
            if (!Storage::disk('public')->exists($path)) {
                abort(404);
            }

            $file = Storage::disk('public')->get($path);
            $type = Storage::disk('public')->mimeType($path);

            
            $response = Response::make($file, 200);
            $response->header("Content-Type", $type);

            return $response;
        }
    }


    
    /**
     * Show a picture from Image id
     *
     * @return \Illuminate\Http\Response
     */
    public function showPublicationGalleryPhoto($id)
    {
        $Publication = Image::select('image_file')->find($id);
        if($Publication === null){
            abort(404);
        }
        list($empty, $storage,$img, $publications, $file) = explode("/", $Publication->image_file);

        $path = $img."/".$publications."/".$file;
        
            if (!Storage::disk('public')->exists($path)) {
                abort(404);
            }

            $file = Storage::disk('public')->get($path);
            $type = Storage::disk('public')->mimeType($path);

            
            $response = Response::make($file, 200);
            $response->header("Content-Type", $type);

            return $response;

       
    }

    /**
     * Show the publication 3D Model
     *
     * @return \Illuminate\Http\Response
     */
    public function show3DModel($id)
    {
       $Publication = Publication::select('visual_archive')->find($id);
        
        if($Publication === null){
            abort(404);
        }
        
        list($empty, $storage,$object, $file) = explode("/", $Publication->visual_archive);

        $path = $object."/".$file;
        
            if (!Storage::disk('public')->exists($path)) {
                abort(404);
            }

            $file = Storage::disk('public')->get($path);
            $type = Storage::disk('public')->mimeType($path);

            
            $response = Response::make($file, 200);
            $response->header("Content-Type", $type);

            return $response;
       
    }

}
