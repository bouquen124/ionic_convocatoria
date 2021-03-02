<?php

namespace App\Http\Requests\API;

use App\Models\C_tipo;
use InfyOm\Generator\Request\APIRequest;

class UpdateC_tipoAPIRequest extends APIRequest
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
        $rules = C_tipo::$rules;
        
        return $rules;
    }
}
