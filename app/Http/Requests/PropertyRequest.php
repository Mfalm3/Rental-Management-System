<?php

namespace App\Http\Requests;

use App\Models\Property;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

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
        $uuid = (string) Str::uuid();
        $data = [ $uuid,...$this->request->all()];
       return Property::create(data);
    }
}
