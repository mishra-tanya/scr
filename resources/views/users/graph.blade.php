<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCR Dashboard</title>
    <link rel="stylesheet" href="css/graph.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<style>
     .containerd{
        /* background-image:  url(assets/img/img.avif); */
        padding: 70px;
        background-image: linear-gradient(rgba(255, 255, 255, 0.457), rgba(255, 255, 255, 0.5)), url(assets/img/hero-bg.jpg);
    }
    @media (max-width:920px) {
            .containerd{
        /* background-image:  url(assets/img/img.avif); */
        padding: 30px;
        background-image: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url(assets/img/hero-bg.jpg);
  
            }
        }
</style>
<body>
    <div class="containerd mt-5">
        <h1 class="text-center">Welcome, <b>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</b> </h1>
        <h3 class="text-center">To SCR Preparation Module</b> </h1>

<br>
        <div class="row stats mt-4"><br>

            <div class="col-md-3 mb-4">
                <div class="card shadow-lg" style=" height: 100%;border-radius:20px;  background-color:rgba(0, 157, 255, 0.151);">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                        <h3><b>Learning Objectives</b></h3>
                        <svg viewBox="0 0 36 36" class="circular-chart">
                            <path class="circle-bg" d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831"/>
                            <path id="circle" class="circle" stroke-dasharray="{{$score}},100" d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831"/>
                            <text x="18" y="20.35" class="percentage">{{$score}}%</text>
                        </svg><br>
                       <b>
                        <div class="d-flex justify-content-between w-100">
                            <span class="text-start">Correct Answer:</span>
                            <span class="text-end">{{$correct_answers}}</span>
                        </div>
                        <div class="d-flex justify-content-between w-100">
                            <span class="text-start"> Attempted Question:&nbsp; </span>
                            <span class="text-end">{{$total_questions}}</span>
                        </div>
                       </b>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-lg" style=" height: 100%;border-radius:20px;  background-color:rgba(0, 157, 255, 0.151);">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                        <h3><b>SCR Percentage</b></h3>
                        <svg viewBox="0 0 36 36" class="circular-chart">
                            <path class="circle-bg" d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831"/>
                            <path id="circle" class="circle" stroke-dasharray="80, 100" d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831"/>
                            <text x="18" y="20.35" class="percentage">40/50</text>
                        </svg><br>
                        <p>Overall SCR Percentage</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-lg" style=" height: 100%;border-radius:20px;  background-color:rgba(0, 157, 255, 0.151);">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                        <h3><b>Completed Tests</b></h3>
                        <svg viewBox="0 0 36 36" class="circular-chart">
                            <path class="circle-bg" d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831"/>
                            <path id="circle" class="circle" stroke-dasharray="80, 100" d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831"/>
                            <text x="18" y="20.35" class="percentage">40/50</text>
                        </svg><br>
                        <p>Overall Completed Tests</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-lg " style=" height: 100%;border-radius:20px;  background-color:rgba(0, 157, 255, 0.151);">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                        <h3><b>Overall Percentage</b></h3>
                        <svg viewBox="0 0 36 36" class="circular-chart">
                            <path class="circle-bg" d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831"/>
                            <path id="circle" class="circle" stroke-dasharray="80, 100" d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831"/>
                            <text x="18" y="20.35" class="percentage">40/50</text>
                        </svg><br>
                        <p>Learning Objective & SCR</p>
                    </div>
                </div>
            </div>

          
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function updateDashboard(data) {
                document.getElementById('percentage').textContent = data.percentage + '%';
                document.getElementById('chaptersSeen').textContent = data.chaptersSeen + '/8';
                document.getElementById('progress').style.width = (data.chaptersSeen / 8 * 100) + '%';

                const circle = document.getElementById('circle');
                const radius = circle.r.baseVal.value;
                const circumference = 2 * Math.PI * radius;
                const offset = circumference - (data.testsGiven / 50 * circumference);

                circle.style.strokeDasharray = `${circumference} ${circumference}`;
                circle.style.strokeDashoffset = offset;
                document.querySelector('.percentage').textContent = `${data.testsGiven}/50`;
            }

            const exampleData = {
                percentage: 96.8,
                chaptersSeen: 2,
                testsGiven: 10
            };

            updateDashboard(exampleData);
        });
    </script>
</body>
</html>
