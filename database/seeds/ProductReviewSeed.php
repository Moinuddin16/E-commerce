<?php

use App\ProductReview;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
class ProductReviewSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // ProductReview::factory(100)->create();
        for($i = 0 ; $i < 200 ; $i++){
          
                DB::table('product_reviews')->insert([
                [
                    'product_id' =>rand(1,5),
                    'user_id'  => rand(2,6),
                    'review' => Str::random(200),
                    'rating' => rand(1,5),
                    'approve' => rand(0,1),
                ],
            ]);
        }
    }
}
