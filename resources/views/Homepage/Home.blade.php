@extends('layouts.master')
@section('css')

{{--
    <style>

        .bootstrap-tagsinput{
            margin: 0;
            width: 100%;
            padding: 0.5rem 0.75rem 0;
            font-size: 1rem;
            line-height: 1.25;
            transition: border-color 0.15s ease-in-out;
        }
        .bootstrap-tagsinput label-info{
            display: inline-block;
            background-color: #56575a;
            padding: 0 0.4em 0.15em;
            border-radius: 0.25rem;
            margin-bottom: 0.4em;
            color: #fff;
        }
        .bootstrap-tagsinput input{
            margin-bottom: 0.5em;
            background: no-repeat bottom, 50% calc(100% - 1px);
            background-image: none , none;
            background-size: auto auto;
            width: 70%;
            border: 0;
            height: 36px;
            transition: background 0s ease-out;
            padding-left: 0;
            padding-right: 0;
            border-radius: 0;
            font-size: 14px;

        }
    </style>
--}}


@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <!--begin: Datatable -->
<!--
                <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" role="form" id="add_edit_form" autocomplete="off" enctype="multipart/form-data">
                    {{ method_field('patch') }}
                    @csrf

                    <div class="portlet-body form">
                        <div class="ibox">
                            <div class="ibox-content">
                                <input type="hidden" name="locale" value="ar"/>

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="s_name" class="form-control-label">{{trans('HomeEdits.Pagetitle(EN)')}}</label>
                                        <input type="text"  name="s_name[ar]"  required id="s_title" class="form-control" value="">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="s_title" class="form-control-label">{{trans('HomeEdits.Pagetitle(AR)')}}</label>
                                        <input type="text"  name="s_title[ar]"  required id="s_title" class="form-control" value="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary add_edit">موافق</button>
                    </div>
                </form>
-->


                <form action="{{ route('update_page.update', 'test') }}" method="post">
                {{ method_field('patch') }}
                @csrf

                    <input type="hidden" value="{{$id}}" name="id">
                    <div class="row">

                        <!--    Page title       -->
                        <div class="form-group col-lg-6">
                            <label for="s_name" class="form-control-label">{{trans('HomeEdits.Pagetitle(EN)')}}</label>
                            <input type="text"  name="pagetitle_en"  class="form-control" value="{{$editpages->getTranslation('Pagetitle', 'en')}}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="s_title" class="form-control-label">{{trans('HomeEdits.Pagetitle(AR)')}}</label>
                            <input type="text"  name="pagetitle_ar" class="form-control" value="{{$editpages->getTranslation('Pagetitle', 'ar')}}">
                        </div>

                        <!--   Page Meta title        -->

                        <div class="form-group col-lg-6">
                            <label for="s_name" class="form-control-label">{{trans('HomeEdits.PageMetatitle(EN)')}}</label>
                            <input type="text"  name="Metatitle_en"  class="form-control" value="{{$editpages->getTranslation('Metatitle', 'en')}}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="s_title" class="form-control-label">{{trans('HomeEdits.PageMetatitle(AR)')}}</label>
                            <input type="text"  name="Metatitle_ar" class="form-control" value="{{$editpages->getTranslation('Metatitle', 'ar')}}">
                        </div>


                        <!--   Page Meta description         -->

                        <div class="form-group col-lg-6">
                            <label for="s_name" class="form-control-label">{{trans('HomeEdits.PageMetadescription(EN)')}}</label>
                            <input type="text"  name="Metadescription_en"  class="form-control" value="{{$editpages->getTranslation('Metadescription', 'en')}}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="s_title" class="form-control-label">{{trans('HomeEdits.PageMetadescription(AR)')}}</label>
                            <input type="text"  name="Metadescription_ar" class="form-control" value="{{$editpages->getTranslation('Metadescription', 'ar')}}">
                        </div>


                        <div class="col-lg-6" data-select2-id="5">
                            <label for="s_meta_tags">{{trans('HomeEdits.Metakeywords')}}</label>
                            <select style="width:100%;height: 40px" class="form-control kt-select2" name="s_meta_tags[][ar]" id="s_meta_tags" multiple
                                    data-select2-id="s_meta_tags" tabindex="-1" aria-hidden="true"
                            >
<!--
                                <option selected value="كلمة نقيب المحامين">كلمة نقيب المحامين</option>
-->

                            </select>
                        </div>


<!--                        &lt;!&ndash;         tags               &ndash;&gt;
                        <div class="form-group col-lg-6">
                            <label for="tags">Tags</label>
                            <input
                                id="tags"
                                type="text"
                                class="form-control"
                                name="tags"
                                placeholder="tags multe"
                            >

                        </div>-->



                        <div class="col-lg-6">
                             <!-- فاضي  -->
                         </div>

                        <div class="form-group col-lg-12 mt-4">
                            <textarea class="ckeditor form-control" name="wysiwygeditor">{{$editpages->staticpages}}</textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit"
                                class="btn btn-success">{{ trans('SEO-trans.Editsubmit') }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!--end::Body-->

<!-- row closed -->
@endsection
@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    <script type="text/javascript">
        CKEDITOR.replace('wysiwyg-editor', {
            filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>


    <script>
        $(document).ready(function (){
            $('input[name="tags"]').tagsinput({
                trimValue:true,
                confirmKeys:[44],
                focusClass:""
            });
        });
    </script>

@endsection
