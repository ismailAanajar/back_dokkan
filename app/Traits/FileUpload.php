<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait FileUpload {
  public function imageUpload (Request $request, $file_name, $folder = 'uploads', $disk = 'public'): string | null 
  {
    // dd($request->hasFile($file_name));
    if(!$request->hasFile($file_name)) return null;
    $file = $request->file($file_name);
    $path = $file->store($folder, [
      'disk' => $disk
    ]);
    return $path;
  }
}