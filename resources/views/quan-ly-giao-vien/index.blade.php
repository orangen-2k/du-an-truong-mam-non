@extends('layouts.main')
@section('title', "Quản lý giáo viên")
@section('content')
<div class="m-content">
    <div class="row">
        <div class="col-xl-12">
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
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
                                            <select class="form-control" name="loai_hinh" id="loai_hinh">
                                                <option value="0" selected>Chọn khối</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group m-form__group row">
                                        <label for="" class="col-lg-2 col-form-label">Lớp</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="co_so_id" id="co_so_id">
                                                <option value="">Chọn lớp</option>
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
           
            <a href=""><button type="button" class="btn btn-info .bg-info">Thêm
                    mới</button></a>
           
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
                        $i = 1    
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$item->ma_gv}}</td>
                        <td>{{$item->ten}}</td>
                        @if ($item->anh == "")
                        <td><img src="image/default_people.jpg" height="100px" width="75px" alt=""></td>
                        @else
                        <td><img src="{{$item->anh}}" height="100px" width="75px" alt=""></td>
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
                            <a href="#"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_giaovien1">Chi tiết</button></a>
                            <a href="#"><button type="button" class="btn btn-danger">Xóa</button></a>
                        </td>
                       
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>

            
        </div>
    </div>
    <div class="modal fade" id="modal_giaovien1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <span class="m-portlet__head-icon mr-2">
                    <i class="m-menu__link-icon flaticon-web"></i>
                </span>
              <h5 class="modal-title" id="exampleModalLabel">Giáo viên: Nguyễn Trường Xuân
              
              </h5>
             
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body ">
                
                <div class="m-portlet">
            
                    <div class="m-portlet__body">
                        
                        <div class="row">
                            <div class="col-md-2 ">
                                <div class="form-group m-form__group row">
                                    <img src="image/default_people.jpg" height="150px" width="125px" alt="">
                                    
                                </div>
                            </div>
                            <div class="col-md-10 ">
                                <div class="form-group m-form__group row">
                                    <label for="" class="col-lg-2 col-form-label">Họ và tên:</label>
                                    <div class="col-lg-10">
                                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Điền họ và tên" value="Nguyễn Trường Xuân">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Họ và tên</label>
                              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Điền họ và tên" value="Nguyễn Trường Xuân">
                            </div>
                            <div class="custom-file">
                                <label for="exampleFormControlInput1">Ảnh</label>
                                <input type="email" type="file">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                  Nam
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                  Nữ
                                </label>
                              </div>
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Khối</label>
                              <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Lớp </label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">Example textarea</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                          </form>
                        
                    </div>
                   
                </div>
    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
              
            </div>
          </div>
        </div>
      </div>
</div>
@endsection