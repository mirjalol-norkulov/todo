<?php

namespace App\Http\Requests\Todos;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class TodoUpdateRequest
 * @package App\Http\Requests\Todos
 */
class TodoUpdateRequest extends FormRequest
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
        return [
            'task' => 'string',
            'due_date' => 'date',
            'done' => 'boolean',
            'sub_tasks' => 'array',
            'sub_tasks.*.done' => 'boolean',
            'sub_tasks.*.task' => 'required|string'
        ];
    }
}
