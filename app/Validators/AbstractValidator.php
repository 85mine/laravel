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
        $this->validation = $this->validator->make($data, $this->rules(), $this->messages(), $this->attributes());
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