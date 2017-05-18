<?php
namespace App\Validators;

class CompanyValidator extends AbstractValidator
{
    /**
     * @return array
     */
    protected function rules()
    {
        return [
            'company_name' => 'required|max:255',
            'company_address' => 'required',
            'company_mobile' => 'required|numeric',
            'company_email' => 'required|email',
            'company_website' => 'url|max:255',
            'representative_name' => 'required',
            'representative_mobile' => 'required|numeric',
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
            'company_name' => trans('labels.label.company.column.company_name'),
            'company_address' => trans('labels.label.company.column.company_address'),
            'company_mobile' => trans('labels.label.company.column.company_mobile'),
            'company_email' => trans('labels.label.company.column.company_email'),
            'company_website' => trans('labels.label.company.column.company_website'),
            'representative_name' => trans('labels.label.company.column.representative_name'),
            'representative_mobile' => trans('labels.label.company.column.representative_mobile'),
        ];
    }
}