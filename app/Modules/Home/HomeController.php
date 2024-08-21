<?php

declare(strict_types=1);

namespace App\Modules\Home;

use App\Http\Controllers\Controller;
use App\Modules\Document\Models\Document;
use App\Modules\Image\Models\Image;
use App\Modules\Invoice\Models\Invoice;
use App\Modules\Report\Models\Report;
use CleanScripts\CleanFileManager\Models\File;

class HomeController extends Controller
{
    public function show()
    {
        $instances = collect();
        $invoices = Invoice::all();
        $reports = Report::all();

        foreach ($invoices as $invoice) {
            $instances->push($invoice);
        }
        foreach ($reports as $report) {
            $instances->push($report);
        }

        $images = Image::all();
        $documents = Document::all();
        $files = File::all();

        return view('home', compact('instances', 'invoices', 'reports', 'images', 'documents', 'files'));
    }
}
