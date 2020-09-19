@extends('layouts.main')
@section('title', "Quản lý giáo viên")
@section('content')
<div class="m-content">
    <div class="row">
        <div class="col-xl-12">
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
                <div id="preload" class="preload-container text-center" style="display: none">
                    <img id="gif-load" src="{!! asset('image/icon-loading.gif') !!}" alt="">
                </div>
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Bộ lọc
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">

                    <!--begin::Section-->
                    <div class="m-section">
                        <div class="m-section__content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Khối</label>
                                        <div class="col-lg-8">
                                            <select class="form-control select2" name="khoi" id="khoi">
                                                <option value="0" selected>Chọn khối</option>
                                            @foreach ($khoi as $item)
                                                <option value="{{$item->id}}">{{$item->ten_khoi}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group m-form__group row">
                                        <label for="" class="col-lg-2 col-form-label">Lớp</label>
                                        <div class="col-lg-8">
                                            <select class="form-control select2" name="lop" id="lop">
                                                <option value="0" selected>Chọn lớp</option>
                                            @foreach ($lop as $item)
                                                <option value="{{$item->id}}">{{$item->ten_lop}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Tên giáo viên</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control m-input m-input--square" id="exampleInputPassword1" placeholder="Tên giáo viên">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            </div>
                        </div>
                    </div>

                    <!--end::Section-->
                </div>
            </div>

            <!--end::Portlet-->
        </div>
    </div>
    <section class="action-nav d-flex align-items-center justify-content-between mt-4 mb-4">

        <div class="col-lg-2">
            <a href="javascript:" data-toggle="modal" data-target="#exportBieuMauModal">
                <i class="fa fa-download" aria-hidden="true"></i>
                Tải xuống biểu mẫu
            </a>
        </div>
        <div class="col-lg-2">
            <a href="javascript:" data-toggle="modal" id="upImport-file" data-target="#moDalImport"><i class="fa fa-upload" aria-hidden="true"></i>
                Tải lên file Excel</a>
        </div>
        <div class="col-lg-2">
            <a href="javascript:" data-toggle="modal" data-target="#moDalExportData"><i class="fa fa-file-excel" aria-hidden="true"></i>
                Xuất dữ liệu ra Excel</a>
        </div>
        <div class="col-lg-6 " style="text-align: right">
           
        <a href="{{route('quan-ly-giao-vien-create')}}">
            <button type="button" class="btn btn-info .bg-info">Thêm mới</button>
        </a>
        </div>

    </section>
    <div class="m-portlet">
        <div class="m-portlet__body table-responsive">
            <table class="table m-table m-table--head-bg-success">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã giáo viên</th>
                        <th>Họ và tên</th>
                        <th>Ảnh</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Khối</th>
                        <th>Lớp</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                       $i = !isset($_GET['page']) ? 1 : ($limit * ($_GET['page']-1) + 1) 
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$item->ma_gv}}</td>
                        <td>{{$item->ten}}</td>
                        @if ($item->anh == "")
                        <td><img src="image/default_people.jpg" height="100px" width="75px" alt=""></td>
                        @else
                        <td><img src="{!!asset($item->anh)!!}" height="100px" width="75px" alt=""></td>
                        @endif  
                        <td>{{date("d/m/Y", strtotime($item->ngay_sinh))}}</td>
                    @if ($item->gioi_tinh == 1)
                        <td>Nam</td>
                    @else
                        <td>Nữ</td>
                    @endif
                        <td>{{$item->ten_khoi}}</td>
                        <td>{{$item->ten_lop}}</td>
                        <td>
                        <a href="#"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_giaovien{{$item->id}}">Chi tiết</button></a>
                            <a href="#"><button type="button" class="btn btn-danger">Xóa</button></a>
                        </td>
                       
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            <div class="d-flex justify-content-end  mt-3">{{$data->links()}}</div>
            
        </div>
    </div>
    @foreach ($data as $item)
    <div class="modal fade" id="modal_giaovien{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <span class="m-portlet__head-icon mr-2">
                    <i class="flaticon-users-1"></i>
                </span>
              <h5 class="modal-title" id="exampleModalLabel">Giáo viên: {{$item->ten}} - {{$item->ma_gv}}
              
              </h5>
             
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body ">
                
                <div class="m-portlet">
            
                    <div class="m-portlet__body">
                        
                        <div class="row">
                            <div class="col-md-4 ">
                                <div class="form-group m-form__group row">
                                    <img src="image/default_people.jpg" height="250px" width="225px" alt="">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Khối</label>
                                    <select class="form-control select2" name="khoi2" id="khoi2">
                                            <option value="0" selected>Chọn khối</option>
                                        @foreach ($khoi as $item->khoi)
                                            <option value="{{$item->khoi->id}}">{{$item->khoi->ten_khoi}}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleFormControlSelect1">Lớp </label>
                                      <select class="form-control select2" name="lop2" id="lop2">
                                                <option value="0" selected>Chọn lớp</option>
                                            @foreach ($lop as $item_lop)
                                                <option value="{{$item_lop->id}}">{{$item_lop->ten_lop}}</option>
                                            @endforeach
                                      </select>
                                    </div>
                            </div>
                            <div class="col-md-8 ">
                                <div class="form-group m-form__group row">
                                    <label for="" class="col-3 col-form-label">Mã giáo viên:</label>
                                    <div class="col-9">
                                    <input type="text" class="form-control col-12" style="font-weight: bold" disabled id="exampleFormControlInput1" value="{{$item->ma_gv}}">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="" class="col-3 col-form-label">Họ và tên:</label>
                                    <div class="col-9">
                                    <input type="email" class="form-control col-12" style="font-weight: bold" id="exampleFormControlInput1" placeholder="Điền họ và tên" value="{{$item->ten}}">
                                    </div>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option2" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                      Nam
                                    </label>
                                    <input class="form-check-input ml-4" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                    <label class="form-check-label ml-5" for="exampleRadios2">
                                      Nữ
                                    </label>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="" class="col-3 col-form-label">Điện thoại:</label>
                                    <div class="col-9">
                                    <input type="date" class="form-control col-12" id="exampleFormControlInput1" placeholder="Điền ngày sinh" value="{{$item->ngay_sinh}}">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="" class="col-3 col-form-label">Điện thoại:</label>
                                    <div class="col-9">
                                    <input type="text" class="form-control col-12" id="exampleFormControlInput1" placeholder="Điền số điện thoại" value="{{$item->dien_thoai}}">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="" class="col-3 col-form-label">Trình độ:</label>
                                    <div class="col-9">
                                    <input type="text" class="form-control col-12" id="exampleFormControlInput1" placeholder="Điền trình độ" value="{{$item->trinh_do}}">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="" class="col-3 col-form-label">Chuyên môn:</label>
                                    <div class="col-9">
                                    <input type="text" class="form-control col-12" id="exampleFormControlInput1" placeholder="Điền chuyên môn" value="{{$item->chuyen_mon}}">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="" class="col-3 col-form-label">Nơi đào tạo:</label>
                                    <div class="col-9">
                                    <input type="text" class="form-control col-12" id="exampleFormControlInput1" placeholder="Điền nơi đào tạo" value="{{$item->noi_dao_tao}}">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="" class="col-3 col-form-label">Năm tốt nghiệp:</label>
                                    <div class="col-9">
                                    <input type="number" class="form-control col-12" id="exampleFormControlInput1" placeholder="Điền năm tốt nghiệp" value="{{$item->nam_tot_nghiep}}">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="" class="col-3 col-form-label">Địa chỉ:</label>
                                    <div class="col-9">
                                    <input type="text" class="form-control col-12" id="exampleFormControlInput1" placeholder="Điền địa chỉ" >
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cập nhật</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>  
            </div>
          </div>
        </div>
      </div>
    @endforeach

</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
    var url_get_lop_theo_khoi = "{{route('quan-ly-giao-vien-get-lop-theo-khoi')}}"
    $("#khoi").change(function(){
        $('#preload').css('display','block')
        axios.post(url_get_lop_theo_khoi, {
            id:  $("#khoi").val(),
        }).then(function(response){
            var data_html = '<option value="0" selected  >Chọn lớp</option>'
            response.data.forEach(element => {
                data_html+=`<option value="${element.id}" >${element.ten_lop}</option>`
            });
        $('#preload').css('display','none')
        $('#lop').html(data_html)
        }).catch(function (error) {
            console.log(error);
        });
    })
</script>
    
@endsection