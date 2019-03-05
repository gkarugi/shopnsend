<?php

namespace App\Generators;

use Carbon\Carbon;
use Spatie\MediaLibrary\Models\Media;

class MediaUrlDeterminer
{
    public static function getMediaUrl(Media $media)
    {
        return $media->getFullUrl();
    }

}
