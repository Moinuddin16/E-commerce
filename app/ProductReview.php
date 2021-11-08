<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
  
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function displayRatings($ratings)
    {
        for($i=1 ; $i<=5 ; $i++)
        {
           $checked =  $i<=$ratings? 'checked' : '';
            echo '<i class="fa fa-star '.$checked.'"></i>';
        }
    }
    public static function returnRatingsStars($ratings)
    { 
        $stars = '';
        for($i=1 ; $i<=5 ; $i++)
        {
          
           $stars.= '<span class="fa fa-star';
           $i <= $ratings ? $stars.= ' checked': $stars.= '';
           $stars.='"></span>';
        }
    
        return $stars;
    }

    
}
