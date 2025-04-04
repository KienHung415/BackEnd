<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\UploadMusicService;
use App\Illuminate\Http\JsonResponse;

class UploadMusicController extends Controller
{
    protected $upload;

    public function __construct(UploadMusicService $upload){
        $this->upload =$upload;
    }

    public function store(Request $request)
    {
       $url=$this->upload->store($request);
       if($url!=false){
        return response()->json([
            'error' =>false,
            'url' =>$url
        ]);
       }
       return response()->json(['error'->true]);
    }
}
