<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Exception;

trait UploadVideoTrait
{
    /**
     * Upload and store a video file.
     *
     * @param Request $request
     * @param string $fieldName
     * @param string $directory
     * @return string|null
     */
    public function uploadVideo(Request $request, string $fieldName = 'video_path', string $directory = 'videos'): ?string
    {
        try {
            if (!$request->hasFile($fieldName)) {
                return null;
            }
            $file = $request->file($fieldName);
            // Validate video type
            if (!$file->isValid() || !in_array($file->getClientOriginalExtension(), ['mp4', 'mov', 'avi', 'mkv', 'webm'])) {
                throw new Exception('Invalid video format.');
            }
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs("public/{$directory}", $fileName);
            return str_replace('public/', 'storage/', $path);
        } catch (Exception $e) {
            report($e);
            return null;
        }
    }

    /**
     * Delete a video file from storage.
     *
     * @param string|null $filePath
     * @return bool
     */
    public function deleteVideo(?string $filePath): bool
    {
        if (!$filePath) {
            return false;
        }
        $storagePath = str_replace('storage/', 'public/', $filePath);
        return Storage::exists($storagePath) ? Storage::delete($storagePath) : false;
    }
}

