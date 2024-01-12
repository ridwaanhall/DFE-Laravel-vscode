<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story Search</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

    <h1>Story Search</h1>

    <label for="search">Search:</label>
    <input type="text" id="search" name="search">
    <button onclick="searchStory()">Search</button>

    <div id="result"></div>

    <script>
        function searchStory() {
            var searchTerm = $('#search').val();

            $.ajax({
                url: 'http://127.0.0.1:8000/api/stories/v1/search', // Your API endpoint
                type: 'GET',
                data: { search: searchTerm },
                success: function(response) {
                    if (response.success) {
                        displayData(response.data);
                    } else {
                        $('#result').html('<p>' + response.message + '</p>');
                    }
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }

        function displayData(data) {
            var html = '<ul>';
            $.each(data, function(index, story) {
                html += '<li>' + story.title + '</li>';
            });
            html += '</ul>';
            $('#result').html(html);
        }
    </script>

</body>
</html>
