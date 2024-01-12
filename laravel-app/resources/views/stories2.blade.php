<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4 text-center">Story Search</h1>
        <div class="search-container">
            <div class="input-group">
                <input type="text" class="form-control" id="story_title" name="story_title" placeholder="Enter story title">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="searchStory()">Search</button>
                </div>
            </div>
        </div>
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
            var searchTerm = $('#story_title').val();

            $.ajax({
                url: 'http://127.0.0.1:8000/api/stories/v1/search?search=' + searchTerm,
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
