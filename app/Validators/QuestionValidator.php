<?php

namespace App\Validators;

class QuestionValidator extends AbstractValidator
{
    /**
     * @return array
     */
    protected function rules()
    {
        $rules = array();
        $rules['content'] = 'required';
        $rules['answer.*'] = 'required';
        $rules['type'] = 'required';
        return $rules;
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
        $attribute = array();
        $attribute['content'] = trans('labels.label.question.column.content');
        $attribute['answer.*'] = trans('labels.label.question.column.answer');
        $attribute['type'] = trans('labels.label.question.column.type');
        return $attribute;
    }
}