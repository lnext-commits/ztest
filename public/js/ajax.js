function editMainRow(id) {
    $('.dropdown').hide();
    $.ajax({
        type: "POST",
        url: "/ajax/editMain",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id: id
        }
    })
        .done(function (report) {
            $('#row' + id).html(report);
            artSelect();
        });
}
function saveMainRow(id) {
    $('.dropdown').show();
    $.ajax({
        type: "POST",
        url: "/ajax/saveMain",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id: id,
            d: $('#d').val(),
            invoice: $('#invoice').val(),
            art: $('#art').val(),
            outgo: $('#outgo').val(),
            cash: $('#cash').val(),
            comment: $('#comment').val()
        }
    })
        .done(function (report) {
            $('#row' + id).html(report);
            getSumInvoice(id)
        });
}
function getSumInvoice(idMain) {
    $.ajax({
        type: "POST",
        url: "/ajax/getSumInvoice",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            idMain: idMain
        }
    })
        .done(function (report) {
            $('#cashInvoice').html(report);
        });
}
function artSelect() {
    $('#art').on('keyup change drop paste',function(){
        $.ajax({
            type: "POST",
            url: "/ajax/getOutgo",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                artId: $(this).val()
            }
        })
            .done(function (report) {
                $('#boxSelectOutgo').html(report);
            });

    });
}
function getContactAncestor(pupilId) {
    $.ajax({
        type: "POST",
        url: "/ajax/getContactAncestor",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            pupilId: pupilId
        }
    })
        .done(function (report) {
            $('#contactAncestor').html(report);
        });
}
function getInfoDWN() {
    $('.card-body').html(' <div class="spinner-border text-success" role="status"><span class="sr-only">Loading...</span></div>');
    $.ajax({
        type: "POST",
        url: "/ajax/getInfoDWN",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        }
    })
        .done(function (report) {
            $('.card-body').html(report);
        });
}
function getInfoOutgo(artId) {
    $('#boxOutgo'+artId).html(' <div class="spinner-border text-success" role="status"><span class="sr-only">Loading...</span></div>');
    $.ajax({
        type: "POST",
        url: "/ajax/getInfoOutgo",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            artId: artId
        }
    })
        .done(function (report) {
            $('#boxOutgo'+artId).html(report);
        });
}
