<?php

use App\Models\Flyer;
use Illuminate\Database\Seeder;

class FlyersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Flyer::create(
            [
                'user_id' => 1,
                'area' => 'Najjera',
                
            ]
        );

        Flyer::create(
            [
                'user_id' => 2,
                'area' => 'Kamyokya',
                
            ]
        );

        Flyer::create(
            [
                'user_id' => 3,
                'area' => 'Kajjansi',
                
            ]
        );
    }
}
