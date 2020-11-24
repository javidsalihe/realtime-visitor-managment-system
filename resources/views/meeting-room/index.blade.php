@extends('layouts.master')
@section('title')
   لست اتاق جلسات
@stop
@section('header')
    <style>
        form {
            display: inline;
        }
    </style>
@endsection
@section('content')


    <div class="modal fade" id="add_meeting_room_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('meeting_rooms.store') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle" style="font-weight: bold;">علاوه نمودن اتاق جلسه</h5>
                    </div>
                    <div class="modal-body">

                        <div class="form-group mb-3">
                            <label for="name">اسم اتاق جلسه</label>
                            <input type="text"  name="name" class="form-control" id="" required autofocus  />
                        </div>

                        <div class="form-group mb-3">
                            <label for="room_number">نمبر اتاق جلسه</label>
                            <input type="number"  name="room_number" class="form-control" id="" required    />
                        </div>


                        <div class="form-group mb-3">
                            <label for="building">تعمیر</label>
                            <input type="text"  name="building" class="form-control" id="" required />
                        </div>

                        <div class="form-group mb-3">
                            <label for="floor">طبقه</label>
                            <input type="number"  name="floor" class="form-control" id="" required  >
                        </div>

                        <div class="form-group mb-3">
                            <label for="capacity">گنجایش اتاق جلسه</label>
                            <input type="number"  name="capacity" class="form-control" id="" required />
                        </div>


                        <div class="form-group mb-3">
                            <label for="">معلومات اضافی</label>
                            <textarea name="more_info" id="" class="form-control" cols="60" rows="5" style="resize: none;"></textarea>
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

    <div class="modal fade" id="edit_meeting_room_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('update_meeting_room') }}" method="post">
                    @csrf
                    <input type="hidden" name="meetingroomid" id="meetingroomid">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle" style="font-weight: bold;">آپدیت اتاق جلسه </h5>
                    </div>
                    <div class="modal-body">


                        <div class="form-group mb-3">
                            <label for="name">اسم اتاق جلسه</label>
                            <input type="text"  name="name" class="form-control" id="name" required autofocus  />
                        </div>

                        <div class="form-group mb-3">
                            <label for="room_number">نمبر اتاق جلسه</label>
                            <input type="text"  name="room_number" class="form-control" id="room_number" required    />
                        </div>


                        <div class="form-group mb-3">
                            <label for="building">تعمیر</label>
                            <input type="text"  name="building" class="form-control" id="building" required />
                        </div>

                        <div class="form-group mb-3">
                            <label for="floor">طبقه</label>
                            <input type="number"  name="floor" class="form-control" id="floor" required  >
                        </div>

                        <div class="form-group mb-3">
                            <label for="capacity">گنجایش اتاق جلسه</label>
                            <input type="number"  name="capacity" class="form-control" id="capacity" required />
                        </div>


                        <div class="form-group mb-3">
                            <label for="more_info">معلومات اضافی</label>
                            <textarea name="more_info" id="more_info" class="form-control" cols="60" rows="5" style="resize: none;"></textarea>
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
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <button class="btn btn-info mb-4 mr-2 btn-sm btn-rounded"><a onclick="addmeetinfroomfun()" style="color: white;">اضافه نمودن اتاق جلسه جدید</a></button>
                    <div class="table-responsive mb-4 mt-4">
                        <table id="meetingroomlist" class="table table-hover table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>شماره</th>
                                <th>اسم اتاق جلسه</th>
                                <th>نمبر اتاق جلسه</th>
                                <th>تعمیر</th>
                                <th>منزل</th>
                                <th>گنجایش</th>
                                <th>معلومات اضافی</th>
                                <th>آپدیت</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($meeting_room_list as $meeting)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td style="font-weight: bold;color: black;">{{ $meeting->name }}</td>
                                    <td style="font-weight: bold;color: black;">{{ $meeting->room_number }}</td>
                                    <td style="font-weight: bold;color: black;">{{ $meeting->building }}</td>
                                    <td style="font-weight: bold;color: black;">{{ $meeting->floor }}</td>
                                    <td style="font-weight: bold;color: black;">{{ $meeting->capacity }}</td>
                                    <td style="font-weight: bold;color: black;">{{ $meeting->more_info }}</td>
                                    <td>
                                        <button class="btn btn-success mb-4 mr-2 btn-sm btn-rounded"><a href="" onclick="editmeetingroomfun({{ $meeting->meeting_room_id  }})" style="color: white;">آپدیت</a></button>
                                        <form action="{{ route('meeting_rooms.destroy',$meeting->meeting_room_id) }}" method="post">
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
                                <td></td>
                                <td></td>
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

