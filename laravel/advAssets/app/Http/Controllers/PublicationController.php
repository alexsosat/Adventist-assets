<?php

namespace App\Http\Controllers;

use App\Publication;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use app\User;


class PublicationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('search')->with(
            ['Publications'=>
                Publication::select('publication.id','publication.title','publication.desc',
                    'publication.dimension','publication.format','format.name as formatId','dimension.name as dimensionId')
                ->join('format', 'publication.format','=','format.id')
                ->join('dimension','publication.dimension', '=', 'dimension.id')
                ->skip(0)->take(12)->orderBy('id', 'DESC')->get() //Limitarlo a 12
                ]);
    }

    /**
     * Display a listing of the resource with the desire key-words
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
    // Get the search value from the request
    $search = $request->input('key-words');

    // Search in the title and body columns from the posts table
    $Publications = Publication::select('publication.id','publication.user_id','publication.title','publication.desc',
                'publication.dimension','publication.format','publication.url' ,'format.name as formatId','dimension.name as dimensionId',
                DB::raw('CONCAT(users.name, " ", users.surname) AS full_name'))
            ->join('format', 'publication.format','=','format.id')
            ->join('dimension','publication.dimension', '=', 'dimension.id')
            ->join('users','publication.user_id', '=', 'users.id')
            ->where('title', 'LIKE', "%{$search}%")
        ->orWhere('desc', 'LIKE', "%{$search}%")->orderBy('id', 'DESC')->paginate(5);

    // Return the search view with the resluts compacted
    return view('results', compact('Publications'));
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
        //Validating the data
          $validated = $request->validate([
        'title' => ['required','string', 'max:100'],
        'url' => ['required', 'url', 'max:100'],
        'description' => ['nullable','string', 'max:490'],
        'dimension' => ['required', 'int'],
        'format' => ['required', 'int'],
        'visual_archive' => 'max:50000',
        'files' => 'max:5',
        'files.*' => 'mimes:jpg,png||max:5048'
    ]);

    
    //if description is null set a default description
    if($request->description === null){
        $request->description = 'descripci??n no disponible';
    }

    //if a 3d file is submitted then store the data
    $url = null;
    if($request->visual_archive !== null){
        //checking if the file is compatible
        $allowedfileExtension=['obj','fbx','stl','dae','ply','gltf'];
        $extension = strtolower($request->visual_archive->getClientOriginalExtension());
        $check=in_array($extension,$allowedfileExtension);

        //storing the file if compatible
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
    

    //check if the request has images
    if($request->hasfile('files')){
       
            $count = 0;
        foreach($request->file('files') as $file)
            {
                //get image data
                $name = time().$count.'.'.$file->extension();
                
                //storing the image
                $file->storeAs('/public/img/publications/', $name);
                $url = Storage::url('img/publications/'.$name);
                
                //create img in database
                Image::create([
                    'pub_id' => $pubId,
                    'image_file' => $url,
                    ]);

                //compressing the image
                $filepath = public_path('storage/img/publications/'.$name);
                $mime = mime_content_type($filepath);
                $output = new \CURLFile($filepath, $mime, $name);
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

                $count++;
            }
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
        return View('publications.detailPage')->with(
            [   'Imagenes'=> Image::select('id')->where('pub_id','=',$id)->get(),

                'Publication'=>Publication::select('publication.id as pubId','publication.title','publication.desc','publication.url',
                'publication.dimension','publication.format','publication.user_id', 'publication.visual_archive','dimension.name as dimName','format.name as formName',
                DB::raw('CONCAT(users.name, " ", users.surname) AS full_name'),
                'users.email' )                
                ->join('dimension', 'publication.dimension', '=', 'dimension.id')
                ->join('format', 'publication.format', '=', 'format.id')
                ->join('users', 'publication.user_id', '=', 'users.id')
                    ->find($id),
                
                'Formats'=>DB::select('select * from format'),
                'Dimensions'=>DB::select('select * from dimension')
            ]);
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
        //Finding the publication to edit
        $Publication = Publication::find($id);

        //Validating the data
        $validated = $request->validate([
        'title' => ['required','string', 'max:100'],
        'url' => ['required', 'url', 'max:100'],
        'description' => ['nullable','string', 'max:490'],
        'dimension' => ['required', 'int'],
        'format' => ['required', 'int'],
        'visual_archive' => 'max:50000',
        'files' => 'max:5',
        'files.*' => 'mimes:jpg,png||max:5048'
    ]);

    //if description is null then set a default description
    if($request->description === null){
        $request->description = 'descripci??n no disponible';
    }

    //check if the request has a 3d model file
    $url = $Publication->visual_archive;
    if($request->visual_archive !== null){
        //validating the compatibility of the file
        $allowedfileExtension=['obj','fbx','stl','dae','ply','gltf'];
        $extension = strtolower($request->visual_archive->getClientOriginalExtension());
        $check=in_array($extension,$allowedfileExtension);

        //if compatible store the file
        if($check){
            if($Publication->visual_archive !== null){
                list($empty, $storage,$objects, $file) = explode("/", $Publication->visual_archive);
                Storage::disk('public')->delete('objects/'.$file);
            }

            $name = time().'.'.$request->visual_archive->getClientOriginalExtension();
            $request->visual_archive->storeAs('/public/objects/', $name);
            $url = Storage::url('objects/'.$name);
        }
        else{
            return redirect()->back()->withInput()->withErrors(['visual archive File Extension not supported', 'visual_archive']);
        }
    }
        
    //updating the user
        $Publication->title = $request->title;
        $Publication->desc = $request->description;
        $Publication->url = $request->url;
        $Publication->dimension = $request->dimension;
        $Publication->format = $request->format;
        $Publication->visual_archive = $url;

        $Publication->update();

    //Check if the data has images
        if($request->hasfile('files'))
         {
           
        //searching for the previous model images to delete
        $Images = Image::all()->where('pub_id','=',$id);
        foreach($Images as $Image){
            list($empty, $storage,$img, $users, $file) = explode("/", $Image->image_file);
            Storage::disk('public')->delete('img/publications/'.$file);
            Image::destroy($Image->id);
        }

        //storing the multiple images
            $count = 0;
        foreach($request->file('files') as $file)
            {
                //getting image data
                $name = time().$count.'.'.$file->extension();

                //storing the image
                $file->storeAs('/public/img/publications/', $name);
                $url = Storage::url('img/publications/'.$name);
                
                //create img in database
                Image::create([
                    'pub_id' => $id,
                    'image_file' => $url,
                    ]);

                //compressing the image
                $filepath = public_path('storage/img/publications/'.$name);
                $mime = mime_content_type($filepath);
                $output = new \CURLFile($filepath, $mime, $name);
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
        //Finding the publication to delete the visual archive in local storage
        $Publication = Publication::find($id);
        if($Publication->visual_archive !== null){
            list($empty, $storage,$objects, $file) = explode("/", $Publication->visual_archive);
            Storage::disk('public')->delete('objects/'.$file);
        }


         //deleting the publication images
        $Images = Image::all()->where('pub_id','=',$id);
        foreach($Images as $Image){
            list($empty, $storage,$img, $users, $file) = explode("/", $Image->image_file);
            Storage::disk('public')->delete('img/publications/'.$file);
            Image::destroy($Image->id);
        }


        Publication::destroy($id);
        return redirect()->back();
    }
}
