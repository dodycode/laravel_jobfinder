<?php

namespace App\Helpers;

class Stemming {
    protected static $word;

    public static function get($word)
    {
        $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
        $stemmer  = $stemmerFactory->createStemmer();

        //stemming english words first
        $stemmed = \Nadar\Stemming\Stemm::stem($word, 'en');

        return $stemmer->stem($stemmed);
    }
}