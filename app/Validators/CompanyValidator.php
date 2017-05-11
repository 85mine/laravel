<?php
namespace App\Validators;

class CompanyValidator
{
    public function validateCompany()
    {
        $res['rules'] = $this->_defaultRule();
        $res['messages'] = $this->_defaultMessage();
        $res['attributes'] = $this->_defaultAttribute();

        return $res;
    }

    private function _defaultRule()
    {
        return [
            'company_name' => 'required|max:255',
            'company_address' => 'required',
            'company_mobile' => 'required|max:15|numeric',
            'company_email' => 'email',
            'company_website' => 'max:255',
            'representative_name' => 'required',
            'representative_mobile' => 'required|max:15|numeric',
        ];
    }

    private function _defaultMessage()
    {
        return [];
    }

    private function _defaultAttribute()
    {
        return [
            'email' => trans('messages.validator.user.login.username'),
            'max' => trans(''),
        ];
    }

}