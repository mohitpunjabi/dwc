<?php namespace App\Http\Requests;


use Illuminate\Support\Facades\Auth;

class LevelRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return Auth::user()->is_admin;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'slug' => 'required|alpha_dash',
			'title' => 'required',
            'image' => 'image',
            'answer' => 'required',
            'points' => 'required|numeric',
            'solution' => 'required'
		];
	}

}
