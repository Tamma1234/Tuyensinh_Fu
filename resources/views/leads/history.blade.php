@extends('layouts.main')
@section('title', 'Create')

@section('content')
    @include('templates.content-header', ['name' => 'Fpt Education', 'key' => 'Leads', 'value' => "History", 'value2' => ""])

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label col-md-2">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
                    <h3 class="kt-portlet__head-title">
                        Lead History
                    </h3>
                </div>
                {{--                <div class="col-md-6 col-4 align-self-center">--}}
                {{--                    <a href="" class="btn pull-right hidden-sm-down btn-success"><i--}}
                {{--                            class="mdi mdi-plus-circle"></i> Create</a>--}}
                {{--                </div>--}}
            </div>
            <div class="kt-portlet__body" id="form-table-search">
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="example">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>Ngày sinh</th>
                        <th>Email</th>
                        <th>Tỉnh/TP Trường</th>
                        <th>Trường THPT</th>
                        <th>Di động</th>
                        <th>Ngành</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1?>
                    @foreach($leadHistory  as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$item->full_name}}</td>
                            <td>{{$item->dob}}</td>
                            <td>{{$item->email }}</td>
                            <td>{{$item->province}}</td>
                            <td>{{$item->school }}</td>
                            <td>{{$item->phone_number }}</td>
                            <td>{{$item->majors}}</td>
                            <td class="text-nowrap">
                                <a href="" data-toggle="tooltip"
                                   data-original-title="Edit"><i class="flaticon-edit"></i>
                                </a>
                                <a href="" data-toggle="tooltip"
                                   data-original-title="Close"> <i class="flaticon-delete"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!--end: Datatable -->
            </div>
        </div>
    </div>

@endsection



