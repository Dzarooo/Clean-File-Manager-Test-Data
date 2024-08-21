<?php

declare(strict_types=1);
// Model for uploading Invoices

namespace App\Modules\Invoice\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 *
 *
 * @property int $id
 * @property string $number
 * @property string $title
 * @property string $service
 * @property float $price
 */
class Invoice extends Model implements \CleanScripts\CleanFileManager\Interfaces\HasFiles
{
    use \CleanScripts\CleanFileManager\Traits\HasFilesTrait;

    protected $fillable = [
        'number',
        'title',
        'service',
        'price',
    ];

    public static function getAllowedFileMimes(): array
    {
        return ['pdf', 'application/pdf'];
    }
}
