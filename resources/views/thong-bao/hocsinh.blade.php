@extends('layouts.main') @section('title', 'Thông báo') @section('content')
<div class="m-content">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Portlet-->
            <div
                class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi"
            >
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="flaticon-statistics"></i>
                            </span>
                            <h3 class="m-portlet__head-text text-danger">Soạn thông báo</h3>
                            <h2
                                class="m-portlet__head-label m-portlet__head-label--danger"
                            >
                                <span>Thông báo</span>
                            </h2>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul
                            class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm"
                            role="tablist"
                        >
                            <li class="nav-item m-tabs__item">
                                <a
                                    class="nav-link m-tabs__link active show"
                                    data-toggle="tab"
                                    href="#m_widget2_tab1_content"
                                    role="tab"
                                    aria-selected="true"
                                >
                                    Giáo viên
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a
                                    class="nav-link m-tabs__link"
                                    data-toggle="tab"
                                    href="#m_widget2_tab2_content1"
                                    role="tab"
                                    aria-selected="false"
                                >
                                    Học Sinh
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a
                                    class="nav-link m-tabs__link"
                                    data-toggle="tab"
                                    href="#m_widget2_tab3_content1"
                                    role="tab"
                                    aria-selected="false"
                                >
                                    Lịch sử
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <form action="" method="post" onsubmit="">

                        <div class="form-group">
                          <label for="">Tiều đề thông báo:</label>
                          <textarea name="title" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung:</label>
                            <textarea name="content" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#m_modal_4">Gửi tới</button>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-danger" id="gui-thong-bao" onclick="postData()">Gửi</button>
                        </div>
                       </form>
                </div>
            </div>

            <!--end::Portlet-->
        </div>
    </div>
        <!--begin::Modal-->
        <div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Gửi tới</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="table_id" style="with: 100%">
                            <thead>
                                <tr>
                                    <th class="text-center"><input type="checkbox" onclick="checkAll(this)"></th>
                                    <th>STT</th>
                                    <th>Mã định danh</th>
                                    <th>Tên giáo viên</th>
                                    <th>Ngày sinh</th>
                                    <th>Số điện thoại</th>
                                    <th>Giới tính</th>
                                </tr>
                            </thead>
                            <tbody>
                              @php
                                    $i = 1;
                              @endphp                      
                              @forelse ($data as $item)
                                <tr>
                                    <td class="text-center"><input type="checkbox" class="checkbox" data-id="{{ $item->id }}"></td>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td>{{ $item->ma_gv }}</td>
                                    <td>{{ $item->ten }}</td>
                                    <td>{{ $item->ngay_sinh }}</td>
                                    <td>{{ $item->dien_thoai }}</td>
                                    <td>
                                        @foreach (config('common.gioi_tinh') as $key => $value)
                                
                                        @if(isset($item->gioi_tinh) && $item->gioi_tinh == $key)
                                         {{$value}}
                                        @endif
                                      
                                        @endforeach
                                    </td>
                                </tr>
                              @empty
                                  
                              @endforelse
                              
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="sendToPeoples()">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <!--end::Modal-->
</div>
@endsection
@section('script')
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $("#table_id").dataTable({
            select: true,
            responsive: true
        });
    } );
    var editor =  CKEDITOR.replace( 'content' );
                  CKEDITOR.config.height = 300;
  

  
    const checkAll = (e) => {
        $(e).parents('table').find('.checkbox').not(e).prop('checked', e.checked);
    };

    var toPeoples = [];
    function sendToPeoples(){
        var statusList = $('input[type=checkbox]:checked');
        for(i = 0; i < statusList.length; i++) {
            if(statusList[i].checked && statusList[i].hasAttribute("data-id")){
                toPeoples.push(parseInt(statusList[i].getAttribute('data-id')))
            }
        }
    }

    function postData(){
        $.post("{{ route('sendto') }}",
        {
            '_token': "{{ csrf_token() }}",
            'title': $("[name='title']").val(),
            'content': editor.getData(),
            'user_id': toPeoples
        },
            function(response){
                console.log(response);
        })

      
    }
 
</script>
@endsection