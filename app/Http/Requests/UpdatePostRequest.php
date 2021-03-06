<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class UpdatePostRequest extends FormRequest
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
        // return [
        //     //
        //     //
        //     'title'=>['required','min:3','unique:posts,title,',$this->post.''],
        //     // 'title' => 'required|unique:posts|max:255',
        //     'description'=>['required','min:10'],
        //     //name of coloun and name of table
        //     'user_id'   => 'required|exists:users,id',
        // ];
            // dd($this->post.'');
        return [
            'title' => ['required','unique:posts,title,'.$this->post.'' ,'min:3'],
            'description' => ['required', 'min:10'],
            'user_id'=>['exists:App\Models\User,id'],
            ];

        // return [
        //     'title'         => 'required|min:3|unique:posts,title,'.$this->post,
        //     'description'   => 'required|min:10',
        //     'user_id'       => 'required|exists:users,id',
        // ];
    }



    public function messages()
    {
      
    
        return [
            //
            'title.required'=>'show this message', 
          'title.min'=>'override min validation rule default message',
            
        ];
    }

}