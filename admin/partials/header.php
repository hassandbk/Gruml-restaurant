<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="style-admin.css">
    <link rel="icon" type="image/gif" href="../images/logo.gif">



    <!-- Chart --->


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Item Name', 'Sales'],
                <?php
                while ($row_sales = mysqli_fetch_array($res_most_sold_items)) {
                    echo "['" . $row_sales["item_name"] . "', " . $row_sales["total_qty"] . "],";
                }
                ?>
            ]);

            var options = {
                title: 'Most Sold Items',
                pieHole: 0.4,
                fontName: 'Poppins',
                fontSize: 12,
                //is3D:true,
                titleTextStyle: {
                    color: "Grey",
                    fontName: "Poppins",
                    fontSize: 16,
                    bold: false,
                    italic: false
                },

            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart_msi'));
            chart.draw(data, options);
        }
    </script>

    <!-- Chart End -->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Time', 'Sales'],
                <?php
                while ($row_sales_by_hour = mysqli_fetch_array($res_sales_by_hour)) {
                    echo "['" . $row_sales_by_hour["hname"] . "', " . $row_sales_by_hour["total_sales"] . "],";
                }

                ?>


            ]);

            var options = {
                hAxis: {
                    title: 'Time',
                    titleTextStyle: {
                        color: 'Black'
                    }
                },
                colors: ['#eb2f06', 'green'],

                chart: {
                    title: 'Sales By Hour',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>


    <title>Grill Restuarant </title>
</head>