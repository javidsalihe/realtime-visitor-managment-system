@extends('layouts.master')
@section('title')
    ثبت جلسه
@stop
@section('header')
    <style>
        form {
            display: inline;
        }
    </style>
@endsection
@section('content')

    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
        <div class="modal-dialog" role="document" style="width:50%;">
            <div class="modal-content" >

                <form class="" method="POST" action="">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <input type="hidden" name="room" value="" id="room">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">ثبت جلسه</h4>
                    </div>


                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label text-info title">عنوان</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="عنوان را وارد کنید" required autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start" class="control-label title text-info">زمان شروع</label>
                                    <input type="text" name="start" class="form-control" id="start" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end" class="control-label text-info title">زمان ختم</label>
                                    <input type="text" name="end" class="form-control" id="end" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" >
                                    <label for="" class="control-label text-info title">اعضای جلسه (کارمندان)</label>
                                    <select class="form-control" id="addInPart" multiple name="in_participants[]" required style="width: 100%;">
                                        {{--@foreach($selectIn as $selectI)--}}
                                            {{--<option value="{{$selectI->id}}">{{$selectI->first_name}}</option>--}}
                                        {{--@endforeach--}}
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label text-info title">اشخاص بیرونی در جلسه</label>
                                    <select class="form-control" id="addOutPart" multiple name="out_participants[]" style="width: 100%;">
                                        {{--@foreach($selectOut as $selectO)--}}
                                            {{--<option value="{{$selectO->guest_id}}">{{$selectO->guest_name}}</option>--}}
                                        {{--@endforeach--}}
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label title text-info">آجندا</label>
                                    <textarea class="form-control" placeholder="آجندا جلسه را بنویسد" name="agenda" rows="5" ></textarea>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                        <button type="submit" class="btn btn-primary">ثبت</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <div id="calendar" class="col-centered" style="direction: ltr;text-align: left;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop


@section('footer_scripts')


    <script>

        $(function() {

            $('#calendar').fullCalendar({

                schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
                isRTL:true,
                aspectRatio: 1.8,
                scrollTime: '06:00',
                resourceAreaWidth: '20%',
                eventLimit: true,
                selectable: true,
                selectHelper: true,
                slotDuration: "00:15:00",
                buttonText:{
                    today:    'امروز',
                    month:    'ماه',
                    week:     'هفته',
                    day:      'روز',
                    list:     'لیست جلسه های هفته',
                    agendaDay:'روز'
                },

                header: {
                    left: 'today prev,next',
                    center: 'title',
                    right: 'timelineDay,listWeek,month'
                },

//                defaultView: 'timelineDay',
                select: function(start, end, event, view, resource) {
                    $("#ModalAdd #room").val(resource.id);
                    $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd').modal('show');



                },

                eventRender: function(event, element) {


                    element.bind('dblclick', function() {

                        {{--if(event.mng=={!! Sentinel::getUser()->id !!}){--}}
                            event.editable = true;
                            $('#ModalEdit #meetingid_title').val(event.meeting_id);
                            $('#ModalEdit #meetingid_inpart').val(event.meeting_id);
                            $('#ModalEdit #meetingid_outpart').val(event.meeting_id);

                            $('#ModalEdit #dlt').val(event.meeting_id);

                            $("#in_part").empty();
                            $("#out_part").empty();
                            $.ajax({type:"POST",
                                {{--url: "{{ route("Admin_giveMeeting") }}",--}}
                                data:{id:event.meeting_id,_token:"{{ Session::token() }}"},
                                success: function(data){

                                    if (data==""){
                                        alert("پیدا نشد!");
                                    }else{

                                        $.each(data['result'],function (index,result) {
                                            $('#ModalEdit #edittitle').val(result.title);
                                            $('#ModalEdit #editagenda').val(result.agenda);
                                        });

                                        $.each(data['inpart'],function (index,inpart) {
                                            $("#ModalEdit #in_part").append("<option value='"+inpart.id +"' selected>"+inpart.first_name+"</option>");
                                        });

                                        $.each(data['user'],function (index,user) {
                                            $("#ModalEdit #in_part").append("<option value='"+user.id +"'>"+user.first_name+"</option>");
                                        });

                                        $.each(data['outpart'],function (index,outpart) {
                                            $("#ModalEdit #out_part").append("<option value='"+outpart.guest_id +"' selected>"+outpart.guest_name+"</option>");
                                        });

                                        $.each(data['guest'],function (index,guest) {
                                            $("#ModalEdit #out_part").append("<option value='"+guest.guest_id +"'>"+guest.guest_name+"</option>");
                                        });

                                    }
                                }});

                            $('#ModalEdit').modal('show');
//                        }else {
                            $('#Modalshow #owner').val(event.owner);
                            $("#show_in_part").empty();
                            $("#show_out_part").empty();
                            $.ajax({type:"POST",
{{--                                url: "{{ route("Admin_giveMeeting") }}",--}}
                                data:{id:event.meeting_id,_token:"{{ Session::token() }}"},
                                success: function(data){

                                    if (data==""){
                                        alert("پیدا نشد!");
                                    }else{

                                        $.each(data['result'],function (index,result) {
                                            $('#Modalshow #showtitle').val(result.title);
                                            $('#Modalshow #showagenda').val(result.agenda);
                                        });

                                        $.each(data['inpart'],function (index,inpart) {
                                            $("#Modalshow #show_in_part").append("<option value='"+inpart.id +"' selected>"+inpart.first_name+"</option>");
                                        });

                                        $.each(data['user'],function (index,user) {
                                            $("#Modalshow #show_in_part").append("<option value='"+user.id +"'>"+user.first_name+"</option>");
                                        });

                                        $.each(data['outpart'],function (index,outpart) {
                                            $("#Modalshow #show_out_part").append("<option value='"+outpart.guest_id +"' selected>"+outpart.guest_name+"</option>");
                                        });

                                        $.each(data['guest'],function (index,guest) {
                                            $("#Modalshow #show_out_part").append("<option value='"+guest.guest_id +"'>"+guest.guest_name+"</option>");
                                        });

                                    }
                                }});


                            $('#Modalshow').modal('show');
//                        }


                    });

                },

                eventOverlap: function(stillEvent, movingEvent) {
                    return stillEvent.allDay && movingEvent.allDay;
                },

                selectOverlap: function(event) {
                    return event.rendering === 'background';
                },

                eventDrop: function(event, delta, revertFunc) { // si changement de position

                    edit(event);

                },
                eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

                    edit(event);

                },


                resourceLabelText: 'سالون جلسات',
                resources: [

                    @foreach($meeting_room as $room)
                    {!! "{ id:'".$room->meeting_room_id."',title:'".$room->name."'}" !!},
                    @endforeach
                ],

                resourceRender: function(resourceObj, labelTds, bodyTds) {
                    labelTds.css({'font-weight':'bold','color':'#800080'});
                },

                events: [

                    {{--@foreach($selectMeeting as $meeting)--}}
                    {{--<?php $col='';$bol=false; ?>--}}
                    {{--@if(Sentinel::getUser()->id==$meeting->id)--}}
                    {{--<?php $col='#6495ED';$bol=true; ?>--}}
                    {{--@endif--}}
                    {{--{!! "{ meeting_id:'".$meeting->meeting_id."',resourceId:'".$meeting->meeting_room_id."',start:'".$meeting->start_date."',end:'".$meeting->end_date."',title:'".$meeting->title."',mng:'".$meeting->id."',owner:'".$meeting->first_name." ".$meeting->last_name."',color:'".$col."',editable:'".$bol."'}" !!},--}}
                    {{--@endforeach--}}

                    //                    { meeting_id: '1', resourceId: 'b', start: '2017-05-07T02:00:00', end: '2017-05-07T07:00:00', title: 'event 1' },
                    //                    { meeting_id: '2', resourceId: 'c', start: '2017-05-07T05:00:00', end: '2017-05-07T22:00:00', title: 'event 2' },
                    //                    { meeting_id: '3', resourceId: 'd', start: '2017-05-06', end: '2017-05-08', title: 'event 3' },
                    //                    { meeting_id: '4', resourceId: 'e', start: '2017-05-07T03:00:00', end: '2017-05-07T08:00:00', title: 'event 4' },
                    //                    { meeting_id: '5', resourceId: 'f', start: '2017-05-07T00:30:00', end: '2017-05-07T02:30:00', title: 'event 5' }
                ]
            });

        });

    </script>


@endsection

