<?php

//Controller to handle uploading documents
declare(strict_types=1);

namespace App\Modules\Document;

use App\Http\Controllers\Controller;
use App\Modules\Document\Models\Document;
use App\Modules\Invoice\Models\Invoice;
use App\Modules\Report\Models\Report;
use CleanScripts\CleanFileManager\Enums\FileTypeEnum;
use CleanScripts\CleanFileManager\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    public function storeFile(Request $request)
    {
        $request->merge([
            'model_class' => Document::class,
        ]);

        $doc = new Document([
            'title' => $request->title,
            'size' => $request->size,
            'is_colorful' => $request->is_colorful == null | 0 ? false : true,
            'pages' => $request->pages,
        ]);
        $instance = match ($request->model) {
            'invoice' => Invoice::where('id', $request->instance)->firstOrFail(),
            'report' => Report::where('id', $request->instance)->firstOrFail(),
            default => abort(404)
        };

        File::validate(FileTypeEnum::File, $request, $instance::class);

        DB::transaction(function () use ($instance, $doc, $request) {
            $file = File::upload(FileTypeEnum::File, $request, $instance, $request->parent_id == null ? null : intval($request->parent_id), nameField: 'title');
            $doc->file_id = $file->id;
            $doc->save();
        });

        return redirect()->back();
    }

    public function storeDirectory(Request $request)
    {
        $instance = match ($request->model) {
            'invoice' => Invoice::where('id', $request->instance)->firstOrFail(),
            'report' => Report::where('id', $request->instance)->firstOrFail(),
            default => abort(404)
        };

        File::validate(FileTypeEnum::Directory, $request, $instance::class, nameField: 'dir_name');
        File::upload(FileTypeEnum::Directory, $request, $instance, $request->parent_id == null ? null : intval($request->parent_id), nameField: 'dir_name');

        return redirect()->back();
    }
}
