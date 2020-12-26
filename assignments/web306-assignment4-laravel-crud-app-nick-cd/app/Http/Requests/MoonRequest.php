<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Elegant\Sanitizer\Laravel\SanitizesInput;

class MoonRequest extends FormRequest
{
    use SanitizesInput;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'planet_id' => 'required|numeric',
            'image' => 'file|required_without:old_image',
            'img_type' => 'max:32'
        ];
    }

    /**
     * Get Sanitization filters
     * 
     * @return array
     */
    public function filters()
    {
        return [
            'name' => 'trim|strip_tags|cast:string|capitalize',
            'image' => 'mime:jpg,jpeg,png,gif,svg,bmp',
            'img_type' => 'trim|strip_tags|cast:string'
        ];
    }
}
