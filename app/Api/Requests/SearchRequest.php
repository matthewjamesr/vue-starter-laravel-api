<?php

namespace Api\Requests;

use Dingo\Api\Http\FormRequest;

class SearchRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
	    	'query' => 'max:100'
    	];
	}
}