<?php

//Controller to handle deleting files
declare(strict_types=1);

namespace App\Modules\File;

use App\Http\Controllers\Controller;
use CleanScripts\CleanFileManager\Models\File;

class DeleteFileController extends Controller
{
    public function deleteFile($id)
    {
        File::deleteInstance(intval($id));

        return redirect()->back();
    }
}
