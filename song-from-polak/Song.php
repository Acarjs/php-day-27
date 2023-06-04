<?php


class Song
{
    public ?int $id = null;
    public ?string $name = null;
    public ?string $author = null;
    public ?int $length = null;
    public ?string $album = null;


    public static $total_songs = 10;

    public static function getTotalNrOfSongs()
    {
        // `$this` in an object is similar to
        // `static` in a class
        // static === this class

        //     the property $total_songs of this class
        return static::$total_songs;
    }
}
