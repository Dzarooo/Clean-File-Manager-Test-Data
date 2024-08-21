<?php

//Controller to handle uploading invoices
declare(strict_types=1);

namespace App\Modules\Invoice;

use App\Http\Controllers\Controller;
use App\Modules\Invoice\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function store(Request $request)
    {
        $invoice = Invoice::create([
            'number' => $request->number,
            'title' => $request->title,
            'service' => $request->service,
            'price' => $request->price,
        ]);

        $invoice->save();

        return redirect()->back();
    }
}
