<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Category;
use App\SubCategory;

class ProductController extends Controller
{
    //
    public function listAllCategory() {
		$categories = Category::with('subCategory')->with('products')->get();
		$returnInfo = [];
		foreach($categories as $key => $category) {
				$productInfo = [];
				$productInfo[ "category_".$key ] = $category->name;
				$subCategories = $category->subCategory->filter(function ($value, $key) use ($category) {
   					 return $value['category_id'] == $category->id;
				});

				foreach($subCategories as $sKey => $subCategory ) {
					$products = $categories[$key]->products->filter(function ($value, $key) use ($subCategory) {
                    	 return $value['sub_category_id'] == $subCategory->id;
                	});
					$productList=[];
					if(!empty($products)) {
						foreach($products as $pKey => $product) {
								$productList['product_'.$pKey] = $product->namee;
						}
						$tempProd['name'] = $subCategory->name;
						$tempProd['products'] = $productList;
						$productInfo["sub_cat_".$sKey] = $tempProd;
					} else {
						$productInfo["sub_category_".$sKey] = $subCategory->name; 
					}
				}
			$returnInfo[$key] = $productInfo;
		}
	 
		return Response::json($returnInfo);
	}		    
}
