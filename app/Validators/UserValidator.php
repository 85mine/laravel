<?php
namespace App\Validators;

class UserValidator {


    /**
     * check validate login
     *
     * @return mixed
     */
    public function validateLogin() {

        $res['rules'] = $this->_defaultRule();
        $res['messages'] = $this->_defaultMessage();
        $res['attributes'] = $this->_defaultAttribute();

        return $res;
    }

    private function _defaultRule() {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    private function _defaultMessage() {
        return [];
    }

    private function _defaultAttribute() {
        return [
            'email' => trans('messages.validator.user.login.username'),
            'password' => trans('messages.validator.user.login.password'),
        ];
    }
}