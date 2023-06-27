<link rel="stylesheet" href="<?php echo $relative_directory; ?>/__css/components/dashboard-settings.css">

<?php
    function DashboardSettings() { 
        ob_start();
    ?>
        <div class="cell small-12 large-12 component-dashboard-settings">

            <div class="boxed-section boxed-section-gray">
                <div class="dashboard-settings-content">

                <div class="title">
                    <h4>Settings</h4>
                    <p>Configure your dashboard settings and filters here</p>
                    <hr>
                </div>

                <div class="settings-content">
                    <section class="sprint-filters">
                        <h6>Sprint Filters</h6>
                        <p>Select sprint to filter by</p>

                        <form action="" method="POST">
                            <select name="select_sprint" id="SelectSprint" class="select-small">
                                <option value="1">Januar</option>
                                <option value="1">Januar</option>
                                <option value="1">Januar</option>
                            </select>

                            <button class="btn btn-primary btn-extra-small margin-0">
                                Apply Sprint
                            </button>
                        </form>
                        <hr>
                    </section>

                    <section class="sprint-activity">
                        <h6>Activity</h6>
                        <p>Your activity this sprint</p>
                        
                        <div class="activity-box">
                            <canvas id="donut-chart"></canvas>

                            <div class="donut-chart-dataset">
                                
                            </div>
                        </div>
                        <hr>
                    </section>
                </div>

                </div> <!-- .dashboard-settings-content -->
            </div> <!-- .boxed-section -->

        </div>

        <script>
            // *** Chart JS Dougnut Chart
            const data = {
                labels: ['Blue', 'Green', 'Red', 'Orange'],
                datasets: [
                    {
                    data: [30, 40, 10, 20],
                    backgroundColor: [
                        getComputedStyle(document.documentElement).getPropertyValue('--color-blue'),
                        getComputedStyle(document.documentElement).getPropertyValue('--color-secondary'),
                        getComputedStyle(document.documentElement).getPropertyValue('--color-tertiary'),
                        getComputedStyle(document.documentElement).getPropertyValue('--color-primary'),
                    ],
                    borderWidth: 0,
                    },
                ],
            };

            const options = {
                responsive: true,
                cutout: '70%',
                plugins: {
                    legend: {
                    display: false,
                    },
                },
            };

            const donutChart = new Chart(document.getElementById('donut-chart'), {
                type: 'doughnut',
                data: data,
                options: options,
            });

            // * Chart JS data labels and values
            const donutChartDataset = document.querySelector(".donut-chart-dataset");
            data.datasets.forEach(function(dataset, index) {
                dataset.data.forEach(function(dataPoint, dataIndex) {
                    const label = data.labels[dataIndex];
                    const value = dataPoint;

                    const p = document.createElement("p");
                    p.textContent = `* Label: ${label}, Value: ${value}`;
                    p.style.color = dataset.backgroundColor[dataIndex % dataset.backgroundColor.length];

                    donutChartDataset.appendChild(p);
                });
            });

            // donut-chart-dataset
            // console.log({data});

        </script>
    <?php
    
        $DashboardSettings = ob_get_contents();
        ob_end_clean();

        return $DashboardSettings;
    }
?>