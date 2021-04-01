<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Publication;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        ['User'=>User::select('id','name','surname','user_image')->find($id), 
        'Publications'=>
            Publication::select('publication.id','publication.title','publication.desc','publication.dimension','publication.format', 'image.image_file')
            ->join('image', 'publication.id', '=', 'image.pub_id')->where('user_id','=',$id)->groupBy('publication.id')->paginate(5)]);
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
         $User = User::find($id);
   
         if($request->email !== $User->email){
              $validated = $request->validate([
               'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                ]);
         }

        $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'surname' => ['required', 'string', 'max:255'],
        'user_image' => 'mimes:jpg,png|max:2048',
    ]);


        if($request->user_image !== null){
            list($empty, $storage,$img, $users, $file) = explode("/", $User->user_image);
            Storage::disk('public')->delete('img/users/'.$file);

            $extension = $request->user_image->extension();
            $request->user_image->storeAs('/public/img/users', time().".".$extension);
            $url = Storage::url('img/users/'.time().".".$extension);
            $User->user_image = $url;
        } 
        
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
         $User = User::find($id);
   
         if($request->password !== $User->password){

            $validated = $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

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
        //
    }
}
