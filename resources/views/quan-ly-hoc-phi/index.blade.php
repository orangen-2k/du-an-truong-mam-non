@extends('layouts.main')
@section('title', "Quản lý giáo viên")
@section('content')
    <div class="m-content">
        <div class="m-portlet">
            
            <div class="m-portlet__body">
                <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="">
                                <i class="la la-exclamation-triangle"></i> Quy trình
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="la la-cloud-download"></i> Danh sách khoản thu
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="la la-cloud-download"></i> Danh sách khoản thu
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="la la-cloud-download"></i> Danh sách khoản thu
                            </a>
                        </li>
                    </ul>

                    <h3 class="m-section__heading">
                        Quy trình lập khoản thu
                    </h3>

                    <div class="m-wizard m-wizard--2 m-wizard--success m-wizard--step-first" id="m_wizard">

                        <!--begin: Message container -->
                        <div class="m-portlet__padding-x">

                            <!-- Here you can put a message or alert -->
                        </div>

                        <!--end: Message container -->

                        <!--begin: Form Wizard Head -->
                        <div class="m-wizard__head m-portlet__padding-x">

                            <!--begin: Form Wizard Progress -->
                            <div class="m-wizard__progress">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                </div>
                            </div>

                            <!--end: Form Wizard Progress -->
                            
                            <!--begin: Form Wizard Nav -->
                            <div class="m-wizard__nav">
                                <div class="m-wizard__steps">
                                    <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_1">
                                        <a href="#" class="m-wizard__step-number">
                                            <span><i class="fa  flaticon-placeholder"></i></span>
                                        </a>
                                        <div class="m-wizard__step-info">
                                            <div class="m-wizard__step-title">
                                                1. Lập danh sách khoản thu
                                            </div>
                                            <div class="m-wizard__step-desc">
                                                Lorem ipsum doler amet elit<br>
                                                sed eiusmod tempors
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_2">
                                        <a href="#" class="m-wizard__step-number">
                                            <span><i class="fa  flaticon-layers"></i></span>
                                        </a>
                                        <div class="m-wizard__step-info">
                                            <div class="m-wizard__step-title">
                                                2. Đăng ký khoản thu
                                            </div>
                                            <div class="m-wizard__step-desc">
                                                Lorem ipsum doler amet elit<br>
                                                sed eiusmod tempors
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_3">
                                        <a href="#" class="m-wizard__step-number">
                                            <span><i class="fa  flaticon-layers"></i></span>
                                        </a>
                                        <div class="m-wizard__step-info">
                                            <div class="m-wizard__step-title">
                                                3. Danh sách miễn giảm
                                            </div>
                                            <div class="m-wizard__step-desc">
                                                Lorem ipsum doler amet elit<br>
                                                sed eiusmod tempors
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_2">
                                        <a href="#" class="m-wizard__step-number">
                                            <span><i class="fa  flaticon-layers"></i></span>
                                        </a>
                                        <div class="m-wizard__step-info">
                                            <div class="m-wizard__step-title">
                                                4. Thu tiền
                                            </div>
                                            <div class="m-wizard__step-desc">
                                                Lorem ipsum doler amet elit<br>
                                                sed eiusmod tempors
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Nav -->
                        </div>

                        <!--end: Form Wizard Head -->

                        <!--begin: Form Wizard Form-->
                        

                        <!--end: Form Wizard Form-->
                    </div>
            </div>        
        </div>
        
        
    </div>
@endsection