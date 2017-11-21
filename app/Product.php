<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Product extends Model
{
    protected $fillable = ['name','code','category_id'];

	 use SoftDeletes;

	public function category (){
		return $this->belongsTo(Category::class, 'category_id');
	}

	protected $timestamps = false;
	protected $dates = ['deleted_at'];
}
