@extends('layouts.main')
@section('title', 'Create')

@section('content')
    @include('templates.content-header', ['name' => 'Fpt Education', 'key' => 'Import',
      'value' => "", 'value2' => ""])
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Import Lead Form Layout
                            </h3>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="kt-form kt-form--label-right" action="{{route('post.import')}}"
                          enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label>Upload:</label>
                                    <input type="file" name="file" class="form-control"
                                           placeholder="Enter Role Name">
                                </div>
                            </div>
                        </div>
                        @error('file')
                        <div class="alert alert-solid-danger alert-bold">{{ $message }}</div>
                        @enderror
                        @if(Session::has('import_errors'))
                            <table class="table table-danger">
                                <thead>
                                <tr>
                                    <th>Row</th>
                                    <th>Attribute</th>
                                    <th>Errors</th>
                                    <th>Value</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Session::get('import_errors') as $failure)
                                    <tr>
                                        <td>{{ $failure->row() }}</td>
                                        <td>{{ $failure->attribute() }}</td>
                                        <td>
                                            <ul class="kt-nav">
                                                @foreach($failure->errors() as $item)
                                                    <li class="kt-nav__item">{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ $failure->values()[$failure->attribute()] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        @endif
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="" type="reset" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
@endsection

