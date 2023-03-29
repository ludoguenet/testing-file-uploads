<?php

declare(strict_types=1);

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\post;

it('store files', function () {
    Storage::fake();

    post(
        uri: route(
            name: 'upload',
        ),
        data: [
            'file' => $file = UploadedFile::fake()->create('document.pdf', 2048),
        ],
    )
        ->assertStatus(204);

    Storage::disk()->assertExists('contracts/' . $file->hashName());
});
