<?php

class HomeController extends BaseController {

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
	public function whoisGet() {
		return View::make('whois');
	}
	public function whoisPost() {
		$domains = Input::get('domains');
		$lookup = new Whois\Whois($domains);
		$results = $lookup->showResults();
		return View::make('results')->withResults($results);
	}
}
