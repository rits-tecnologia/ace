<?php

namespace Rits\Ace\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendRequest extends FormRequest
{
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
}
