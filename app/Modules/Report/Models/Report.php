<?php

declare(strict_types=1);
// Model for uploading reports

namespace App\Modules\Report\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 *
 *
 * @property int $id
 * @property string $number
 * @property string $title
 * @property string $description
 */
class Report extends Model implements \CleanScripts\CleanFileManager\Interfaces\HasFiles
{
    use \CleanScripts\CleanFileManager\Traits\HasFilesTrait;

    protected $fillable = [
        'number',
        'title',
        'description',
    ];

    public static function getAllowedFileMimes(): array
    {
        return [];
    }

    public static function getMaxFileSize(): int
    {
        return 100000000000000;
    }
}
