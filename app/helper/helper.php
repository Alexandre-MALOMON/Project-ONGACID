<?php

use App\Models\Activitys;
use App\Models\Category;
use App\Models\CategoryActualite;
use App\Models\CategoryDon;
//use Imagick;
if (!function_exists('categoriBook')) {
    function categoriBook()
    {
        $categories = Category::orderBy('name', 'asc')->get();

        return $categories;
    }
}

if (!function_exists('categoriDon')) {
    function categoriDon()
    {
        $categorieDons = CategoryDon::orderBy('name', 'asc')->get();
        return $categorieDons;
    }
}

if (!function_exists('categotyActivity')) {
    function categotyActivity()
    {
        $categotyActivity = Category::orderBy('name', 'asc')->get();
        return $categotyActivity;
    }
}

if (!function_exists('categotypost')) {
    function categotypost()
    {
        $categotypost = CategoryActualite::orderBy('name', 'asc')->get();
        return $categotypost;
    }
}


if (!function_exists('shareslink')) {
    function shareslink($lien)
    {
        $shareButtons = \Share::page(
            $lien
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp();
        return $shareButtons;
    }
}

if (!function_exists('taille_fichier')) {


        function taille_fichier($fichier)
        {
          //  $dir = dir($fichier);
         // $filePath = storage_path($fichier);
           $octets = filesize('.'.$fichier);
            $resultat = $octets;
            for ($i = 0; $i < 8 && $resultat >= 1024; $i++) {
                $resultat = $resultat / 1024;
            }
            if ($i > 0) {
                return preg_replace('/,00$/', '', number_format($resultat, 2, ',', ''))
                    . ' ' . substr('KMGTPEZY', $i - 1, 1) . 'o';
            } else {
                return $resultat . ' o';
            }
        }

}
/*
$im = new Imagick();
$im->setResolution(200, 200);     //Taille de l'apercu
$im->readImage('file.pdf[0]');    // première page du pdf
$im->setImageFormat('jpg');
header('Content-Type: image/jpeg'); */

if(!function_exists('pdfConvert')){
    function pdfConvert($fichier){
       /*  $imagick = new Imagick();

        $imagick->readImage(public_path($fichier));

        $imagick->writeImages('converted.jpg', true); */
    }
}
