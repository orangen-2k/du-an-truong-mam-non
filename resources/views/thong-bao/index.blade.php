@extends('layouts.main') @section('title', 'Lịch sử thông báo') @section('content')
<div class="m-content">
    <div class="row">
        <div class="col-xl-12">

            <!--begin:: Widgets/Best Sellers-->
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                LỊCH SỬ THÔNG BÁO
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-pills m-portlet__nav nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab1_content" role="tab" aria-selected="false">
                                    Toàn bộ
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active show" data-toggle="tab" href="#m_widget5_tab2_content" role="tab" aria-selected="true">
                                    Giáo viên
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab3_content" role="tab" aria-selected="false">
                                    Phụ huynh
                                </a>
                            </li>
                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                               
                                <a href="#" class="btn btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                    <i class="la la-pencil-square text-black"></i>
                                </a>
                                <div class="m-dropdown__wrapper" style="z-index: 101;">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 21px;"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav">
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                            <span class="m-nav__link-text">Gửi toàn trường</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                            <span class="m-nav__link-text">Gửi giáo viên</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                            <span class="m-nav__link-text">Gửi phụ huynh</span>
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">

                    <!--begin::Content-->
                    <div class="tab-content">
                        <div class="tab-pane" id="m_widget5_tab1_content" aria-expanded="true">

                            <!--begin::m-widget5-->
                            <div class="m-widget3">
                                <div class="m-widget3__item">
                                    <div class="m-widget3__header">
                                        <div class="m-widget3__user-img">
                                            <img class="m-widget3__img" src="../../assets/app/media/img/users/user1.jpg" alt="">
                                        </div>
                                        <div class="m-widget3__info">
                                            <span class="m-widget3__username">
                                                Melania Trump
                                            </span><br>
                                            <span class="m-widget3__time">
                                                2 day ago
                                            </span>
                                        </div>
                                        <span class="m-widget3__status m--font-info">
                                            Pending
                                        </span>
                                    </div>
                                    <div class="m-widget3__body">
                                        <p class="m-widget3__text">
                                            Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!--end::m-widget5-->
                        </div>
                        <div class="tab-pane active show" id="m_widget5_tab2_content" aria-expanded="false">

                            <!--begin::m-widget5-->
                            <div class="m-widget5">
                                <div class="m-widget5__item">
                                    <div class="m-widget5__content">
                                        <div class="m-widget5__pic">
                                            <img class="m-widget7__img" src="../../assets/app/media/img//products/product11.jpg" alt="">
                                        </div>
                                        <div class="m-widget5__section">
                                            <h4 class="m-widget5__title">
                                                Branding Mockup
                                            </h4>
                                            <span class="m-widget5__desc">
                                                Make Metronic Great Again.Lorem Ipsum Amet
                                            </span>
                                            <div class="m-widget5__info">
                                                <span class="m-widget5__author">
                                                    Author:
                                                </span>
                                                <span class="m-widget5__info-author m--font-info">
                                                    Fly themes
                                                </span>
                                                <span class="m-widget5__info-label">
                                                    Released:
                                                </span>
                                                <span class="m-widget5__info-date m--font-info">
                                                    23.08.17
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget5__content">
                                        <div class="m-widget5__stats1">
                                            <span class="m-widget5__number">24,583</span><br>
                                            <span class="m-widget5__sales">sales</span>
                                        </div>
                                        <div class="m-widget5__stats2">
                                            <span class="m-widget5__number">3809</span><br>
                                            <span class="m-widget5__votes">votes</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__content">
                                        <div class="m-widget5__pic">
                                            <img class="m-widget7__img" src="../../assets/app/media/img//products/product6.jpg" alt="">
                                        </div>
                                        <div class="m-widget5__section">
                                            <h4 class="m-widget5__title">
                                                Great Logo Designn
                                            </h4>
                                            <span class="m-widget5__desc">
                                                Make Metronic Great Again.Lorem Ipsum Amet
                                            </span>
                                            <div class="m-widget5__info">
                                                <span class="m-widget5__author">
                                                    Author:
                                                </span>
                                                <span class="m-widget5__info-author m--font-info">
                                                    Fly themes
                                                </span>
                                                <span class="m-widget5__info-label">
                                                    Released:
                                                </span>
                                                <span class="m-widget5__info-date m--font-info">
                                                    23.08.17
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget5__content">
                                        <div class="m-widget5__stats1">
                                            <span class="m-widget5__number">19,200</span><br>
                                            <span class="m-widget5__sales">sales</span>
                                        </div>
                                        <div class="m-widget5__stats2">
                                            <span class="m-widget5__number">1046</span><br>
                                            <span class="m-widget5__votes">votes</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__content">
                                        <div class="m-widget5__pic">
                                            <img class="m-widget7__img" src="../../assets/app/media/img//products/product10.jpg" alt="">
                                        </div>
                                        <div class="m-widget5__section">
                                            <h4 class="m-widget5__title">
                                                Awesome Mobile App
                                            </h4>
                                            <span class="m-widget5__desc">
                                                Make Metronic Great Again.Lorem Ipsum Amet
                                            </span>
                                            <div class="m-widget5__info">
                                                <span class="m-widget5__author">
                                                    Author:
                                                </span>
                                                <span class="m-widget5__info-author m--font-info">
                                                    Fly themes
                                                </span>
                                                <span class="m-widget5__info-label">
                                                    Released:
                                                </span>
                                                <span class="m-widget5__info-date m--font-info">
                                                    23.08.17
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget5__content">
                                        <div class="m-widget5__stats1">
                                            <span class="m-widget5__number">10,054</span><br>
                                            <span class="m-widget5__sales">sales</span>
                                        </div>
                                        <div class="m-widget5__stats2">
                                            <span class="m-widget5__number">1103</span><br>
                                            <span class="m-widget5__votes">votes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end::m-widget5-->
                        </div>
                        <div class="tab-pane" id="m_widget5_tab3_content" aria-expanded="false">

                            <!--begin::m-widget5-->
                            <div class="m-widget5">
                                <div class="m-widget5__item">
                                    <div class="m-widget5__content">
                                        <div class="m-widget5__pic">
                                            <img class="m-widget7__img" src="../../assets/app/media/img//products/product10.jpg" alt="">
                                        </div>
                                        <div class="m-widget5__section">
                                            <h4 class="m-widget5__title">
                                                Branding Mockup
                                            </h4>
                                            <span class="m-widget5__desc">
                                                Make Metronic Great Again.Lorem Ipsum Amet
                                            </span>
                                            <div class="m-widget5__info">
                                                <span class="m-widget5__author">
                                                    Author:
                                                </span>
                                                <span class="m-widget5__info-author m--font-info">
                                                    Fly themes
                                                </span>
                                                <span class="m-widget5__info-label">
                                                    Released:
                                                </span>
                                                <span class="m-widget5__info-date m--font-info">
                                                    23.08.17
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget5__content">
                                        <div class="m-widget5__stats1">
                                            <span class="m-widget5__number">10.054</span><br>
                                            <span class="m-widget5__sales">sales</span>
                                        </div>
                                        <div class="m-widget5__stats2">
                                            <span class="m-widget5__number">1103</span><br>
                                            <span class="m-widget5__votes">votes</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__content">
                                        <div class="m-widget5__pic">
                                            <img class="m-widget7__img" src="../../assets/app/media/img//products/product11.jpg" alt="">
                                        </div>
                                        <div class="m-widget5__section">
                                            <h4 class="m-widget5__title">
                                                Great Logo Designn
                                            </h4>
                                            <span class="m-widget5__desc">
                                                Make Metronic Great Again.Lorem Ipsum Amet
                                            </span>
                                            <div class="m-widget5__info">
                                                <span class="m-widget5__author">
                                                    Author:
                                                </span>
                                                <span class="m-widget5__info-author m--font-info">
                                                    Fly themes
                                                </span>
                                                <span class="m-widget5__info-label">
                                                    Released:
                                                </span>
                                                <span class="m-widget5__info-date m--font-info">
                                                    23.08.17
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget5__content">
                                        <div class="m-widget5__stats1">
                                            <span class="m-widget5__number">24,583</span><br>
                                            <span class="m-widget5__sales">sales</span>
                                        </div>
                                        <div class="m-widget5__stats2">
                                            <span class="m-widget5__number">3809</span><br>
                                            <span class="m-widget5__votes">votes</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__content">
                                        <div class="m-widget5__pic">
                                            <img class="m-widget7__img" src="../../assets/app/media/img//products/product6.jpg" alt="">
                                        </div>
                                        <div class="m-widget5__section">
                                            <h4 class="m-widget5__title">
                                                Awesome Mobile App
                                            </h4>
                                            <span class="m-widget5__desc">
                                                Make Metronic Great Again.Lorem Ipsum Amet
                                            </span>
                                            <div class="m-widget5__info">
                                                <span class="m-widget5__author">
                                                    Author:
                                                </span>
                                                <span class="m-widget5__info-author m--font-info">
                                                    Fly themes
                                                </span>
                                                <span class="m-widget5__info-label">
                                                    Released:
                                                </span>
                                                <span class="m-widget5__info-date m--font-info">
                                                    23.08.17
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget5__content">
                                        <div class="m-widget5__stats1">
                                            <span class="m-widget5__number">19,200</span><br>
                                            <span class="m-widget5__sales">1046</span>
                                        </div>
                                        <div class="m-widget5__stats2">
                                            <span class="m-widget5__number">1046</span><br>
                                            <span class="m-widget5__votes">votes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end::m-widget5-->
                        </div>
                    </div>

                    <!--end::Content-->
                </div>
            </div>

            <!--end:: Widgets/Best Sellers-->
        </div>
    </div>
    <!--begin::Modal-->
						<div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">New message</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<table id="table_id" style="with: 100%">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" onclick="checkAll(this)"></th>
                                                    <th>Column 1</th>
                                                    <th>Column 2</th>
                                                    <th>Column 2</th>
                                                    <th>Column 2</th>
                                                    <th>Column 2</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="checkbox" class="checkbox"></td>
                                                    <td>Row 1 Data 1</td>
                                                    <td>Row 1 Data 2</td>
                                                    <td>d</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" class="checkbox"></td>
                                                    <td>Row 2 Data 1</td>
                                                    <td>Row 2 Data 2</td>
                                                    <td>d</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary">Send message</button>
									</div>
								</div>
							</div>
						</div>

						<!--end::Modal-->
</div>
@endsection
