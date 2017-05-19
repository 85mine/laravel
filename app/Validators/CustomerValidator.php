<?php
namespace App\Validators;

class CustomerValidator extends AbstractValidator
{
    /**
     * @return array
     */
    protected function rules()
    {
        return [
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'phone_number' => 'required|numeric',
            'email' => 'required|email',
        ];
    }

    /**
     * @return array
     */
    protected function messages()
    {
        // TODO: Implement messages() method.
        return [

        ];
    }

    /**
     * @return array
     */
    protected function attributes()
    {
        return [
            'first_name' => trans('labels.label.customer.column.first_name'),
            'last_name' => trans('labels.label.customer.column.last_name'),
            'phone_number' => trans('labels.label.customer.column.phone_number'),
            'email' => trans('labels.label.customer.column.email'),
        ];
    }
}