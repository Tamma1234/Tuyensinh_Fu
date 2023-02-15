@extends('layouts.main')
@section('title', 'Create')

@section('content')
    @include('templates.content-header', ['name' => 'Fpt Education', 'key' => 'Dashboard', 'value' => "", 'value2' => ""])

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label col-md-2">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
                    <h3 class="kt-portlet__head-title">
                        Dashboard
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <div class="dropdown dropdown-inline">
                                <a href="{{ route('lead.export') }}" class="btn btn-default btn-icon-sm dropdown-toggle">
                                    <i class="la la-download"></i> Export
                                </a>
                            </div>
                            &nbsp;
                            <a href="#" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                New Record
                            </a>
                        </div>
                    </div>
                </div>
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
                    <?php $i = 1 ?>
                    @foreach($leads  as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$item->ho_va_ten}}</td>
                            <td>{{$item->ngay_sinh}}</td>
                            <td>{{$item->email }}</td>
                            <td>{{$item->tinhtp_truong}}</td>
                            <td>{{$item->truong_thpt }}</td>
                            <td>{{$item->di_dong }}</td>
                            <td>{{$item->nganh}}</td>
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



