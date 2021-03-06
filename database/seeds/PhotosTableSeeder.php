<?php

use App\Models\Photo;
use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Photo::create(
            [
                'flyer_id'  => 1,
                'name'      => '1496732214-88394_26493584_IMG_01_0000_max_476x317.jpg',
                'path'      => 'img/demo/1496732214-88394_26493584_IMG_01_0000_max_476x317.jpg',
                'thumbnail_path' => 'img/demo/tn-1496732214-88394_26493584_IMG_01_0000_max_476x317.jpg'
            ]
        );

        Photo::create(
            [
                'flyer_id'  => 2,
                'name'      => '1497342415-88394_26493584_IMG_01_0000_max_476x317.jpg',
                'path'      => 'img/demo/1497342415-88394_26493584_IMG_01_0000_max_476x317.jpg',
                'thumbnail_path' => 'img/demo/tn-1497342415-88394_26493584_IMG_01_0000_max_476x317.jpg '
            ]
        );

        Photo::create(
            [
                'flyer_id'  => 3,
                'name'      => '1497348058-73de32f9e5a0db66ec7805bb7cb3f807.jpg',
                'path'      => 'img/demo/1497348058-73de32f9e5a0db66ec7805bb7cb3f807.jpg',
                'thumbnail_path' => 'img/demo/tn-1497348058-73de32f9e5a0db66ec7805bb7cb3f807.jpg'
            ]
        );
    }
}
