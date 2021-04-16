<?php

namespace App\Http\Requests;

use App\Models\Property;
use Cloudinary\Api\Exception\ApiError;
use Cloudinary\Cloudinary;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Cloudinary\Api\Upload\UploadApi;

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
        if($this->hasFile('images')){
            $images = $this->file('images');

            $cloudinary = app()->make(Cloudinary::class);

            $fileName = $this->request->get('name');

            for($i=0; $i < count($images); $i++){
                $fileNameToStore[$i] = Str::of($fileName)->slug()->append($i+1);

                try {
                    $upload_responses[] = $cloudinary->uploadApi()->upload($images[$i]->getRealPath(),[
                        'folder' => 'rms',
                        'use_filename' => true,
                        'public_id' => $fileNameToStore[$i]
                    ])->getArrayCopy();
                } catch (ApiError $e) {
                    echo $e;
                }

            }
            foreach ($upload_responses as $upload_response){
                $links[] = ['url' => $upload_response['secure_url']];
            }
        }

        $property =  Property::create(array_merge($this->request->all(), ['uuid'=>$uuid]));
        $property->images()->createMany($links);
    }
}
