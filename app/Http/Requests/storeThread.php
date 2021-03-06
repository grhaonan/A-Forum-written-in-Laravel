<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeThread extends FormRequest
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
            //
            'title' => 'required',
            'body' => 'required',
            'channelId' =>'required|exists:channels,id'
        ];
    }

    public function messages ()
    {
        return  [
            'title.required' => 'Title is required',
            'body.required' => 'Body is required',
            'channelId.required' => 'Channel id is required',
            'channelId.exists' => 'The channel id has to be a valid value'
        ];
    }



}
