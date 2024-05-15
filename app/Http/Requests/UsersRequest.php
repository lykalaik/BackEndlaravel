<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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

        if (request()->routeIs('user.login')){
            return [
                'username'=>'required|string|max:255',
                'password'=>'required|min:5',       
            ];
        
        }
        else if (request()->routeIs('user.store')){
            return [
                'name'=>'required|string|max:255',
                'email'=>'required|string|email|unique:App\Models\User,email|max:255',
                'password'=>'required|min:5',       
            ];
        }
        else if (request()->routeIs('user.update')){
                return [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'birthmonth' => 'nullable|string|max:255',
            'day' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'zipcode' => 'nullable|string|max:255',
            'phonenumber' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|',
            'username' => 'required|string|max:255|',
            'password' => 'required|string|min:8|max:255',
                ];
        
        }
        return [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'birthmonth' => 'nullable|string|max:255',
            'day' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'zipcode' => 'nullable|string|max:255',
            'phonenumber' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|max:255',
        ];
    }
}
