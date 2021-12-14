<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Cleaners;
use App\Helpers\Tokenizer;
use App\Helpers\Stopwords;
use App\Helpers\Stemming;
use App\Models\Joblist;

class LandingController extends Controller
{
    public function index()
    {
        return view('interfaces.landing.index');
    }

    public function results(Request $request)
    {
        $jobs = Joblist::all();

        // preprocess query
        $queryTerms = self::preprocessing($request->search);

        // dd($queryTerms);

        //preprocess jobs
        $jobsTerms = array();
        foreach ($jobs as $job) {
            //preprocess company name
            $companyName = self::preprocessing($job->company_name);

            //preprocess job name
            $jobName = self::preprocessing($job->job_name);

            //preprocess category
            $category = self::preprocessing($job->category);

            //preprocess description
            $description = self::preprocessing($job->description);

            //preprocess address
            $address = self::preprocessing($job->address);

            //combine into one result for each job
            $jobsTerms[] = [
                'job_id' => $job->id,
                'terms' => array_merge($companyName, $jobName, $category, $description, $address)
            ];
        }

        // dd($jobsTerms);
        //count TF
        $TFCount = self::countTF($queryTerms, $jobsTerms);
        // dd($TFCount);

        //count DF
        $DFCount = self::countDF($queryTerms, $jobsTerms);
        // dd($DFCount);

        //count IDF
        $IDFCount = self::countIDF(count($jobs), $DFCount);
        // dd($IDFCount);

        $TFIDFCount = self::countTFIDF($TFCount, $IDFCount);
        // dd($TFIDFCount);

        //collect highest bobot
        $highestJobs = array();
        foreach ($TFIDFCount as $jobTerms) {
            foreach ($jobTerms as $jobTerm) {
                if ($jobTerm["bobot (TF-IDF)"] > 0) {
                    $highestJobs[] = $jobTerm;
                }
            }
        }

        // dd($highestJobs);

        //sorted by bobot
        $sortedJobs = collect($highestJobs)->sortByDesc('bobot (TF-IDF)')->values()->all();

        // dd($sortedJobs);

        //remove same job_id
        $filteredJobs = collect($sortedJobs)->unique('job_id')->values()->all();

        //ubah jadi object
        foreach ($filteredJobs as $index => $filteredJob) {
            $filteredJobs[$index] = (object) $filteredJob;
        }

        //menambahkan attribut tambahan
        foreach ($jobs as $job) {
            foreach ($filteredJobs as $filteredJob) {
                if ($job->id === $filteredJob->job_id) {
                    $filteredJob->company_name = $job->company_name;
                    $filteredJob->job_name     = $job->job_name;
                    $filteredJob->address      = $job->address;
                    $filteredJob->category     = $job->category;
                    $filteredJob->description  = $job->description;
                }
            }
        }

        // dd($filteredJobs);

        return view('interfaces.landing.result', compact('filteredJobs'));
    }

    protected static function preprocessing($sentences)
    {
        //bersihkan tanda baca ganti dengan spasi
        $tempSentences = Cleaners::cleanText($sentences);

        //standarkan teks ke huruf kecil
        $tempSentences = strtolower(trim($tempSentences));

        //tokenizer teks
        $tempSentences = Tokenizer::get($tempSentences);

        //hapus stopwords yang terkandung pada teks
        $tempSentences = Stopwords::remove($tempSentences);

        //lakukan stemming
        $preprocessedWord = array();
        foreach ($tempSentences as $sentence) {
            $preprocessedWord[] = Stemming::get($sentence);
        }

        return $preprocessedWord;
    }

    protected static function countTF($queryTerms, $jobsTerms)
    {
        $TFCount = array();

        //definisikan array
        foreach ($queryTerms as $queryIndex => $queryTerm) {
            foreach ($jobsTerms as $jobIndex => $jobTerms) {
                foreach ($jobTerms['terms'] as $jobTerm) {
                    $TFCount[$queryIndex][$jobIndex]['job_id'] = $jobTerms['job_id'];
                    $TFCount[$queryIndex][$jobIndex]['count'] = 0;
                }
            }
        }

        //lakukan pengecekan
        foreach ($queryTerms as $queryIndex => $queryTerm) {
            foreach ($jobsTerms as $jobIndex => $jobTerms) {
                foreach ($jobTerms['terms'] as $jobTerm) {
                    if ($jobTerm === $queryTerm) {
                        $TFCount[$queryIndex][$jobIndex]['count'] += 1;
                    }
                }
            }
        }

        // dd($TFCount);


        return $TFCount;
    }

    protected static function countDF($queryTerms, $jobsTerms)
    {
        $DFCount = array();

        //inisialisasi array
        foreach ($queryTerms as $queryIndex => $queryTerm) {
            foreach ($jobsTerms as $jobIndex => $jobTerms) {
                foreach ($jobTerms['terms'] as $jobTerm) {
                    $DFCount[$queryIndex] = 0;
                }
            }
        }

        //pengecekan

        foreach ($queryTerms as $queryIndex => $queryTerm) {
            foreach ($jobsTerms as $jobIndex => $jobTerms) {
                foreach ($jobTerms['terms'] as $jobTerm) {
                    if ($jobTerm === $queryTerm) {
                        $DFCount[$queryIndex] += 1;
                    }
                }
            }
        }


        return $DFCount;
    }

    protected static function countIDF($jobsCount, $DFCount)
    {
        $IDFCount = array();

        //inisiasi
        foreach ($DFCount as $index => $count) {
            $IDFCount[$index] = 0;
        }

        //hitung
        foreach ($DFCount as $index => $count) {
            if ($count > 0) {
                if ($count > $jobsCount) {
                    $count = $count - 2;
                } elseif ($count == $jobsCount) {
                    $count = $count - 1;
                }
                $IDFCount[$index] = log($jobsCount / $count);
            }
        }

        return $IDFCount;
    }

    protected static function countTFIDF($TFCount, $IDFCount)
    {
        $TFIDFCount = array();

        //inisiasi
        foreach ($TFCount as $index => $TFJobs) {
            foreach ($TFJobs as $jobIndex => $TFJob) {
                $TFIDFCount[$index][$jobIndex] = [
                    'job_id' => $TFJob['job_id'],
                    'tf_count' => $TFJob['count'],
                    'bobot (TF-IDF)' => 0
                ];
            }
        }


        //hitung
        foreach ($TFCount as $index => $TFJobs) {
            foreach ($TFJobs as $jobIndex => $TFJob) {
                $TFIDFCount[$index][$jobIndex]['bobot (TF-IDF)'] = $TFIDFCount[$index][$jobIndex]['tf_count'] * $IDFCount[$index];
            }
        }

        return $TFIDFCount;
    }
}
