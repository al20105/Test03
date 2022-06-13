<?php

namespace App\Http\Controllers\Task;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

trait TaskCheck
{
    public function TaskCheck(array $data)
    {
        return Validator::make($data, [
            'task_user' => ['nullable', 'integer'],
            'name' => ['required', 'string', 'max:100'],
            'date' => ['required', 'date', 'after_or_equal:now'],
            'time' => ['required', 'date_format:H:i'],
            'memo' => ['nullable', 'string']
        ]);
    }
}