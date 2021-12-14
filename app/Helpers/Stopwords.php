<?php

namespace App\Helpers;

class Stopwords{
    protected static $stopwords, $enStopwords;

    public static function remove($words)
    {
        $removedStopwords = array();

        foreach($words as $word)
        {
            if(!in_array($word, self::getDefaultStopwords())){
                if(!in_array($word, self::getDefaultIndonesianStopwords())){
                    $removedStopwords[] = $word;
                }
            }
        }

        return $removedStopwords;
    }

    protected static function getDefaultIndonesianStopwords() 
    {
        self::$stopwords = [
            'ada',
            'adanya',
            'adalah',
            'adapun',
            'agak',
            'agaknya',
            'agar',
            'akan',
            'akankah',
            'akhirnya',
            'aku',
            'akulah',
            'amat',
            'amatlah',
            'anda',
            'andalah',
            'antar',
            'diantaranya',
            'antara',
            'antaranya',
            'diantara',
            'apa',
            'apaan',
            'mengapa',
            'apabila',
            'apakah',
            'apalagi',
            'apatah',
            'atau',
            'ataukah',
            'ataupun',
            'bagai',
            'bagaikan',
            'sebagai',
            'sebagainya',
            'bagaimana',
            'bagaimanapun',
            'sebagaimana',
            'bagaimanakah',
            'bagi',
            'bahkan',
            'bahwa',
            'bahwasanya',
            'sebaliknya',
            'banyak',
            'sebanyak',
            'beberapa',
            'seberapa',
            'begini',
            'beginian',
            'beginikah',
            'beginilah',
            'sebegini',
            'begitu',
            'begitukah',
            'begitulah',
            'begitupun',
            'sebegitu',
            'belum',
            'belumlah',
            'sebelum',
            'sebelumnya',
            'sebenarnya',
            'berapa',
            'berapakah',
            'berapalah',
            'berapapun',
            'betulkah',
            'sebetulnya',
            'biasa',
            'biasanya',
            'bila',
            'bilakah',
            'bisa',
            'bisakah',
            'sebisanya',
            'boleh',
            'bolehkah',
            'bolehlah',
            'buat',
            'bukan',
            'bukankah',
            'bukanlah',
            'bukannya',
            'cuma',
            'percuma',
            'dahulu',
            'dalam',
            'dan',
            'dapat',
            'dari',
            'daripada',
            'dekat',
            'demi',
            'demikian',
            'demikianlah',
            'sedemikian',
            'dengan',
            'depan',
            'di',
            'dia',
            'dialah',
            'dini',
            'diri',
            'dirinya',
            'terdiri',
            'dong',
            'dulu',
            'enggak',
            'enggaknya',
            'entah',
            'entahlah',
            'terhadap',
            'terhadapnya',
            'hal',
            'hampir',
            'hanya',
            'hanyalah',
            'harus',
            'haruslah',
            'harusnya',
            'seharusnya',
            'hendak',
            'hendaklah',
            'hendaknya',
            'hingga',
            'sehingga',
            'ia',
            'ialah',
            'ibarat',
            'ingin',
            'inginkah',
            'inginkan',
            'ini',
            'inikah',
            'inilah',
            'itu',
            'itukah',
            'itulah',
            'jangan',
            'jangankan',
            'janganlah',
            'jika',
            'jikalau',
            'juga',
            'justru',
            'kala',
            'kalau',
            'kalaulah',
            'kalaupun',
            'kalian',
            'kami',
            'kamilah',
            'kamu',
            'kamulah',
            'kan',
            'kapan',
            'kapankah',
            'kapanpun',
            'dikarenakan',
            'karena',
            'karenanya',
            'ke',
            'kecil',
            'kemudian',
            'kenapa',
            'kepada',
            'kepadanya',
            'ketika',
            'seketika',
            'khususnya',
            'kini',
            'kinilah',
            'kiranya',
            'sekiranya',
            'kita',
            'kitalah',
            'kok',
            'lagi',
            'lagian',
            'selagi',
            'lah',
            'lain',
            'lainnya',
            'melainkan',
            'selaku',
            'lalu',
            'melalui',
            'terlalu',
            'lama',
            'lamanya',
            'selama',
            'selama',
            'selamanya',
            'lebih',
            'terlebih',
            'bermacam',
            'macam',
            'semacam',
            'maka',
            'makanya',
            'makin',
            'malah',
            'malahan',
            'mampu',
            'mampukah',
            'mana',
            'manakala',
            'manalagi',
            'masih',
            'masihkah',
            'semasih',
            'masing',
            'mau',
            'maupun',
            'semaunya',
            'memang',
            'mereka',
            'merekalah',
            'meski',
            'meskipun',
            'semula',
            'mungkin',
            'mungkinkah',
            'nah',
            'namun',
            'nanti',
            'nantinya',
            'nyaris',
            'oleh',
            'olehnya',
            'seorang',
            'seseorang',
            'pada',
            'padanya',
            'padahal',
            'paling',
            'sepanjang',
            'pantas',
            'sepantasnya',
            'sepantasnyalah',
            'para',
            'pasti',
            'pastilah',
            'per',
            'pernah',
            'pula',
            'pun',
            'merupakan',
            'rupanya',
            'serupa',
            'saat',
            'saatnya',
            'sesaat',
            'saja',
            'sajalah',
            'saling',
            'bersama',
            'sama',
            'sesama',
            'sambil',
            'sampai',
            'sana',
            'sangat',
            'sangatlah',
            'saya',
            'sayalah',
            'se',
            'sebab',
            'sebabnya',
            'sebuah',
            'tersebut',
            'tersebutlah',
            'sedang',
            'sedangkan',
            'sedikit',
            'sedikitnya',
            'segala',
            'segalanya',
            'segera',
            'sesegera',
            'sejak',
            'sejenak',
            'sekali',
            'sekalian',
            'sekalipun',
            'sesekali',
            'sekaligus',
            'sekarang',
            'sekarang',
            'sekitar',
            'sekitarnya',
            'sela',
            'selain',
            'selalu',
            'seluruh',
            'seluruhnya',
            'semakin',
            'sementara',
            'sempat',
            'semua',
            'semuanya',
            'sendiri',
            'sendirinya',
            'seolah',
            'seperti',
            'sepertinya',
            'sering',
            'seringnya',
            'serta',
            'siapa',
            'siapakah',
            'siapapun',
            'disini',
            'disinilah',
            'sini',
            'sinilah',
            'sesuatu',
            'sesuatunya',
            'suatu',
            'sesudah',
            'sesudahnya',
            'sudah',
            'sudahkah',
            'sudahlah',
            'supaya',
            'tadi',
            'tadinya',
            'tak',
            'tanpa',
            'setelah',
            'telah',
            'tentang',
            'tentu',
            'tentulah',
            'tentunya',
            'tertentu',
            'seterusnya',
            'tapi',
            'tetapi',
            'setiap',
            'tiap',
            'setidaknya',
            'tidak',
            'tidakkah',
            'tidaklah',
            'toh',
            'waduh',
            'wah',
            'wahai',
            'sewaktu',
            'walau',
            'walaupun',
            'wong',
            'yaitu',
            'yakni',
            'yang',
        ];

        return self::$stopwords;
    }

    protected static function getDefaultStopwords()
    {
        self::$enStopwords = [
            'a',
            'about',
            'above',
            'above',
            'across',
            'after',
            'afterwards',
            'again',
            'against',
            'all',
            'almost',
            'alone',
            'along',
            'already',
            'also',
            'although',
            'always',
            'am',
            'among',
            'amongst',
            'amoungst',
            'amount',
            'an',
            'and',
            'another',
            'any',
            'anyhow',
            'anyone',
            'anything',
            'anyway',
            'anywhere',
            'are',
            'around',
            'as',
            'at',
            'back',
            'be',
            'became',
            'because',
            'become',
            'becomes',
            'becoming',
            'been',
            'before',
            'beforehand',
            'behind',
            'being',
            'below',
            'beside',
            'besides',
            'between',
            'beyond',
            'bill',
            'both',
            'bottom',
            'but',
            'by',
            'call',
            'can',
            'cannot',
            'cant',
            'co',
            'con',
            'could',
            'couldnt',
            'cry',
            'de',
            'describe',
            'detail',
            'do',
            'done',
            'down',
            'due',
            'during',
            'each',
            'eg',
            'eight',
            'either',
            'eleven',
            'else',
            'elsewhere',
            'empty',
            'enough',
            'etc',
            'even',
            'ever',
            'every',
            'everyone',
            'everything',
            'everywhere',
            'except',
            'few',
            'fifteen',
            'fify',
            'fill',
            'find',
            'fire',
            'first',
            'five',
            'for',
            'former',
            'formerly',
            'forty',
            'found',
            'four',
            'from',
            'front',
            'full',
            'further',
            'get',
            'give',
            'go',
            'had',
            'has',
            'hasnt',
            'have',
            'he',
            'hence',
            'her',
            'here',
            'hereafter',
            'hereby',
            'herein',
            'hereupon',
            'hers',
            'herself',
            'him',
            'himself',
            'his',
            'how',
            'however',
            'hundred',
            'ie',
            'if',
            'in',
            'inc',
            'indeed',
            'interest',
            'into',
            'is',
            'it',
            'its',
            'itself',
            'keep',
            'last',
            'latter',
            'latterly',
            'least',
            'less',
            'ltd',
            'made',
            'many',
            'may',
            'me',
            'meanwhile',
            'might',
            'mill',
            'mine',
            'more',
            'moreover',
            'most',
            'mostly',
            'move',
            'much',
            'must',
            'my',
            'myself',
            'name',
            'namely',
            'neither',
            'never',
            'nevertheless',
            'next',
            'nine',
            'no',
            'nobody',
            'none',
            'noone',
            'nor',
            'not',
            'nothing',
            'now',
            'nowhere',
            'of',
            'off',
            'often',
            'on',
            'once',
            'one',
            'only',
            'onto',
            'or',
            'other',
            'others',
            'otherwise',
            'our',
            'ours',
            'ourselves',
            'out',
            'over',
            'own',
            'part',
            'per',
            'perhaps',
            'please',
            'put',
            'rather',
            're',
            'same',
            'see',
            'seem',
            'seemed',
            'seeming',
            'seems',
            'serious',
            'several',
            'she',
            'should',
            'show',
            'side',
            'since',
            'sincere',
            'six',
            'sixty',
            'so',
            'some',
            'somehow',
            'someone',
            'something',
            'sometime',
            'sometimes',
            'somewhere',
            'still',
            'such',
            'system',
            'take',
            'ten',
            'than',
            'that',
            'the',
            'their',
            'them',
            'themselves',
            'then',
            'thence',
            'there',
            'thereafter',
            'thereby',
            'therefore',
            'therein',
            'thereupon',
            'these',
            'they',
            'thickv',
            'thin',
            'third',
            'this',
            'those',
            'though',
            'three',
            'through',
            'throughout',
            'thru',
            'thus',
            'to',
            'together',
            'too',
            'top',
            'toward',
            'towards',
            'twelve',
            'twenty',
            'two',
            'un',
            'under',
            'until',
            'up',
            'upon',
            'us',
            'very',
            'via',
            'was',
            'we',
            'well',
            'were',
            'what',
            'whatever',
            'when',
            'whence',
            'whenever',
            'where',
            'whereafter',
            'whereas',
            'whereby',
            'wherein',
            'whereupon',
            'wherever',
            'whether',
            'which',
            'while',
            'whither',
            'who',
            'whoever',
            'whole',
            'whom',
            'whose',
            'why',
            'will',
            'with',
            'within',
            'without',
            'would',
            'yet',
            'you',
            'your',
            'yours',
            'yourself',
            'yourselves',
            'the',
        ];

        return self::$enStopwords;
    }
}