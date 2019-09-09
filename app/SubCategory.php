<?php
namespace App;
use Illuminate\Database\Eloquent\Model;



class SubCategory extends Model

{

   protected $table = 'subcategory';
    
   protected $fillable = ['category_id','sub_cat_name','sub_cat_info'];

   public function childs() {

        return $this->hasMany('App\SubCategory','category_id','id') ;

    }
}

?>