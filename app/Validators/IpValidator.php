<?php
namespace App\Validators;

class IpValidator
{
    public function validateIps()
    {
        $res['rules'] = $this->_defaultRule();
        $res['messages'] = $this->_defaultMessage();
        $res['attributes'] = $this->_defaultAttribute();

        return $res;
    }

    private function _defaultRule()
    {
        return [
            'ip_address' => 'required|max:50'
        ];
    }

    private function _defaultMessage()
    {
        return [];
    }

    private function _defaultAttribute()
    {
        return [
            'ip_address' => trans('labels.label.ips.column.ip_address')
        ];
    }

}