@extends('layouts.master')
@section('title')
    ثبت کاربر
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
            <div class="col-xl-6 col-lg-6 col-sm-6 offset-xl-3 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                        <h1>{{ $user->role_name }}</h1>
                    <form action="{{ route('users.update',$user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="oldpassword" value="{{ $user->password }}">

                        <div class="form-group mb-4">
                            <label style="color:black;" for="name" >اسم کاربر</label>
                            <input type="text" name="name" class="form-control" id="name"  value="{{ $user->name }}" required placeholder="اسم کاربر را وارد نمایید!">
                        </div>

                        <div class="form-group mb-4">
                            <label style="color:black;" for="position">عنوان وظیفه کاربر</label>
                            <input type="text" class="form-control" name="position" id="position" value="{{ $user->position }}" required placeholder="عنوان وظیفه کاربر را وارد نمایید!">
                        </div>

                        <div class="form-group mb-4">
                            <label style="color:black;" for="email">ایمیل آدرس کاربر</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" required placeholder="ایمیل ادرس را وارد نمایید!"  onkeyup="if($(this).val()==''){ $(this).css({'text-align':'right'})} else{ $(this).css({'text-align':'left'})}">
                        </div>


                        <div class="form-group mb-4">
                            <label style="color:black;" for="directory_id">ریاست</label>
                            <select  name="directory_id" id="directory_id"  required class="form-control selectpicker" data-live-search="true" >
                                <option value="">ریاست مربوط را انتخاب نمایید</option>
                                @foreach($directoraties as $dir)
                                    <option value="{{$dir->directorate_id }}" @if($user->directory_id == $dir->directorate_id) selected @endif>{{$dir->directorate_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label style="color:black;" for="role_id">صلاحیت</label>
                            <select  name="role_id" id="role_id"  required class="form-control selectpicker" data-live-search="true" >
                                <option value="">صلاحیت کاربر را انتخاب نمایید!</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label style="color:black;" for="password">رمز عبور</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="*******"   minlength="8" >
                        </div>

                        <input type="submit" value="ثبت کاربر" class="mt-4 mb-4 btn btn-primary">
                    </form>

                </div>
            </div>

        </div>

    </div>

@stop


@section('footer_scripts')

@endsection

