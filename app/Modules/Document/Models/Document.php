<?php

declare(strict_types=1);
// Model for uploading documents

namespace App\Modules\Document\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 *
 *
 * @property int $id
 * @property string $title
 * @property string $size
 * @property bool $is_colorful
 * @property int $pages
 * @property int $file_id
 */
class Document extends Model
{
    protected $fillable = [
        'title',
        'size',
        'is_colorful',
        'pages',
        'file_id',
    ];
}
