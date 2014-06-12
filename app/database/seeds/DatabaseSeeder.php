<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
    $this->call('JobTableSeeder');
    $this->command->info('Jobs table seeded!');
    $this->call('AnnouncementTableSeeder');
    $this->command->info('Announcements table seeded!');
	}

}
