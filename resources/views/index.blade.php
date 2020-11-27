@extends('layouts.main')
@section('title', "Hệ thống PolyKids")
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
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                                            <span class="m-list-timeline__text"><a href="" class="text-decoration-none">Cả trường tổng vệ sinh</a></span>
                                            <span class="m-list-timeline__time">Just now</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
                                            <span class="m-list-timeline__text">System shutdown <span class="m-badge m-badge--success m-badge--wide">pending</span></span>
                                            <span class="m-list-timeline__time">14 mins</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--danger"></span>
                                            <span class="m-list-timeline__text">New invoice received</span>
                                            <span class="m-list-timeline__time">20 mins</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--accent"></span>
                                            <span class="m-list-timeline__text">DB overloaded 80% <span class="m-badge m-badge--info m-badge--wide">settled</span></span>
                                            <span class="m-list-timeline__time">1 hr</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--warning"></span>
                                            <span class="m-list-timeline__text">System error - <a href="#" class="m-link">Check</a></span>
                                            <span class="m-list-timeline__time">2 hrs</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
                                            <span class="m-list-timeline__text">Production server down</span>
                                            <span class="m-list-timeline__time">3 hrs</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
                                            <span class="m-list-timeline__text">Production server up</span>
                                            <span class="m-list-timeline__time">5 hrs</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                                            <span href="" class="m-list-timeline__text">New order received <span class="m-badge m-badge--danger m-badge--wide">urgent</span></span>
                                            <span class="m-list-timeline__time">7 hrs</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                                            <span class="m-list-timeline__text">12 new users registered</span>
                                            <span class="m-list-timeline__time">Just now</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
                                            <span class="m-list-timeline__text">System shutdown <span class="m-badge m-badge--success m-badge--wide">pending</span></span>
                                            <span class="m-list-timeline__time">14 mins</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--danger"></span>
                                            <span class="m-list-timeline__text">New invoice received</span>
                                            <span class="m-list-timeline__time">20 mins</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--accent"></span>
                                            <span class="m-list-timeline__text">DB overloaded 80% <span class="m-badge m-badge--info m-badge--wide">settled</span></span>
                                            <span class="m-list-timeline__time">1 hr</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--danger"></span>
                                            <span class="m-list-timeline__text">New invoice received</span>
                                            <span class="m-list-timeline__time">20 mins</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--accent"></span>
                                            <span class="m-list-timeline__text">DB overloaded 80% <span class="m-badge m-badge--info m-badge--wide">settled</span></span>
                                            <span class="m-list-timeline__time">1 hr</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--warning"></span>
                                            <span class="m-list-timeline__text">System error - <a href="#" class="m-link">Check</a></span>
                                            <span class="m-list-timeline__time">2 hrs</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
                                            <span class="m-list-timeline__text">Production server down</span>
                                            <span class="m-list-timeline__time">3 hrs</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
                                            <span class="m-list-timeline__text">Production server up</span>
                                            <span class="m-list-timeline__time">5 hrs</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                                            <span href="" class="m-list-timeline__text">New order received <span class="m-badge m-badge--danger m-badge--wide">urgent</span></span>
                                            <span class="m-list-timeline__time">7 hrs</span>
                                        </div>
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
    
    <div class="mr-auto row">
        <div class="col-11">
        <h4 class="m-subheader__title m-subheader__title--separator font-weight-bold font-italic">Danh sách khối</h4>
        </div>
        <div class="col-1 ">
        <a class="" href="">Xem tất cả</a>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-xl-4">

            <!--begin:: Widgets/Top Products-->
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <div class="m-widget4__img m-widget4__img--logo">
                                <img src="assets/app/media/img/client-logos/logo3.png" alt="">
                            </div>
                            <h3 class="m-portlet__head-text font-italic">
                                Khối Hoa Ly
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <i class="fa fa-arrow-alt-circle-right"></i>
                    </div>
                </div>
                <div class="m-portlet__body">

                    <!--begin::Widget5-->
                    <div class="m-widget4">
                       
                        <div class="m-widget4__item">
                            
                            <div class="m-widget4__info">
                                <span class="m-widget4__title">
                                    Lớp Hoa Ly 1
                                </span><br>
                                
                            </div>
                            <span class="m-widget4__ext">
                                <span class="m-widget4__number m--font-danger">17</span>
                            </span>
                        </div>
                        <div class="m-widget4__item">
                            
                            <div class="m-widget4__info">
                                <span class="m-widget4__title">
                                    Lớp Hoa Ly 2
                                </span><br>
                                <span class="m-widget4__sub">
                                    
                                </span>
                            </div>
                            <span class="m-widget4__ext">
                                <span class="m-widget4__number m--font-danger">30</span>
                            </span>
                        </div>
                        <div class="m-widget4__item">
                           
                            <div class="m-widget4__info">
                                <span class="m-widget4__title">
                                    Lớp Hoa Ly 3
                                </span><br>
                                <span class="m-widget4__sub">
                                    
                                </span>
                            </div>
                            <span class="m-widget4__ext">
                                <span class="m-widget4__number m--font-danger">30</span>
                            </span>
                        </div>
                    </div>

                    <!--end::Widget 5-->
                </div>
            </div>

            <!--end:: Widgets/Top Products-->
        </div>
        <div class="col-xl-4">

            <!--begin:: Widgets/Activity-->
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <div class="m-widget4__img m-widget4__img--logo">
                                <img src="assets/app/media/img/client-logos/logo3.png" alt="">
                            </div>
                            <h3 class="m-portlet__head-text font-italic">
                                Khối Hoa Mai
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <i class="fa fa-arrow-alt-circle-right"></i>
                      
                    </div>
                </div>
                <div class="m-portlet__body">

                    <!--begin::Widget5-->
                    <div class="m-widget4">
                       
                        <div class="m-widget4__item">
                            
                            <div class="m-widget4__info">
                                <span class="m-widget4__title">
                                    Lớp Hoa Mai 1
                                </span><br>
                                
                            </div>
                            <span class="m-widget4__ext">
                                <span class="m-widget4__number m--font-danger">17</span>
                            </span>
                        </div>
                        <div class="m-widget4__item">
                            
                            <div class="m-widget4__info">
                                <span class="m-widget4__title">
                                    Lớp Hoa Mai 2
                                </span><br>
                                <span class="m-widget4__sub">
                                    
                                </span>
                            </div>
                            <span class="m-widget4__ext">
                                <span class="m-widget4__number m--font-danger">30</span>
                            </span>
                        </div>
                        <div class="m-widget4__item">
                           
                            <div class="m-widget4__info">
                                <span class="m-widget4__title">
                                    Lớp Hoa Mai 3
                                </span><br>
                                <span class="m-widget4__sub">
                                    
                                </span>
                            </div>
                            <span class="m-widget4__ext">
                                <span class="m-widget4__number m--font-danger">30</span>
                            </span>
                        </div>
                    </div>

                    <!--end::Widget 5-->
                </div>
            </div>

            <!--end:: Widgets/Activity-->
        </div>
        <div class="col-xl-4">

            <!--begin:: Widgets/Blog-->
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <div class="m-widget4__img m-widget4__img--logo">
                                <img src="assets/app/media/img/client-logos/logo3.png" alt="">
                            </div>
                            <h3 class="m-portlet__head-text font-italic">
                                Khối Hoa Hồng
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <i class="fa fa-arrow-alt-circle-right"></i>
                      
                    </div>
                </div>
                <div class="m-portlet__body">

                    <!--begin::Widget5-->
                    <div class="m-widget4">
                       
                        <div class="m-widget4__item">
                            
                            <div class="m-widget4__info">
                                <span class="m-widget4__title">
                                    Lớp Hoa Hồng 1
                                </span><br>
                                
                            </div>
                            <span class="m-widget4__ext">
                                <span class="m-widget4__number m--font-danger">17</span>
                            </span>
                        </div>
                        <div class="m-widget4__item">

                        
                            <div class="m-widget4__info">
                                <span class="m-widget4__title">
                                    Lớp Hoa Hồng 2
                                </span><br>
                                <span class="m-widget4__sub">
                                    
                                </span>
                            </div>
                            <span class="m-widget4__ext">
                                <span class="m-widget4__number m--font-danger">30</span>
                            </span>
                        </div>
                        <div class="m-widget4__item">
                            
                            <div class="m-widget4__info">
                                <span class="m-widget4__title">
                                    Lớp Hoa Hồng 3
                                </span><br>
                                <span class="m-widget4__sub">
                                    
                                </span>
                            </div>
                            <span class="m-widget4__ext">
                                <span class="m-widget4__number m--font-danger">30</span>
                            </span>
                        </div>
                    </div>

                    <!--end::Widget 5-->
                </div>
            </div>

            <!--end:: Widgets/Blog-->
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Học phí toàn trường
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                      
                    </div>
                </div>
                <div class="m-portlet__body">

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
                                Danh sách học sinh chưa hoàn thành học phí
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                      
                    </div>
                </div>
                <div class="m-portlet__body">

                    <!--begin::Widget5-->
                    <div id="m_table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                          <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="m_table_2_length"><label>Show <select name="m_table_2_length"
                                  aria-controls="m_table_2" class="custom-select custom-select-sm form-control form-control-sm">
                                  <option value="10">10</option>
                                  <option value="25">25</option>
                                  <option value="50">50</option>
                                  <option value="100">100</option>
                                </select> entries</label></div>
                          </div>
                          <div class="col-sm-12 col-md-6">
                            <div id="m_table_2_filter" class="dataTables_filter"><label>Search:<input type="search"
                                  class="form-control form-control-sm" placeholder="" aria-controls="m_table_2"></label></div>
                          </div>
                        </div>
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
                                    <tr role="row">
                                      <th class="sorting_asc" tabindex="0" aria-controls="m_table_2" rowspan="1" colspan="1"
                                        style="width: 46.45px;" aria-sort="ascending"
                                        aria-label="Record ID: activate to sort column descending">Stt</th>
                                      <th class="sorting" tabindex="0" aria-controls="m_table_2" rowspan="1" colspan="1"
                                        style="width: 37.65px;" aria-label="Order ID: activate to sort column ascending">Mã học sinh
                                      </th>
                                      <th class="sorting" tabindex="0" aria-controls="m_table_2" rowspan="1" colspan="1"
                                        style="width: 52.85px;" aria-label="Ship Country: activate to sort column ascending">Họ tên
                                      </th>
                                      <th class="sorting" tabindex="0" aria-controls="m_table_2" rowspan="1" colspan="1"
                                        style="width: 46.45px;" aria-label="Ship City: activate to sort column ascending">Ảnh</th>
                                      <th class="sorting" tabindex="0" aria-controls="m_table_2" rowspan="1" colspan="1"
                                        style="width: 56.85px;" aria-label="Ship Name: activate to sort column ascending">Ngày sinh
                                      </th>
            
                                      <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 70.1px;"
                                        aria-label="Actions">Actions</th>
                                    </tr>
                                  </thead>
            
                                  <tbody>
            
            
                                    <tr role="row" class="odd">
                                      <td class="sorting_1">1</td>
                                      <td>PH0001</td>
                                      <td>Nguyễn Thị Na</td>
                                      <td><img width="100px" height="100px"
                                          src="https://images.unsplash.com/photo-1601758004584-903c2a9a1abc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                                          alt=""></td>
                                      <td>1/1/2018</td>
            
            
            
                                      <td nowrap="">
                                        <span class="dropdown">
                                          <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                            data-toggle="dropdown" aria-expanded="true">
                                            <i class="la la-ellipsis-h"></i>
                                          </a>
            
                                        </span>
                                      </td>
                                    </tr>
                                    <tr role="row" class="even">
                                      <td class="sorting_1">2</td>
                                      <td>PH0002</td>
                                      <td>Nguyễn Thị Bưởi</td>
                                      <td><img width="100px" height="100px"
                                          src="https://images.unsplash.com/photo-1601758004584-903c2a9a1abc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                                          alt=""></td>
                                      <td>2/2/2018</td>
            
                                      <td nowrap="">
                                        <span class="dropdown">
                                          <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                            data-toggle="dropdown" aria-expanded="true">
                                            <i class="la la-ellipsis-h"></i>
                                          </a>
            
                                        </span>
                                      </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                      <td class="sorting_1">3</td>
                                      <td>PH0222</td>
                                      <td>Nguyễn Thị Táo</td>
                                      <td><img width="100px" height="100px"
                                          src="https://images.unsplash.com/photo-1601758004584-903c2a9a1abc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                                          alt=""></td>
            
                                      <td>3/5/2018</td>
            
                                      <td nowrap="">
                                        <span class="dropdown">
                                          <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                            data-toggle="dropdown" aria-expanded="true">
                                            <i class="la la-ellipsis-h"></i>
                                          </a>
                                          <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>
                                            <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                            <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                                          </div>
                                        </span>
                                        <a href="#"
                                          class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                          title="View">
                                          <i class="la la-edit"></i>
                                        </a></td>
                                    </tr>
                                    <tr role="row" class="even">
                                      <td class="sorting_1">4</td>
                                      <td>PH0005</td>
                                      <td>Nguyễn Thị Mít</td>
                                      <td><img width="100px" height="100px"
                                          src="https://images.unsplash.com/photo-1601758004584-903c2a9a1abc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                                          alt=""></td>
            
                                      <td>4/8/2018</td>
            
                                      <td nowrap="">
                                        <span class="dropdown">
                                          <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                            data-toggle="dropdown" aria-expanded="true">
                                            <i class="la la-ellipsis-h"></i>
                                          </a>
            
                                        </span>
                                      </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                      <td class="sorting_1">5</td>
                                      <td>31722-529</td>
                                      <td>AT</td>
                                      <td><img width="100px" height="100px"
                                          src="https://images.unsplash.com/photo-1601758004584-903c2a9a1abc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                                          alt=""></td>
            
                                      <td>Stehr-Kunde</td>
            
                                      <td nowrap="">
                                        <span class="dropdown">
                                          <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                            data-toggle="dropdown" aria-expanded="true">
                                            <i class="la la-ellipsis-h"></i>
                                          </a>
            
                                        </span>
                                      </td>
                                    </tr>
                                    <tr role="row" class="even">
                                      <td class="sorting_1">6</td>
                                      <td>64117-168</td>
                                      <td>CN</td>
                                      <td><img width="100px" height="100px"
                                          src="https://images.unsplash.com/photo-1601758004584-903c2a9a1abc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                                          alt=""></td>
            
                                      <td>O'Hara LLC</td>
            
                                      <td nowrap="">
                                        <span class="dropdown">
                                          <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                            data-toggle="dropdown" aria-expanded="true">
                                            <i class="la la-ellipsis-h"></i>
                                          </a>
            
                                        </span>
                                      </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                      <td class="sorting_1">7</td>
                                      <td>43857-0331</td>
                                      <td>CN</td>
                                      <td><img width="100px" height="100px"
                                          src="https://images.unsplash.com/photo-1601758004584-903c2a9a1abc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                                          alt=""></td>
            
                                      <td>Lebsack Group</td>
            
                                      <td nowrap="">
                                        <span class="dropdown">
                                          <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                            data-toggle="dropdown" aria-expanded="true">
                                            <i class="la la-ellipsis-h"></i>
                                          </a>
            
                                        </span>
                                      </td>
                                    </tr>
                                    <tr role="row" class="even">
                                      <td class="sorting_1">8</td>
                                      <td>64980-196</td>
                                      <td>HR</td>
                                      <td><img width="100px" height="100px"
                                          src="https://images.unsplash.com/photo-1601758004584-903c2a9a1abc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                                          alt=""></td>
            
                                      <td>Gutkowski LLC</td>
            
                                      <td nowrap="">
                                        <span class="dropdown">
                                          <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                            data-toggle="dropdown" aria-expanded="true">
                                            <i class="la la-ellipsis-h"></i>
                                          </a>
            
                                        </span>
                                      </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                      <td class="sorting_1">9</td>
                                      <td>0404-0360</td>
                                      <td>CO</td>
                                      <td><img width="100px" height="100px"
                                          src="https://images.unsplash.com/photo-1601758004584-903c2a9a1abc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                                          alt=""></td>
            
                                      <td>Bartoletti, Howell and Jacobson</td>
            
                                      <td nowrap="">
                                        <span class="dropdown">
                                          <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                            data-toggle="dropdown" aria-expanded="true">
                                            <i class="la la-ellipsis-h"></i>
                                          </a>
            
                                        </span>
                                      </td>
                                    </tr>
                                    <tr role="row" class="even">
                                      <td class="sorting_1">10</td>
                                      <td>52125-267</td>
                                      <td>TH</td>
                                      <td><img width="100px" height="100px"
                                          src="https://images.unsplash.com/photo-1601758004584-903c2a9a1abc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                                          alt=""></td>
            
                                      <td>Schroeder-Champlin</td>
            
                                      <td nowrap="">
                                        <span class="dropdown">
                                          <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                            data-toggle="dropdown" aria-expanded="true">
                                            <i class="la la-ellipsis-h"></i>
                                          </a>
            
                                        </span>
                                      </td>
                                    </tr>
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
                          <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="m_table_2_paginate">
                              <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="m_table_2_previous"><a href="#"
                                    aria-controls="m_table_2" data-dt-idx="0" tabindex="0" class="page-link"><i
                                      class="la la-angle-left"></i></a></li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="m_table_2" data-dt-idx="1"
                                    tabindex="0" class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="m_table_2" data-dt-idx="2"
                                    tabindex="0" class="page-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="m_table_2" data-dt-idx="3"
                                    tabindex="0" class="page-link">3</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="m_table_2" data-dt-idx="4"
                                    tabindex="0" class="page-link">4</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="m_table_2" data-dt-idx="5"
                                    tabindex="0" class="page-link">5</a></li>
                                <li class="paginate_button page-item next" id="m_table_2_next"><a href="#" aria-controls="m_table_2"
                                    data-dt-idx="6" tabindex="0" class="page-link"><i class="la la-angle-right"></i></a></li>
                              </ul>
                            </div>
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
            @forEach($array_thang as $item)
            "{{$item}}",
            @endforeach
        ],
        datasets: [{
            label: 'Nữ',
            data: [
                @forEach($array_nu as $key => $item)
                    @if($key > 0)
                    {{$item}},
                    @endif
                @endforeach
            ],
            backgroundColor: [
                @forEach($array_nu as  $key => $item)
                @if($key > 0)
                'rgba(255, 99, 132, 0.2)',
                @endif
                @endforeach
                
                
            ],
            borderColor: [
                @forEach($array_nu as  $key => $item)
                @if($key > 0)
                'rgba(255, 99, 132, 1)',
                @endif
                @endforeach
                
                
            ],
            borderWidth: 1
        },
        {
            label: 'Nam',
            data: [
                @forEach($array_nam as $key => $item)
                @if($key > 0)
                {{$item}},
                @endif
                @endforeach
            ],
            backgroundColor: [
                @forEach($array_nam as $key => $item)
                @if($key > 0)
                'rgba(75, 192, 192, 0.2)',
                @endif
                @endforeach
                
            ],
            borderColor: [
                @forEach($array_nam as $key => $item)
                @if($key > 0)
                'rgba(75, 192, 192, 1)',
                @endif
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
    type: 'pie',
    data: {
        labels: ['Red', 'Blue'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19],
            backgroundColor: [
                'rgba(255, 99, 132)',
                'rgba(54, 162, 235)'
                
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
            
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