<?php

class AlbumController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showSeedAlbum()
	{
		$album = new Album;
		$album->title = 'Some Mad Hope';
		$album->artist = 'Matt Nathanson';
		$album->genre = 'Acoustic Rock';
		$album->year = 2007;
		$album->save();

		$album = new Album;
		$album->title = 'Please';
		$album->artist = 'Matt Nathanson';
		$album->genre = 'Acoustic Rock';
		$album->year = 1993;
		$album->save();

		$album = new Album;
		$album->title = 'Leaving Throught The Window';
		$album->artist = 'Something Corp';
		$album->genre = 'Piano Rock';
		$album->year = 2002;
		$album->save();

		$album = new Album;
		$album->title = '...Anywhere But here';
		$album->artist = 'Something Corp';
		$album->genre = 'Punk Rock';
		$album->year = 1997;
		$album->save();

		$album = new Album;
		$album->title = '...Is A Real Boy';
		$album->artist = 'Something Corp';
		$album->genre = 'Indie Rock';
		$album->year = 2006;
		$album->save();
	
	}

	public function showUpdateGame()
	{
		$game = new Games;
		$game->name = 'Assassins Creed';
		$game->description = 'Assassins VS tamplars.';
		$game->save();

		$game = new Games;
		$game->name = 'Assassins Creed 2';
		$game->description = 'Assassins VS tamplars.';
		$game->save();

		$game = new Games;
		$game->name = 'Assassins Creed 3';
		$game->description = 'Assassins VS tamplars.';
		$game->save();
	}

	public function showAlbum($id)
	{
		$album = Album::find($id);
		//Album::find(array(1, 3));
		//Album::first();

		return $album;
	}

	public function showAlbumAll()
	{
		$albums = Album::all();
		foreach ($albums as $album){
			echo $album->title.'<br>';
		}
	}

	public function showAlumUpdate()
	{
		Album::where('artist','=','Matt Nathanson')
			->update(array('artist'=>'Dayle Rees'));
		return Album::all();
	}

	public function showAlumDel()
	{
		Album::where('artist','=','Matt Nathanson')
			->delete();
		return Album::all();
	}

	public function delAllTableRow()
	{
		Album::truncate();
		return Album::all();
	}

	public function useGetInsteadAll()
	{
		return Album::where('artist','=','Something Corp')
				->get(array('id','title'));
	}

	public function retriveSingleCol()
	{
		return Album::pluck('id');
	}

	public function retriveArrayValue()
	{
		return Album::lists('artist');
	}

	public function tosql()
	{
		return Album::where('artist','LIKE','...%')
				->where('artist','=','Something')
				->toSql();
	}

	public function orWhere()
	{
		return Album::where('artist','LIKE','...%')
				->orWhere('artist','=','Something')
				->toSql();
	}

	public function whereIn()
	{
		$values = array('Something Corporate', 'The Ataris');
		//return Album::whereNotIn('artist',$values)
		return Album::whereIn('artist',$values)
				->toSql();
	}

	public function whereRaw()
	{
		return Album::whereRaw('artist = ? and title LIKE ?',array(
					'Say Anything','aaa',
					'...%'
				))
				->toSql();
	}

	public function whereBetween()
	{
		return Album::whereBetween('artist',array('a','b','c'))
				->toSql();
	}

	public function whereNested(){
		return Album::whereNested(function($query){
			$query->where('year','>',2000);
			$query->where('year','<',2005);
		})
		->orWhere(function($query){
			$query->where('year','=',1997);
		})
		->toSql();
	}

	public function whereBetween2()
	{
		//return Album::whereNotNull('artist')
		return Album::whereNull('artist')
				->toSql();
	}

	public function orderBy()
	{
		Album::where('artist','=','Matt Nathanson')
			->orderBy('year','desc');
		return Album::all();
	}

	public function limitResult()//use for limit result by use take(),use offset by skip()
	{
		return Album::where('artist','Like','Dayle%')
			->orderBy('year','desc')
			->take(1)
			->skip(1)
			->get();
		
	}

	public function magicWhere()
	{
		return Album::whereArtist('Something Corp')
			->orderBy('year','desc')
			->get();
		
	}

	public function getTestModel()
	{
		return Album::testModel('%Boy%')->get();
		
	}

	//collectoin
	public function collectoinAlbum()
	{
		$collection = Album::all();
		var_dump($collection->all());
		
	}

	public function collectoinAlbumFirst()
	{
		$collection = Album::all();
		var_dump($collection->first());
		
	}

	public function collectoinAlbumLast()
	{
		$collection = Album::all();
		var_dump($collection->last());
		
	}

	public function collectoinAlbumShift()
	{
		$collection = Album::all();
		var_dump(count($collection));
		var_dump($collection->shift());
		var_dump(count($collection));
		
	}

	public function collectoinAlbumPop()
	{
		$collection = Album::all();
		var_dump(count($collection));
		var_dump($collection->pop());
		var_dump(count($collection));
		
	}

	public function collectoinAlbumEach()
	{
		$collection = Album::all();
		$collection->each(function($album){
			var_dump($album->title);
		});
	}

	public function collectoinAlbumMap()
	{
		$collection = Album::all();
		$new = $collection->map(function($album){
			return 'An ode to a fire panda: '.$album->title;
		});
		var_dump($new);
	}

	public function collectoinAlbumFilter()
	{
		$collection = Album::all();
		$new = $collection->filter(function($album){
			if($album->artist == 'Somethin Corp'){
				return true;
			}
		});
		var_dump($new);
	}

	public function collectoinAlbumSort()
	{
		$collection = Album::all();
		$collection->sort(function($a,$b){
			$a = $a->year;
			$b = $b->year;

			if($a === $b){
				return 0;
			}

			return ($a > $b) ? 1 : -1;
		});

		$collection->each(function($album){
			var_dump($album->year);
		});
	}

	public function collectoinAlbumReverse()
	{
		$collection = Album::all();
		$collection->each(function($album){
			var_dump($album->title);
		});

		$reverse = $collection->reverse();
		$reverse->each(function($album){
			var_dump($album->title);	
		});
		
	}

	public function collectoinAlbumMerge()
	{
		$a = Album::where('artist','=','Something Corp')
					->get();
		$b = Album::where('artist','=','Matt Nathanson')
					->get();

		$result = $a->merge($b);
		$result->each(function($album){
			echo $album->title.'<br>';
		});
		
	}

	public function collectoinAlbumSlice()
	{
		$collection = Album::all();
		//$sliced = $collection->slice(2,4);
		$sliced = $collection->slice(-2,4);

		$slice->each(function($album){
			echo $album->title.'<br>';
		});
		
	}

	public function collectoinAlbumIsEmpty()
	{
		$collection = Album::where('title','=','foo')->get();
		var_dump($collection->isEmpty());
	}

	public function collectoinAlbumToArray()
	{
		$collection = Album::all();
		var_dump($collection->toArray());
	}

	public function collectoinAlbumJson()
	{
		$collection = Album::all();
		echo $collection->toJson();
	}

	public function collectoinAlbumCount()
	{
		$collection = Album::all();
		echo $collection->count();
	}


}