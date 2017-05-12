<?php
namespace App\Validators;

class QuestionValidator
{
    public function validateQuestion()
    {
        $res['rules'] = $this->_defaultRule();
        $res['messages'] = $this->_defaultMessage();
        $res['attributes'] = $this->_defaultAttribute();

        return $res;
    }

    private function _defaultRule()
    {
        return [
            'question_content' => 'required',
            'answer.*' => 'required'
        ];
    }

    private function _defaultMessage()
    {
        return [];
    }

    private function _defaultAttribute()
    {
        return [
            'question_content' => trans('labels.label.question.column.content'),
            'answer' => trans('labels.label.question.column.answer')
        ];
    }

}