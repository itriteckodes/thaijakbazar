<?php

namespace App\Models;

use App\Helpers\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Product extends Model
{
    protected $fillable = [
        'vendor_id', 'cat_id', 'subcat_id', 'name', 'handle', 'price', 'old_price', 'description', 'stock', 'sales', 'rating','thumbnail','shipping','product_no','deleted','country_id'
    ];

    protected $appends = [
        'in_cart', 'in_wish', 'category', 'subcategory', 'images',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];


    /******************Accessors***********************/
    public function getCategoryAttribute()
    {
        return $this->category()->first();
    }

    public function getSubCategoryAttribute()
    {
        return $this->subcategory()->first();
    }

    public function getImagesAttribute()
    {
        return $this->images()->get();
    }

    public function getInWishAttribute()
    {
        $found = WishList::where('product_id', $this->id)->first();
        return $found != null;
    }

    public function getInCartAttribute()
    {
        return Cart::has($this->id);
    }
    /******************End Accessors***********************/

    /******************Relationships***********************/
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcat_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function wishLists()
    {
        return $this->hasMany(WishList::class);
    }
    public function related()
    {
        return $this->category->products->take(6);
    }
    /******************End Relations***********************/


    /******************Static Getters***********************/
    public static function new()
    {
        return (new static)::where('country_id',Session::get('country_id'))->where('deleted',false)->OrderBy('id', 'desc')->take(8)->get();
    }

    public static function TopRated()
    {
        return (new static)::where('country_id',Session::get('country_id'))->where('deleted',false)->OrderBy('rating')->take(5)->get();
    }

    public static function TopSeller()
    {
        return (new static)::where('country_id',Session::get('country_id'))->where('deleted',false)->OrderBy('price', 'desc')->take(18)->get();
    }
    /******************End Static Getters***********************/

    // public function setHandleAttribute($value){
	//     $this->attributes['handle'] = str_replace(' ', '%20', $request->name); 
    // }
}
