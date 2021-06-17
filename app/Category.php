<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
 	public function subCategory() {
			return $this->hasMany('App\SubCategory', 'category_id', 'id');
	}	
	 public function products() {
                     //   return $this->hasManyThrough('App\SubCategory', 'App\Product', 'id', 'sub_category_id', 'category_id');
			 return $this->hasManyThrough(
            'App\Product',
            'App\SubCategory',
            'category_id', // Foreign key on the environments table...
            'sub_category_id', // Foreign key on the deployments table...
            'id', // Local key on the projects table...
            'id' // Local key on the environments table...
        );
        }
}
