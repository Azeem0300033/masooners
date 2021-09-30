<?php

namespace App\Http\Requests;

use App\Models\OrderProduct;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrderProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_product_edit');
    }

    public function rules()
    {
        return [
            'order_no' => [
                'string',
                'nullable',
            ],
            'product' => [
                'string',
                'nullable',
            ],
            'quantity' => [
                'string',
                'nullable',
            ],
        ];
    }
}
