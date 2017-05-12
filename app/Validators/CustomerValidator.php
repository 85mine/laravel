<?php
namespace App\Validators;

class CustomerValidator
{
    public function validate()
    {
        $res['rules'] = $this->_defaultRule();
        $res['messages'] = $this->_defaultMessage();
        $res['attributes'] = $this->_defaultAttribute();

        return $res;
    }

    private function _defaultRule()
    {
        return [
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'phone_number' => 'required|numeric',
            'email' => 'required|email',
        ];
    }

    private function _defaultMessage()
    {
        return [];
    }

    private function _defaultAttribute()
    {
        return [
            'first_name' => trans('labels.label.customer.column.first_name'),
            'last_name' => trans('labels.label.customer.column.last_name'),
            'phone_number' => trans('labels.label.customer.column.phone_number'),
            'email' => trans('labels.label.customer.column.email'),
        ];
    }

}