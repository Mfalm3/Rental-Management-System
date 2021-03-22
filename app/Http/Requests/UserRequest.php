<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRequest extends FormRequest
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
     * Customize the Validation message
     *
     * @return string
     * */
    public function messages()
    {
        return  [
            'type.required'=> 'You must provide the <strong>USER type(tenant,landlord,agent)</strong>'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'type' => 'required|string'
        ];
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function save(){
        $type = '\\App\\Models\\'.ucfirst($this->request->get('type'));
        $typeable = $type::create($this->request->all());

        $user = User::create([
            'name' => $this->request->get('name'),
            'email' => $this->request->get('email'),
            'password' => Hash::make($this->request->get('password')),
            'typeable_id'   => $typeable->id,
            'typeable_type' => get_class($typeable)
        ]);
        Auth::login($user);
        event(new Registered($user));

    }
}
