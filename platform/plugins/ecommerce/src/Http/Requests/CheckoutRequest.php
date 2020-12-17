<?php

namespace Botble\Ecommerce\Http\Requests;

use Botble\Ecommerce\Enums\ShippingMethodEnum;
use Botble\Payment\Enums\PaymentMethodEnum;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class CheckoutRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     *
     */
    public function rules()
    {
        $rules = [
            'payment_method'  => 'required|' . Rule::in(PaymentMethodEnum::values()),
            'shipping_method' => 'required|' . Rule::in(ShippingMethodEnum::values()),
            'amount'          => 'required|min:0',
        ];

        $rules['address.address_id'] = 'required_without:address.name';
        if (!$this->has('address.address_id') || $this->input('address.address_id') === 'new') {
            $rules['address.name'] = 'required|min:3|max:120';
            $rules['address.phone'] = 'required|numeric';
            $rules['address.email'] = 'required|email';
            $rules['address.state'] = 'required';
            $rules['address.city'] = 'required';
            $rules['address.address'] = 'required|string';
        }

        if ($this->input('create_account') == 1) {
            $rules['password'] = 'required|min:6';
            $rules['password_confirmation'] = 'required|same:password';
            $rules['address.email'] = 'required|max:60|min:6|email|unique:ec_customers,email';
            $rules['address.name'] = 'required|min:3|max:120';
        }

        return $rules;
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'address.email.unique' => __('The customer with that email is existed, please choose other email or login with this email!'),
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        $attributes = [
            'address.name'       => __('name'),
            'address.phone'      => __('phone'),
            'address.email'      => __('email'),
            'address.state'      => __('state'),
            'address.city'       => __('city'),
            'address.address'    => __('address'),
            'address.address_id' => __('address'),
        ];

        return array_merge(parent::attributes(), $attributes);
    }
}
