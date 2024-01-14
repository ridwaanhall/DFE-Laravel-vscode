<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Story - RidwaanHall</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="https://ecb03365-700f-42e0-b12e-d94e3cfea0b9-00-21u0t6dk925yd.kirk.replit.dev/static/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="https://ecb03365-700f-42e0-b12e-d94e3cfea0b9-00-21u0t6dk925yd.kirk.replit.dev/static/assets/img/favicon.png" />
    <!-- CSS Files -->
    <link id="pagestyle" href="https://ecb03365-700f-42e0-b12e-d94e3cfea0b9-00-21u0t6dk925yd.kirk.replit.dev/static/assets/css/material-dashboard.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/17dd18b72c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://ecb03365-700f-42e0-b12e-d94e3cfea0b9-00-21u0t6dk925yd.kirk.replit.dev/static/assets/css/material-dashboard.min.css" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card card-frame my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Search Movies</h6>
                </div>
                </div>
                <div class="card-body">
                <div class="col-md-12">
                    <div class="input-group input-group-outline mb-4">
                    <label class="form-label">Input</label>
                    <input type="text" name="story_title" class="form-control" id="story_title" />
                    </div>
                </div>
                <button onclick="searchStory()" class="btn btn-outline-primary">Search</button>
                </div>
            </div>
        </div>
      </div>
        <!-- <h1 class="mt-5 mb-4 text-center">Story Search</h1>
        <div class="search-container">
            <div class="input-group">
                <input type="text" class="form-control" id="story_title" name="story_title" placeholder="Enter story title" required>
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="searchStory()">Search</button>
                </div>
            </div>
        </div> -->
        <div class="mt-4 mb-4">
            <ul class="list-group">
                <li class="list-group-item">
                    <div id="result"></div>
                </li>
            </ul>
        </div>
    </div>

    <script>
        function searchStory() {
            var searchStory = $('#story_title').val();

            if (!searchStory.trim()) {
                $('#result').html('<p>Fill in the search field</p>');
                return;
            }

            $.ajax({
                url: 'http://127.0.0.1:8000/api/stories/v1/search?search=' + searchStory,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#result').empty(); // Clear previous results

                    if (response.success == true) {
                        response.data.forEach(function(story) {
                            let story_data = `
                                <div class="card w-100 mb-2">
                                    <div class="card-body">
                                        <h5 class="card-title">${story.id} - ${story.title}</h5>
                                        <p class="card-text">${story.desc || ''}</p>
                                    </div>
                                </div>
                            `;
                            $('#result').append(story_data);
                        });
                    } else {
                        $('#result').html('<p>Not found</p>');
                    }
                },
                error: function(error) {
                    $('#result').html('<p>Not found</p>');
                }
            });
        }

    </script>
    <script src="https://ecb03365-700f-42e0-b12e-d94e3cfea0b9-00-21u0t6dk925yd.kirk.replit.dev/static/assets/js/core/bootstrap.min.js"></script>

    <script src="https://ecb03365-700f-42e0-b12e-d94e3cfea0b9-00-21u0t6dk925yd.kirk.replit.dev/static/assets/js/material-dashboard.min.js"></script>
    <script src="https://ecb03365-700f-42e0-b12e-d94e3cfea0b9-00-21u0t6dk925yd.kirk.replit.dev/static/assets/js/plugins/datatables.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
