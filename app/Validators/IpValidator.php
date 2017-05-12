<?php
namespace App\Validators;

class IpValidator
{
    public function validateIps($pri_id=null, $editValidate=false)
    {
        $res['rules'] = ($editValidate) ? $this->_editRule($pri_id) : $this->_defaultRule();
        $res['messages'] = $this->_defaultMessage();
        $res['attributes'] = $this->_defaultAttribute();

        return $res;
    }

    private function _defaultRule()
    {
        return [
            'ip_address' => 'required|unique:ips,ip_address|max:50|ip'
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

    private function _editRule($id)
    {
        return [
            'ip_address' => 'required|unique:ips,ip_address,'.$id.'|max:50|ip'
        ];
    }

}