<?php 

use Illuminate\Database\Seeder;
use App\Image;
class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Image::class,200)->create();
    }
}