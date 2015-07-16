<?php

class PublicDoc extends Eloquent {
	protected $guarded = array();

	protected $table = 'v_public_doc';

	public static $rules = array();

	/**
	 * [getAllPurpose description]
	 * @param  [type] $perPage [description]
	 * @return [type]          [description]
	 */
	public function getAllDoc()
	{
		$pubdoc = PublicDoc::all();
		return $pubdoc;
	}

}