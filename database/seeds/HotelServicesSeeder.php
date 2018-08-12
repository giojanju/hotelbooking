<?php

use App\Models\HotelService;
use Illuminate\Database\Seeder;

class HotelServicesSeeder extends Seeder
{
	protected $data = [
		'ცხელი წყალი',
		'გათბობა',
		'აივანი',
		'კონდიციონერი',
		'სააბაზანო',
		'ვინტილაცია',
	];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $d) {
            (new HotelService([
                'ge' => ['title' => $d],
            ]))->save();
        }
    }
}
