<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function ratings()
    {
        return $this->hasMany(ProductReview::class)->where('approve',1);
    }

    public static function calculateRating($avg)
    {
        $avgAfterRound = floor($avg);

        for($i=1 ; $i<=5 ; $i++)
        {
           $checked =  $i<=$avgAfterRound? 'checked' : '';
            echo '<i class="fa fa-star '.$checked.'"></i>';
        }
    }
}
