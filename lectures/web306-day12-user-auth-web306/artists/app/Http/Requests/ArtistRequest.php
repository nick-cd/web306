<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Elegant\Sanitizer\Laravel\SanitizesInput;

class ArtistRequest extends Request
{
    // The Elegant Sanitizer library uses SanitizesInput which is what is a PHP
    // construct known as a trait.
    // Traits are kind of like utility classes which are intended to only be
    // used by other classes.
    // In order to use a trait it is necessary to write the use keyword inside
    // of the class which is using it followed by the name of the trait.
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
            'name' => 'required|regex:([a-zA-Z\-. ]+)|max:255',
            'image' => 'required_without:old_image|nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'styles' => 'required',
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     *  @return array
     */
    public function filters()
    {
        return [
            'name'  => 'trim|strip_tags|capitalize',
            'image'  => 'trim|strip_tags',
            'styles' => 'trim|strip_tags',
        ];
    }
}
