<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Session;

class EmployeeRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:rfc,dns|max:255|unique:employees,email',
            'salary' => 'required|numeric',
            'department_id' => 'required|exists:departments,id',
        ];

        if ($this->method() == 'PUT') {
            $data['email'] = 'required|string|email:rfc,dns|max:255|unique:employees,email,' . $this->route('employee');
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
