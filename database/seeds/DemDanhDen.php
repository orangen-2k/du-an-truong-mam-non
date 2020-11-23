<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemDanhDen extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
       $nam_hoc_moi = DB::table('nam_hoc')->where('type', 1)->first();
       $lop_hoc_moi = DB::table('lop_hoc')
        ->join('khoi', 'khoi.id', '=', 'lop_hoc.khoi_id')
        ->select('lop_hoc.*')
        ->where('khoi.nam_hoc_id', $nam_hoc_moi->id)->get();
        for($i = 12; $i< 31; $i++){
            if($i == 3 ||  $i == 10 ||  $i == 17 ||  $i ==24 || $i == 31)
            {
                $i = $i+2;
            }
        
        foreach($lop_hoc_moi as $value){
            $giao_vien = DB::table('giao_vien')->where('lop_id', $value->id)->first();
            $hoc_sinh = DB::table('hoc_sinh')->where('lop_id', $value->id)->get();
           
            foreach($hoc_sinh as $item){
                $an = rand(1,2);
                $rand1 = rand(1,3);
                $rand2 = rand(1,3);
                if($rand1 !== 1 && $rand2 !==1){
                    $an = 2;
                }
        
                DB::table('diem_danh_den')->insert([
                    'ngay_diem_danh_den' => '2020-10-0'.$i,
                    'hoc_sinh_id' => $item->id,
                    'giao_vien_id' => $giao_vien->id,
                    'type' => 1,
                    'trang_thai' => rand(1,3),
                    'lop_id' => $value->id,
                    'phieu_an' => $an
                ]);
                DB::table('diem_danh_den')->insert([
                    'ngay_diem_danh_den' => '2020-10-0'.$i,
                    'hoc_sinh_id' => $item->id,
                    'giao_vien_id' => $giao_vien->id,
                    'type' => 2,
                    'trang_thai' => rand(1,3),
                    'lop_id' => $value->id,
                    'phieu_an' => $an
                ]);
            }
        }
    }


    //    foreach($lop_hoc_moi as $value){
    //     $giao_vien = DB::table('giao_vien')->where('lop_id', $value->id)->first();
    //     $hoc_sinh = DB::table('hoc_sinh')->where('lop_id', $value->id);
    //     foreach($hoc_sinh as $item){
    //         DB::table('diem_danh_den')->insert([
    //             'ngay_diem_danh_den' => '2020-10-07',
    //             'hoc_sinh_id' => $item->id,
    //             'giao_vien_id' => $giao_vien->id,
    //             'type' => 1,
    //             'trang_thai' => rand(1,3),
    //             'lop_id' => $value->id
    //         ]);
    //         DB::table('diem_danh_den')->insert([
    //             'ngay_diem_danh_den' => '2020-10-07',
    //             'hoc_sinh_id' => $item->id,
    //             'giao_vien_id' => $giao_vien->id,
    //             'type' => 2,
    //             'trang_thai' => rand(1,3),
    //             'lop_id' => $value->id
    //         ]);
    //     }
    // }
       
    }
}
