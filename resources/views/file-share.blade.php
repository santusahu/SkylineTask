@extends('layouts.app')

@php
$page_title = "file share"
    
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
            @php
                $file = $data['file'];
                $users = $data['users'];
            @endphp

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h1>{{$file->name}}</h1>

                            <div class="clearfix"></div>
                            @include('layouts.alerts')
                        </div>
                        <div class="x_content">
                            <form data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" action="" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('Post')
                                
                                <input type="hidden" name="file_id" value="{{$file->id}}">

                                <div class="item form-group">
                                    <div class="col-form-label col-md-3 col-sm-3 label-align">
                                    </div>
                                    <div class="col-md-6 col-sm-6 ">

                                    </div>
                                </div>
                        
                                {{-- select file --}}
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">{{ ucwords(str_replace('_', ' ', 'select users')) }} <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select name="user_ids[]" id="user_ids" class="form-control select2" multiple required>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                        
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-share" aria-hidden="true"></i></button>
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
<script>
    $(document).ready(function() {
        // Initialize Select2 on the <select> element
        $('#user_ids').select2({
            placeholder: "Select users",
            allowClear: true
        });
    });
</script>
@endsection
