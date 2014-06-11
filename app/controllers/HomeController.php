<?php

class HomeController extends BaseController {

	public function index() {
    $news = Announcement::orderBy('posted', 'DESC')->take(3)->get();
		$this->layout->content = View::make('home', ['news' => $news]);
	}

  public function about() {
    $this->layout->content = View::make('about');
  }

}
