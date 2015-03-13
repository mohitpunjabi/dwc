<?php namespace App\Http\Requests;


use Illuminate\Support\Facades\Auth;

class SpecialPageRequest extends Request {

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
            'image' => 'image',
            'og_image' => 'image'
        ];
    }

}
