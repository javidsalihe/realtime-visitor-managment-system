@extends('layouts.master')
@section('title')
    لست ادارات
@stop
@section('header')
    <style>
        form {
            display: inline;
        }
    </style>
@endsection
@section('content')


    <div class="modal fade" id="add_organization_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('organizations.store') }}" method="post">
                    @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle" style="font-weight: bold;">علاوه نمودن اداره جدید</h5>
                </div>
                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label for="organization_name">اسم اداره</label>
                        <input type="text"  name="organization_name" class="form-control" id="organization_name" required autofocus   placeholder="اسم اداره را وارد نماید.">
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

    <div class="modal fade" id="edit_organization_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('update_organization') }}" method="post">
                    @csrf
                    <input type="hidden" name="organizationid" id="organizationid">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle" style="font-weight: bold;">آپدیت اداره </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="organizationname">اسم اداره</label>
                            <input type="text"  name="organization_name" class="form-control" id="organizationname" required />
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
            <div class="col-xl-6 col-lg-6 col-sm-6  offset-xl-3 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <button class="btn btn-info mb-4 mr-2 btn-sm btn-rounded"><a onclick="addorganizationfun()" style="color: white;">اضافه نمودن اداره جدید</a></button>
                    <div class="table-responsive mb-4 mt-4">
                        <table id="organizationlist" class="table table-hover table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>شماره</th>
                                <th style="width: 50%;">نام اداره</th>
                                <th>آپدیت</th>
                            </tr>
                            </thead>
                                <tbody>
                                    @foreach($organizationlist as $organ)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td style="font-weight: bold;color: black;">{{ $organ->organization_name }}</td>
                                            <td>
                                                <button class="btn btn-success mb-4 mr-2 btn-sm btn-rounded"><a href="" onclick="editorganizationfun({{ $organ->organization_id  }})" style="color: white;">آپدیت</a></button>
                                                <form action="{{ route('organizations.destroy',$organ->organization_id) }}" method="post">
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

