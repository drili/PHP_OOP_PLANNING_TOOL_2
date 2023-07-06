<link rel="stylesheet" href="<?php echo $relative_directory; ?>/__css/components/dashboard-settings.css">

<?php
    function DashboardSettings($sprints_arr, $current_sprint_id) { 
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

                        <form action="" method="GET">
                            <select name="sprint_id" id="SelectSprint" class="select-small">
                                <?php foreach($sprints_arr as $sprint) : ?>
                                    <?php 
                                        if($sprint["sprint_id"] == $current_sprint_id) {
                                            $selected = "selected";
                                        } else {
                                            $selected = "";
                                        }
                                    ?>
                                    <option value="<?php echo $sprint["sprint_id"];?>" <?php echo $selected; ?>><?php echo $sprint["sprint_name"]; ?></option>
                                <?php endforeach; ?>
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
            const sprint_id = <?php echo $current_sprint_id; ?>;
            fetch('../AJAX/components/AJAX_POST_user-time-distribution.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ sprint_id })
            })
                .then(response => response.json())
                .then(response_data => {
                    if (response_data != "ERROR_USER_DISTRIBUTION") {
                        const data = {
                            labels: ['Client Time', 'Internal Time', 'Off Time', 'Sick Time'],
                            datasets: [
                                {
                                data: [
                                    response_data.result[0].sum_client_time,
                                    response_data.result[0].sum_internal_time,
                                    response_data.result[0].sum_offtime_time,
                                    response_data.result[0].sum_sicktime_time
                                ],
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
                    } else {
                        // TODO:
                        // finish this code
                        const donutChartDataset = document.querySelector(".donut-chart-dataset");
                        const donutChart = document.querySelector("#donut-chart");

                        donutChartDataset.innerHTML = `<p class="p-small">No registrations found.</p>`;
                        donutChart.remove();
                    }
                })
                .catch(error => console.error('Error:', error));

            // donut-chart-dataset
            // console.log({data});

        </script>
    <?php
    
        $DashboardSettings = ob_get_contents();
        ob_end_clean();

        return $DashboardSettings;
    }
?>