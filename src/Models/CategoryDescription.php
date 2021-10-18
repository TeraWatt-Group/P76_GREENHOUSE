<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDescription extends Model
{
	use HasFactory;

	public $table = 'category_description';
	public $primaryKey = 'category_id';

	protected $guarded = [];
}