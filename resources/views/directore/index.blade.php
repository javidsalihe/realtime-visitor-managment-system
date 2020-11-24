@extends('layouts.master')
@section('title')
    لست ریاست ها
@stop
@section('header')
    <style>
        form {
            display: inline;
        }
    </style>
@endsection
@section('content')


    <div class="modal fade" id="add_directory_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('directories.store') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle" style="font-weight: bold;">علاوه نمودن ریاست جدید</h5>
                    </div>
                    <div class="modal-body">

                        <div class="form-group mb-3">
                            <label for="deputy_id">اسم معاونیت</label>
                            <select name="deputy_id" id="deputy_id" class="form-control" required>
                                <option value=""></option>
                                @foreach($deputies as $deputy)
                                    <option value="{{ $deputy->deputy_id }}">{{ $deputy->deputy_name }}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="directorate_name">اسم ریاست</label>
                            <input type="text"  name="directorate_name" class="form-control" id="directorate_name" required    placeholder="اسم ریاست را وارد نماید!">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>بسته</button>
                        <button type="submit" class="btn btn-primary">ثبت</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_directory_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('update_directory') }}" method="post">
                    @csrf
                    <input type="hidden" name="directoryid" id="directoryid">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle" style="font-weight: bold;">آپدیت ریاست</h5>
                    </div>

                    <div class="form-group mb-3">
                        <label for="deputyid">اسم معاونیت</label>
                        <select name="deputy_id" id="deputyid" class="form-control" required>
                            <option value=""></option>
                            @foreach($deputies as $deputy)
                                <option value="{{ $deputy->deputy_id }}">{{ $deputy->deputy_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="directoryname">اسم ریاست</label>
                        <input type="text"  name="directorate_name" class="form-control" id="directoryname" required    placeholder="اسم ریاست را وارد نماید!">
                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>بسته</button>
                        <button type="submit" class="btn btn-primary">ثبت</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <<div class="col-xl-8 col-lg-8 col-sm-8  offset-xl-2 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <button class="btn btn-info mb-4 mr-2 btn-sm btn-rounded"><a onclick="adddirectoryfun()" style="color: white;">اضافه نمودن ریاست جدید</a></button>
                    <div class="table-responsive mb-4 mt-4">
                        <table id="directorylist" class="table table-hover table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>شماره</th>
                                <th style="width: 25%;">اسم معاونیت</th>
                                <th style="width: 25%;">اسم ریاست</th>
                                <th>آپدیت</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($directorylist as $directory)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td style="font-weight: bold;color: black;">{{ $directory->deputy_name }}</td>
                                    <td style="font-weight: bold;color: black;">{{ $directory->directorate_name }}</td>
                                    <td>
                                        <button class="btn btn-success mb-4 mr-2 btn-sm btn-rounded"><a href="" onclick="editdirectoryfun({{ $directory->directorate_id  }})" style="color: white;">آپدیت</a></button>
                                        <form action="{{ route('directories.destroy',$directory->directorate_id) }}" method="post">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger mb-4 mr-2 btn-sm btn-rounded">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>

@stop


@section('footer_scripts')

@endsection

