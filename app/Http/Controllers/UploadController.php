<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UploadController extends Controller
{
    /**
     * Upload image
     *
     * @return \Illuminate\Http\Response
     */
    public function image(Request $request)
    {
        $image = $request->file('upload');

        $ext = $image->guessClientExtension();
        $imageName = str_random(15).".$ext";

        $image->storeAs('', $imageName ,'public');

        if (! Gate::allows('upload_access')) {
            return abort(401);
        }

        return '<script type="text/javascript">
           var CKEditorFuncNum = '. $_GET['CKEditorFuncNum'] .';
           window.parent.CKEDITOR.tools.callFunction( CKEditorFuncNum, "/images/'.$imageName.'" , "" );
        </script>';
    }
}
