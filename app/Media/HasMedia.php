<?php

namespace App\Media;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Storage;

trait HasMedia
{
    public $disk_name = 'public';

    public function getDiskName(): string
    {
        return $this->disk_name ?? config('filesystems.default');
    }

    /**
     * Define the polymorphic relationship.
     */
    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'model');
    }

    /**
     * Add media to the model and upload it to the specified disk.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     */
    public function addMedia($file, string $collectionName, array $attributes = []): void
    {
        if (! $this->exists) {
            throw new \Exception('Cannot attach media to an unsaved model instance.');
        }

        try {

            // $existingMedia = $this->media()->where('collection_name', $collectionName)->first();

            // // Delete the old file if it exists
            // if ($existingMedia && Storage::disk($this->getDiskName())->exists($existingMedia->file_path)) {
            //     Storage::disk($this->getDiskName())->delete($existingMedia->file_path);
            // }

            // Store the file and get the file path
            $filePath = $file->store('media', $this->disk_name);

            $this->media()->create(array_merge(
                $attributes,
                [
                    'collection_name' => $collectionName,
                    'model_id' => $this->id,
                    'model_type' => static::class,
                    'file_path' => $filePath, // Add the file path here
                    'file_type' => $file->getClientMimeType(),
                ]
            ));
        } catch (\Exception $e) {
            throw new \Exception('Media upload failed: '.$e->getMessage());
        }
    }

    /**
     * Retrieve media items for the model.
     */
    public function getMedia(?string $collectionName = null): array
    {
        $query = $this->media();

        if ($collectionName) {
            $query->where('collection_name', $collectionName);
        }

        return $query->get()->toArray();
    }

    /**
     * Retrieve the URL of the first media item for the given collection.
     *
     * @param  string|null  $collectionName
     * @return string|null
     */
    public function getUrl($collectionName = null)
    {
        try {

            $mediaCollect = collect($this->media)->filter(fn ($media) => $collectionName ? $media->collection_name === $collectionName : true)->values();

            $media = $mediaCollect->map(function ($media) {
                return (object) [
                    'id' => $media->id,
                    'url' => Storage::disk($this->disk_name)->url($media->file_path),
                ];
            })->toArray();

            return $media ?? [];
        } catch (\Exception $exception) {
            throw new \Exception('Failed to retrieve media URL: '.$exception->getMessage());
        }
    }

    public function getFirstUrl($collectionName = null)
    {
        try {
            if ($collectionName) {
                $query = collect($this->media)->where('collection_name', $collectionName);
            } else {
                $query = collect($this->media);
            }
            $media = $query->first();

            return $media ? Storage::disk($this->disk_name)->url($media->file_path) : '';
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Delete media from the model.
     */
    public function deleteMedia(?int $mediaId = null): void
    {
        if ($mediaId) {
            $media = $this->media()->findOrFail($mediaId);
        } else {
            $media = $this->media()->first();
        }
        if ($media && $media->file_path) {
            Storage::disk($this->disk_name)->delete($media->file_path);
            $media->delete();
        }
    }

    protected static function booted()
    {
        static::deleting(function ($model) {
            $model->media->each(function ($media) {
                $media->delete();
            });
        });
    }

    public function deleteMediaCollection(string $collectionName): void
    {
        $mediaItems = $this->media()->where('collection_name', $collectionName)->get();

        foreach ($mediaItems as $media) {
            if ($media->file_path) {
                Storage::disk($this->disk_name)->delete($media->file_path);
            }
            $media->delete();
        }
    }
}
