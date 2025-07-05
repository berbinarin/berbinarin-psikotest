<?php

namespace App\Services\File;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class FileUploadService
{
    /**
     * Uploads a file to a specified disk and path.
     *
     * @param UploadedFile $file The uploaded file instance.
     * @param string $directory The directory within the disk to store the file.
     * @param string $disk The storage disk to use (e.g., 'public', 's3').
     * @param string|null $fileName Optional: The desired file name. If null, a unique name will be generated.
     * @return string|false The path to the stored file, or false on failure.
     */
    public function upload(UploadedFile $file, string $directory = '', ?string $fileName = null, string $disk = 'public'): string|false
    {
        try {
            if ($fileName === null) {
                // Generate a unique file name
                $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            }

            // Store the file
            $path = Storage::disk($disk)->putFileAs($directory, $file, $fileName);

            return $path;
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('File upload failed: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Deletes a file from a specified disk.
     *
     * @param string $filePath The full path to the file on the disk.
     * @param string $disk The storage disk where the file is stored.
     * @return bool True on success, false on failure.
     */
    public function delete(string $filePath, string $disk = 'public'): bool
    {
        try {
            if (Storage::disk($disk)->exists($filePath)) {
                return Storage::disk($disk)->delete($filePath);
            }
            return true; // File doesn't exist, consider it deleted
        } catch (\Exception $e) {
            Log::error('File deletion failed: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get the URL for a stored file.
     *
     * @param string $filePath The path to the file on the disk.
     * @param string $disk The storage disk where the file is stored.
     * @return string The URL to the file.
     */
    public function getUrl(string $filePath, string $disk = 'public'): string
    {
        return Storage::disk($disk)->url($filePath);
    }
}