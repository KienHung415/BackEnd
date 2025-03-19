<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductApiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'thumb' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'required|mimetypes:audio/mpeg,application/octet-stream,audio/mpeg3,audio/x-mpeg-3,video/mpeg,video/x-mpeg,application/ogg,application/x-ogg,audio/ogg,audio/x-ogg,application/x-mp3,audio/x-mp3,application/mp3,audio/mp3,video/mp4,video/x-mp4,audio/mp4,audio/x-mp4|max:10240',
        ]);

        $thumbPath = $request->file('thumb')->store('uploads', 'public');
        $filePath = $request->file('file')->store('audio', 'public');

        $product = Product::create([
            'name' => $request->name,
            'artist' => $request->artist,
            'thumb' => $thumbPath,
            'file_path' => $filePath,
        ]);

        return response()->json($product, 201);
    }

    public function index()
    {
        $songs = Product::all()->map(function ($song) {
            $song->thumb = url( $song->thumb);
            $song->file_path = url($song->file_path);
            return $song;
        });

        return response()->json($songs);
    }
}