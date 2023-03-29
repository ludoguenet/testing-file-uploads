<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

final class MediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, Rule|array<int, Rule|string>|string>
     */
    public function rules(): array
    {
        return [
            'file' => [
                'required',
                File::types('pdf')->max(2048),
            ],
        ];
    }
}
