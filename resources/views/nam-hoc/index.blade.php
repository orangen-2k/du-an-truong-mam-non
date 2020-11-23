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
    .item_link_nam:hover{
        left: 5px;
        box-shadow: 2px 3px 5px #000;
    }
    .item_link_nam_shadow{
        box-shadow: 2px 3px 5px #000 !important;
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
                        style="height: 100%; overflow: hidden;">
                        <div class="m-widget6">
                            <div class="m-widget6__body">
                                <div id="m_calendar_external_events" class="fc-unthemed">
                                    @forelse ($data as $item)

                                    <div onclick="getData(this)" data-name="{{ $item->name }}" data-id="{{ $item->id }}"
                                        data-start_date="{{ date_format(date_create($item->start_date),"d/m/Y") }}" 
                                        data-end_date="{{ date_format(date_create($item->end_date),"d/m/Y") }}"
                                        data-type="{{ $item->type }}"
                                        data-route="{{ route('nam-hoc-chi-tiet',['id'=> $item->id]) }}"
                                        class="item_link_nam change_type m-nav__link fc-event fc-event-external fc-start m-fc-event--primary m--margin-bottom-15 ui-draggable ui-draggable-handle"
                                        data-color="m-fc-event--primary">
                                        <div class="fc-title">
                                            <div class="fc-content">
                                                {{ $item->name }}
                                                <span class="pull-right">
                                                    <i
                                                        class="check_lock fa {{ $item->type == 1 ? 'fa-lock-open' : 'fa-lock'}}"></i>
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
                                <a href="{{route('nam-hoc-chi-tiet',['id'=>$data[0]->id])}}" id="quan_ly_nam_hoc" class="btn btn-sm m-btn  m-btn m-btn--icon m-btn--pill btn-warning">
                                    <span>
                                        <i class="la la-archive"></i>
                                        <span id="text-lich-su">Quản lý năm học</span>
                                    </span>
                                </a>
                                <button style="cursor: pointer" type="button" data-toggle="modal" id="btn_xep_lop_or_lich_su"
                                    data-target="#modal_chon_khoi_tao_nam_hoc"
                                    class="btn btn-sm m-btn  m-btn m-btn--icon m-btn--pill btn-info">
                                    <span>
                                        <i class="la la-archive"></i>
                                        <span>Xếp lớp</span>
                                    </span>
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
                <div class="m-portlet__body" style="height: 400px">
                    <div class="row">
                        <div class="col-6">
                            <label class="col-form-label">Ngày bắt đầu năm học</label>
                            <input type="text" class="form-control m-input" readonly
                                value="{{ isset($data[0]) ? date_format(date_create($data[0]->start_date),"d/m/Y") : '' }}" id="static_start_date" />
                        </div>
                        <div class="col-6">
                            <label class="col-form-label">Ngày kết thúc năm học</label>
                            <input type="text" class="form-control m-input" readonly
                                value="{{ isset($data[0]) ? date_format(date_create($data[0]->end_date),"d/m/Y")   : '' }}" id="static_end_date" />
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
                        <button type="submit" class="btn btn-success" onclick="dongNamHoc()">
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
<div id="loading" style="text-align: center;position: fixed;z-index: 500;width: 100vw;height: 100vh;background: #000;top: 0;left: 0;opacity:0.4;display:none;">
        <img src="{{ asset('images/loading1.gif')}}" style="width: 10%;height: auto;padding-top: 20%;">
</div>

@endsection @section('script')
<script type="text/javascript">
    var check_lock = '{{ $checkNew }}';
    var url_chi_tiet_nam_hoc = "{{route('nam-hoc-chi-tiet',['pardam'])}}"
    var url_chuyen_du_lieu_nam_hoc = "{{route('get-chuyen-du-lieu-nam-hoc',['pardam'])}}"
    var url_kiem_tra_ton_tai_thong_tin_nam_hoc = "{{route('kiem_tra_ton_tai_thong_tin_nam_hoc')}}"
    var url_xoa_toan_bo_du_lieu_nam_hoc_hien_tai = "{{route('xoa_toan_bo_du_lieu_nam_hoc_hien_tai')}}"
    function checkNew() {
        if (Number(check_lock) == 1) {
            $('#m_modal_1').modal('show');
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Năm học hiện tại chưa đóng!',
                footer: '<p class="text-danger"><i>Nhà trường cần đóng năm học hiện tại mới có thể khởi tạo năm học mới.</i></p>',
                showCancelButton: true,
                confirmButtonText: `Đóng luôn`
            }).then((result) => {
                if(result.value){
                    $('#m_modal_1').modal('show');
                }
            })
        }
    }

    function dongNamHoc(){
        axios.post('{{ route("nam-hoc.lock") }}', {
                        '_token': "{{ csrf_token() }}"
        })
    }

    function getData(element) { 
        let list_link = $('.item_link_nam').toArray();
        console.log(list_link);
        list_link.forEach(el => {
            $(el).removeClass("bg-primary item_link_nam_shadow");
        });
        $(element).addClass("bg-primary item_link_nam_shadow");
        $('#loading').css('display','block');
        setTimeout(function(){
            $('#loading').css('display','none');
        },700);
        let id = $(element).attr("data-id");
        var url_chi_tiet_nam_hoc_v1 = url_chi_tiet_nam_hoc.replaceAll('pardam', id)
        var url_chuyen_du_lieu_nam_hoc_v1 = url_chuyen_du_lieu_nam_hoc.replaceAll('pardam', id)
        $("#day_du_lieu_nam_cu").attr('href',url_chuyen_du_lieu_nam_hoc_v1)
        $("#chi_tiet_nam_hoc").attr('href',url_chi_tiet_nam_hoc_v1)
        $("#quan_ly_nam_hoc").attr('href',url_chi_tiet_nam_hoc_v1)

        
        let name = $(element).attr("data-name");
        let start_date = $(element).attr("data-start_date");
        let end_date = $(element).attr("data-end_date");
        let type = $(element).attr("data-type");
        let route = $(element).attr("data-route");
        
        $("#static_name").html(name);
        $("#static_start_date").val(start_date);
        $("#static_end_date").val(end_date);

        if(type != 1){
            $("#btn_xep_lop_or_lich_su").addClass('d-none');
            $('#text-lich-su').text('Lịch Sử');
        }else{
            $("#btn_xep_lop_or_lich_su").removeClass('d-none');
            $('#text-lich-su').text('Quản lý năm học');
        }
    }

    $(document).ready(function () {
        let lists = $('.item_link_nam');
        $(lists[0]).addClass('bg-primary item_link_nam_shadow');
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
        title: "Thêm thành công !",
        showConfirmButton: false,
        timer: 2000
    });

</script>
@endif @if (session('error'))
<script>
    Swal.fire({
        position: "center",
        icon: "error",
        title: "Thêm thất bại !",
        showConfirmButton: false,
        timer: 2000
    });
</script>

@endif @endsection