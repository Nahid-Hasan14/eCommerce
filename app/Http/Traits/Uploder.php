<?php
namespace App\Http\Traits;



trait Uploder{


    function Upload($file, $path, $old_image = null) {

        if($old_image){
            if(file_exists(storage_path('app/public/' . $old_image))){
                unlink(storage_path('app/public/' . $old_image));
            }
        }
        $original_name = $file->getClientOriginalName();
        $extention = $file->getClientOriginalExtension();
        $original_name = rtrim($original_name, ".{$extention}");
        $custom_name = str_replace([' ','--'], ['-', '-'], $original_name.time().".{$extention}");
        $path = $file->storeAs($path, $custom_name);

        return $path;
    }
}
