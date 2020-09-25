<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Protection;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use \App\Repositories\LopHocRepository;
use \App\Repositories\KhoiRepository;
use \App\Repositories\HocSinhRepository;
use Storage;
use Illuminate\Support\Facades\DB;

class QuanlyHocSinhController extends Controller
{
    protected $LopHoc;
    protected $Khoi;
    public function __construct(
        LopHocRepository $LopHoc,
        KhoiRepository $Khoi,
        HocSinhRepository $HocSinh
        
    ){
        $this->LopHoc = $LopHoc;
        $this->Khoi = $Khoi;
        $this->HocSinh = $HocSinh;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $khoi = $this->Khoi->getAllKhoi();  
    //     return view('quan-ly-hoc-sinh.index',compact('khoi'));
    // }
    public function index()
    {
        $hocsinh = $this->HocSinh->getAll();
        // dd($hocsinh);
        return view('quan-ly-hoc-sinh.quan-ly-hoc-sinh',[
            'hocsinh' => $hocsinh,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quan-ly-hoc-sinh.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        dd($this->LopHoc->getAllLopHoc());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('quan-ly-hoc-sinh.edit');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function createSpreadSheet($fileRead,$duoiFile){
        if ($duoiFile =='xls') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
         }else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
         }
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($fileRead);
        return $spreadsheet;
    }

    public function dataListValidation($spreadsheet,$mavalue,$o){
        $validation = $spreadsheet->getActiveSheet()->getCell($o)
            ->getDataValidation();
        $validation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
        $validation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
        $validation->setAllowBlank(false);
        $validation->setShowInputMessage(true);
        $validation->setShowErrorMessage(true);
        $validation->setShowDropDown(true);
        $validation->setErrorTitle('Input error');
        $validation->setError('Value is not in list.');
        $validation->setPromptTitle('Pick from list');
        $validation->setPrompt('Please pick a value from the drop-down list.');
        $validation->setFormula1($mavalue);
    }

    public function exportBieuMau(Request $request)
    {
        $id_lop = $request->id_lop;
        $lop = $this->LopHoc->getOneLop($id_lop);
        $spreadsheet = IOFactory::load('excel/hoc-sinh.xlsx');
        $worksheet = $spreadsheet->getActiveSheet();

        $worksheet->setCellValue('A1', "Lớp: $lop->ten_lop - $id_lop");
        $worksheet->getStyle('F7')
        ->getNumberFormat()
        ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DATETIME);

        // for($i = 7 ; $i <50 ; $i++){
        // }
        $mavalueTP_noi_o ='=OFFSET(MA_TINH!$B$1, 1, 0, MATCH("ZZZZZZZZ", MA_TINH!$B:$B)-1)';
        $mavalueQH_noi_o ='=OFFSET(MA_HUYEN!$C$1,MATCH($H7,MA_HUYEN!$D$2:$D$714,0),,COUNTIF(MA_HUYEN!$D$2:$D$714,$H7))';
        $mavalueXP_noi_o ='=OFFSET(MA_PHUONGXA!$E$1,MATCH($I7,MA_PHUONGXA!$F$2:$F$11165,0),,COUNTIFS(MA_PHUONGXA!$G$2:$G$11165,$H7,MA_PHUONGXA!$F$2:$F$11165,$I7))';
        
        $mavalueTP_ho_khau ='=OFFSET(MA_TINH!$B$1, 1, 0, MATCH("ZZZZZZZZ", MA_TINH!$B:$B)-1)';
        $mavalueQH_ho_khau ='=OFFSET(MA_HUYEN!$C$1,MATCH($M7,MA_HUYEN!$D$2:$D$714,0),,COUNTIF(MA_HUYEN!$D$2:$D$714,$M7))';
        $mavalueXP_ho_khau ='=OFFSET(MA_PHUONGXA!$E$1,MATCH($N7,MA_PHUONGXA!$F$2:$F$11165,0),,COUNTIFS(MA_PHUONGXA!$G$2:$G$11165,$M7,MA_PHUONGXA!$F$2:$F$11165,$N7))';
        
        

        for($i = 7; $i <=56 ; $i++){

            $this->dataListValidation($spreadsheet,$mavalueTP_noi_o,'H'.$i);
            $this->dataListValidation($spreadsheet,$mavalueQH_noi_o,'I'.$i);
            $this->dataListValidation($spreadsheet,$mavalueXP_noi_o,'J'.$i);

            $this->dataListValidation($spreadsheet,$mavalueTP_ho_khau,'M'.$i);
            $this->dataListValidation($spreadsheet,$mavalueQH_ho_khau,'N'.$i);
            $this->dataListValidation($spreadsheet,$mavalueXP_ho_khau,'O'.$i);

        }
 

        $writer = IOFactory::createWriter($spreadsheet, "Xlsx");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="File-nhap-hoc-sinh.xlsx"');
        $writer->save("php://output");
    }


    public function getLopOfKhoi(Request $request){
        $id = $request->id;
      return $this->LopHoc->getLopHocOfKhoi($id);
    }

    public function changedate_excel($date_seria){
        $excel_date = $date_seria; //here is that value 41621 or 41631
        $unix_date = ($excel_date - 25569) * 86400;
        $excel_date = 25569 + ($unix_date / 86400);
        $unix_date = ($excel_date - 25569) * 86400;
        return gmdate("Y-m-d", $unix_date);
    }

    public function checkError($data){
        $arrayKey =  ['B','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC'];
        $vitri=[];
        for($i = 5 ; $i < count($data); $i++){ 
            $key_aphabel=-1;
            $rowNumber = $i+1; 
               if($data[$i][11] != " -  - "){
                for($j = 0 ; $j < count($arrayKey); $j++){ 
                    $key_aphabel++;
                     if($data[$i][$j] == null || $data[$i][$j]== "" ){
                            array_push($vitri,$arrayKey[$j].$i);
                      }
                    }
                }
          }

        return $vitri;
    }

    public function importFile(Request $request){
        $ngay_vao_truong = $request->ngay_vao_truong;
        $arrayKey =  ['B','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC'];
        $nameFile=$request->file->getClientOriginalName();
        $nameFileArr=explode('.',$nameFile);
        $duoiFile=end($nameFileArr);
        $fileRead = $_FILES['file']['tmp_name'];
        $spreadsheet = $this->createSpreadSheet($fileRead,$duoiFile);
        $data =$spreadsheet->getActiveSheet()->toArray();

        $lop = explode(' - ', $data[0][0]);
        $lop_id = trim(array_pop($lop));
        // dd($data);
        $lopCheck = DB::table('lop_hoc')->find($lop_id);

        if($lopCheck == null){
            return response()->json(['messageError' => 'Lớp không tồn tại' ],200);   
        }

        $vitri = $this->checkError($data);
        $arrayData=[];
        $insertData=[];
            if($vitri == null || $vitri == ''){
                for($i = 6; $i < count($data); $i++){ 
                    if($data[$i][11] != " -  - " || $data[$i][16] != " -  - "){
                            $ngay_sinh = $this->changedate_excel($data[$i][5]);
                            $ngay_sinh_cha = $this->changedate_excel($data[$i][21]);
                            $ngay_sinh_me = $this->changedate_excel($data[$i][25]);

                            $noi_o_string =$data[$i][11];
                            $ho_khau_string =$data[$i][16];
                            $noi_o = explode(" - ", $noi_o_string);
                            $ho_khau = explode(" - ", $ho_khau_string);
                            $arrayData=[
                                'ten'=>$data[$i][1],
                                'ten_thuong_goi'=>$data[$i][2],
                                'dan_toc'=>$data[$i][3],
                                'gioi_tinh'=>$data[$i][4],
                                'ngay_sinh'=>$ngay_sinh,
                                'noi_sinh'=>$data[$i][6],
                                
                                'noi_o_hien_tai_matp'=>$noi_o[0],
                                'noi_o_hien_tai_maqh'=>$noi_o[1],
                                'noi_o_hien_tai_xaid'=>$noi_o[2],
                                'noi_o_hien_tai_so_nha'=>$data[$i][10],

                                'ho_khau_thuong_tru_matp'=> $ho_khau[0],
                                'ho_khau_thuong_tru_maqh'=>$ho_khau[1],
                                'ho_khau_thuong_tru_xaid'=>$ho_khau[2],
                                'ho_khau_thuong_tru_so_nha'=>$data[$i][15],

                                'doi_tuong_chinh_sach_id'=>$data[$i][17],
                                'hoc_sinh_khuyet_tat'=>$data[$i][18],
                                'dien_thoai_dang_ki'=>$data[$i][19],

                                'ten_cha'=>$data[$i][20],
                                'ngay_sinh_cha'=>$ngay_sinh_cha,
                                'cmtnd_cha'=>$data[$i][22],
                                'dien_thoai_cha'=>$data[$i][23],

                                'ten_me'=>$data[$i][24],
                                'ngay_sinh_me'=>$ngay_sinh_me,
                                'cmtnd_me'=>$data[$i][26],
                                'dien_thoai_me'=>$data[$i][27],
                                'ngay_vao_truong'=>$ngay_vao_truong,
                                'lop_id' => $lop_id
                            ];
                           array_push($insertData,$arrayData);
                        }
                    }
                    // dd($insertData);
                    $this->HocSinh->createHocSinh($insertData);
                    return response()->json('ok',200); 
                }else{
                   return response()->json(['messageError' => 'Lỗi rồi'],200);   
                }
            }


    public function errorFileImport(Request $request){
        $nameFile=$request->file_import->getClientOriginalName();
        $nameFileArr=explode('.',$nameFile);
        $duoiFile=end($nameFileArr);

        $fileRead = $_FILES['file_import']['tmp_name'];
        $pathLoad = Storage::putFile(
            'uploads/excels',
            $request->file('file_import')
        );
        $path = str_replace("/","\\",$pathLoad);
        $fileReadStorage= storage_path('app\\'.$path);
        // $fileReadStorage= storage_path('app/public/'.$pathLoad);

        $spreadsheet = $this->createSpreadSheet($fileReadStorage,$duoiFile);
        $data = $spreadsheet->getActiveSheet()->toArray();
            
        // $truong = explode(' - ', $data[0][0]);
        // $id_truong = trim(array_pop($truong));
        // $arrayApha=['H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK'];
        // $vitri=$this->checkError($data, $arrayApha, 8 , 7, 36);
    
        $spreadsheet2 = IOFactory::load($fileReadStorage);
        $worksheet = $spreadsheet2->getActiveSheet();
        Storage::delete($path);
        // $this->errorRebBackGroud($vitri,$worksheet);
        $writer = IOFactory::createWriter($spreadsheet2, "Xlsx"); 
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Error-file-nhap-so-lieu-tuyen-sinh.xlsx"');
        $writer->save("php://output");
    }

   

}
