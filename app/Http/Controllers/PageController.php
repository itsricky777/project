<?php

	namespace App\Http\Controllers;

	use App\Game;
	use App\User;
	use App\genre;
	use App\minimum;
	use App\recommended;
	use App\gameyear;

	use App\Http\Controllers;

	use Illuminate\Http\Request;

	class PageController extends Controller{

		public function landing(){
			return view('index');
		}
		public function user(){
			$data=User::all();
			return view('admin.data.user')->with('data',$data);
		}
		public function game(){
			$game=Game::all();
			$genre=genre::all();
			$min= minimum::all();
			$rec= recommended::all();
			return view('admin.data.game')->with('game',$game)->with('genre',$genre)->with('min' , $min)->with('rec' , $rec)->with('datagenre')->with('minim')->with('recom');
		}
		public function genre(){
			$genre=genre::all();
			return view('admin.data.genre')->with('genre',$genre);
		}
		public function admin(){

				$data=User::all();
				$game=Game::all();
				$genre=genre::all();
				$year=gameyear::all();
			return view('admin.index')->with('data',$data)->with('game',$game)->with('genre',$genre)->with('year' , $year);
		}

		public function getAutocompleteData(Request $request){
        $query = $request->get('term', '');
        $info = Game::where('name' , 'LIKE' ,'%'.$query.'%')->get();

        $data = [];
        	foreach ($info as $infos) {
        		$data[]=[
        			'name'=>$infos->name,
        			'id'=>$infos->id
        		];
        	}
        	if (count($data)>0) {
        		return ['name'=>$infos->name];
        	}
        	else{
        		return ['name'=>'No Result'];
        	}
        
        }
        public function homegame(){
			$game=Game::all();
			$genre=genre::all();
			$min= minimum::all();
			$rec= recommended::all();
			return view('gamedata')->with('game',$game)->with('genre',$genre)->with('min' , $min)->with('rec' , $rec)->with('datagenre')->with('minim')->with('recom')->with('search');
		}
		public function gamesearch(Request $request){
			$search=$request->input('Search-text');
			$game=Game::where('name' , 'LIKE' ,'%'.$search.'%')->get();
			$genre=genre::all();
			$min= minimum::all();
			$rec= recommended::all();
			return view('gamedata')->with('game',$game)->with('genre',$genre)->with('min' , $min)->with('rec' , $rec)->with('datagenre')->with('minim')->with('recom')->with('search' , $search);
		}

		public function download($id){
			$find=Game::findOrFIle($id);
			$file_name = $find->file;
			$file_path = public_path('storage/file/'.$file_name);
    		return response()->download($file_path);
		}
		public function year(){
			$gameyear=gameyear::all();
			return view('admin.data.year')->with('year',$gameyear);
		}
    }


?>