<script type="text/javascript">
    $(document).ready(function() {
        if ($('#chart1').length) {
            graph();
        } else {
            //return;
            <?php if (empty($cart)) {
                $cart = array();
            }
            ?>
        }

    });


    function graph() {
        var e = {
            series: [{
                name: "Tamu",
                data: [<?php foreach ($cart as $value) {
                            echo $value->jml . ",";
                        } ?>]
            }],
            chart: {
                foreColor: "#9ba7b2",
                height: 310,
                type: "area",
                zoom: {
                    enabled: !1
                },
                toolbar: {
                    show: !0
                },
                dropShadow: {
                    enabled: !0,
                    top: 3,
                    left: 14,
                    blur: 4,
                    opacity: .1
                }
            },
            stroke: {
                width: 5,
                curve: "smooth"
            },
            xaxis: {
                type: "datetime",
                categories: [<?php foreach ($cart as $value) {
                                    echo '"' . $value->start . '"' . ',';
                                } ?>]
            },
            title: {
                text: "Jumlah Tamu",
                align: "left",
                style: {
                    fontSize: "16px",
                    color: "#666"
                }
            },
            fill: {
                type: "gradient",
                gradient: {
                    shade: "light",
                    gradientToColors: ["#0d6efd"],
                    shadeIntensity: 1,
                    type: "vertical",
                    opacityFrom: .7,
                    opacityTo: .2,
                    stops: [0, 100, 100, 100]
                }
            },
            markers: {
                size: 5,
                colors: ["#0d6efd"],
                strokeColors: "#fff",
                strokeWidth: 2,
                hover: {
                    size: 7
                }
            },
            dataLabels: {
                enabled: !1
            },
            colors: ["#0d6efd"],
            yaxis: {
                title: {
                    text: "Tamu"
                }
            }
        };
        new ApexCharts(document.querySelector("#chart1"), e).render();
    }
</script>