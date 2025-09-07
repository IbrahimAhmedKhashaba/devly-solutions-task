<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Session;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        $id = request()->user()->id;
        if ($this->is('*/password')) {
            return [
                'password' => 'required|string|max:255|confirmed'
            ];
        }
        return [
            //
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:rfc,dns|max:255|unique:users,email,'.$id,
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        if ($this->expectsJson()) {
            throw new HttpResponseException(
                response()->json([
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422)
            );
        } else {
            foreach ($validator->errors()->all() as $error) {
                Session::flash('error', $error);
            }

            throw new HttpResponseException(
                redirect()->back()->withInput()
            );
        }
    }
}
