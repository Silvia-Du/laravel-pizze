<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PizzaRequest extends FormRequest
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
            'name'=> 'required | min:3 | max:50',
            'price'=> 'required | min:1 | max:999,99 | numeric',
            'ingredients'=> 'required',
            'popularity'=> 'nullable | max:10 '
            //qui va corretto un bug della popolarità
        ];
    }

    public function messages()
    {
        // 'name.required'=>'Il nome è obbligatorio',
       return[
        'required'=> 'Il campo :attribute è obbligatorio',
        'min'=> [
            'numeric'=> 'il valore di :attribute non può essere inferiore a :min',
            'string'=> 'il campo :attribute non può avere meno di :min caratteri'
        ],

        'max'=> [
            'numeric'=> 'il valore di :attribute deve essere inferiore a :max',
            'string'=> 'il campo :attribute non può avere meno di :max caratteri'
        ],

        'numeric'=> 'Il campo :attribute deve essere un numero'
       ];

    }

    public function attributes()
    {
        return [
            'name'=>'nome',
            'price'=>'prezzo',
            'ingredients'=>'ingredienti',
            'popularity'=>'popolarità',
        ];
    }
}
