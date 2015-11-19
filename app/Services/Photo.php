<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Image;
use File;

class Photo
{
    protected $baseDir;

    protected $file;

    public $name;

    public $path;

    public $thumbnail_path;

    public static function fromFile(UploadedFile $file, $baseDir)
    {
        $photo = new static;
        $photo->baseDir = $baseDir;
        $photo->file = $file;
        $photo->name = $photo->fileName();
        $photo->path = $photo->filePath();
        $photo->thumbnail_path = $photo->thumbnailPath();
        $photo->upload();
        
        return $photo;
    }

    public function fileName()
    {
        $name = sha1(time() . $this->file->getClientOriginalName());
        $extention = $this->file->getClientOriginalExtension();

        return "{$name}.{$extention}";
    }

    public function filePath()
    {
        return $this->getBaseDir() . '/' . $this->fileName();
    }

    public function thumbnailPath()
    {
        return $this->getBaseDir() . '/tn-' . $this->fileName();
    }

    public function getBaseDir()
    {
        return $this->baseDir;
    }

    public function upload()
    {
        $this->file->move($this->getBaseDir(), $this->fileName());

        $this->makeThumbnail();

        return $this;
    }

    protected function makeThumbnail()
    {
        Image::make($this->filePath())->fit(200)->save($this->thumbnailPath());
    }

    public static function delete($fileName, $path)
    {
        File::delete($path . '/' . $fileName);
        File::delete($path . '/tn-' . $fileName);
    }
}

?>