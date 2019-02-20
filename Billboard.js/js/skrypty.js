bb.generate({
    bindto: "#wykres1",
    data: {
        columns: [
            ["data1", 50, 200, 100, 170, 150],
            ["data2", 110, 100, 200, 150, 230],
            ["data3", 70, 300, 130, 200, 80]
        ],
        types: {
            data1: "area-spline",
            data2: "line",
            data3: "line"
        },
        colors: {
            data1: "#ffa900",
            data2: "#c62d1d",
            data3: "#1235b9"
        }
    }
});

bb.generate({
    bindto: "#wykres2",
    data: {
        columns: [
            ["data1", 20, 10, 6, 14, 5],
            ["data2", 26, 15, 31, 26, 7],
            ["data3", 47, 18, 47, 17, 5],
            ["data4", 20, 30, 25, 35, 10],
            ["data5", 20, 40, 42, 31, 21]
        ],
        type: "bar",
        colors: {
            data1: "#72a0e5",
            data2: "#9a906b",
            data3: "#bc4b4b",
            data4: "#ffa900",
            data5: "#507e4e"
        }
    },
    axis: {
        y: {
            tick: {
                format: function(x) {
                    return x + '%';
                }
            },
            padding: {
                top: 0,
                bottom: 0
            }
        }
    }
});

setTimeout(function() {
    chart.axis.max({
        y: 100
    });
}, 1000);

setTimeout(function() {
    chart.config("axis.y.max", undefined, true);
}, 3000);