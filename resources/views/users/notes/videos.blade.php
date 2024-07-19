<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SCR Videos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .conatiner {
            margin: 50px;
        }
        p {
            font-size: 20px;
            text-align: center;
            margin-bottom: 50px;
        }
        .video-card {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    @include('nav') 
    <br><br><br>
    <h2 class="text-center mb-4" style="background-color: rgb(235, 235, 235); padding: 12px;">
        SCR Videos
    </h2>
    <div class="container">
        <div class="m-3">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="video-card">
                        <video width="100%" height="auto" controls>
                            <source src="{{ asset('videos/REVISION_CHAPTER_1_FOUNDATIONS_OF_CLIMATE_CHANGE.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <p>Revision Chapter 1: Foundations of Climate Change</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <video width="100%" height="auto" controls>
                        <source src="{{ asset('videos/REVISION_CHAPTER_2_SUSTAINABILITY.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p>Revision Chapter 2: Sustainability</p>
                </div>

                <div class="col-md-4">
                    <video width="100%" height="auto" controls>
                        <source src="{{ asset('videos/REVISION_CHAPTER_3_CLIMATE_CHANGE_RISK.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p>Revision Chapter 3: Climate Change Risk</p>
                </div>

                <div class="col-md-4">
                    <video width="100%" height="auto" controls>
                        <source src="{{ asset('videos/REVISION_CHAPTER_4_SUSTAINABILITY_AND_CLIMATE_POLICY_CULTURE_AND_GOVERNANCE.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p>Revision Chapter 4: Sustainability And Climate Policy Culture And Governance</p>
                </div>

                <div class="col-md-4">
                    <video width="100%" height="auto" controls>
                        <source src="{{ asset('videos/SESSION_1_Foundations_of_Climate_Change_Part_1.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p>Session 1: Foundations of Climate Change Part 1</p>
                </div>

                <div class="col-md-4">
                    <video width="100%" height="auto" controls>
                        <source src="{{ asset('videos/SESSION_2_Foundations_of_Climate_Change_Part_2.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p>Session 2: Foundations of Climate Change Part 2</p>
                </div>

                <div class="col-md-4">
                    <video width="100%" height="auto" controls>
                        <source src="{{ asset('videos/SESSION_3_INTERNATIONAL_NON_STATE_COALITIONS.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p>Session 3: International Non State Coalitions </p>
                </div>

                <div class="col-md-4">
                    <video width="100%" height="auto" controls>
                        <source src="{{ asset('videos/SESSION_4_TCFD.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p>Session 4: TCFD</p>
                </div>

                <div class="col-md-4">
                    <video width="100%" height="auto" controls>
                        <source src="{{ asset('videos/SESSION_5_SUSTAINABLE_FINANCE.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p>Session 5: Sustainable Finance</p>
                </div>

                <div class="col-md-4">
                    <video width="100%" height="auto" controls>
                        <source src="{{ asset('videos/SESSION_6_ESG_CLIMATE_RISK_INTO_CREDIT_RATING.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p>Session 6: ESG Climate Risk into Credit Rating</p>
                </div>
                <div class="col-md-4">
                    <video width="100%" height="auto" controls>
                        <source src="{{ asset('videos/SESSION_7_TAXONOMY.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p>Session 7: Taxonomy</p>
                </div>
                <div class="col-md-4">
                    <video width="100%" height="auto" controls>
                        <source src="{{ asset('videos/SESSION_8_DISCLOSURES.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p>Session 8: Disclosures</p>
                </div>
                <div class="col-md-4">
                    <video width="100%" height="auto" controls>
                        <source src="{{ asset('videos/SESSION_9_SCENARIO_ANALYSIS.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p>Session 9: Scenatio Analysis</p>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

  