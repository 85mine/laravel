<?php
namespace App\Validators;

class AddUserValidator {


    /**
     * check validate login
     *
     * @return mixed
     */
    public function validateAddUser() {

        $res['rules'] = $this->_defaultRule();
        $res['messages'] = $this->_defaultMessage();
        $res['attributes'] = $this->_defaultAttribute();

        return $res;
    }

    private function _defaultRule() {
        return [
            'email' => 'required|email',
            'name' => 'required',
            'company_id' => 'required',
        ];
    }

    private function _defaultMessage() {
        return [];
    }

    private function _defaultAttribute() {
        return [
            'email' => trans('labels.label.user.create.email'),
            'name' => trans('labels.label.user.create.name'),
            'company_id' => trans('labels.label.user.create.company'),
        ];
    }
}