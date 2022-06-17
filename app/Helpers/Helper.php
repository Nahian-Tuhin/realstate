<?php
use App\Models\MepService;

function footerlink1(){
    $mep =MepService::where('position',1)->where('status',1)->latest()->get(['id','title','slug']);
    return $mep;
}
function footerlink2(){
    $mep =MepService::where('position',2)->where('status',1)->latest()->get(['id','title','slug']);
    return $mep;
}
function footerlink3(){
    $mep =MepService::where('position',3)->where('status',1)->latest()->get(['id','title','slug']);
    return $mep;
}

