<?php
use Illuminate\Support\Facades\Storage;
function StoreImage($ImagePath,$Folder): string{
    $path=Storage::disk('public')->put($Folder,$ImagePath);
    return $path;
}

?>