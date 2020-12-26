<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// This request will act as an abstract parent class for other requests and will
// also use abstract methods.
// To review, abstract classes and methods are classes and methods which are not
// intended to be instantiated, meaning that they are not supposed to be used in
// an instance of a class to create an object.
// They are only supposed to be used once they are inherited by a child class.
abstract class Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    abstract public function authorize();

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();
}
