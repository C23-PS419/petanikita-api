<?php

namespace Database\Factories\Concerns;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;

trait DownloadImagesToMediaLibrary
{
    public function assignImagesToMediaLibrary(
        int $image_width = 512,
        int $image_height = 512,
        string $media_collection = 'default',
        array|string $terms = 'fruits',
        int $min_images = 1,
        int $max_images = 2,
    ): \Closure {
        return function (HasMedia $model) use (
            $image_width,
            $image_height,
            $media_collection,
            $terms,
            $min_images,
            $max_images
        ) {
            $num_images = $min_images === $max_images ? 1 : rand($min_images, $max_images);

            if (is_array($terms)) {
                $terms = implode(',', $terms);
            }

            $terms = Str::replace(' ', '', $terms);

            $imageUrl = 'https://source.unsplash.com/random/'.$image_width.'x'.$image_height.'/?'.$terms;

            for ($i = 0; $i < $num_images; $i++) {
                $model
                    ->addMediaFromUrl($imageUrl)
                    ->toMediaCollection($media_collection);
            }
        };
    }

    public function withMediaLibraryImage(
        int $image_width = 512,
        int $image_height = 512,
        string $media_collection = 'default',
        array|string $terms = 'fruits',
    ) {
        return $this->afterCreating(
            $this->assignImagesToMediaLibrary(
                $image_width, $image_height, $media_collection, $terms, 1, 1
            )
        );
    }

    public function withMediaLibraryImages(
        int $image_width = 512,
        int $image_height = 512,
        string $media_collection = 'default',
        array|string $terms = 'fruits',
        int $min_images = 1,
        int $max_images = 2,
    ) {
        return $this->afterCreating(
            $this->assignImagesToMediaLibrary(
                $image_width, $image_height, $media_collection, $terms, $min_images, $max_images
            )
        );
    }
}
