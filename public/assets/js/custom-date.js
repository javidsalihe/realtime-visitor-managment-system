$(document).ready(function () {

    var today_date = new  Date();
    var p = new persianDate();


    $("#visit_date").persianDatepicker({
        cellWidth: 34,
        cellHeight: 30,
        fontSize: 13,
        formatDate: "YYYY-0M-0D",
        selectedBefore: !0
    });

    $('#visit_date,#visit_time').keypress(function () {
        $(this).prop('readonly',true);
    });




    $("#sdsh  ,#edsh, #dss1, #des1, #dss2, #des2, #dss3, #des3, #dss4, #des4").persianDatepicker({
        cellWidth: 34,
        cellHeight: 30,
        fontSize: 13,
        formatDate: "YYYY-0M-0D",
        startDate: p.now().addDay(0).toString("YYYY/MM/DD"),
        endDate: p.now().addYear(2).toString("YYYY/MM/DD")
    });

    $(".SH").persianDatepicker({
        cellWidth: 34,
        cellHeight: 30,
        fontSize: 13,
        formatDate: "YYYY-0M-0D",
    });


    // $(function() {
    //     $(".ME,#sdme ,#edme,#dsm1, #dem1,#dsm2, #dem2,#dsm3, #dem3,#dsm4, #dem4 ,.instructiondateu").datepicker({
    //         dateFormat: 'yy-mm-dd',
    //         minDate: today_date,
    //         changeMonth :true,
    //         changeYear : true
    //     });
    // });

});
