<?php

use \Illuminate\Support\Facades\Storage;

function statusArray()
{
    return [
        '0' => 'Not Activated',
        '1' => 'Activated',
    ];
}


function userRoles()
{
    return ['user' => 'User', 'admin' => 'Admin'];
}

function uploadpath()
{
    return 'photos';
}


function getimg($filename)
{
    return '/storage/' . $filename;
}


function uploader($request, $img_name)
{
    return Storage::disk('public')->putFile(uploadpath(), $request->file($img_name));
}
