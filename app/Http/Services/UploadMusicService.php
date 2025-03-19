<?php

namespace App\Http\Services;

class UploadMusicService
{
    public function store($request)
    {
        if($request->HasFile('file')){

            try{
            $name=$request->file('file')->getClientOriginalName();
            $pathFull='audio';

            $request->file('file')->storeAs(
                'public/'.$pathFull, $name
            );;

            return '/storage/'.$pathFull .'/'.$name;
            }catch(\Exception $error){
                return false;
            }
        }
    }

}