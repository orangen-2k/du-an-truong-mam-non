<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GiaoVien extends Seeder
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
        ->where('khoi.nam_hoc_id', $nam_hoc_moi->id)->get();
        foreach ($lop_hoc_moi as $key) {
            DB::table('giao_vien')->insert([
                'ma_gv' => 'PH0'.rand(1000,99999999),
                'lop_id' => $key->id,
                'ten' => $json_ten[rand(200,600)]->full_name,
                'gioi_tinh' => rand(0,1),
                'dien_thoai' => '0376671'.rand(100,999),
                'ngay_sinh' => '1998-08-'.rand(1,30),
                'dan_toc' => 'Kinh',
                'trinh_do' => 'Cao đằng mầm non',
                'chuyen_mon' => 'Cao đằng',
                'noi_dao_tao' => 'Hà Nội',
                'nam_tot_nghiep' => '2017',
                'type' => 1
            ]);
            DB::table('giao_vien')->insert([
                'ma_gv' => 'PH0'.rand(1000,99999999),
                'lop_id' => $key->id,
                'ten' => $json_ten[rand(200,600)]->full_name,
                'gioi_tinh' => rand(0,1),
                'dien_thoai' => '0376671'.rand(100,999),
                'ngay_sinh' => '1998-08-'.rand(1,30),
                'dan_toc' => 'Kinh',
                'trinh_do' => 'Cao đằng mầm non',
                'chuyen_mon' => 'Cao đằng',
                'noi_dao_tao' => 'Hà Nội',
                'nam_tot_nghiep' => '2017',
                'type' => 2
            ]);
        }
    }
}
