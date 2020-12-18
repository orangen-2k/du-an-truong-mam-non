@extends('layouts.main')
@section('title', "Hệ thống CoolKids")
  @section('content')
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <div class="m-content">
    
    <div class="row">
        <div class="col-8">

        
        <div class="m-portlet m-portlet--full-height ">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Biểu đồ học sinh nhập học theo năm học
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                  
                </div>
            </div>
            <div class="m-portlet__body">
                <canvas id="BieuDoSoLuongHocSinh" width="400" height="200"></canvas>
                <!--begin::Widget5-->
                

                <!--end::Widget 5-->
            </div>
        </div>
        </div>
        <div class="col-4">
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Tin tức
                            </h3>
                        </div>
                    </div>
                    {{-- <div class="m-portlet__head-tools">
                        <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget4_tab1_content" role="tab">
                                    Today
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget4_tab2_content" role="tab">
                                    Week
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget4_tab3_content" role="tab">
                                    Month
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
                <div class="m-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_widget4_tab1_content">
                            <div class="m-scrollable m-scroller ps ps--active-y" data-scrollable="true" data-height="400" style="height: 400px; overflow: hidden;">
                                <div class="m-list-timeline m-list-timeline--skin-light">
                                    <div class="m-list-timeline__items">
                                      @if(count($noi_dung_thong_bao) > 0)
                                      @foreach($noi_dung_thong_bao as $value)
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                                        <span class="m-list-timeline__text"><a href="{{route('thong-bao.show', ['id' => $value->id])}}" class="text-decoration-none">{{$value->title}}</a>
                                          @if($value->type == 1) 
                                          <span class="m-badge m-badge--info m-badge--wide">toàn trường</span>
                                          @elseif($value->type == 2)
                                          <span class="m-badge m-badge--success m-badge--wide">giáo viên</span>
                                          @else
                                          <span class="m-badge m-badge--danger m-badge--wide">phụ huynh</span>
                                          @endif
                                        </span>
                                        <span class="m-list-timeline__time">{{$value->created_at}}</span>
                                        </div>
                                      @endforeach
                                      @endif
                                    </div>
                                </div>
                            <div class="ps__rail-x" style="left: 0px; bottom: -243px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 243px; height: 400px; right: 4px;"><div class="ps__thumb-y" tabindex="0" style="top: 152px; height: 248px;"></div></div></div>
                        </div>
                        <div class="tab-pane" id="m_widget4_tab2_content">
                        </div>
                        <div class="tab-pane" id="m_widget4_tab3_content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- <div class="mr-auto row">
        <div class="col-11">
        <h4 class="m-subheader__title m-subheader__title--separator font-weight-bold font-italic">Danh sách khối</h4>
        </div>
        
    </div> --}}
    <div class="row mt-2">
        @foreach ($namhoc->Khoi as $item)
        <div class="col-xl-3">

            <!--begin:: Widgets/Top Products-->
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            
                            <h4 class="m-portlet__head-text">
                            <div class="m-widget4__img m-widget4__img--logo">
                            </div>
                            <h3 class="m-portlet__head-text ">
                                {{$item->ten_khoi}} ({{config('common.do_tuoi')[$item->do_tuoi]}})
                            </h4>
                        </div>
                    </div>
                    
                </div>
                <div class="m-portlet__body">

                    <!--begin::Widget5-->
                    <div class="m-widget4">
                        @foreach ($item->LopHoc as $lop_hoc)
                        <div class="m-widget4__item">
                            
                            <div class="m-widget4__info">
                                <span class="m-widget4__title">
                                <a style="color: #575962" target="_blank" href="{{route('quan-ly-lop-show', ['id' => $lop_hoc->id])}}">
                                    {{$lop_hoc->ten_lop}}
                                </a>
                                </span>
                                <br>
                            </div>
                            <span class="m-widget4__ext">
                                <span class="m-widget4__number m--font-danger">{{$lop_hoc->tong_so_hoc_sinh}} </span>
                            </span>
                        </div>
                        @endforeach
                    </div>

                    <!--end::Widget 5-->
                </div>
            </div>

            <!--end:: Widgets/Top Products-->
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-4">
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Học phí tháng mới nhất: 
                                @if(isset($thang_thu_moi_nhat))
                                {{$thang_thu_moi_nhat->thang_thu}}/{{$thang_thu_moi_nhat->nam_thu}}
                                @endif
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                      
                    </div>
                </div>
                <div class="m-portlet__body">
                  <div class="m-demo-icon">
                    <div class="m-demo-icon__preview">
                      <i class="la la-money"></i>
                    </div>
                    <div class="m-demo-icon__class">
                      Tổng tiền: <b>{{number_format($so_tien_phai_dong)}}</b>
                    </div>
                  </div>
                    <!--begin::Widget5-->
                <canvas id="HocPhiToanTruong" width="400" height="400"></canvas>
                    

                    <!--end::Widget 5-->
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Giáo trình tuần mới nhất: Tuần {{$tuan_moi_nhat}}
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                      <a target="_blank" href="{{route('quan-ly-giao-trinh-index')}}">
                        <button type="button" class="btn m-btn--pill btn-secondary btn-sm">Chi tiết</button>
                      </a>
                    </div>
                </div>
                <div class="m-portlet__body">

                    <!--begin::Widget5-->
                    <div id="m_table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="dataTables_scroll">
                              <div class="dataTables_scrollHead"
                                style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                                <div class="dataTables_scrollHeadInner"
                                  style="box-sizing: content-box; width: 2280.8px; padding-right: 17px;">
                                  <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer"
                                    role="grid" style="margin-left: 0px; width: 2280.8px;">
            
                                  </table>
                                </div>
                              </div>
                              <div class="dataTables_scrollBody"
                                style="position: relative; overflow: auto; width: 100%; max-height: 50vh;">
                                <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer"
                                  id="m_table_2" role="grid" aria-describedby="m_table_2_info" style="width: 2351px;">
                                  <thead>
                                    <tr role="row" align="center">
                                      <th class="sorting_asc" tabindex="0" aria-controls="m_table_2" rowspan="1" colspan="1"
                                        style="width: 46.45px;" aria-sort="ascending"
                                        aria-label="Record ID: activate to sort column descending">STT</th>
                                      <th class="sorting" tabindex="0" aria-controls="m_table_2" rowspan="1" colspan="1"
                                        style="width: 37.65px;" aria-label="Order ID: activate to sort column ascending">Lớp
                                      </th>
                                      <th class="sorting" tabindex="0" aria-controls="m_table_2" rowspan="1" colspan="1"
                                        style="width: 52.85px;" aria-label="Ship Country: activate to sort column ascending">Đã nộp
                                      </th>
                                      <th class="sorting" tabindex="0" aria-controls="m_table_2" rowspan="1" colspan="1"
                                        style="width: 46.45px;" aria-label="Ship City: activate to sort column ascending">Trạng thái duyệt</th>
                                      
                                    </tr>
                                  </thead>
            
                                  <tbody align="center">
                                  @if(count($array_danh_sach) > 0)
                                  @php 
                                  $i = 1
                                  @endphp
                                    @foreach($array_danh_sach as $item)
                                    <tr role="row" class="odd">
                                      <td >{{$i++}}</td>
                                      <td>{{$item['ten_lop']}}</td>
                                      <td>
                                        @if($item['trang_thai'] == 0 )
                                        <i style="color:red" class="flaticon-circle"></i>
                                        @else 
                                        <i style="color:green" class="fa fa-check"></i>
                                        @endif
                                      </td>
                                     
                                      <td>
                                        @if($item['type'] == 1 )
                                        <p><a href="#" class="m-link m-link--state m-link--info">Chờ phê duyệt</a></p>
                                        @elseif($item['type'] == 2)
                                        <p><a href="#" class="m-link m-link--state m-link--success">Đã phê duyệt</a></p>
                                        @elseif($item['type'] == 3)
                                        <p><a href="#" class="m-link m-link--state m-link--danger">Từ chối</a></p>
                                        @endif
                                      </td>
                                    </tr>
                                    @endforeach
                                  @endif
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="m_table_2_info" role="status" aria-live="polite">Showing 1 to 10 of 50
                              entries</div>
                          </div>
                         
                        </div>
                      </div>

                    <!--end::Widget 5-->
                </div>
            </div>
        </div>
    </div>

  </div>
@endsection  
@section('script')
<script>
var ctx = document.getElementById('BieuDoSoLuongHocSinh');
var BieuDoSoLuongHocSinh = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            @forEach($array_nam as $item)
            "{{$item}}",
            @endforeach
        ],
        datasets: [{
            label: 'Học sinh nhập học',
            data: [
                @forEach($array_hoc_sinh as $key => $item)
                   
                    {{$item}},
                   
                @endforeach
            ],
            backgroundColor: [
                @forEach($array_hoc_sinh as  $key => $item)
               
                'rgba(255, 99, 132, 0.2)',
              
                @endforeach
                
                
            ],
            borderColor: [
              @forEach($array_hoc_sinh as  $key => $item)
               
               'rgba(255, 99, 132, 1)',
             
               @endforeach
                
                
            ],
            borderWidth: 1
        }
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
 </script>

 <script>
var ctx = document.getElementById('HocPhiToanTruong');
var HocPhiToanTruong = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Tổng tiền còn phải đóng', 'Tổng tiền đã đóng '],
        datasets: [{
            label: '# of Votes',
            data: [{{$so_tien_con_phai_dong}}, {{$so_tien_da_dong}}],
            backgroundColor: ['rgba(255, 99, 132)','rgba(46, 234, 138)'],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(46, 234, 138, 1)'
            
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                    
                }
            }]
        }
    }
});

 </script>
@endsection  