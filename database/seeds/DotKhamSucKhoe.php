<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DotKhamSucKhoe extends Seeder
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
        ->select('lop_hoc.*', 'khoi.nam_hoc_id')
        ->where('khoi.nam_hoc_id', $nam_hoc_moi->id)->get();
        $suc_khoe = DB::table('dot_kham_suc_khoe')->orderBy('id', 'desc')->limit(1)->first();
        dd($suc_khoe);
    }
}
