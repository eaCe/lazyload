<?php

class lazyload
{
    function getBase64($imagePath)
    {
        $path = rex::getServer() . $imagePath;
        $imageType = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $imageType . ';base64,' . base64_encode($data);
        return $base64;
    }
    
    function getEmptyBase64()
    {
        return "data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==";
    }
}