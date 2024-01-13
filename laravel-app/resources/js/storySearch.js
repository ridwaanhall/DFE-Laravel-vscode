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