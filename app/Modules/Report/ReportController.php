<?php

//Controller to handle uploading reports
declare(strict_types=1);

namespace App\Modules\Report;

use App\Http\Controllers\Controller;
use App\Modules\Report\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        $report = Report::create([
            'number' => $request->number,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $report->save();

        return redirect()->back();
    }
}
