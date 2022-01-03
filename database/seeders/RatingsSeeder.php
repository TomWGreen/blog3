<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use willvincent\Rateable\Rateable;

class RatingsSeeder extends Seeder
{
    use Rateable;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('ratings')->delete();

        $post1 = Post::find(1);
        $post2 = Post::find(2);
        $post3 = Post::find(3);

        Auth::loginUsingId(1);
        $post1->rate(5);
        $post2->rate(1);
        $post3->rate(3);

        Auth::loginUsingId(2);
        $post1->rate(4);
        $post2->rate(4);
        $post3->rate(3);
    }
}
