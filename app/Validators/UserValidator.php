<?php
namespace App\Validators;

class UserValidator extends AbstractValidator {
    /**
     * @return array
     */
    protected function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
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
            'email' => trans('messages.validator.user.login.username'),
            'password' => trans('messages.validator.user.login.password'),
        ];
    }
}