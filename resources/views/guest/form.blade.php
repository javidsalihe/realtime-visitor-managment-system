@extends('layouts.master')
@section('title')
    ثبت مهمان
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



            <div class="col-xl-4 col-lg-4 col-sm-4 layout-spacing">
                <div class="widget-content widget-content-area br-6">

                    <form action="{{ route('store_guest') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <label style="color:black;" for="guest_name" >اسم مهمان</label>
                            <input type="text" name="guest_name" class="form-control" id="guest_name" autofocus required placeholder="اسم مهمان را وارد نمایید!">
                        </div>

                        <div class="form-group mb-4">
                            <label style="color:black;" for="guest_position">عنوان وظیفه</label>
                            <input type="text" class="form-control" name="guest_position" id="guest_position"  required placeholder="عنوان وظیفه را وارد نمایید!">
                        </div>

                        <div class="form-group mb-4">
                            <label style="color:black;" for="organization_id">اداره</label>
                            <select  name="organization_id" id="organization_id"  class="form-control selectpicker" data-live-search="true" required>
                                <option value="">اداره مربوطه را انتخاب نمایید</option>
                                @foreach($organization as $org)
                                    <option value="{{$org->organization_id}}">{{$org->organization_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label style="color:black;" for="visit_date">تاریخ مراجعه</label>
                            <input type="text" class="form-control" name="visit_date" required id="visit_date">
                        </div>


                        <div class="form-group">
                            <label style="color:black;" for="visit_time">ساعت مراجعه </label>
                            <input  class="form-control"  name="visit_time" id="visit_time" required data-clocklet="class-name: my-clocklet-style; placement: top;" />
                        </div>


                        <div class="form-group mb-4">
                            <label style="color:black;" for="num">شماره تماس</label>
                            <input type="text" class="form-control" name="guest_phone" id="num" placeholder="شماره تماس مهمان را وارد نمایید!" maxlength="15">
                        </div>

                        <div class="form-group mb-4">
                            <label style="color:black;" for="guest_email">ایمیل آدرس</label>
                            <input type="email" class="form-control" name="guest_email" id="guest_email" placeholder="ایمیل آدرس مهمان را وارد نمایید!"  onkeyup="if($(this).val()==''){ $(this).css({'text-align':'right'})} else{ $(this).css({'text-align':'left'})}">
                        </div>


                        <div class="form-group mb-4">
                            <label style="color:black;" for="guest_type">نوعیت مهمان</label>
                            <select class="form-control" name="guest_type" id="guest_type">
                                <option value="">نوعیت مهمان را وارد نمایید</option>
                                <option value="normal">Normal</option>
                                <option value="vip">VIP</option>
                                <option value="vvip">VVIP</option>
                            </select>
                        </div>



                        <div class="form-group mb-4">
                            <label style="color:black;" for="visit_purpose">هدف ملاقات</label>
                            <textarea name="visit_purpose" class="form-control" id="visit_purpose" rows="3" style="resize: none;" placeholder="هدف ملاقات را وارد نمایید!"></textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label style="color:black;" for="vehicle_info" style="color: black;">جزئیات دریور/موتر</label>
                            <textarea name="vehicle_info" class="form-control" id="vehicle_info" rows="3" style="resize: none;" placeholder="اسم دریور و جزئیات موتر متذکره را وارد نمایید!"></textarea>
                        </div>


                        <div class="form-group mb-4">
                            <label style="color:black;" for="door">دروازه ورودی</label>
                            <select name="door" id="door" class="form-control">
                                <option value="انتخاب نمایید!"></option>
                                <option value="دروازه آریانا">دروازه آریانا</option>
                                <option value="دروازه غزنی">دروازه غزنی</option>
                            </select>
                        </div>

                        <input type="submit" value="ثبت مهمان" class="mt-4 mb-4 btn btn-primary">
                    </form>

                </div>
            </div>


            <div class="col-xl-6 col-lg-6 col-sm-6 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <br>
                    <h4 style="text-align: center;" class="text-primary">لست مهمان های دعوت شده امروز</h4>
                    <br>
                    <form action="{{ route('approve_to_aop') }}" method="post" onsubmit="if(confirm('آیا میخواهید ارسال کنید؟')){return ture;}else{return false}">
                        @csrf
                        <div class="table-responsive mb-4 mt-4">
                            <table  class="table table-hover table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th style="width: 2%;">شماره</th>
                                    <th style="width: 25%;">اسم مهمان</th>
                                    <th style="width: 25%;">عنوان وظیفه</th>
                                    <th style="width: 45%;">اداره</th>
                                    <th style="">حذف</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($guest as $gu)
                                    <input type="hidden" name="guest_ids[]" value="{{$gu->guest_id}}">
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td style="font-weight: bold;color: black;">{{ $gu->guest_name }}</td>
                                        <td style="font-weight: bold;color: black;">{{ $gu->guest_position }}</td>
                                        <td style="font-weight: bold;color: black;">{{ $gu->organization_name }}</td>
                                        <td><a href="{{ route('remove_guest',$gu->guest_id) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?"><span class="fa fa-trash" style="font-size : 20px;"></span></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <input type="submit" value="تایید و ارسال مهمان ها به ریاست دفتر" class="mt-4 mb-4 btn btn-primary">
                    </form>

                </div>
            </div>

        </div>

    </div>


@stop


@section('footer_scripts')

@endsection

