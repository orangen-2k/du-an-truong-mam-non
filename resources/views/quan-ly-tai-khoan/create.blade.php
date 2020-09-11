@extends('layouts.main')
@section('title', "Quản lý học sinh")
@section('content')
<div class="m-content">
						<div class="row">
							<div class="col-md-12">

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
                                    
                                </div>

                            </section>

								<!--begin::Portlet-->
								<div class="m-portlet m-portlet--tab">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Tạo tài khoản
												</h3>
											</div>
                                        </div>
                                        
									</div>

									<!--begin::Form-->
									<form class="m-form m-form--fit m-form--label-align-right">
										<div class="m-portlet__body">
										
											<div class="form-group m-form__group">
												<label for="exampleInputEmail1">Email address</label>
												<input type="email" class="form-control m-input m-input--air m-input--pill" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
											</div>
											
										</div>
										<div class="m-portlet__foot m-portlet__foot--fit">
											<div class="m-form__actions">
												<button type="reset" class="btn btn-brand">Submit</button>
												<button type="reset" class="btn btn-secondary">Cancel</button>
											</div>
										</div>
									</form>

									<!--end::Form-->
								</div>

								<!--end::Portlet-->
							</div>
							
						</div>
					</div>
@endsection