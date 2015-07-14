<?php

class GamesController extends BaseController {

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

	public function showInitGame()
	{
		$game = new Games;
		$game->name = 'Assassins Creed';
		$game->description = 'Assassins VS tamplars.';
		$game->save();
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

	public function showGame($id)
	{
		$game = Games::find($id);

		return $game->name;
	}

	public function showUpdateGameById($id)
	{
		$game = Games::find($id);
		$game->name = 'Assassins Creed 4';
		$game->description = 'Assassins VS tamplars.';
		$game->save();
	}

	public function showDeleteGameById($id)
	{
		$game = Games::find($id);
		$game->delete();
		//Game::destroy(1, 2, 3);
	}

}