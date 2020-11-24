<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\DeputyController;
use App\Http\Controllers\DirectorateController;
use App\Http\Controllers\MeetingRoomController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;



Auth::routes();

Route::get('/',[HomeController::class,'index'])->name('/');

Route::get('logout', function(){
    Auth::logout();
    return redirect('login');
});

Route::group(['middleware' => ['auth']], function () {

Route::group(['middleware' => ['AdminMiddleware']], function () {


//organization routes
    Route::resource('organizations',OrganizationController::class);
    Route::get('organization_data/{organizationid}',[OrganizationController::class,'OrganizationData']);
    Route::post('update_organization',[OrganizationController::class,'UpdateOrganization'])->name('update_organization');

//deputies
    Route::resource('deputies',DeputyController::class);
    Route::get('deputy_data/{deputyid}',[DeputyController::class,'DeputyData']);
    Route::post('update_deputy',[DeputyController::class,'UpdateDeputy'])->name('update_deputy');


// directorateis
    Route::resource('directories',DirectorateController::class);
    Route::get('directory_data/{directoryid}',[DirectorateController::class,'directoryData']);
    Route::post('update_directory',[DirectorateController::class,'UpdateDirectory'])->name('update_directory');


// meetings
    Route::resource('meeting_rooms',MeetingRoomController::class);
    Route::get('meeting_room_data/{meetingid}',[MeetingRoomController::class,'MeetingRoomData']);
    Route::post('update_meeting_room',[MeetingRoomController::class,'UpdateMeetingRoom'])->name('update_meeting_room');


//users
    Route::resource('users',UserController::class);


//guest
Route::get('guest_form',[GuestController::class,'GuestForm'])->name('guest_form');
Route::post('store_guest',[GuestController::class,'StoreGuest'])->name('store_guest');
Route::get('remove_guest/{id}',[GuestController::class,'RemoveGuest'])->name('remove_guest');
Route::post('approve_to_aop',[GuestController::class,'ApproveToAop'])->name('approve_to_aop');


//calender
    Route::get('calendar',[CalendarController::class,'Calendar'])->name('calendar');
});

});





