<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // que se cree un post apartir del factory que acabamos de crear
        factory(App\Post::class,50)->create();
    }
}
