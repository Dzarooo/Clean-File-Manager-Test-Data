<?php

declare(strict_types=1);
// Model for uploading images

namespace App\Modules\Image\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 *
 *
 * @property int $id
 * @property string $title
 * @property string $resolution
 * @property bool $is_colorful
 * @property int $file_id
 */
class Image extends Model
{
    protected $fillable = [
        'title',
        'resolution',
        'is_colorful',
        'file_id',
    ];
}
