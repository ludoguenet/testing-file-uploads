<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\MediaRequest;
use App\Models\Media;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;

final class UploadController extends Controller
{
    public function __invoke(
        MediaRequest $request,
    ): Response {
        /**
         * @var UploadedFile $file
         */
        $file = $request->file('file');

        $path = $file->storeAs(
            path: 'contracts',
            name: $file->hashName(),
        );

        Media::query()->create(
            attributes: [
                'name' => $file->hashName(),
                'file_name' => $file->getClientOriginalName(),
                'mime_type' => $file->getClientMimeType(),
                'path' => $path,
                'size' => $file->getSize(),
            ],
        );

        return response()->noContent();
    }
}
