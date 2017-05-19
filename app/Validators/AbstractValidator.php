<?php
namespace App\Validators;
use App\Validators\Exceptions\ValidatorException;
use Illuminate\Contracts\Validation\Factory as ValidatorFactory;

abstract class AbstractValidator
{
    /**
     * @var Validator
     */
    protected $validation;

    /**
     * @var \Illuminate\Validation\Factory
     */
    private $validator;

    public $extend_rules;

    public $extend_messages;

    public $extend_attributes;

    /**
     * @param Factory|ValidatorFactory|\Illuminate\Validation\Factory $validator
     */
    public function __construct(ValidatorFactory $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param array $data
     * @return bool
     * @throws ValidatorException
     * @internal param array $formData
     */
    public function validate(array $data)
    {
        // Instantiate validator instance by factory
        $this->validation = $this->validator->make($data, $this->merge_rules(), $this->merge_messages(), $this->merge_attributes());
        // Validate
        if ($this->validation->fails()) {
            throw new ValidatorException($this->getValidationErrors());
        }

        return true;
    }

    /**
     * @return MessageBag
     */
    protected function getValidationErrors()
    {
        return $this->validation->errors();
    }

    private function merge_rules(){
        if(is_array($this->extend_rules)){
            return array_merge($this->extend_rules,$this->rules());
        }
        return $this->rules();
    }

    private function merge_messages(){
        if(is_array($this->extend_messages)){
            return array_merge($this->extend_messages,$this->messages());
        }
        return $this->messages();
    }

    private function merge_attributes(){
        if(is_array($this->extend_attributes)){
            return array_merge($this->extend_attributes,$this->attributes());
        }
        return $this->attributes();
    }

    /**
     * @return array
     */
    abstract protected function rules();

    /**
     * @return array
     */
    abstract protected function messages();

    /**
     * @return array
     */
    abstract protected function attributes();
}