<?php

/**
 * Helper to get a media url from storage
 */
if (! function_exists('get_media_url')) {
    function get_media_url(\Spatie\MediaLibrary\Models\Media $media) {
        return \App\Generators\MediaUrlDeterminer::getMediaUrl($media);
    }
}
