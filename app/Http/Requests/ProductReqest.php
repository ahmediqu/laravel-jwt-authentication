<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class ProductReqest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = new JsonResponse(['data' => [],
            'meta' => [
                'message' => 'The given data is invalid',
                'errors' => $validator->errors()
            ]], 422);

        throw new ValidationException($validator, $response);
    }

}
