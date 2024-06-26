<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface IUploadQuery {    
    public function photo(Request $request);       
    public function downloadFile(Request $request); 
    public function getFile(Request $request); 
    public static function deleteFile(Request $request);   
    public static function deleteDirectory(Request $request);            
}
