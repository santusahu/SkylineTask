@extends('layouts.app')

@php
$page_title = "file upload"
    
@endphp

{{-- Page Title Section --}}
@section('title')
    {{ $page_title }}
@endsection

{{-- Page additional css links Section --}}
@section('additional_css_links')
@endsection

{{-- Page  additional custom Css Section --}}
@section('additional_custom_css')
    
@endsection

{{-- Page Content Section --}}
@section('page_content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{$page_title}}</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <!-- <h2>Plain Page</h2> -->
                            <div class="clearfix"></div>
                            @include('layouts.alerts')
                        </div>
                        <div class="x_content">
                            <form data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" action="" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('Post')
                                {{-- name --}}
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">{{ ucwords(str_replace('_', ' ', 'name')) }} <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="name" name="name" required  class="form-control " value="{{isset($data->name) ? $data->name : ''}}">
                                    </div>
                                </div>
                        
                                {{-- select file --}}
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">{{ ucwords(str_replace('_', ' ', 'select file')) }} <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" name="file_to_upload"  id="file_to_upload" accept="image/*,video/*,audio/*,text/*" required  class="form-control">
                                    </div>
                                </div>
                        
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-success">Upload</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Page additional js links Section --}}
@section('additional_js_links')
@endsection

{{-- Page additional js links Section --}}
@section('additional_custom_js')
  
@endsection
