@extends('layouts.app')

@php
    $page_title = 'Files';
    $add_route = 'files.create';
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
                            <ul  class="nav navbar-right panel_toolbox">
                                <li>
                                    <a href="{{route($add_route)}}">
                                        <button class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i></button>
                                    </a>
                                </li>
                                
                            </ul>
                            <div class="clearfix"></div>
                            @include('layouts.alerts')
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>S. No</th>
                                                        <th>{{ ucwords(str_replace('_', ' ', 'Name')) }}</th>
                                                        <th>{{ ucwords(str_replace('_', ' ', 'original_name')) }}</th>
                                                        <th>{{ ucwords(str_replace('_', ' ', 'uploaded_by')) }}</th>
                                                        <th>{{ ucwords(str_replace('_', ' ', 'Action')) }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(!empty($data))  
                                                    @foreach($data as $index => $data_row)
                                                    <tr>
                                                        <td>{{$index+1}}</td>
                                                        <td>{{$data_row->name}}</td>
                                                        <td>{{$data_row->original_name}}</td>
                                                        <td>{{$data_row->uploader->name}}</td>
                                                        <td>
                                                            <span> <a class="btn btn-info" href="{{asset($data_row->path)}}" title="{{$data_row->original_name}}" target="_blank" download="{{$data_row->original_name}}" rel="noopener noreferrer"><i class="fa fa-download" aria-hidden="true"></i></a> </span>
                                                            <span> <a class="btn btn-primary" href="{{route('files.share',$data_row->id)}}" title="{{$data_row->original_name}}"  rel="noopener noreferrer"><i class="fa fa-share" aria-hidden="true"></i></a> </span>
                                                            @if ($auth_user_data->role == 'Admin' || $auth_user_data->id == $data_row->uploaded_by)
                                                            <span >
                                                                <a class="btn btn-danger" href="{{route('files.delete',$data_row->id)}}">
                                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                </a>
                                                            </span>
                                                                
                                                            @endif
                                                        </td>
                                                       
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
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