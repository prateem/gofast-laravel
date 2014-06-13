<?php

class AnnouncementTableSeeder extends Seeder {

  public function run() {

    Announcement::truncate();

    Announcement::create([
      'title' => 'test post please ignore',
      'body' => 'I\'m just a poor test, I need no sympathy.',
      'created_at' => '2014-06-12 11:30:12'
    ]);

    Announcement::create([
        'title' => 'Game of Thrones Season Premiere',
        'body' => 'You know, the show is starting to diverge a bit from the books. A bit inevitable, for sure. At least it\'s nothing too drastic, and at its core, it stays faithful to G.R.R.M\'s writings.',
        'created_at' => '2014-06-12 11:31:12'
    ]);

    Announcement::create([
        'title' => 'Authorities Make a Sweet Find',
        'body' => 'Police raided the home of GoFast owners today to find a sweet bag of Swiss chocolate. The owners relative Jason Somai was later found guilty of hiding the evidence of a gift his friends got him because he can\'t eat chocolate.',
        'created_at' => '2014-06-12 11:32:12'
    ]);

    Announcement::create([
        'title' => 'Krillin Owned Count',
        'body' => 'What\'s it at again? That shit is funny.',
        'created_at' => '2014-06-12 11:33:12'
    ]);

    Announcement::create([
        'title' => 'Sweet Dolla Tea from McDonalds',
        'body' => "I drink that. Supa hot fire. I spit that. Two and a Half Men. I watch that...\n\nI'm not a rapper.",
        'created_at' => '2014-06-12 11:34:12'
    ]);

    Announcement::create([
        'title' => 'That ain\'t Falco',
        'body' => 'OH OH OH OHHOH OH OH OH OH OH OHHHHH',
        'created_at' => '2014-06-12 11:35:12'
    ]);

    Announcement::create([
        'title' => 'The Legend of Groose',
        'body' => 'Zelda\'s panties are so wet.',
        'created_at' => '2014-06-12 11:36:12'
    ]);

  }

}