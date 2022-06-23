<?php

namespace App\Http\Controllers\Task;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

trait TaskCheck
{
    public function TaskCheck(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'date' => ['required', 'date'],
            'memo' => ['nullable', 'string']
        ]);
    }
}