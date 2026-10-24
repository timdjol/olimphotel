<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function assertUpload(Request $request, string $field, string $mimes = 'jpg,jpeg,png,webp,gif', bool $multiple = false): void
    {
        if (!$request->hasFile($field)) {
            return;
        }

        $rules = $multiple
            ? [$field => ['array'], $field.'.*' => ['file', 'mimes:'.$mimes, 'max:8192']]
            : [$field => ['file', 'mimes:'.$mimes, 'max:8192']];

        $request->validate($rules);
    }
}
