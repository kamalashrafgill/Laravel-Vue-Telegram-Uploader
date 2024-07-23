<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Jobs\ProcessTelegramUploadJob;
class FileUploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $disk = 'public';
            $filePathRelativeToDisk = $file->store('uploads', $disk);
            $fileAbsolutePath = Storage::disk($disk)->path('/') . $filePathRelativeToDisk;
            ProcessTelegramUploadJob::dispatch($fileAbsolutePath, $filePathRelativeToDisk)->onQueue('telegram-uploads');
            return response()->json(['path' => $fileAbsolutePath], 200);
        }
        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
