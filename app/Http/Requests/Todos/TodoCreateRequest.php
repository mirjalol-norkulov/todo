<?php

namespace App\Http\Requests\Todos;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class TodoCreateRequest
 * @package App\Http\Requests\Todos
 */
class TodoCreateRequest extends FormRequest
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
            'task' => 'required|string',
            'due_date' => 'date',
            'sub_tasks' => 'array',
            'sub_tasks.*.task' => 'required|string'
        ];
    }
}
