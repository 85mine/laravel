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
        $rules['question_content'] = 'required';
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
        $attribute['question_content'] = trans('labels.label.question.column.content');
        $attribute['type'] = trans('labels.label.question.column.type');
        return $attribute;
    }
}