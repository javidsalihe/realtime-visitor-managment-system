@extends('layouts.master')
@section('title')
    لست معاونیت ها
@stop
@section('header')
    <style>
        form {
            display: inline;
        }
    </style>
@endsection
@section('content')


    <div class="modal fade" id="add_deputy_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('deputies.store') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle" style="font-weight: bold;">علاوه نمودن معاونیت جدید</h5>
                    </div>
                    <div class="modal-body">

                        <div class="form-group mb-3">
                            <label for="deputy_name">اسم معاونیت</label>
                            <input type="text"  name="deputy_name" class="form-control" id="deputy_name" required autofocus   placeholder="اسم معاونیت را وراد نماید!">
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

    <div class="modal fade" id="edit_deputy_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('update_deputy') }}" method="post">
                    @csrf
                    <input type="hidden" name="deputyid" id="deputyid">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle" style="font-weight: bold;">آپدیت معاونیت </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="deputyname">اسم معاونیت</label>
                            <input type="text"  name="deputy_name" class="form-control" id="deputyname" required />
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

    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-8 col-lg-8 col-sm-8  offset-xl-2 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <button class="btn btn-info mb-4 mr-2 btn-sm btn-rounded"><a onclick="adddeputyfun()" style="color: white;">اضافه نمودن معاونیت جدید</a></button>
                    <div class="table-responsive mb-4 mt-4">
                        <table id="deputylist" class="table table-hover table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>شماره</th>
                                <th style="width: 50%;">اسم معاونیت</th>
                                <th>آپدیت</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deputylist as $deputy)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td style="font-weight: bold;color: black;">{{ $deputy->deputy_name }}</td>
                                    <td>
                                        <button class="btn btn-success mb-4 mr-2 btn-sm btn-rounded"><a href="" onclick="editdeputyfun({{ $deputy->deputy_id  }})" style="color: white;">آپدیت</a></button>
                                        <form action="{{ route('deputies.destroy',$deputy->deputy_id) }}" method="post">
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

