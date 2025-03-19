<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\UploadService;
use App\Illuminate\Http\JsonResponse;

class UploadController extends Controller // uploadController là một controller, extend là tính kế thừa và nó kế thừa từ controller,nghĩa là nó có thể sử dụng những tính năng có sẵn của Laravel 
{
    protected $upload;// upload là một biến protected (nghĩa là biến upload nó chỉ được sử dụng trong lớp này hoặc lớp con của nó)
    
    public function __construct(UploadService $upload)// đây là hàm khởi tạm constructor, nó sẽ nhận một đối tượng UploadService đưa vào 
    {
        $this->upload = $upload;//lưu đối tương $upload vào thuộc tính  $this->upload của class mà sau này chúng ta không cần phải tạo lại
    } 

    //Nhận request và gọi store từ service
    public function store(Request $request){
      //$this->upload->store($request);
      //dd($request->file());
        $url=$this->upload->store($request);
        if($url!=false){
            return response()->json([
                'error'=>false,
                'url'=>$url
            ]);
        }
        return response()->json([
            'error'=>true,
        ]);
    }

    
    /*public function storeAudio(Request $request){
        $url = $this->upload->storeAudio($request);
        if($url!=false){
            return response()->json([
                'error'=>false,
                'url'=>$url
            ]);
        }
        return response()->json([
            'error'=>true,
        ]);
    }*/
}
