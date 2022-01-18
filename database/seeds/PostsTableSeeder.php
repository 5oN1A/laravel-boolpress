<?php

use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
            for ($i=0; $i < 3; $i++) { 
                
           $newPost = new Post();
           $newPost->title=$faker->sentence(6, true);
           $newPost->content=$faker->realText(100, 2);
           $newPost->category='trips';
          
           $newPost->save();
        }
    
    }
}
