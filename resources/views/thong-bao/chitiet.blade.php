@extends('layouts.main') @section('title', 'Thông báo') @section('content')
<div class="m-content">
    <div class="row">
      
        <div class="col-lg-12">

            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--mobile m-portlet--sortable">
                <div class="m-portlet__head ui-sortable-handle">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon">
                                <i class="la la-thumb-tack m--font-success"></i>
                            </span>
                            <h3 class="m-portlet__head-text m--font-success">
                                {{ $data->title }}
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="#" class="m-portlet__nav-link btn btn-secondary m-btn m-btn--icon m-btn--icon-only m-btn--pill">
                                    <i class="la la-tint"></i>
                                </a>
                            </li>
                            <li class="m-portlet__nav-item">
                                <a href="#" class="m-portlet__nav-link btn btn-secondary m-btn m-btn--icon m-btn--icon-only m-btn--pill">
                                    <i class="la la-tags"></i>
                                </a>
                            </li>
                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                <a href="#" class="m-portlet__nav-link btn btn-secondary m-btn m-btn--icon m-btn--icon-only m-btn--pill   m-dropdown__toggle">
                                    <i class="la la-ellipsis-v"></i>
                                </a>
                                <div class="m-dropdown__wrapper" style="z-index: 101;">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 21px;"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav">
                                                    <li class="m-nav__section m-nav__section--first">
                                                        <span class="m-nav__section-text">Quick Actions</span>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                            <span class="m-nav__link-text">Activity</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                            <span class="m-nav__link-text">Messages</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                            <span class="m-nav__link-text">FAQ</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                            <span class="m-nav__link-text">Support</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__separator m-nav__separator--fit">
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Cancel</a>
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
                    <div class="m-section__content">
                        <div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
                            <div class="m-demo__preview">
                                @php
                                $doc = new DOMDocument();
                                $doc->loadHTML('<?xml encoding="UTF-8">'.$data->content);
                                echo $doc->saveHTML();
                            @endphp
                            </div>
                        </div>
                    </div>
                    <div class="m-accordion m-accordion--default m-accordion--toggle-arrow" id="m_accordion_5" role="tablist">
                        <!--begin::Item-->
                        <div class="m-accordion__item m-accordion__item--info">
                            <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_5_item_2_head" data-toggle="collapse" href="#m_accordion_5_item_2_body" aria-expanded="false">
                                <span class="m-accordion__item-icon"><i class="la la-thumb-tack"></i></span>
                                <span class="m-accordion__item-title">Gửi tới</span>
                                <span class="m-accordion__item-mode"></span>
                            </div>
                            <div class="m-accordion__item-body collapse" id="m_accordion_5_item_2_body" role="tabpanel" aria-labelledby="m_accordion_5_item_2_head" data-parent="#m_accordion_5" style="">
                                <div class="m-accordion__item-content">
                                        @foreach ($data->ThongBao as $item)
                                            <a href="javascript:;">{{ $item->User->name . ' - ' . $item->User->username }}</a>{{ ', ' }}
                                        @endforeach
                                </div>
                            </div>
                        </div>
                        <!--end::Item-->
                    </div>
                </div>
            </div>

            <!--end::Portlet-->
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
</script>
@endsection
