<?php

namespace App\Http\Requests;

use App\Models\AdListing;
use Cloudinary\Cloudinary;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class AdListingRequest extends FormRequest
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
            'contact' => 'required',
            'description' => 'required',
            'images' => 'required',
            'location' => 'required',
            'price' => 'required',
        ];
    }

    public function save()
    {
        $data = $this->request->all();
        $data['uuid'] = (string) Str::uuid();
        $ad = AdListing::create($data);

        if($this->hasFile('images')){
            $images = $this->file('images');


            $cloudinary = app()->make(Cloudinary::class);

            for($i=0; $i < count($images); $i++){
                $fileNameToStore[$i] = Str::uuid();
                try {
                    session(['message' => 'Uploading images']);
                    $upload_responses[] = $cloudinary->uploadApi()->upload($images[$i]->getRealPath(),[
                        'folder' => 'rms',
                        'use_filename' => true,
                        'public_id' => $fileNameToStore[$i]
                    ])->getArrayCopy();

                    session(['message' => 'Upload successful']);
                }catch (\Exception $e){
                    dd($e);
                }
            }
            foreach ($upload_responses as $upload_response){
                $links[] = ['url' => $upload_response['secure_url']];
            }
            $ad->images()->createMany($links);
        }
    }
}
