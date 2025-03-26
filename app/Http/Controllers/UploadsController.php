<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadsController extends Controller
{

    public function upload(Request $request){
        try{
            $path = null;
            $data = $request->all();

            foreach($data as $key => $image){
                $path = $this->_upload($data[$key], '/imagens');
            }

        }catch(\Exception $exception){
            throw $exception;
        }

        return ['file' => $path];
    }

    public function _upload($image, $path, $width = null){
        try{
            $nameOnly = preg_replace('/\..+$/', '', $image->getClientOriginalName());
            $store = Storage::putFileAs($path, $image, $nameOnly . '.' . $image->getClientOriginalExtension(), 'public');
            return $store;
        } catch(\Exception $ex){
            throw $ex;
        }
    }
}
