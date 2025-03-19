<?php

namespace App\Http\Services;

class UploadService
{
    public function store($request)
{
    if ($request->hasFile('file')) {
        try {
            $name = $request->file('file')->getClientOriginalName();

            $pathFull = 'uploads';
            $path = $request->file('file')->storeAs(
                'public/' . $pathFull, $name
            );

            return '/storage/' . $pathFull . '/' . $name;
        } catch (\Exception $error) {
            return false;
        }
    }
}


    /*public function storeAudio($request){
        if ($request->hasFile('audio_file')) {
            try {
                $name = time().'_'.$request->file('audio_file')->getClientOriginalName();
                $pathFull = 'uploads/audio/'.date("Y/m/d");
                $path = $request->file('audio_file')->storeAs(
                    'public/'.$pathFull, $name
                );
    
                return '/storage/'.$pathFull.'/'.$name;
            } catch (\Exception $error) {
                return false;
            }
        }
        return false;
    }*/
}