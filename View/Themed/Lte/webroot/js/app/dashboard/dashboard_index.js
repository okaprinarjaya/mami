$.ajax({
    type: "GET",
    dataType: 'json',
    url: __base_url+"dashboard/ajax_chart/monthly"

}).done(function (data) {

    var count_data = data.length;

    if (count_data > 0) {

        Morris.Bar({
            element: 'bar-chart-monthly',
            data: data,
            resize: true,
            barColors: ['#317EDA', '#D69A18', '#0A6A40'],
            stacked: true,
            hideHover: 'auto',
            xLabelMargin: 2,
            xkey: 'dt',
            ykeys: ['vo', 'vs', 'vc'],
            labels: ['Open', 'Submit', 'Closed'],
            yLabelFormat: function (y) {
                return y != Math.round(y) ? '' : y;
            }
        });

    }

}).fail(function () {
    alert("Error occured!");
});

$.ajax({
    type: "GET",
    dataType: 'json',
    url: __base_url+"dashboard/ajax_chart/weekly"

}).done(function (data) {

    var count_data = data.length;

    if (count_data > 0) {

        Morris.Bar({
            element: 'bar-chart-weekly',
            data: data,
            resize: true,
            barColors: ['#317EDA', '#D69A18', '#0A6A40'],
            stacked: true,
            hideHover: 'auto',
            xLabelMargin: 2,
            xkey: 'dt',
            ykeys: ['vo', 'vs', 'vc'],
            labels: ['Open', 'Submit', 'Closed'],
            yLabelFormat: function (y) {
                return y != Math.round(y) ? '' : y;
            }
        });

    }

}).fail(function () {
    alert("Error occured!");
});

$.ajax({
    type: "GET",
    dataType: 'json',
    url: __base_url+"dashboard/ajax_chart/daily"

}).done(function (data) {

    var count_data = data.length;

    if (count_data > 0) {

        Morris.Bar({
            element: 'bar-chart-daily',
            data: data,
            resize: true,
            barColors: ['#317EDA', '#D69A18', '#0A6A40'],
            stacked: true,
            hideHover: 'auto',
            xLabelMargin: 2,
            xkey: 'dt',
            ykeys: ['vo', 'vs', 'vc'],
            labels: ['Open', 'Submit', 'Closed'],
            yLabelFormat: function (y) {
                return y != Math.round(y) ? '' : y;
            }
        });

    }

}).fail(function () {
    alert("Error occured!");
});
