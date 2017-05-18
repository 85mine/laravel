<?php
namespace App\Validators;

class UserAddValidator extends AbstractValidator {
    /**
     * @return array
     */
    protected function rules()
    {
        return [
            'email' => 'required|email|max:100',
            'name' => 'required|max:255',
            'company_id' => 'required',
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
            'email' => trans('labels.label.user.create.email'),
            'name' => trans('labels.label.user.create.name'),
            'company_id' => trans('labels.label.user.create.company'),
        ];
    }
}