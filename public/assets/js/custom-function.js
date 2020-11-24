function addorganizationfun() {
    event.preventDefault();
    $('#add_organization_model').modal();
}

function editorganizationfun(i) {

    event.preventDefault();
    $('#edit_organization_model').modal();
    var organizationid = i;

    $.ajax({
        type: 'GET',
        url: 'organization_data/'+organizationid,
        success: function(data){
            if(data !== ""){
                $.each(data,function (index,$exists) {
                    $('#organizationid').val($exists.organization_id);
                    $('#organizationname').val($exists.organization_name);
                });
            }
        }
    });


}

/////////// deputy /////////////////

function adddeputyfun() {
    event.preventDefault();
    $('#add_deputy_model').modal();
}

function editdeputyfun(i) {

    event.preventDefault();
    $('#edit_deputy_model').modal();
    var deputyid = i;

    $.ajax({
        type: 'GET',
        url: 'deputy_data/'+deputyid,
        success: function(data){
            if(data !== ""){
                $.each(data,function (index,$exists) {
                    $('#deputyid').val($exists.deputy_id);
                    $('#deputyname').val($exists.deputy_name);
                });
            }
        }
    });
}

/////////////////directory//////

function adddirectoryfun() {
    event.preventDefault();
    $('#add_directory_model').modal();
}

function editdirectoryfun(i) {

    event.preventDefault();
    $('#edit_directory_model').modal();
    var directroyid = i;

    $.ajax({
        type: 'GET',
        url: 'directory_data/'+directroyid,
        success: function(data){
            if(data !== ""){
                $.each(data,function (index,$exists) {
                    $('#directoryid').val($exists.directorate_id);
                    $('#directoryname').val($exists.directorate_name);
                    $('#deputyid').val($exists.deputy_id);
                });
            }
        }
    });
}


/////////////////meeting_rooms//////

function addmeetinfroomfun() {
    event.preventDefault();
    $('#add_meeting_room_model').modal();
}

function editmeetingroomfun(i) {

    event.preventDefault();
    $('#edit_meeting_room_model').modal();
    var meetingroomid = i;

    $.ajax({
        type: 'GET',
        url: 'meeting_room_data/'+meetingroomid,
        success: function(data){
            if(data !== ""){
                $.each(data,function (index,$exists) {
                    $('#meetingroomid').val($exists.meeting_room_id);
                    $('#name').val($exists.name);
                    $('#capacity').val($exists.capacity);
                    $('#building').val($exists.building);
                    $('#floor').val($exists.floor);
                    $('#room_number').val($exists.room_number);
                    $('#more_info').val($exists.more_info);
                });
            }
        }
    });
}