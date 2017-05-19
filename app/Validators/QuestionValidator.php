<?php

namespace App\Validators;

class QuestionValidator extends AbstractValidator
{
    /**
     * @return array
     */
    protected function rules()
    {
        return [
            'content' => 'required',
            'answer.*' => 'required',
            'type' => 'required',
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
            'content' => trans('labels.label.question.column.content'),
            'type' => trans('labels.label.question.column.type'),
        ];
    }
}