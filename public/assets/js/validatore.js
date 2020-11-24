$(document).ready(function () {

    $('#num').on('keypress', function(event){
        return (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 1776 && event.charCode <= 1785);
    });

    // $('#num').change(function () {
    //
    //     $('#erorr_phone_message').empty();
    //     var phone_number = $(this).val();
    //     var phone_number_length = phone_number.length;
    //
    //     if(phone_number_length >20 || phone_number_length<10){
    //
    //         $('#erorr_phone_message').empty();
    //         $('#erorr_phone_message').append('<div class="badge bg-danger">طول شماره تماس غیر حقیقی است!</div>');
    //         $('#num').focus();
    //         $('#num').css('border', '5px solid darkred');
    //         $('input:submit').attr('disabled',true);
    //
    //     }else{
    //         $('input:submit').attr('disabled',false);
    //         $('#num').css('border', '5px solid green');
    //     }
    //
    //
    // });

});



// $(function(){
//     $('#mf_agreement').on('change', function(e) {
//
//         $('#erorr_file_message').empty();
//         let file = document.getElementById("mf_agreement").files[0];
//         var filesize = file.size / 1024 / 1024; // in MB
//
//         var fileInput = document.getElementById('mf_agreement');
//         var filePath = fileInput.value;
//         var allowedExtensions = /(\.txt|\.pdf|\.png|\.docx)$/i;
//         if (filesize > 1 || !allowedExtensions.exec(filePath)) {
//
//             $('#erorr_file_message').empty();
//             $('#erorr_file_message').append('<div class="badge bg-danger">سایز فایل بزرگ بوده و یا فارمت درست نمیباشد</div>');
//             $('input:submit').attr('disabled',true);
//         }
//         else{
//             $('input:submit').attr('disabled',false);
//         }
//     });
// });
// $(function(){
//     $('#host_country_invitation').on('change', function(e) {
//
//         $('#erorr_file_message2').empty();
//         let file = document.getElementById("host_country_invitation").files[0];
//         var filesize = file.size / 1024 / 1024; // in MB
//
//         var fileInput = document.getElementById('host_country_invitation');
//         var filePath = fileInput.value;
//         var allowedExtensions = /(\.txt|\.pdf|\.png|\.docx)$/i;
//         if (filesize > 1 || !allowedExtensions.exec(filePath)) {
//
//             $('#erorr_file_message2').empty();
//             $('#erorr_file_message2').append('<div class="badge bg-danger">سایز فایل بزرگ بوده و یا فارمت درست نمیباشد</div>');
//             $('input:submit').attr('disabled',true);
//
//         }
//         else{
//             $('input:submit').attr('disabled',false);
//         }
//     });
// });
// $(function(){
//     $('#health_form').on('change', function(e) {
//
//         $('#erorr_file_message3').empty();
//         let file = document.getElementById("health_form").files[0];
//         var filesize = file.size / 1024 / 1024; // in MB
//
//         var fileInput = document.getElementById('health_form');
//         var filePath = fileInput.value;
//         var allowedExtensions = /(\.txt|\.pdf|\.png|\.docx)$/i;
//         if (filesize > 1 || !allowedExtensions.exec(filePath)) {
//
//             $('#erorr_file_message3').empty();
//             $('#erorr_file_message3').append('<div class="badge bg-danger">سایز فایل بزرگ بوده و یا فارمت درست نمیباشد</div>');
//             $('input:submit').attr('disabled',true);
//
//         }
//         else{
//             $('input:submit').attr('disabled',false);
//         }
//     });
// });
//
// // province file upload
// $(function(){
//     $('#P_report1').on('change', function(e) {
//
//         $('#erorr_file_province_message1').empty();
//         let file = document.getElementById("P_report1").files[0];
//
//         var filesize = file.size / 1024 / 1024; // in MB
//         var fileInput = document.getElementById('P_report1');
//         var filePath = fileInput.value;
//         var allowedExtensions = /(\.txt|\.pdf|\.png|\.docx)$/i;
//         if (filesize > 1 || !allowedExtensions.exec(filePath)) {
//             $('#erorr_file_province_message1').empty();
//             $('#erorr_file_province_message1').append('<div class="badge bg-danger">سایز فایل بزرگ بوده و یا فارمت درست نمیباشد</div>');
//             $('input:submit').attr('disabled', true);
//         }
//         else{
//             $('input:submit').attr('disabled',false);
//         }
//
//     });
// });
// $(function(){
//     $('#P_report2').on('change', function(e) {
//
//         $('#erorr_file_province_message2').empty();
//         let file = document.getElementById("P_report2").files[0];
//         var filesize = file.size / 1024 / 1024; // in MB
//
//         var fileInput = document.getElementById('P_report2');
//         var filePath = fileInput.value;
//         var allowedExtensions = /(\.txt|\.pdf|\.png|\.docx)$/i;
//         if (filesize > 1 || !allowedExtensions.exec(filePath)) {
//
//             $('#erorr_file_province_message2').empty();
//             $('#erorr_file_province_message2').append('<div class="badge bg-danger">سایز فایل بزرگ بوده و یا فارمت درست نمیباشد</div>');
//             $('input:submit').attr('disabled',true);
//
//         }
//         else{
//             $('input:submit').attr('disabled',false);
//         }
//     });
// });
// $(function(){
//     $('#P_report3').on('change', function(e) {
//
//         $('#erorr_file_province_message3').empty();
//         let file = document.getElementById("P_report3").files[0];
//         var filesize = file.size / 1024 / 1024; // in MB
//
//         var fileInput = document.getElementById('P_report3');
//         var filePath = fileInput.value;
//         var allowedExtensions = /(\.txt|\.pdf|\.png|\.docx)$/i;
//         if (filesize > 1 || !allowedExtensions.exec(filePath)) {
//
//             $('#erorr_file_province_message3').empty();
//             $('#erorr_file_province_message3').append('<div class="badge bg-danger">سایز فایل بزرگ بوده و یا فارمت درست نمیباشد</div>');
//             $('input:submit').attr('disabled',true);
//         }
//         else{
//             $('input:submit').attr('disabled',false);
//         }
//     });
// });
// $(function(){
//     $('#P_report4').on('change', function(e) {
//
//         $('#erorr_file_province_message4').empty();
//         let file = document.getElementById("P_report4").files[0];
//         var filesize = file.size / 1024 / 1024; // in MB
//
//         var fileInput = document.getElementById('P_report4');
//         var filePath = fileInput.value;
//         var allowedExtensions = /(\.txt|\.pdf|\.png|\.docx)$/i;
//         if (filesize > 1 || !allowedExtensions.exec(filePath)) {
//
//             $('#erorr_file_province_message4').empty();
//             $('#erorr_file_province_message4').append('<div class="badge bg-danger">سایز فایل بزرگ بوده و یا فارمت درست نمیباشد</div>');
//             $('input:submit').attr('disabled',true);
//
//         }
//         else{
//             $('input:submit').attr('disabled',false);
//         }
//     });
// });












