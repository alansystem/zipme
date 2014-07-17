<?php
namespace Joridos;

use ZipArchive;
class Zipme
{
    static $fileName;
    static $directory;
    static $data;
    static $debug;
    static $callback;

    public function __construct($fileName = null, $directory = null, $data = null, $debug = false, $callback = null)
    {
        self::$fileName = $fileName;
        self::$directory = $directory;
        self::$data = $data;
        self::$debug = $debug;
        self::$callback = $callback;
        self::zipme();
    }

    public static function zipme()
    {
        $zip = new ZipArchive();

        $path = self::getValidPath();
        $data = self::$data;

        $zip->open($path, ZIPARCHIVE::CREATE);
        
        $zip->addFile($data);

        if( self::$debug == TRUE) {
            echo "numFiles: " . $zip->numFiles . "\n";
            echo "status: " . $zip->status  . "\n";
            echo "statusSys: " . $zip->statusSys . "\n";
            echo "filename: " . $zip->filename . "\n";
            echo "comment: " . $zip->comment . "\n";

            for ($i=0; $i<$zip->numFiles;$i++) {
                echo "index: $i\n";
                print_r($zip->statIndex($i));
            }
        }

        $zip->close();
    }

    private static function getValidPath()
    {
        $fileName = self::$fileName;
        $directory = self::$directory;

        if ($directory != null) {
            return "{$directory}/{$fileName}";
        }else{
            return "./{$fileName}";
        }
    }

    public function setFileName($fileName = null)
    {
        self::$fileName = $fileName;
    }

    public function setData($data = null)
    {
        self::$data = $data;
    }
    
    public function setDebug($debug = false)
    {
        self::$debug = $debug;
    }

}
