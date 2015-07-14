<?php
class Album extends Eloquent
{
	public $timestamps = false;

	public function scopeTestModel($query,$word)
	{
		return $query->where('title','LIKE',$word);
	}
}