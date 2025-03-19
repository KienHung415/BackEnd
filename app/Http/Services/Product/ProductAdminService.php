<?php


namespace App\Http\Services\Product;

use App\Models\Product;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
class ProductAdminService
{
    public function getMenu()
    {
        return Menu::where('active',1)->get();
    }

    public function insert($request)
    {
        try{
            $request->except('token');// bỏ token
            Product::create($request->all());

            Session::flash('success','Thêm bài hát thành công');
        }catch(\Exception  $err){
            Session::flash('error','Thêm bài hát lỗi');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function get()
    {
        return Product::with('menu')->orderByDesc('id')->paginate(15);
    }

     
    public function update($request,$product){
        try{
            $product->fill($request->input());
            $product->save();   
            Session::flash('success','Cập nhật thành công');
        }catch(\Exception $err){
            Session::flash('error','Có lỗi vui lòng thử lại');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request)
    {
        $product=Product::where('id',$request->input('id'))->first();
        if($product){
            $product->delete();
            return true;
        }
        return false;
    }
}