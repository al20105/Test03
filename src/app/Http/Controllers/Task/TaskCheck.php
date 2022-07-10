<?php

namespace App\Http\Controllers\Task;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

trait TaskCheck
{
    public function TaskCheck(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'max:100', 'regex:/^(?!.*(<|>)).*$/'],
            'date' => ['required', 'max:10'],
        ]);
    }
}