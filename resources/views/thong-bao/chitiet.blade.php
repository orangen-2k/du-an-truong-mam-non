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
                    
                </div>
                <div class="m-portlet__body">
                    <div class="m-section__content">
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
