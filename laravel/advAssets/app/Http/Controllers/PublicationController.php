<?php

namespace App\Http\Controllers;

use App\Publication;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class PublicationController extends Controller
{
    use SoftDeletes;

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
        return View('publications.create')->with([
            'Formats'=>DB::select('select * from format'),
            'Dimensions'=>DB::select('select * from dimension')
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $validated = $request->validate([
        'title' => ['required','string', 'max:100'],
        'url' => ['required', 'url', 'max:100'],
        'description' => ['nullable','string', 'max:255'],
        'dimension' => ['required', 'int'],
        'format' => ['required', 'int'],
    ]);


    if($request->description === null){
        $request->description = 'descripción no disponible';
    }


    $url = null;
    if($request->visual_archive !== null){
        $allowedfileExtension=['obj','fbx','stl','dae','ply','gltf'];
        $extension = strtolower($request->visual_archive->getClientOriginalExtension());
        $check=in_array($extension,$allowedfileExtension);
        if($check){
            $name = time().'.'.$request->visual_archive->getClientOriginalExtension();
            $request->visual_archive->storeAs('/public/objects/', $name);
            $url = Storage::url('objects/'.$name);
        }
        else{
            return redirect()->back()->withInput()->withErrors(['visual archive File Extension not supported', 'visual_archive']);
        }
    }


     $pubId = Publication::create([
                    'user_id' => $request->user_id,
                    'title' => $request->title,
                    'desc' => $request->description,
                    'url' => $request->url,
                    'dimension' => $request->dimension,
                    'format' => $request->format,
                    'visual_archive' => $url
                    ])->id;
    

    if($request->hasfile('files')){
              $this->validate($request, [
                'files.*' => 'mimes:jpg,png||max:2048'
        ]);

            $count = 0;
        foreach($request->file('files') as $file)
            {
                $name = time().$count.'.'.$file->extension();
                $file->storeAs('/public/img/publications/', $name);
                $url = Storage::url('img/publications/'.$name);
                
                //create img in database
                Image::create([
                    'pub_id' => $pubId,
                    'image_file' => $url,
                    ]);

                $count++;
            }
         }
         else{
             $url = '/storage/img/defaults/publication.png';
             Image::create([
                    'pub_id' => $pubId,
                    'image_file' => $url,
                    ]);
         }
         return redirect('/users/publications/'.$request->user_id);


    }


    /**
     * Display the specified user data.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
    }


     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return View('publications.edit')->with(
            [
                'Publication'=>Publication::select('publication.id as pubId','publication.title','publication.desc','publication.url',
                'publication.dimension','publication.format','dimension.name as dimName','format.name as formName')
                ->join('dimension', 'publication.dimension', '=', 'dimension.id')
                ->join('format', 'publication.format', '=', 'format.id')
                    ->find($id),
                'Formats'=>DB::select('select * from format'),
                'Dimensions'=>DB::select('select * from dimension')
            ]);
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
        $Publication = Publication::find($id);

        $validated = $request->validate([
        'title' => ['required','string', 'max:100'],
        'url' => ['required', 'url', 'max:100'],
        'description' => ['nullable','string', 'max:255'],
        'dimension' => ['required', 'int'],
        'format' => ['required', 'int'],
    ]);

    if($request->description === null){
        $request->description = 'descripción no disponible';
    }
            
        $Publication->title = $request->title;
        $Publication->desc = $request->description;
        $Publication->url = $request->url;
        $Publication->dimension = $request->dimension;
        $Publication->format = $request->format;

        $Publication->update();


        if($request->hasfile('files'))
         {
              $this->validate($request, [
                'files.*' => 'mimes:jpg,png'
        ]);

        $Images = Image::all()->where('pub_id','=',$id);

        foreach($Images as $Image){
            list($empty, $storage,$img, $users, $file) = explode("/", $Image->image_file);
            Storage::disk('public')->delete('img/publications/'.$file);
            Image::destroy($Image->id);
        }

            $count = 0;
        foreach($request->file('files') as $file)
            {
                $name = time().$count.'.'.$file->extension();
                $file->storeAs('/public/img/publications/', $name);
                $url = Storage::url('img/publications/'.$name);
                
                //create img in database
                Image::create([
                    'pub_id' => $id,
                    'image_file' => $url,
                    ]);

                $count++;
            }
         }

         return redirect('/users/publications/'.$Publication->user_id);

    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Publication::destroy($id);
        return redirect()->back();
    }
}
