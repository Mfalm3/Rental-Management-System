<?php

namespace App\Http\Requests;

use App\Models\Property;
use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
        return [
            'landlord_id' => 'required|int',
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ];
    }

    public function save()
    {
       return Property::create($this->request->all());
    }
}
