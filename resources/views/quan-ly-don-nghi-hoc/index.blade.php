@extends('layouts.main')
@section('title', "Quản lý đơn nghỉ học")
@section('style')
@section('content')
<div class="m-content">
                    <div class="row">
                        <div class="col-xl-12">

                            <!--begin::Portlet-->
                            <div class="m-portlet">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <h3 class="m-portlet__head-text">
                                               Danh sách đơn nghỉ học
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__body">

                                    <!--begin::Section-->
                                    <div class="m-section">
                                        
                                        <div class="m-section__content">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Họ và tên</th>
                                                        <th>Lớp</th>
                                                        <th>Giáo viên</th>
                                                        <th>Ngày bắt đầu</th>
                                                        <th>Ngày kết thúc</th>
                                                        <th>Chi tiết</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                        $i = !isset($_GET['page']) ? 1 : ($limit * ($_GET['page']-1) + 1)
                                                        @endphp
                                                        
                                                @foreach ($don_nghi_hoc as $item)
                                                @if($item->trang_thai==1)
                                                    <tr>
                                                        <th scope="row">{{$i++}}</th>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>{{$item->ngay_bat_dau}}</td>
                                                        <td>{{$item->ngay_ket_thuc}}</td>
                                                        <td><a href="{{$item->id}}" data-toggle="modal" data-target="#exampleModal">Nội dung</a>
                                                        
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Nội dung</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            {{$item->noi_dung}}
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                            @endif
                                                        @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    </div>

<!--end::Form-->
<!-- Button trigger modal -->


<!-- Modal -->

</div>

<!--end::Portlet-->
</div>
</div>
</div>














@endsection