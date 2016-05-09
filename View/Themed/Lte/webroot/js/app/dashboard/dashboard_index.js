$.ajax({
    type: "GET",
    dataType: 'json',
    url: __base_url+"dashboard/ajax_chart"

}).done(function (data) {

    var count_data = data.length;

    if (count_data > 0) {

        Morris.Bar({
            element: 'bar-chart',
            data: data,
            resize: true,
            hideHover: 'auto',
            xLabelMargin: 2,
            xkey: 'dt',
            ykeys: ['vo', 'vs'],
            labels: ['Open', 'Submit'],
            yLabelFormat: function (y) {
                return y != Math.round(y) ? '' : y;
            }
        });

    }

}).fail(function () {
    alert("Error occured!");
});


/*Morris.Bar({
            element: 'bar-chart',
            data: [
                { y: '13/04/2016', a: 100, b: 90 },
                { y: '13/04/2016', a: 50, b: 20 }
            ],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Submit', 'Closed']
        });*/