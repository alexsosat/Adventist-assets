<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Publication;
use App\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;


class userController extends Controller
{


    /**
     * Display the specified user data.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return View('users.show')->with(['User'=>User::all()->find($id)]);
    }


     /**
     * Display the specified user publications.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPublications($id)
    {
    return View('users.publications')->with(
        ['User'=>User::select('id','name','surname')->find($id), 
        'Publications'=>
            Publication::select('publication.id','publication.title','publication.desc',
                'publication.dimension','publication.format', 'format.name as formatId','dimension.name as dimensionId')
            ->join('format', 'publication.format','=','format.id')
            ->join('dimension','publication.dimension', '=', 'dimension.id')
            ->where('user_id','=',$id)->orderBy('id', 'DESC')->paginate(5)]);
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
        //searching for the user id to edit
         $User = User::find($id);
   
         //validating the email if changed
         if($request->email !== $User->email){
              $validated = $request->validate([
               'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                ]);
         }

         //validating the data
        $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'surname' => ['required', 'string', 'max:255'],
        'user_image' => 'mimes:jpg,png|max:3000',
    ]);

        //updating the image if new file is sent
        if($request->user_image !== null){
            if($User->user_image !== null){
                //Deleting previous image
                list($empty, $storage,$img, $users, $file) = explode("/", $User->user_image);
                Storage::disk('public')->delete('img/users/'.$file);
            }

            //getting image data
            $extension = $request->user_image->extension();
            $filenametostore = time().'.'.$extension;

            //saving image
            $request->user_image->storeAs('/public/img/users', $filenametostore);
            $url = Storage::url('img/users/'.$filenametostore);
            $User->user_image = $url;

            //compressing image
            $filepath = public_path('storage/img/users/'.$filenametostore);
            $mime = mime_content_type($filepath);
            $output = new \CURLFile($filepath, $mime, $filenametostore);
            $dataImage = ["files" => $output];
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'http://api.resmush.it/?qlty=80');
            curl_setopt($ch, CURLOPT_POST,1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataImage);
            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                $result = curl_error($ch);
            }
            curl_close ($ch);
            
            $arr_result = json_decode($result);
            
            // store the optimized version of the image
            $ch = curl_init($arr_result->dest);
            $fp = fopen($filepath, 'wb');
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);

        } 
        
        //updating the user data
        $User->name = $request->name;
        $User->surname = $request->surname;
        $User->email = $request->email;

        $User->update();
        return redirect('/');
    }

    
    /**
     * Update the password of the user
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request, $id)
    {
        //finding the user to update
         $User = User::find($id);
        
         //only update the user if the password is different
         if($request->password !== $User->password){

            //validating the password
            $validated = $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            
            //updating the user
            $User->password = bcrypt($request->password);
            $User->update();
         }

        return redirect('/');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Finding the User to delete the visual archive in local storage
        $User = User::find($id);
        if($User->user_image !== null){
            list($empty, $storage,$img, $users ,$file) = explode("/", $User->user_image);
            Storage::disk('public')->delete('img/users/'.$file);
        }
        
        //Finding the publications to delete the visual archive and images in local storage
        $Publications = Publication::where('user_id','=',$id)->get();
        foreach($Publications as $Publication){
            if($Publication->visual_archive !== null){
                list($empty, $storage,$objects, $file) = explode("/", $Publication->visual_archive);
                Storage::disk('public')->delete('objects/'.$file);
            }

            //deleting the publication images
            $Images = Image::all()->where('pub_id','=',$Publication->id);
            foreach($Images as $Image){
                list($empty, $storage,$img, $users, $file) = explode("/", $Image->image_file);
                Storage::disk('public')->delete('img/publications/'.$file);
                Image::destroy($Image->id);
            }
        }

        User::destroy($id);
        return redirect()->back();
    }

}
