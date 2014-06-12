<?php

class JobTableSeeder extends Seeder {
  public function run() {
    DB::table('jobs')->delete();

    Job::create([
      'title' => 'Service Provider',
      'description' => 'Need someone to do things.',
      'requirements' => 'You need eyes, and hands. And preferably feet, too.',
      'closing' => '2014-12-25',
      'created_at' => '2014-06-12 11:30:12'
    ]);

    Job::create([
      'title' => 'Water Boy',
      'description' => 'Everyone gets thirsty! Help us out!',
      'requirements' => 'Must be able to identify clean sources of water.',
      'closing' => '2020-07-28',
      'created_at' => '2014-06-12 11:31:12'
    ]);

    Job::create([
        'title' => 'Pizza Delivery Man',
        'description' => 'You will be responsible for going out and getting us pizza.',
        'requirements' => 'Must have a car.',
        'closing' => '2014-09-13',
        'created_at' => '2014-06-12 11:32:12'
    ]);

    Job::create([
        'title' => 'Pizza Delivery Woman',
        'description' => 'Because we do not gender discriminate at GoFast Inc. You will be responsible for going out and getting us pizza.',
        'requirements' => 'Must have a car.',
        'closing' => '2014-09-13',
        'created_at' => '2014-06-12 11:33:12'
    ]);

    Job::create([
        'title' => 'Truck Driver',
        'description' => 'Drive for a long time and sleep in your truck cabin.',
        'requirements' => 'Grizzly exterior and gruff voice. Must have a beard.',
        'closing' => '2015-01-01',
        'created_at' => '2014-06-12 11:34:12'
    ]);

    Job::create([
        'title' => 'Junior Mechanic',
        'description' => 'Work on fixing our delivery vehicles.',
        'requirements' => '200 years of experience through previous employment opporunities.',
        'closing' => '2014-12-14',
        'created_at' => '2014-06-12 11:35:12'
    ]);

    Job::create([
        'title' => 'Tony the Tiger',
        'description' => 'Not quite sure what we were after with this one, but hey, upper management handles my paycheck!',
        'requirements' => 'Must be able to roll your r\'s for stupidly large periods of time.',
        'closing' => '2016-03-21',
        'created_at' => '2014-06-12 11:36:12'
    ]);

    Job::create([
        'title' => 'Systems Analyst',
        'description' => 'For legacy\'s sake.',
        'requirements' => 'Must be able to drive a racecar... because Yes.',
        'closing' => '2019-06-30',
        'created_at' => '2014-06-12 11:37:12'
    ]);
  }
}