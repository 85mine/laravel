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
        $rules = array();
        $rules['question_content'] = 'required';
        $rules['answer.*'] = 'required';
        return $rules;
    }

    private function _defaultMessage()
    {
        return [];
    }

    private function _defaultAttribute()
    {
        $attribute = array();
        $attribute['question_content'] = trans('labels.label.question.column.content');
        return $attribute;
    }

}