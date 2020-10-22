@extends('layouts.main') @section('title', "Thiết lập năm học")
@section('style')
<style>
    .error {
        color: red;
    }

    #name-error,
    #StartDate-error,
    #EndDate-error {
        color: red;
    }

    .m-section {
        margin: 0px !important
    }
    .m-portlet.m-portlet--creative .m-portlet__head .m-portlet__head-caption .m-portlet__head-label.m-portlet__head-label--success {
    min-width: 400px;
    font-size: 1rem !important;
    }
    .m-portlet.m-portlet--creative{
        height: 115px;
    }
    .m-portlet.m-portlet--creative .m-portlet__head .m-portlet__head-caption .m-portlet__head-title .m-portlet__head-text{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 13px
    }
</style>
@endsection @section('content')
<div class="m-content">
    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-3">
            <!--begin:: Widgets/Announcements 1-->
            <div class="m-portlet m--bg-accent m-portlet--bordered-semi m-portlet--skin-dark m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Danh sách năm học
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        {{-- <button class="btn btn-outline-secondary m-btn" data-toggle="modal" data-target="#m_modal_1"> --}}
                        <button class="btn btn-outline-secondary m-btn" type="button" onclick="checkNew()">
                            <i class="flaticon-add"></i>
                        </button>

                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-scrollable m-scrollable--track m-scroller ps ps--active-y" data-scrollable="true"
                        style="height: 200px; overflow: hidden;">
                        <div class="m-widget6">
                            <div class="m-widget6__body">
                                <div id="m_calendar_external_events" class="fc-unthemed">
                                    @forelse ($data as $item)

                                    <div onclick="getData(this)" data-name="{{ $item->name }}" data-id="{{ $item->id }}"
                                        data-start_date="{{ $item->start_date }}" data-end_date="{{ $item->end_date }}"
                                        class="m-nav__link fc-event fc-event-external fc-start m-fc-event--primary m--margin-bottom-15 ui-draggable ui-draggable-handle"
                                        data-color="m-fc-event--primary">
                                        <div class="fc-title">
                                            <div class="fc-content">
                                                {{ $item->name }}
                                                <span class="pull-right">
                                                    <i
                                                        class="fa {{ $item->type == 1 ? 'fa-lock-open' : 'fa-lock'}}"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    @empty
                                    <span class="text-danger">Hãy tạo năm học mới</span>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <div class="ps__rail-x" style="left: 0px; bottom: -1132px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 1132px; height: 200px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 160px; height: 40px;"></div>
                        </div>
                    </div>
                    <!--begin::Widget 7-->

                    <!--end::Widget 7-->
                </div>
            </div>

            <!--end:: Widgets/Announcements 1-->
        </div>
        <div class="col-xl-9">
            <!--begin:: Widgets/Blog-->

            <!--begin:: Widgets/Blog-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <button style="cursor: pointer" type="button" data-toggle="modal"
                                    data-target="#modal_chon_khoi_tao_nam_hoc"
                                    class="btn m-btn--pill m-btn--air btn-outline-info">
                                    Xếp lớp
                                </button>
                                <div class="modal fade" id="modal_chon_khoi_tao_nam_hoc" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="m-portlet__head">
                                            <div class="m-portlet__head-caption">
                                                <div class="m-portlet__head-title">
                                                    <h3 class="m-portlet__head-text">
                                                        Khởi tạo năm học mới
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                           
                                            <div class="m-portlet__body">

                                                <!--begin::Section-->
                                                <div class="m-section">
                                                    <span class="m-section__sub">
                                                        Hệ thống sẽ khởi tạo năm học mới 2019 - 2020 bằng 1 trong 2 cách:
                                                    </span>
                                                    <div class="m-portlet m-portlet--creative m-portlet--bordered-semi">
                                                        <div class="m-portlet__head">
                                                            
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                       <span> Khởi tạo năm học mới và đẩy dữ liệu của năm học cũ lên.</span>
                                                                    </h3>
                                                                    <h4 class="m-portlet__head-label m-portlet__head-label--success">
                                                                        <span>Khởi tạo năm học mới và đẩy dữ liệu của năm học cũ lên</span>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <span id="day_du_lieu_nam_cu" onclick="kiemTraTonTaiDuLieu(1,{{$data[0]->id}})" class="btn btn-success">Thực hiện</span>
                                                                {{-- <span id="day_du_lieu_nam_cu" href="{{route('get-chuyen-du-lieu-nam-hoc',['id'=>$data[0]->id])}}" class="btn btn-success">Thực hiện</span> --}}
                                                            </div>
                                                        </div>
            
                                                    </div>
                                                    <div class="m-portlet m-portlet--creative m-portlet--bordered-semi">
                                                        <div class="m-portlet__head">
                                                            
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text ">
                                                                       <span> Hệ thống sẽ khởi tạo năm học mới mà không chuyển dữ liệu từ năm trước lên <br>
                                                                    các thầy/cô cần nhập lại dữ liệu.
                                                                    </span>
                                                                    </h3>
                               
                                                                    <h4 class="m-portlet__head-label m-portlet__head-label--success">
                                                                        <span>Chỉ khởi tạo năm học mới</span>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <span id="chi_tiet_nam_hoc" onclick="kiemTraTonTaiDuLieu(2,{{$data[0]->id}})" class="btn btn-success">Thực hiện</span>
                                                                {{-- <a id="chi_tiet_nam_hoc" href="{{route('nam-hoc-chi-tiet',['id'=>$data[0]->id])}}" class="btn btn-success">Thực hiện</a> --}}
                                                            </div>
                                                        </div>
                                   
                                                    </div>
                                                </div>
        
                                                <!--end::Section-->
                                                <!--end::Section-->
                                            </div>
                   
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <button type="button" class="btn m-btn--pill m-btn--air btn-outline-warning">
                                    Lịch sử
                                </button>

                                <a href="{{route('nam-hoc-chi-tiet',['id'=>$data[0]->id])}}" id="quan_ly_nam_hoc" class="btn m-btn--pill    btn-success">
                                    Quản lý năm học
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="m-subheader__title m-subheader__title--separator">
                THÔNG TIN NĂM HỌC
                <span id="static_name" class="m--font-warning">{{ isset($data[0]) ? $data[0]->name : '' }}</span>
            </h3>
            <div class="m-portlet">
                <div class="m-portlet__body">
                    <div class="row">
                        <div class="col-6">
                            <label class="col-form-label">Ngày bắt đầu năm học</label>
                            <input type="text" class="form-control m-input" readonly
                                value="{{ isset($data[0]) ? $data[0]->start_date : '' }}" id="static_start_date" />
                        </div>
                        <div class="col-6">
                            <label class="col-form-label">Ngày kết thúc năm học</label>
                            <input type="text" class="form-control m-input" readonly
                                value="{{ isset($data[0]) ? $data[0]->end_date : '' }}" id="static_end_date" />
                        </div>
                    </div>
                </div>
            </div>
            <!--end:: Widgets/Blog-->
        </div>
    </div>
    <div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        TẠO NĂM HỌC MỚI
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="m-form m-form--fit m-form--label-align-right" id="form-ceate"
                    action="{{ route('nam-hoc.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group">
                                <label>Năm học</label>
                                <input type="text" class="form-control m-input @error('name') is-invalid @enderror"
                                    name="name" />
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group m-form__group">
                                <label>Ngày bắt đầu năm học:</label>
                                <input type="date"
                                    class="form-control m-input @error('start_date') is-invalid @enderror"
                                    name="start_date" id="StartDate" />
                                @error('start_date')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group m-form__group">
                                <label>Ngày kết thúc năm học:</label>
                                <input type="date" class="form-control m-input @error('end_date') is-invalid @enderror"
                                    name="end_date" id="EndDate" />
                                @error('end_date')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">
                            Cất
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Hủy bỏ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--End::Section-->
</div>

@endsection @section('script')
<script>
    var url_chi_tiet_nam_hoc = "{{route('nam-hoc-chi-tiet',['pardam'])}}"
    var url_chuyen_du_lieu_nam_hoc = "{{route('get-chuyen-du-lieu-nam-hoc',['pardam'])}}"
    var url_kiem_tra_ton_tai_thong_tin_nam_hoc = "{{route('kiem_tra_ton_tai_thong_tin_nam_hoc')}}"
    var url_xoa_toan_bo_du_lieu_nam_hoc_hien_tai = "{{route('xoa_toan_bo_du_lieu_nam_hoc_hien_tai')}}"
    function checkNew() {
        if ('{{ $checkNew }}' == 1) {
            $('#m_modal_1').modal('show');
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Năm học hiện tại chưa đóng!',
                footer: '<p class="text-danger">Nhà trường cần đóng năm học hiện tại mới có thể khởi tạo năm học mới.</p>'
            })
        }
    }

    function getData(element) {
        let id = $(element).attr("data-id");
        var url_chuyen_du_lieu_nam_hoc_v1 = url_chuyen_du_lieu_nam_hoc.replaceAll('pardam', id)
        $("#day_du_lieu_nam_cu").attr('href',url_chuyen_du_lieu_nam_hoc_v1)
        $("#chi_tiet_nam_hoc").attr('href',url_chi_tiet_nam_hoc_v1)
        $("#quan_ly_nam_hoc").attr('href',url_chi_tiet_nam_hoc_v1)

        
        let name = $(element).attr("data-name");
        let start_date = $(element).attr("data-start_date");
        let end_date = $(element).attr("data-end_date");
        $("#static_name").html(name);
        $("#static_start_date").val(start_date);
        $("#static_end_date").val(end_date);
    }

    $(document).ready(function () {
        jQuery.validator.addMethod("greaterThan", function (
            value,
            element,
            params
        ) {
            if (!/Invalid|NaN/.test(new Date(value))) {
                return new Date(value) > new Date($(params).val());
            }

            return (
                (isNaN(value) && isNaN($(params).val())) ||
                Number(value) > Number($(params).val())
            );
        });

        $("#form-ceate").validate({
            rules: {
                start_date: {
                    required: true
                },
                end_date: {
                    required: true,
                    greaterThan: "#StartDate"
                }
            },
            messages: {
                start_date: {
                    required: "Vui lòng nhập thời gian bắt đầu năm học"
                },
                end_date: {
                    required: "Vui lòng nhập thời gian kết thúc năm học",
                    greaterThan: "Vui lòng nhập thời gian kết thúc lớn hơn thời gian bắt đầu"
                }
            }
        });
    });
    const kiemTraTonTaiDuLieu = (type,id_nam_hoc) =>{
        var url_redirect = '' 
        if(type==1){
            url_redirect = url_chuyen_du_lieu_nam_hoc.replaceAll('pardam', id_nam_hoc)
         
        }else{
            url_redirect = url_chi_tiet_nam_hoc.replaceAll('pardam', id_nam_hoc)
        }
        axios.post(url_kiem_tra_ton_tai_thong_tin_nam_hoc,{
            'id_nam_hoc' : id_nam_hoc,
            'type' : type
        })
        .then(function (response) {
            window.location.href = url_redirect
        })
        .catch(function (error) {
            xoaDuLieuNamHoc(type,id_nam_hoc,url_redirect)
        })
        .then(function () {
        });
    };
    const xoaDuLieuNamHoc = (type,id_nam_hoc,url_redirect) =>{
        Swal.fire({
            title: 'Dư liệu năm học đã có !',
            text: "Để thực hiện tiếp hệ thống sẽ xóa toàn bộ dữ liệu của năm học hiện tại và trở lại trang thái khi bạn khởi tạo năm học này.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Tôi đồng ý!',
            }).then((result) => {
               if(result.value){
                axios.post(url_xoa_toan_bo_du_lieu_nam_hoc_hien_tai,{
                    'id_nam_hoc' : id_nam_hoc,
                    'type' : type
                })
                .then(function (response) {
                    window.location.href = url_redirect                              
                })
                .catch(function (error) {
                })
               }
            })
    };
</script>

@if (count($errors->all()) > 0)
<script>
    $(window).on('load',function(){
        $('#m_modal_1').modal('show');
    });
</script>
@endif
@if (session('success'))
<script>
    Swal.fire({
        position: "center",
        icon: "success",
        title: "Thêm khối thành công !",
        showConfirmButton: false,
        timer: 2000
    });

</script>
@endif @if (session('error'))
<script>
    Swal.fire({
        position: "center",
        icon: "error",
        title: "Thêm khối thất bại !",
        showConfirmButton: false,
        timer: 2000
    });




</script>

@endif @endsection