<link rel="stylesheet" href="<?php echo $relative_directory; ?>/__css/components/time-registrations-this-week.css">

<?php
    function TimeRegistrationsThisWeek($cell_size) { 
        ob_start();
    ?>
        <div class="cell small-12 large-<?php echo $cell_size; ?> component-time-registrations-this-week">

            <div class="boxed-section">
                <div class="time-reg-content">

                <div class="title">
                    <h4>Time registrations</h4>
                    <p>Your time registrations this week</p>
                    <hr>
                </div>

                <div class="content">
                    <div class="chart-container">
                        <canvas id="bar-chart"></canvas>
                    </div>
                </div>

                </div> <!-- .time-reg-content -->
            </div> <!-- .boxed-section -->

        </div>

        <script>
            // *** Bar Chart - Time registrations
            const chartContainer = document.querySelector('.chart-container');

            fetch('../AJAX/components/AJAX_POST_fetch-data-this-week.php')
                .then(response => response.json())
                .then(data => {
                    const dates = data.week_dates;
                    const valuesArr = data.time_regs;
                    // console.log({valuesArr});

                    const dataTimeReg = [];
                    for (let i = 0; i < dates.length; i++) {
                        const date = new Date(dates[i]);
                        const total = Math.floor(Math.random() * 10) + 1;
                        dataTimeReg.push({ date, total });
                    }
   
                    const labels = dataTimeReg.map(entry => formatDateString(entry.date));
                    const values = valuesArr.map(entry => entry.time_registration_amount);

                    // console.log({ values });

                    new Chart('bar-chart', {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                data: values,
                                backgroundColor: getComputedStyle(document.documentElement).getPropertyValue('--color-primary'),
                                borderColor: getComputedStyle(document.documentElement).getPropertyValue('--color-primary'),
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    display: true
                                }
                            },
                            y: {
                                beginAtZero: true,
                                grid: {
                                    display: false
                                }
                            }
                            },
                            plugins: {
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });
                })
                .catch(error => console.error('Error:', error));

            function formatDateString(date) {
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                return `${year}-${month}-${day}`;
            }
        </script>

    <?php
    
        $TimeRegistrationsThisWeek = ob_get_contents();
        ob_end_clean();

        return $TimeRegistrationsThisWeek;
    }
?>