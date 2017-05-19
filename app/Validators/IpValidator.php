<?php
namespace App\Validators;

class IpValidator extends AbstractValidator
{
    /**
     * @return array
     */
    protected function rules()
    {
        return [
            'ip_address' => 'required|unique:ips,ip_address|max:50|ip'
        ];
    }

    /**
     * @return array
     */
    protected function messages()
    {
        return [

        ];
    }

    /**
     * @return array
     */
    protected function attributes()
    {
        return [
            'ip_address' => trans('labels.label.ip.column.ip_address')
        ];
    }
}