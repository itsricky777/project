<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\User;
use App\genre;
use App\recommended;
use App\minimum;
use App\gameyear;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Game::all();
        $rec = recommended::all();
        $min = minimum::all();
        $goty = gameyear::all();
        return view('modal')->with('data', $data)->with('rec' , $rec)->with('min' , $min)->with('goty',$goty);
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
        $game = Game::all();
        $genre = genre::all();
        $insert = new Game;
        $insert->name = $request->input('name');
        $insert->desc = $request->get('desc');
        $genreipt = implode(",", $request->get('genre'));
        $insert->genre = $genreipt;

        $file = $request->file('file')->getClientOriginalName();

        $filenamefile = pathinfo($file, PATHINFO_FILENAME);
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $fullname = $filenamefile.'.'.$extension;
        $insert->file = $fullname;

        $imgext = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($imgext, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $imginput = $filename."_".time().'.'.$extension;
        $path = $request->file('image')->storeAs('public/image', $imginput);
        $path2 = $request->file('file')->storeAs('public/file', $fullname);
        $insert->image = $imginput;
        $insert->save();

        //specification

        $inputrec = new recommended ;
        $inputmin = new minimum ;

        //recomended

            $inputrec->name = $request->input('name');
            $inputrec->OS = $request->input('recos');
            $inputrec->processor = $request->input('recprocessor');
            $inputrec->memory = $request->input('recmemory');
            $inputrec->graphic = $request->input('recgraphic');
            $inputrec->storage = $request->input('recstorage');
            $inputrec->save();

        //minimum

            $inputmin->name = $request->input('name');
            $inputmin->OS = $request->input('minos');
            $inputmin->processor = $request->input('minprocessor');
            $inputmin->memory = $request->input('minmemory');
            $inputmin->graphic = $request->input('mingraphic');
            $inputmin->storage = $request->input('minstorage');
            $inputmin->save();
        //endspec

            return redirect('/game');
    }

    public function storegenre(Request $request){
        $genre = new genre ;
        $genre->name = $request->input('genre');
        $genre->save(['timestamps' => false ]);
        return redirect('/genre');
    }

    public function storeyear(Request $request){
        $year = new gameyear ;
        $year->name = $request->input('name');
        $year->save(['timestamps' => false ]);
        return redirect('/year');
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
        $game = Game::all();
        $genre = genre::all();
        $insert = Game::findOrFail($id);
        unlink(public_path('storage/image/'.$insert->image));
        unlink(public_path('storage/file/'.$insert->file));
        $insert->name = $request->input('name');
        $insert->desc = $request->get('desc');
        $genreipt = implode(",", $request->get('genre'));
        $insert->genre = $genreipt;

        $file = $request->file('file')->getClientOriginalName();

        $filenamefile = pathinfo($file, PATHINFO_FILENAME);
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $fullname = $filenamefile.'.'.$extension;
        $insert->file = $fullname;

        $imgext = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($imgext, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $imginput = $filename."_".time().'.'.$extension;
        $path = $request->file('image')->storeAs('public/image', $imginput);
        $insert->image = $imginput;
        $insert->save();

        //specification

        $inputrec = recommended::findOrFail($id);
        $inputmin = minimum::findOrFail($id) ;

        //recomended

            $inputrec->name = $request->input('name');
            $inputrec->OS = $request->input('recos');
            $inputrec->processor = $request->input('recprocessor');
            $inputrec->memory = $request->input('recmemory');
            $inputrec->graphic = $request->input('recgraphic');
            $inputrec->storage = $request->input('recstorage');
            $inputrec->save();

        //minimum

            $inputmin->name = $request->input('name');
            $inputmin->OS = $request->input('minos');
            $inputmin->processor = $request->input('minprocessor');
            $inputmin->memory = $request->input('minmemory');
            $inputmin->graphic = $request->input('mingraphic');
            $inputmin->storage = $request->input('minstorage');
            $inputmin->save();
        //endspec

            return redirect('/game');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::findOrFail($id);
        $delete->forceDelete();
        return redirect('/user');
    }
    public function destroygame($id)
    {
        $delete = Game::findOrFail($id);
        unlink(public_path('storage/image/'.$delete->image));
        unlink(public_path('storage/file/'.$delete->file));
        $delmin = minimum::where('name' , '=' , $delete->name);
        $delrec = recommended::where('name' , '=' , $delete->name);
        $delmin->forceDelete();
        $delrec->forceDelete();
        $delete->forceDelete();
        return redirect('/game');
    }
    public function destroygenre($id)
    {
        $delete = genre::findOrFail($id);
        $delete->forceDelete();
        return redirect('/genre');
    }
    public function download($id){
            $find=Game::findOrFail($id);
            $file_name = $find->file;
            $file_path = public_path('storage/file/'.$file_name);
            return response()->download($file_path);
            return redirect('/game');
        }
    public function destroyyear($id)
    {
        $delete = genre::findOrFail($id);
        $delete->forceDelete();
        return redirect('/year');
    }
}
