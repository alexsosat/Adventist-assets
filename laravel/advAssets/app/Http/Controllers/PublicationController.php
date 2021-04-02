<?php

namespace App\Http\Controllers;

use App\Publication;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


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
        'description' => ['string', 'max:255'],
        'dimension' => ['required', 'int'],
        'format' => ['required', 'int'],
    ]);

        $Publication->title = $request->title;


         dd($request);
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
