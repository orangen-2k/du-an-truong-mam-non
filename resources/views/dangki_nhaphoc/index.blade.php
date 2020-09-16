
<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>Metronic | Login Page - 3</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>

		<!--end::Web font -->

		<!--begin::Global Theme Styles -->
		<link href="{!! asset('assets/vendors/base/vendors.bundle.css') !!}" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="../../../assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
		<link href="{!! asset('assets/demo/base/style.bundle.css') !!}" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="../../../assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

		<!--end::Global Theme Styles -->
        <link rel="shortcut icon" href="{!! asset('assets/demo/media/img/logo/favicon.ico') !!}" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(../../../assets/app/media/img//bg/bg-3.jpg);">
                <div class="col-md-8 offset-2">
            
                <div class="m-portlet">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													 Form 
												</h3>
											</div>
										</div>
									</div>
									<button id="foo" hidden type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"  data-backdrop='static' data-keyboard='false'>
									</button>

									<button  id="foo2"  hidden type="button" class="btn btn-warning" data-toggle="modal" data-target="#m_modal_4" data-backdrop='static' data-keyboard='false' >Thank You</button>

						
									<!--begin::Form-->
									<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
									enctype="multipart/form-data"
									id="myForm">
									@csrf	
									
									<div class="m-portlet__body">

                                        <div class="m-portlet__head">
                                                <div class="m-portlet__head-caption">
                                                    <div class="m-portlet__head-title">
                                                        <span class="m-portlet__head-icon m--hide">
                                                            <i class="la la-gear"></i>
                                                        </span>
                                                        <h3 class="m-portlet__head-text">
                                                           Thông tin bé
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
											

                                           <div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">Họ và tên bé:</label>
												<div class="col-lg-8">
													<input type="text" name="ten" class="form-control m-input" placeholder="Họ tên bé">
													<p class="text-danger text-small error" id="ten_error"></p>
													<!-- <span class="m-form__help">Please enter your full name</span> -->
												</div>
											</div>
											

											<div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">Ảnh bé:</label>
												<div class="col-md-5">

													<div class="custom-file">
														<input type="file" value="{{old('avatar')}}"
															name="avatar" class="custom-file-input"
															onchange="showimages(this)"
															id="customFileGiayPhep">
														<label class="custom-file-label"
															for="customFileGiayPhep">Choose file</label>
															<!-- @error('avatar')
                                  						    <div class="text-danger">{{$message}}</div>
                              					 			@enderror -->
													</div>
													<p class="text-danger text-small" id="avatar_error" class="error"></p>
												</div>
												<div class="col-md-5">
														<div class="anh-giay-phep">
															<img src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png" 
															id="showimg" 
															alt=""
															width="200"
															>
													</div>
												</div>
											</div>

										
                               
                                            <div class="form-group m-form__group row">
                                                <label class="col-lg-2 col-form-label">Ngày sinh:</label>
                                                    <div class="col-lg-5">
                                                            <div class="input-group date">
															<input type="text" class="form-control m-input"  name="ngay_sinh"  readonly placeholder="Chọn ngày" id="m_datepicker_2" />
														
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="la la-calendar-check-o"></i>
                                                                </span>
															</div>
													
													
													 </div>
													 <p class="text-danger text-small error"
														id="ngay_sinh_error">
													</p>
													 <!-- @error('ngay_sinh')
                                  						    <p class="text-danger">{{$message}}</p>
                              					 			@enderror -->
                                                    </div>
                                                    <label class="col-lg-2 col-form-label">Dân tộc:</label>
                                                        <div class="col-lg-3">
                                                        <div class="m-input-icon m-input-icon--right">
															<input type="text" class="form-control m-input" name="dan_toc"  placeholder="Nhập dân tộc">
															
															<!-- @error('dan_toc')
                                  						    <div class="text-danger">{{$message}}</div>
                              					 			@enderror -->
														</div>
														<p class="text-danger text-small error" id="dan_toc_error"></p>
                                                        <!-- <span class="m-form__help">Please enter your postcode</span> -->
												</div>
                                             </div>
										
                                             <div class="form-group m-form__group row">
											
												<label class="col-lg-3 col-form-label">Đối tượng chính sách:</label>
												<div class="col-lg-3">
													<div class="m-input-icon m-input-icon--right">
														<input type="number" class="form-control m-input"  name="doi_tuong_chinh_sach_id"  placeholder="">
													</div>
													<!-- <span class="m-form__help">Please enter your postcode</span> -->
                                                </div>

                                                <label class="col-lg-3">Học sinh khuyết tật:</label>
												<div class="col-lg-3">
                                                                 <label class="m-radio">
																		<input type="radio" name="hoc_sinh_khuyet_tat" value="1">
																		<span></span>
																	</label>
												</div>
											</div>

                                     
											<div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">Giới tính:</label>
												<div class="col-lg-3">
												<div class="m-radio-inline">
														<label class="m-radio m-radio--solid">
                                                            <input type="radio" name="gioi_tinh" checked value="1"> 
                                                            Nam
															<span></span>
														</label>
														<label class="m-radio m-radio--solid">
															<input type="radio" name="gioi_tinh" value="2"> Nu
															<span></span>
														</label>
													</div>
												</div>
                                            </div>

                                            <div class="m-portlet__head">
                                                <div class="m-portlet__head-caption">
                                                    <div class="m-portlet__head-title">
                                                        <span class="m-portlet__head-icon m--hide">
                                                            <i class="la la-gear"></i>
                                                        </span>
                                                        <h3 class="m-portlet__head-text">
                                                           Hộ khẩu thường chú
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">Tỉnh/Thành phố:</label>
												<div class="col-lg-3">
													<div class="m-input-icon m-input-icon--right">
														<select class="form-control" name="ho_khau_thuong_tru_matp" id="ho_khau_thuong_tru_matp">
															<option value="" selected>Chọn</option>
															@foreach ($thanh_pho as $item)
																<option value="{{$item->matp}}" >{{$item->name}}</option>
															@endforeach


														</select>
														<p class="text-danger text-small error" id="ho_khau_thuong_tru_matp_error"></p>

														<!-- @error('ho_khau_thuong_tru_matp')
                                  						    <div class="text-danger">{{$message}}</div>
                              					 		@enderror -->
													</div>
													<!-- <span class="m-form__help">Please enter your address</span> -->
												</div>
												<label class="col-lg-2 col-form-label">Quận/Huyện:</label>
												<div class="col-lg-3">
													<div class="m-input-icon m-input-icon--right">
													<select class="form-control" name="ho_khau_thuong_tru_maqh" id="ho_khau_thuong_tru_maqh">
											
													</select>
													<p class="text-danger text-small error" id="ho_khau_thuong_tru_maqh_error"></p>

														<!-- @error('ho_khau_thuong_tru_maqh')
                                  						    <div class="text-danger">{{$message}}</div>
                              					 		@enderror -->
													</div>
													<!-- <span class="m-form__help">Please enter your postcode</span> -->
                                                </div>
											</div>

                                            <div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">Phường/Xã:</label>
												<div class="col-lg-3">
													<div class="m-input-icon m-input-icon--right">
														<select class="form-control" name="ho_khau_thuong_tru_xaid" id="ho_khau_thuong_tru_xaid">
											
														</select>

														<!-- @error('ho_khau_thuong_tru_xaid')
                                  						    <div class="text-danger">{{$message}}</div>
														   @enderror -->
													<p class="text-danger text-small error" id="ho_khau_thuong_tru_xaid_error"></p>
														   
													</div>
													<!-- <span class="m-form__help">Please enter your address</span> -->
												</div>
												<label class="col-lg-2 col-form-label">Số nhà:</label>
												<div class="col-lg-5">
													<div class="m-input-icon m-input-icon--right">
														<input type="text" class="form-control m-input" name="ho_khau_thuong_tru_so_nha" placeholder="Nhập số nhà">

														<!-- @error('ho_khau_thuong_tru_so_nha')
                                  						    <div class="text-danger">{{$message}}</div>
														   @enderror -->
													<p class="text-danger text-small error" id="ho_khau_thuong_tru_so_nha_error"></p>
														   
													</div>
													<!-- <span class="m-form__help">Please enter your postcode</span> -->
                                                </div>
											</div>



                                            <div class="m-portlet__head">
                                                <div class="m-portlet__head-caption">
                                                    <div class="m-portlet__head-title">
                                                        <span class="m-portlet__head-icon m--hide">
                                                            <i class="la la-gear"></i>
                                                        </span>
                                                        <h3 class="m-portlet__head-text">
                                                           Nơi ở hiện nay
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">Tỉnh/Thành phố:</label>
												<div class="col-lg-3">
													<div class="m-input-icon m-input-icon--right">
														<!-- <input type="text" class="form-control m-input" name="noi_o_hien_tai_matp" placeholder="Enter your address"> -->
														<select class="form-control" name="noi_o_hien_tai_matp" id="noi_o_hien_tai_matp">
															<option value="" selected>Chọn</option>
															@foreach ($thanh_pho as $item)
																<option value="{{$item->matp}}">{{$item->name}}</option>
															@endforeach
														</select>

														<!-- @error('noi_o_hien_tai_matp')
                                  						    <div class="text-danger">{{$message}}</div>
														   @enderror -->
													<p class="text-danger text-small error" id="noi_o_hien_tai_matp_error"></p>
														   
													</div>
													<!-- <span class="m-form__help">Please enter your address</span> -->
												</div>
												<label class="col-lg-2 col-form-label">Quận/Huyện:</label>
												<div class="col-lg-3">
													<div class="m-input-icon m-input-icon--right">
														<select class="form-control" name="noi_o_hien_tai_maqh" id="noi_o_hien_tai_maqh">
											
														</select>

														<!-- @error('noi_o_hien_tai_maqh')
                                  						    <div class="text-danger">{{$message}}</div>
														   @enderror -->
													<p class="text-danger text-small error" id="noi_o_hien_tai_maqh_error"></p>
														   
													</div>
													<!-- <span class="m-form__help">Please enter your postcode</span> -->
                                                </div>
											</div>

                                            <div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">Phường/Xã:</label>
												<div class="col-lg-3">
													<div class="m-input-icon m-input-icon--right">
														<select class="form-control" name="noi_o_hien_tai_xaid" id="noi_o_hien_tai_xaid">
											
														</select>
													<p class="text-danger text-small error" id="noi_o_hien_tai_xaid_error"></p>
														   
													</div>
													<!-- <span class="m-form__help">Please enter your address</span> -->
												</div>
												<label class="col-lg-2 col-form-label">Số nhà:</label>
												<div class="col-lg-5">
													<div class="m-input-icon m-input-icon--right">
														<input type="text" class="form-control m-input" name="noi_o_hien_tai_so_nha" placeholder="Nhập chi tiết địa chỉ nhà">
													
													<p class="text-danger text-small error" id="noi_o_hien_tai_so_nha_error"></p>
														   
													</div>
													<!-- <span class="m-form__help">Please enter your postcode</span> -->
                                                </div>
                                            </div>
                                            

                                            <div class="m-portlet__head">
                                                <div class="m-portlet__head-caption">
                                                    <div class="m-portlet__head-title">
                                                        <span class="m-portlet__head-icon m--hide">
                                                            <i class="la la-gear"></i>
                                                        </span>
                                                        <h3 class="m-portlet__head-text">
                                                           Thông tin phụ huynh
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="form-group m-form__group row">
												<div class="col-lg-4">
													<label>Họ tên (Cha) : </label>
													<div class="input-group m-input-group m-input-group--square">
														<div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
														<input type="text" name="ten_cha" class="form-control m-input" placeholder="">
														
													<p class="text-danger text-small error" id="ten_cha_error"></p>
														   
													</div>
												</div>
												<div class="col-lg-4">
													<label class="">Số điện thoại (Cha) : </label>
													<input type="number" class="form-control m-input"  name="dien_thoai_cha" placeholder="SĐT cha">
												
													<p class="text-danger text-small error" id="dien_thoai_cha_error"></p>
													   
													<!-- <span class="m-form__help">Please enter your email</span> -->
												</div>
												<div class="col-lg-4">
													<label>Số chứng minh nhân dân (Cha) : </label>
													<input type="number" class="form-control m-input" name="cmtnd_cha" placeholder="Số chứng minh cha">
										
													<p class="text-danger text-small error" id="cmtnd_cha_error"></p>
													   
													<!-- <span class="m-form__help">Please enter your username</span> -->
												</div>
                                            </div>

                                            <div class="form-group m-form__group row">
												<div class="col-lg-4">
													<label>Họ tên (Mẹ) : </label>
													<div class="input-group m-input-group m-input-group--square">
														<div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
														<input type="text" name="ten_me" class="form-control m-input" placeholder="">
													</div>
													<p class="text-danger text-small error" id="ten_me_error"></p>

												</div>
												<div class="col-lg-4">
													<label class="">Số điện thoại (Mẹ) : </label>
													<input type="number" class="form-control m-input" name="dien_thoai_me" placeholder="SĐT mẹ">
													<p class="text-danger text-small error" id="dien_thoai_me_error"></p>

													<!-- <span class="m-form__help">Please enter your email</span> -->
												</div>
												<div class="col-lg-4">
													<label>Số chứng minh nhân dân (Mẹ) : </label>
													<input type="number" class="form-control m-input" name="cmtnd_me" placeholder="Số chứng minh mẹ">
														   
													<p class="text-danger text-small error" id="cmtnd_me_error"></p>

													<!-- <span class="m-form__help">Please enter your username</span> -->
												</div>
                                            </div>


                                            
                                            <div class="m-portlet__head">
                                                <div class="m-portlet__head-caption">
                                                    <div class="m-portlet__head-title">
                                                        <span class="m-portlet__head-icon m--hide">
                                                            <i class="la la-gear"></i>
                                                        </span>
                                                        <h3 class="m-portlet__head-text">
                                                          Thông tin đăng kí tài khoản
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
												<div class="col-lg-6    ">
													<label>Số điện thoại : </label>
													<div class="input-group m-input-group m-input-group--square">
														<input type="text" class="form-control m-input" name="dien_thoai_dang_ki" placeholder="">
													</div>
														   
													<p class="text-danger text-small error" id="dien_thoai_dang_ki_error"></p>

												</div>
												<div class="col-lg-6">
													<label class="">Email: </label>
													<input type="email" class="form-control m-input" name="email_dang_ky" placeholder="Nhập chi tiết địa chỉ nhà">
													<p class="text-danger text-small error" id="email_dang_ky_error"></p>

													<!-- <span class="m-form__help">Please enter your email</span> -->
												</div>
												
                                            </div>

                                            
										</div>
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--solid">
												<div class="row">
													<div class="col-lg-9"></div>
													<div class="col-lg-3">
														<button type="button" onclick="createDangKi()" class="btn btn-success">Submit</button>
														<button type="reset" class="btn btn-secondary">Cancel</button>
													</div>
												</div>
											</div>
										</div>
									</form>

									<!--end::Form-->
								</div>


                 </div>
            </div>
		</div>
		
				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Nhập mã xác thực</h5>
										<button type="button" hidden id="closeModel" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
									<form action="" id="formMaXacNhan">
										<div class="row">
											<div class="col-md-2 offset-1 ">
													<input class="form-control border" maxlength='1' type="text" name="ma_xac_thuc1" >
											</div>
											<div class="col-md-2 ">
													<input class="form-control border" maxlength='1' type="text" name="ma_xac_thuc2" >
											</div>
											<div class="col-md-2">
													<input class="form-control border" maxlength='1' type="text" name="ma_xac_thuc3" >
											</div>
											<div class="col-md-2">
													<input class="form-control border" maxlength='1' type="text" name="ma_xac_thuc4" >
											</div>
											<div class="col-md-2">
													<input class="form-control border" maxlength='1' type="text" name="ma_xac_thuc5" >
											</div>

											<input type="number" name="id_form_dang_ky"  id="id_form_dang_ky" hidden>
										</div>
									</div>
									<div class="modal-footer">
										<p class="text-danger text-small" id="sai_ma"></p>
										<button type="button"  onclick="submitMaXacNhan()" class="btn btn-primary">Xác nhận</button>
									</div>
									</form>

									</div>
								</div>
					</div>




					<div class="modal fade" style="height:500px" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Kids graden</h5>
										<button type="button" hidden class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body text-center">
										<h1>THANK YOU</h1>
										<img  width="100" src="https://www.iconfinder.com/data/icons/color-bold-style/21/34-512.png"/>
										<p>Cảm ơn bạn đăng tin tưởng và đăng ký cho bé nhập học</p>
										<p>Chúng tôi sẽ sớm liên lạc lại với bạn</p>
										<p>Cảm ơn !</p>
									</div>
									
								</div>
							</div>
						</div>

		<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script>
			  var url_quan_huyen_theo_thanh_pho= "{{route('get_quan_huyen_theo_thanh_pho')}}";
			  var url_phuong_xa_theo_quan_huyen= "{{route('get_xa_phuong_theo_thi_tran')}}";
			  var url_submit_dangki= "{{ route('submit-dang-ki-nhap-hoc') }}";
			  var url_xac_nhan_ma_dangki= "{{ route('submit-xac-nhan-ma-dangki') }}";
			 


			  let nodeList = document.querySelectorAll(".m-input");
				const listField = [];
				nodeList.forEach((element) => {
					listField.push(element.getAttribute("name"));
				});
	

		  	function showimages(element) {
           		 var file = element.files[0];
                var reader = new FileReader();
                reader.onloadend = function() {
                    $('#showimg').attr('src', reader.result);
                }
                reader.readAsDataURL(file);
            }

			  $("#ho_khau_thuong_tru_matp").change(function() {
				axios.post(url_quan_huyen_theo_thanh_pho, {
							matp:  $("#ho_khau_thuong_tru_matp").val(),
				})
				.then(function (response) {
					var htmldata = '<option value="" selected  >Chọn</option>'
						response.data.forEach(element => {
						htmldata+=`<option value="${element.maqh}" >${element.name}</option>`
					});

					$('#ho_khau_thuong_tru_maqh').html(htmldata);
				})
				.catch(function (error) {
					console.log(error);
				});
			});


			$("#ho_khau_thuong_tru_maqh").change(function() {
				axios.post(url_phuong_xa_theo_quan_huyen, {
					maqh:  $("#ho_khau_thuong_tru_maqh").val(),
				})
				.then(function (response) {
					var htmldata = '<option value="" selected  >Chọn</option>'
						response.data.forEach(element => {
						htmldata+=`<option value="${element.xaid}" >${element.name}</option>`
					});

					$('#ho_khau_thuong_tru_xaid').html(htmldata);
				})
				.catch(function (error) {
					console.log(error);
				});
			});



			$("#noi_o_hien_tai_matp").change(function() {
				axios.post(url_quan_huyen_theo_thanh_pho, {
							matp:  $("#noi_o_hien_tai_matp").val(),
				})
				.then(function (response) {
					var htmldata = '<option value="" selected  >Chọn</option>'
						response.data.forEach(element => {
						htmldata+=`<option value="${element.maqh}" >${element.name}</option>`
					});

					$('#noi_o_hien_tai_maqh').html(htmldata);
				})
				.catch(function (error) {
					console.log(error);
				});
			});


			$("#noi_o_hien_tai_maqh").change(function() {
				axios.post(url_phuong_xa_theo_quan_huyen, {
					maqh:  $("#noi_o_hien_tai_maqh").val(),
				})
				.then(function (response) {
					var htmldata = '<option value="" selected  >Chọn</option>'
						response.data.forEach(element => {
						htmldata+=`<option value="${element.xaid}" >${element.name}</option>`
					});

					$('#noi_o_hien_tai_xaid').html(htmldata);
				})
				.catch(function (error) {
					console.log(error);
				});
			});


		let createDangKi = () => {
			let myForm = document.getElementById('myForm');
			var formData = new FormData(myForm)
			axios.post(url_submit_dangki ,formData)
			.then(function (response) {
				console.log(response.data);
				$("#id_form_dang_ky").val(response.data);
				$( "#foo" ).trigger( "click" );
			})
			.catch(function (error) {
				$('.error').text(' ')
				 for (const key in error.response.data.errors) {
                            $('#'+key+'_error').html(error.response.data.errors[key]);
                   }
			})
		}

		function submitMaXacNhan(){
			let myForm = document.getElementById('formMaXacNhan');
			var formData = new FormData(myForm)
			axios.post(url_xac_nhan_ma_dangki ,formData)
			.then(function (response) {
				if(response.data == 'no'){
					console.log(response.data);
					$('#sai_ma').html('Mã xác thực không đúng')
				}else{
				$( "#closeModel" ).trigger( "click" );
					$( "#foo2" ).trigger( "click" );
				}
				
			})
			.catch(function (error) {
				$('#sai_ma').html('Sai mã')
			})
		}


		</script>
		<!-- end:: Page -->

		<!--begin::Global Theme Bundle -->
		<script src="{!! asset('assets/vendors/base/vendors.bundle.js') !!}" type="text/javascript"></script>
		<script src="{!! asset('assets/demo/base/scripts.bundle.js') !!}" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

        <!--begin::Page Scripts -->
		<script src="../../../assets/demo/custom/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
        
		<script src="{!! asset('assets/snippets/custom/pages/user/login.js') !!}" type="text/javascript"></script>

		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>