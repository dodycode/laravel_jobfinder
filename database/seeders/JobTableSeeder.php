<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Joblist;

class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'job_name' => 'Training Housekeeping dan Kitchen', 
                'company_name' => 'The Grand Daha A Luxury Resort and SPA',
                'category' => 'training',
                'description' => 'The Grand Daha A Luxury Resort and Spa yang berlokasi di Kerobokan, Membuka Lowongan Internships',
                'address' => 'Jl. Raya Kerobokan Gg Taman 20a'
            ],
            [
                'job_name' => 'Daily Worker Chef', 
                'company_name' => 'Pholicious Canggu',
                'category' => 'training',
                'description' => 'Pholicious Canggu yang berlokasi di Kerobokan, Membuka Lowongan Internships',
                'address' => 'Jl Pantai Berawa no.99, Tibubeneng, Bali'
            ],
            [
                'job_name' => 'Marketing Support', 
                'company_name' => 'PT. Kontakperkasa Futures',
                'category' => 'loker',
                'description' => 'PT. Kontakperkasa Futures yang berlokasi di Kerobokan, Membuka Lowongan Internships',
                'address' => 'Jl. Sunset Road, Ruko Sunset Paradise RA.01-02'
            ],
            [
                'job_name' => 'Daily Worker Laundry', 
                'company_name' => 'ASA Property Management',
                'category' => 'daily worker',
                'description' => 'ASA Property Management yang berlokasi di Kerobokan, Membuka Lowongan Internships',
                'address' => 'Jl. By Pass Ngurah Rai No.126 Blok E Sanur'
            ],
            [
                'job_name' => 'Staff Housekeeping', 
                'company_name' => 'Inkuta Residence and Villa',
                'category' => 'loker',
                'description' => 'Inkuta Residence and Villa yang berlokasi di Kerobokan, Membuka Lowongan Internships',
                'address' => 'Jalan Kunti II Gang Nuansa,No. 8-10, Seminyak'
            ],
        ];

        Joblist::insert($data);
    }
}
