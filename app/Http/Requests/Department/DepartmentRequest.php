<?php

namespace App\Http\Requests\Department;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Session;

class DepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $data = [
            //
            'name' => 'required|string|max:255|unique:departments,name',
        ];

        if ($this->method() == 'PUT') {
            $data['name'] = 'required|string|max:255|unique:departments,name,' . $this->route('department');
        }

        return $data;
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
