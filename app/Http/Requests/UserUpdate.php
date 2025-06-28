<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdate extends FormRequest
{

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
        $userId = $this->user() ? $this->user()->id : null;

        return [
            'phone' => 'sometimes|nullable|string|min:6|max:20',
            'phone2' => 'sometimes|nullable|string|min:6|max:20',
            'email' => 'sometimes|nullable|email|max:100|unique:users,email,' . $userId,
            'username' => 'required|alpha_dash|min:8|max:100|unique:users,username,' . $userId,
            'photo' => 'nullable|image|max:20480', // 20MB in kilobytes
            'address' => 'required|string|min:6|max:120',
            'name' => 'required|string|max:255',
        ];
    }

    public function attributes()
    {
        return  [
            'nal_id' => 'Nationality',
            'state_id' => 'State',
            'lga_id' => 'LGA',
            'phone2' => 'Telephone',
        ];
    }
}
