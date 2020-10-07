<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HocSinh extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nam_hoc_moi = DB::table('nam_hoc')->where('type', 1)->first();
        $url = file_get_contents("https://raw.githubusercontent.com/duyet/vietnamese-namedb/master/uit_member.json");
        $json_ten = json_decode($url);
        // dd($json_ten[1]);

        $lop_hoc_moi = DB::table('lop_hoc')
        ->join('khoi', 'khoi.id', '=', 'lop_hoc.khoi_id')
        ->select('lop_hoc.*', 'khoi.nam_hoc_id')
        ->where('khoi.nam_hoc_id', $nam_hoc_moi->id)->get();
        
        $tuoi = 19;
        $length = 0;
        foreach ($lop_hoc_moi as $key) {
            
            if($key->type == 1){
                $length = $length + 15;
                $tuoi = $tuoi - 1;
            }
            
            
            for ($i=0; $i <$length ; $i++) { 
                $rand = rand(1,100);
                DB::table('hoc_sinh')->insert([
                    'lop_id' => $key->id,
                    'ten' => $json_ten[$rand]->full_name,
                    'ma_hoc_sinh' => 'PH0'.rand(100,999),
                    'gioi_tinh' => rand(0,1),
                    'ten_thuong_goi' => $json_ten[$rand]->first_name,
                    'ngay_sinh' => '20'.$tuoi.'-0'.rand(1,9).'-'.rand(10,28),
                    'dan_toc' => 'Kinh',
                    'ngay_vao_truong' => '2016-05-01',
                    'noi_sinh' => 'Hà Nội',
                    'ten_cha' => $json_ten[rand(1,100)]->full_name,
                    'ngay_sinh_cha' => '1982-05-'.rand(10,30),
                    'cmtnd_cha' => rand(10000, 99999),
                    'dien_thoai_cha' => '0915950738',
                    'ten_me' => $json_ten[rand(1,100)]->full_name,
                    'ngay_sinh_me' => '1992-05-'.rand(10,30),
                    'cmtnd_me' => rand(10000, 99999),
                    'dien_thoai_me' => '0376671343',
                    'dien_thoai_dang_ki' => '0376671'.rand(100,999),
                    'email_dang_ky' => 'xuanntph07568@fpt.edu.vn',

                ]);
            }
        }
    }
}
