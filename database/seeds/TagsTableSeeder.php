<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $tags = ['Europe', 'America', 'Asia', 'Africa', 'Oceania'];

    foreach ($tags as $tag) {
      $new_tag = new Tag();
      $new_tag->tag_name = $tag;
      $new_tag->save();
    }
  }
}
