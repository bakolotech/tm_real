$(function () {
    // Apply the plugin
    var notifications = $('#notifications');
    $('#animals').on("optionselected", function(e) {
        createNotification("selected", e.detail.label);
    });
    $('#animals').on("optiondeselected", function(e) {
        createNotification("deselected", e.detail.label);
    });
    function createNotification(event,label) {
        var n = $(document.createElement('span'))
            .text(event + ' ' + label + "  ")
            .addClass('notification')
            .appendTo(notifications)
            .fadeOut(3000, function() {
                n.remove();
            });
    }
    var shapes = $('#shapes').filterMultiSelect({
        selectAllText: 'all...',
        placeholderText: 'click to select a shape',
        filterText: 'search',
        caseSensitive: true,
    });
    var cars = $('#cars').filterMultiSelect();
    var pl1 = $('#programming_languages_1').filterMultiSelect();
    $('#b1').click((e) => {
        pl1.enableOption("1");
    });
    $('#b2').click((e) => {
        pl1.disableOption("1");
    });
    var pl2 = $('#programming_languages_2').filterMultiSelect();
    $('#b3').click((e) => {
        pl2.enable();
    });
    $('#b4').click((e) => {
        pl2.disable();
    });
    var pl3 = $('#programming_languages_3').filterMultiSelect({
        allowEnablingAndDisabling: false,
    });
    $('#b5').click((e) => {
        pl3.enableOption("1");
    });
    $('#b6').click((e) => {
        pl3.disableOption("1");
    });
    $('#b7').click((e) => {
        pl3.enable();
    });
    $('#b8').click((e) => {
        pl3.disable();
    });
    var cities = $('#cities').filterMultiSelect({
        items: [["San Francisco","a"],
            ["Milan","b",false,true],
            ["Singapore","c",true],
            ["Berlin","d",true,true],
        ],
    });
    $('#jsonbtn1').click((e) => {
        var b = true;
        $('#jsonresult1').text(JSON.stringify(getJson(b),null,"  "));
    });
    var getJson = function (b) {
        var result = $.fn.filterMultiSelect.applied
            .map((e) => JSON.parse(e.getSelectedOptionsAsJson(b)))
            .reduce((prev,curr) => {
                prev = {
                    ...prev,
                    ...curr,
                };
                return prev;
            });
        return result;
    }
    $('#jsonbtn2').click((e) => {
        var b = false;
        $('#jsonresult2').text(JSON.stringify(getJson(b),null,"  "));
    });
    $('#form').on('keypress keyup', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
});
