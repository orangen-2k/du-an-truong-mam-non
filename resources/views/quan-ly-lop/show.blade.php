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
                                    Thông tin lớp Hoa lý 2
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <!--begin::Section-->
                        <div class="m-portlet__body m-portlet__body--no-padding">
                            <div class="row m-row--no-padding m-row--col-separator-xl">
                                <div class="col-md-12 col-lg-12 col-xl-4">

                                    <!--begin:: Widgets/Stats2-1 -->
                                    <div class="m-widget1">
                                        <div class="m-widget1__item">
                                            <div class="row m-row--no-padding align-items-center">
                                                <div class="col">
                                                    <h3 class="m-widget1__title">Member Profit</h3>
                                                    <span class="m-widget1__desc">Awerage Weekly Profit</span>
                                                </div>
                                                <div class="col m--align-right">
                                                    <span class="m-widget1__number m--font-brand">+$17,800</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget1__item">
                                            <div class="row m-row--no-padding align-items-center">
                                                <div class="col">
                                                    <h3 class="m-widget1__title">Orders</h3>
                                                    <span class="m-widget1__desc">Weekly Customer Orders</span>
                                                </div>
                                                <div class="col m--align-right">
                                                    <span class="m-widget1__number m--font-danger">+1,800</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget1__item">
                                            <div class="row m-row--no-padding align-items-center">
                                                <div class="col">
                                                    <h3 class="m-widget1__title">Issue Reports</h3>
                                                    <span class="m-widget1__desc">System bugs and issues</span>
                                                </div>
                                                <div class="col m--align-right">
                                                    <span class="m-widget1__number m--font-success">-27,49%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end:: Widgets/Stats2-1 -->
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-4">

                                    <!--begin:: Widgets/Stats2-2 -->
                                    <div class="m-widget1">
                                        <div class="m-widget1__item">
                                            <div class="row m-row--no-padding align-items-center">
                                                <div class="col">
                                                    <h3 class="m-widget1__title">IPO Margin</h3>
                                                    <span class="m-widget1__desc">Awerage IPO Margin</span>
                                                </div>
                                                <div class="col m--align-right">
                                                    <span class="m-widget1__number m--font-accent">+24%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget1__item">
                                            <div class="row m-row--no-padding align-items-center">
                                                <div class="col">
                                                    <h3 class="m-widget1__title">Payments</h3>
                                                    <span class="m-widget1__desc">Yearly Expenses</span>
                                                </div>
                                                <div class="col m--align-right">
                                                    <span class="m-widget1__number m--font-info">+$560,800</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget1__item">
                                            <div class="row m-row--no-padding align-items-center">
                                                <div class="col">
                                                    <h3 class="m-widget1__title">Logistics</h3>
                                                    <span class="m-widget1__desc">Overall Regional Logistics</span>
                                                </div>
                                                <div class="col m--align-right">
                                                    <span class="m-widget1__number m--font-warning">-10%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--begin:: Widgets/Stats2-2 -->
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-4">

                                    <!--begin:: Widgets/Stats2-3 -->
                                    <div class="m-widget1">
                                        <div class="m-widget1__item">
                                            <div class="row m-row--no-padding align-items-center">
                                                <div class="col">
                                                    <h3 class="m-widget1__title">Orders</h3>
                                                    <span class="m-widget1__desc">Awerage Weekly Orders</span>
                                                </div>
                                                <div class="col m--align-right">
                                                    <span class="m-widget1__number m--font-success">+15%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget1__item">
                                            <div class="row m-row--no-padding align-items-center">
                                                <div class="col">
                                                    <h3 class="m-widget1__title">Transactions</h3>
                                                    <span class="m-widget1__desc">Daily Transaction Increase</span>
                                                </div>
                                                <div class="col m--align-right">
                                                    <span class="m-widget1__number m--font-danger">+80%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget1__item">
                                            <div class="row m-row--no-padding align-items-center">
                                                <div class="col">
                                                    <h3 class="m-widget1__title">Revenue</h3>
                                                    <span class="m-widget1__desc">Overall Revenue Increase</span>
                                                </div>
                                                <div class="col m--align-right">
                                                    <span class="m-widget1__number m--font-primary">+60%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--begin:: Widgets/Stats2-3 -->
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
                    <div class="col-12 form-group m-form__group d-flex justify-content-end">
                        <label class="col-lg-1 col-form-label">Họ tên học sinh:</label>
                        <div class="col-lg-2">
                            <input type="text" class="form-control m-input m-input--square" id="exampleInputPassword1"
                                placeholder="Nhập tên học sinh">
                        </div>
                        <label class="col-lg-1 col-form-label">Giới tính:</label>
                        <div class="col-lg-2">
                            <select class="form-control" id="page-size">
                                <option value="10"> Nam</option>
                                <option value="20"> Nữ</option>
                            </select>
                        </div>
                    </div>
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
                        <tr>
                            <th scope="row">1</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>

                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>


                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>


                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>


                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>


                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>


                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>


                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>


                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>


                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>


                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>


                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>


                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>


                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>


                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>


                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>


                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>


                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>


                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>


                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>


                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                            <td>6/6/2015</td>
                            <td>3</td>
                            <td><a class="btn btn-success" href="{{ route('quan-ly-hoc-sinh-edit', ['id' => 1]) }}">Chi tiết</a>
                            </td>


                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
