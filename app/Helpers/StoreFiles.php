<?php
use Illuminate\Support\Facades\Storage;
function StoreImage($ImagePath,$Folder): string{
    $file=request()->file($ImagePath);
    $path=Storage::disk('public')->put($Folder,$file);
    return $path;
}

?>