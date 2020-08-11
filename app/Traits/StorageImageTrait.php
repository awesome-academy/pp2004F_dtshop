<?php
namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait StorageImageTrait
{
    //function up load ảnh đại diện
    public function storageUploadFile($request, $fieldName, $folderName)
    {
        if ($request->hasFile($fieldName)) {
            $fileNameOrigin = $request->$fieldName->getClientOriginalName();
            $file = $request->$fieldName;
            $fileNameHash = Str::random(20). $file->getClientOriginalExtension();
            $pathFile = $request->file('image_path')->storeAs('public/'.$folderName.'/'.auth()->id(), $fileNameHash);
            $dataUploadFile=[
            'file_name'=>$fileNameOrigin,
            'file_path'=>Storage::url($pathFile)
        ];
            return ($dataUploadFile);
        }
        return null;
    }
    //function up load ảnh chi tiết
    public function storageUploadMultiple($file, $folderName)
    {
        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHash = Str::random(20). $file->getClientOriginalExtension();
        $pathFile = $file->storeAs('public/'.$folderName.'/'.auth()->id(), $fileNameHash);
        $dataUploadFile=[
            'file_name'=>$fileNameOrigin,
            'file_path'=>Storage::url($pathFile)
        ];
        return ($dataUploadFile);
    }
}
