<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
        return [
            'name'=>['required', 'min:3', 'max:25'],
            'email'=>['required', 'email', 'unique:users'],
            'password'=>['required', Password::defaults()],
        ];
    }

    public function attemptRegister(){
        if($user = User::create($this->validated())){
            auth()->login($user);
            return true;
        }
        
        return false;
    }
}
