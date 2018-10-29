var records = {};
var selectedRecords = [];

$(function() {
    var items = $('.record-list-item');
    items.each(function(index) {
        var elem = $(this);
        var recId = elem.attr('record-id');
        var recName = elem.attr('record-name');
        var recArtist = elem.attr('record-artist');

        records[recId] = {
            element: elem,
            id: recId,
            artist: recArtist,
            name: recName
        };
    });

    function updateSelectedRecords() {
        var elem = $('#selected-records');
        var wh = $(window).height();

        elem.css("height", wh - 290);
        elem.html("");
        selectedRecords.forEach(element => {
            var d = $('<div class="selected-records-entry"></div>');
            d.append('<strong>' + element.artist + '</strong>: ' + element.name);
            d.append('<span style="float:right;" class="remove-selected-records-entry-button" record-id="' + element.id + '">x</span>')
            elem.append(d);
        });

        $('.remove-selected-records-entry-button').each(function(index) {
            var recId = $(this).attr('record-id');
            $(this).on('click', function() {
                records[recId].element.show();
                for(var i = 0; i < selectedRecords.length; i++) {
                    if(selectedRecords[i].id == recId) {
                        selectedRecords.splice(i, 1);
                        break;
                    }
                }
                updateSelectedRecords();
            });
        });
    }

    $('#all-records-to-list-add-button').on('click', function() {
        selectedRecords = [];
        for (var key in records) {
            if (records.hasOwnProperty(key)) {
                var rec = records[key];
                selectedRecords.push(rec);
                rec.element.hide();
            }
        }
        updateSelectedRecords();
    });

    $('.record-to-list-add-button').on('click', function() {
        var recId = $(this).attr('record-id');
        var rec = records[recId];
        selectedRecords.push(rec);
        records[recId].element.hide();
        updateSelectedRecords();
    });

    $('#list-create-button').on('click', function() {
        var btns = $('.record-to-list-add-button');
        btns.each(function(index) {
            $(this).show();
        });
        var rBtns = $('.delete-record-button');
        rBtns.each(function(index) {
            $(this).hide();
        });
        $('#record-add-div').hide();
        $('#list-create-button').hide();
        $('.new-list-info').show();

        updateSelectedRecords();
    });

    $('#list-save-button').on('click', function() {
        var name = $('#list-name').val();
        var recordIds = [];
        selectedRecords.forEach(function(elem) {
            recordIds.push(elem.id);
        });

        if(name && recordIds.length > 0) {
            $.post(newListURL, { 'new-list': { name: name, records: recordIds }})
                .done(function(data) {
                    window.location = showListURL + data;
                })
        }
    });


    // Make the actions div scroll with the view
    $(window).scroll(function() {
        if($(this).scrollTop() > 100)
            $('.page-actions').css('top', $(this).scrollTop() - 100);
    });

    var mw = $(".record-list").innerWidth();
    console.log($(".record-list").innerWidth());
    var its = $(".record-list-info");
    its.each(function() {
        $(this).css("width", mw - 60);
    });
    console.log($($(".record-list-info")[0]).innerWidth());
});