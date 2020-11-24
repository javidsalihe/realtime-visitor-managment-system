    $(document).ready(function () {





        $('#organizationlist').DataTable({
            "stripeClasses": [],
            "responsive": true,
            "pageLength":4,
            oLanguage: {
                sSearch: "جستجوی عمومی",
                sSearchPlaceholder: "جستجو ....",
                sLengthMenu: "نمایش _MENU_ ریکارد",
                sZeroRecords: "ریکاردی موجود نیست.",
                sLoadingRecords: "لطفا منتظر باشید!",
                sInfo: "مجموعه ریکارد ها _TOTAL_",
                "sInfoFiltered": "(نتیجه جستجو از  _MAX_ ریکارد)",
                sLengthMenu: 'انتخاب <select class="form-control">'+
                '<option value="5">5</option>'+
                '<option value="10">10</option>'+
                '<option value="20">20</option>'+
                '<option value="30">30</option>'+
                '<option value="40">40</option>'+
                '<option value="-1">همه</option>'+
                '</select> ریکارد',
                oPaginate: {
                    sPrevious: "قبلی",
                    sNext: "بعدی",
                }
            },

            initComplete: function () {
                var j = 0;
                this.api().columns().every(function () {
                    var column = this;
                    if(j=== 1)
                    {
                        var column = this;
                        var input ="<input type='text' class='form-control' placeholder='نام اداره را وارد نماید!'>";
                        $(input).appendTo($(column.footer()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                column.search(val ? val : '', true, false).draw(false);
                            });
                    }

                    j++;
                });
            },
        });


        $('#deputylist').DataTable({
            "stripeClasses": [],
            "responsive": true,
            "pageLength":4,
            oLanguage: {
                sSearch: "جستجوی عمومی",
                sSearchPlaceholder: "جستجو ....",
                sLengthMenu: "نمایش _MENU_ ریکارد",
                sZeroRecords: "ریکاردی موجود نیست.",
                sLoadingRecords: "لطفا منتظر باشید!",
                sInfo: "مجموعه ریکارد ها _TOTAL_",
                "sInfoFiltered": "(نتیجه جستجو از  _MAX_ ریکارد)",
                sLengthMenu: 'انتخاب <select class="form-control">'+
                '<option value="5">5</option>'+
                '<option value="10">10</option>'+
                '<option value="20">20</option>'+
                '<option value="30">30</option>'+
                '<option value="40">40</option>'+
                '<option value="-1">همه</option>'+
                '</select> ریکارد',
                oPaginate: {
                    sPrevious: "قبلی",
                    sNext: "بعدی",
                }
            },

            initComplete: function () {
                var j = 0;
                this.api().columns().every(function () {
                    var column = this;
                    if(j=== 1)
                    {
                        var column = this;
                        var input ="<input type='text' class='form-control' placeholder='اسم معاونیت را وارد نماید!'>";
                        $(input).appendTo($(column.footer()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                column.search(val ? val : '', true, false).draw(false);
                            });
                    }

                    j++;
                });
            },
        });


        $('#directorylist').DataTable({
            "stripeClasses": [],
            "responsive": true,
            "pageLength":4,
            oLanguage: {
                sSearch: "جستجوی عمومی",
                sSearchPlaceholder: "جستجو ....",
                sLengthMenu: "نمایش _MENU_ ریکارد",
                sZeroRecords: "ریکاردی موجود نیست.",
                sLoadingRecords: "لطفا منتظر باشید!",
                sInfo: "مجموعه ریکارد ها _TOTAL_",
                "sInfoFiltered": "(نتیجه جستجو از  _MAX_ ریکارد)",
                sLengthMenu: 'انتخاب <select class="form-control">'+
                '<option value="5">5</option>'+
                '<option value="10">10</option>'+
                '<option value="20">20</option>'+
                '<option value="30">30</option>'+
                '<option value="40">40</option>'+
                '<option value="-1">همه</option>'+
                '</select> ریکارد',
                oPaginate: {
                    sPrevious: "قبلی",
                    sNext: "بعدی",
                }
            },

            initComplete: function () {
                var j = 0;
                this.api().columns().every(function () {
                    var column = this;
                    if(j=== 1 || j=== 2)
                    {
                        var column = this;
                        var input = '<input type="text" class="form-control"  />';
                        $(input).appendTo($(column.footer()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                column.search(val ? val : '', true, false).draw(false);
                            });
                    }

                    j++;
                });
            },
        });

    });


    $('#meetingroomlist').DataTable({
        "stripeClasses": [],
        "responsive": true,
        "pageLength":4,
        oLanguage: {
            sSearch: "جستجوی عمومی",
            sSearchPlaceholder: "جستجو ....",
            sLengthMenu: "نمایش _MENU_ ریکارد",
            sZeroRecords: "ریکاردی موجود نیست.",
            sLoadingRecords: "لطفا منتظر باشید!",
            sInfo: "مجموعه ریکارد ها _TOTAL_",
            "sInfoFiltered": "(نتیجه جستجو از  _MAX_ ریکارد)",
            sLengthMenu: 'انتخاب <select class="form-control">'+
            '<option value="5">5</option>'+
            '<option value="10">10</option>'+
            '<option value="20">20</option>'+
            '<option value="30">30</option>'+
            '<option value="40">40</option>'+
            '<option value="-1">همه</option>'+
            '</select> ریکارد',
            oPaginate: {
                sPrevious: "قبلی",
                sNext: "بعدی",
            }
        },

        initComplete: function () {
            var j = 0;
            this.api().columns().every(function () {
                var column = this;
                if(j=== 1 || j=== 2 || j=== 3 || j=== 4 || j=== 5)
                {
                    var column = this;
                    var input = '<input type="text" class="form-control" />';
                    $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? val : '', true, false).draw(false);
                        });
                }

                j++;
            });
        },
    });
