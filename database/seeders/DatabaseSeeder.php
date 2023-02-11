<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Category;
use \App\Models\Post;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::factory()->create(['name' => 'Messi']);
        // Post::factory(5)->create(['user_id' => $user->id]);
        Post::factory(10)->create([]);

        // $personal = Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal',
        // ]);
        // $work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work',
        // ]);
        // $hobby = Category::create([
        //     'name' => 'Hobby',
        //     'slug' => 'hobby',
        // ]);


        // // $user = User::factory()->create([
        // //     'name' => 'Test User',
        // //     'email' => 'test@example.com',
        // // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $personal->id,
        //     'title' => 'Personal Post',
        //     'slug' => 'my-1st-post',
        //     'excerpt' => '<p> Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>',
        //     'body' => '<p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae sunt enim animi non excepturi! Possimus ullam impedit perspiciatis explicabo culpa consequatur ea accusamus, nisi assumenda maiores at eligendi molestias ab.</p>'
        // ]);
        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $work->id,
        //     'title' => 'Work Post',
        //     'slug' => 'my-2nd-post',
        //     'excerpt' => '<p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. </p>',
        //     'body' => '<p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae sunt enim animi non excepturi! Possimus ullam impedit perspiciatis explicabo culpa consequatur ea accusamus, nisi assumenda maiores at eligendi molestias ab. </p>'
        // ]);


    }
}
