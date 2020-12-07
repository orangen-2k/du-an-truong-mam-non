@extends('layouts.main')
@section('title', 'Chi tiết lớp')
@section('style')
<style>
    .m-table th,
    td {
        text-align: center;
    }
</style>
@endsection
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
                                {{$lop->ten_lop}} (Năm học : {{$nam_hoc->name}})
                            </h3>
                            
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin::Section-->
                    <div class="m-portlet__body m-portlet__body--no-padding">
                        <div class="row m-row--no-padding m-row--col-separator-xl">
                            <div class="col-xl-6">

                                <!--begin:: Widgets/Download Files-->
                                <div class="m-portlet m-portlet--full-height ">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <h3 class="m-portlet__head-text">
                                                    Giáo viên quản lý lớp
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">

                                        <!--begin::m-widget4-->
                                        @foreach ($giao_vien as $item)
                                        <div class="m-widget4">
                                            <div class="m-widget4__item">
                                                <div class="m-widget4__img m-widget4__img--pic">
                                                    <img src= {{($item->anh == "") ? 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png' : $item->anh}}
                                                    class="rounded mx-auto d-block mb-2">
                                                </div>
                                                <div class="m-widget4__info">
                                                    <span class="m-widget4__title">
                                                        {{$item->ten}}
                                                    </span><br>
                                                    <span class="m-widget4__sub">
                                                        {{ $item->type == 1 ?'Giáo viên chính':'Giáo viên phụ' }}
                                                    </span>
                                                </div>
                                                <div class="m-widget4__ext">
                                                    <a href="{{route('quan-ly-giao-vien-edit', ['id' => $item->id])}}"
                                                        class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Chi
                                                        tiết</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!--end::Widget 9-->
                                    </div>
                                </div>

                                <!--end:: Widgets/Download Files-->
                            </div>
                            <div class="col-xl-6">
                                <div class="m-portlet m-portlet--full-height ">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <h3 class="m-portlet__head-text">
                                                    Thống kê học phí
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                        <div id="thong_ke_hoc_phi"
                                            style="height: 300px; padding: 0px; position: relative;">
                                            <canvas class="flot-base" width="662" height="375"
                                                style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 529.9px; height: 300px;"></canvas>
                                            <canvas class="flot-overlay" width="662" height="375"
                                                style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 529.9px; height: 300px;"></canvas>
                                            <div class="legend">
                                                <div
                                                    style="position: absolute; width: 56.8px; height: 140.8px; top: 5px; right: 5px; background-color: rgb(255, 255, 255); opacity: 0.85;">
                                                </div>
                                                <table
                                                    style="position: absolute; top: 5px; right: 5px; font-size: smaller; color: #545454;">
                                                    <tbody>
                                                        <tr>
                                                            <td class="legendColorBox">
                                                                <div style="border: 1px solid #ccc; padding: 1px;">
                                                                    <div
                                                                        style="width: 4px; height: 0; border: 5px solid rgb(237, 194, 64); overflow: hidden;">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="legendLabel">Series1</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="legendColorBox">
                                                                <div style="border: 1px solid #ccc; padding: 1px;">
                                                                    <div
                                                                        style="width: 4px; height: 0; border: 5px solid rgb(175, 216, 248); overflow: hidden;">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="legendLabel">Series2</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="legendColorBox">
                                                                <div style="border: 1px solid #ccc; padding: 1px;">
                                                                    <div
                                                                        style="width: 4px; height: 0; border: 5px solid rgb(203, 75, 75); overflow: hidden;">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="legendLabel">Series3</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="legendColorBox">
                                                                <div style="border: 1px solid #ccc; padding: 1px;">
                                                                    <div
                                                                        style="width: 4px; height: 0; border: 5px solid rgb(77, 167, 77); overflow: hidden;">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="legendLabel">Series4</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="legendColorBox">
                                                                <div style="border: 1px solid #ccc; padding: 1px;">
                                                                    <div
                                                                        style="width: 4px; height: 0; border: 5px solid rgb(148, 64, 237); overflow: hidden;">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="legendLabel">Series5</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="legendColorBox">
                                                                <div style="border: 1px solid #ccc; padding: 1px;">
                                                                    <div
                                                                        style="width: 4px; height: 0; border: 5px solid rgb(189, 155, 51); overflow: hidden;">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="legendLabel">Series6</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="legendColorBox">
                                                                <div style="border: 1px solid #ccc; padding: 1px;">
                                                                    <div
                                                                        style="width: 4px; height: 0; border: 5px solid rgb(140, 172, 198); overflow: hidden;">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="legendLabel">Series7</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="legendColorBox">
                                                                <div style="border: 1px solid #ccc; padding: 1px;">
                                                                    <div
                                                                        style="width: 4px; height: 0; border: 5px solid rgb(162, 60, 60); overflow: hidden;">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="legendLabel">Series8</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
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
    <div class="m-portlet">
        <div class="m-portlet__body table-responsive">
            <table class="table m-table m-table--head-bg-success">
                
                <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Mã học sinh</th>
                        <th>Họ tên</th>
                        <th>Ảnh học sinh</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th colspan="2">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($hoc_sinh)>0)
                    @php
                    $i = 1
                    @endphp
                    @endif
                    @foreach ($hoc_sinh as $item)
                    <tr>
                    <th scope="row">{{$i++}}</th>
                        <td>{{$item->ma_hoc_sinh}}</td>
                        <td>{{$item->ten}}</td>
                        <td><img width="100px"
                                src={{($item->avatar == "") ? "https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png" :  $item->avatar}} alt="">
                        </td>
                        <td>{{date("d/m/Y", strtotime($item->ngay_sinh))}}</td>
                        <td>{{ config('common.gioi_tinh')[$item->gioi_tinh] }}</td>
                        <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => $item->id]) }}">Chi
                                tiết</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{!! asset('assets/vendors/custom/flot/flot.bundle.js') !!}"></script>
<script>
    //== Class definition
var BieuDoLop = function() {

//== Private functions


var demo8 = function() {
    var data = [];
        var series = Math.floor(Math.random() * 10) + 1;
        series = series < 5 ? 5 : series;

        for (var i = 0; i < series; i++) {
            data[i] = {
                label: "Series" + (i + 1),
                data: Math.floor(Math.random() * 100) + 1
            };
        }

        $.plot($("#thong_ke_hoc_phi"), data, {
                series: {
                    pie: {
                        show: true
                    }
                }
            });
}



return {
    // public functions
    init: function() {
        demo8();

    }
};
}();

jQuery(document).ready(function() {
    BieuDoLop.init();
});
$("#gioi_tinh").change(function(){  
    var url = new URL(window.location.href);
    var search_params = url.searchParams;
    search_params.set('gioi_tinh', $('#gioi_tinh').val());
    url.search = search_params.toString();
    var new_url = url.toString();
    window.location.href = new_url
  });
</script>
@endsection