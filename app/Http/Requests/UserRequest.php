<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
{
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
        $rules = [
            'name' => 'required|max:255',
        ];
        if ($this->route('users')) {
            $optionalRules = [
                'email' => 'required|email|max:255|unique:users,email,' . $this->route('users'),
                'password' => 'confirmed|min:6',
            ];
        } else {
            $optionalRules = [
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6',
            ];
        }
        
        return array_merge($rules, $optionalRules);
    }
}
