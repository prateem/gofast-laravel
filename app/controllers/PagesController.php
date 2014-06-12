<?php

class PagesController extends BaseController {

	public function home() {
    $news = Announcement::orderBy('created_at', 'DESC')->take(3)->get();
    $this->layout->title = "Home";
		$this->layout->content = View::make('home')->withNews($news);
	}

  public function about() {
    $this->layout->title = "About";
    $this->layout->content = View::make('about');
  }

}
