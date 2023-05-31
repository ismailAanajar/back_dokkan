<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MediaController extends Controller
{
        use FileUpload;

    public function index()
    {
        $media = Media::paginate(10);
        return view('media.index', compact('media'));
    }

    public function store(Request $request)
    {
        $data = $request->except('media');
        $image = $this->imageUpload($request, 'media', 'media');
        $data['url'] = $image;

        Media::create($data);
        
        Alert::success('success', 'A media has been created successfully');

        return redirect()->route('admin.media.index');
    }
}