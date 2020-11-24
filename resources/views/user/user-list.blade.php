@extends('layouts.master')
@section('title')
    لست کاربران
@stop
@section('header')
    <style>
        form {
            display: inline;
        }
    </style>
@endsection
@section('content')


    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-6 col-sm-12  offset-xl-12 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <button class="btn btn-info mb-4 mr-2 btn-sm btn-rounded"><a href="{{ route('users.create') }}" style="color: white;">علاه نمودن کاربر جدید</a></button>
                    <div class="table-responsive mb-4 mt-4">
                        <table id="organizationlist" class="table table-hover table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>شماره</th>
                                <th>اسم</th>
                                <th>ایمیل آدرس</th>
                                <th>عنوان وظیفه</th>
                                <th>معاونیت</th>
                                <th>ریاست</th>
                                <th>آپدیت</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userlist as $user)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td style="font-weight: bold;color: black;">{{ $user->name }}</td>
                                    <td style="font-weight: bold;color: black;">{{ $user->email }}</td>
                                    <td style="font-weight: bold;color: black;">{{ $user->position }}</td>
                                    <td style="font-weight: bold;color: black;">{{ $user->deputy_name }}</td>
                                    <td style="font-weight: bold;color: black;">{{ $user->directory_name }}</td>
                                    <td>
                                        <button class="btn btn-success mb-4 mr-2 btn-sm btn-rounded"><a href="{{ route('users.edit',$user->id) }}" style="color: white;">آپدیت</a></button>
                                        <form action="{{ route('users.destroy',$user->id) }}" method="post">
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

