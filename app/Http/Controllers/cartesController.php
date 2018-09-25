<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Carte;
use App\Http\Requests\cartesRequest;
class cartesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donnees = Carte::all();
        return view ('/cartes', compact('donnees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(cartesRequest $monrequest)
    {   
        $img=$monrequest->file('image')->store('/public/images');
        // return $img;
        $nouvellecarte = new Carte;
        $nouvellecarte->titre = $monrequest->letitre;
        $nouvellecarte->num1 = $monrequest->num1;
        $nouvellecarte->num2 = $monrequest->num2;
        $nouvellecarte->description = $monrequest->ladescription;
        $nouvellecarte->image = $img;
        $nouvellecarte->save();
        return redirect ('/cartes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modif=Carte::find($id);
        return view ('edit',compact('modif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(cartesRequest $request, $id)
    {
        $url= $request->file('image');
        // dd($request);
        $modif=Carte::find($id);
        $modif->titre =$request->letitre;
        $modif->num1 = $request->num1;
        $modif->num2 = $request->num2;
        // $modif->image = $url;
        $modif->description=$request->ladescription;
        
        if ($url != null) {
            Storage::delete($modif->image);
            $modif->image = $request->file('image')->store('/public/images');
        }else{
            $modif->image=$modif->image;
        };

        $modif->save();
        return redirect ('/cartes'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $effacer=Carte::find($id);
        Storage::delete($effacer->image);
        $effacer->delete();
        return redirect ('/cartes');
    }
}
