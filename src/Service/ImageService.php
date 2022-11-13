<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;
use Symfony\Component\String\Slugger\SluggerInterface;

class ImageService
{

    public function __construct(
        protected SluggerInterface $slugger
    ){
    }

     public function imageFileNameSanitizer($image, string $nameUsedInForm, $directory): string
     {
         $originalFileName = pathinfo($image[$nameUsedInForm]->getClientOriginalName(), PATHINFO_FILENAME);
         $safeFilename = $this->slugger->slug($originalFileName);
         $newFilename = $safeFilename . '-' . uniqid() . '.' . $image[$nameUsedInForm]->guessExtension();

         try {
             $image[$nameUsedInForm]->move($directory, $newFilename);
         } catch (FileException $e) {
             throw new UploadException('Er is iets verkeerd gegaan met het uploaden van jouw file');
         }

         return $newFilename;
     }
}