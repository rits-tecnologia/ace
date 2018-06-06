<?php

namespace Rits\Ace\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendRequest extends FormRequest
{
    /**
     * Type of class being validated.
     *
     * @var string
     */
    protected $type = null;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge_recursive($this->baseRules(),
            $this->isMethod('put')
                ? $this->editRules()
                : $this->createRules()
        );
    }

    /**
     * Rules when editing resource.
     *
     * @return array
     */
    protected function editRules()
    {
        return [];
    }

    /**
     * Rules when creating resource.
     *
     * @return array
     */
    protected function createRules()
    {
        return [];
    }

    /**
     * Base rules for both creating and editing the resource.
     *
     * @return array
     */
    protected function baseRules()
    {
        return [];
    }

    /**
     * Define nice names for attributes.
     *
     * @return array
     */
    public function attributes()
    {
        $niceNames = [];

        foreach ($this->rules() as $attribute => $rule) {
            $column = crudColumn($this->type, $attribute);

            $niceNames[$attribute] = trans(crudColumn($this->type, $attribute));
        }

        return $niceNames;
    }
}
