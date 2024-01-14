<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="https://ecb03365-700f-42e0-b12e-d94e3cfea0b9-00-21u0t6dk925yd.kirk.replit.dev/static/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="https://ecb03365-700f-42e0-b12e-d94e3cfea0b9-00-21u0t6dk925yd.kirk.replit.dev/static/assets/img/favicon.png" />
    <title>
      Results Movies
    </title>
    <!-- CSS Files -->
    <link id="pagestyle" href="https://ecb03365-700f-42e0-b12e-d94e3cfea0b9-00-21u0t6dk925yd.kirk.replit.dev/static/assets/css/material-dashboard.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/17dd18b72c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://ecb03365-700f-42e0-b12e-d94e3cfea0b9-00-21u0t6dk925yd.kirk.replit.dev/static/assets/css/material-dashboard.min.css" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  </head>

  <body class="g-sidenav-show bg-gray-100">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card my-4 mt-5">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Movies Table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table table-flush" id="movieTable">
                  <thead class="thead-light">
                    <tr>
                      <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Title</th>
                      <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Year</th>
                      <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Type</th>
                      <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Poster</th>
                      <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">imdbID</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://ecb03365-700f-42e0-b12e-d94e3cfea0b9-00-21u0t6dk925yd.kirk.replit.dev/static/assets/js/core/bootstrap.min.js"></script>

    <script src="https://ecb03365-700f-42e0-b12e-d94e3cfea0b9-00-21u0t6dk925yd.kirk.replit.dev/static/assets/js/material-dashboard.min.js"></script>
    <script src="https://ecb03365-700f-42e0-b12e-d94e3cfea0b9-00-21u0t6dk925yd.kirk.replit.dev/static/assets/js/plugins/datatables.js" type="text/javascript"></script>
    <script type="text/javascript">
      const dataTableBasic = new simpleDatatables.DataTable("#datatable-movies", {
        searchable: true,
        fixedHeight: true,
      });
    </script>

    <script>
      function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        const regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
          results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return "";
        return decodeURIComponent(results[2].replace(/\+/g, " "));
      }

      function searchOMDBResults() {
        const apiKey = "fa604f7b";
        const searchTitle = getParameterByName("p");

        if (searchTitle) {
          $.ajax({
            url: `https://www.omdbapi.com/?apikey=${apiKey}&s=${encodeURIComponent(searchTitle)}`,
            type: "GET",
            dataType: "json",
            success: function (data) {
              displayResults(data);
            },
            error: function (error) {
              console.error("Error fetching data from OMDB API", error);
            },
          });
        } else {
          console.error("No search title found in the URL.");
        }
      }

      function displayResults(data) {
        const resultsContainer = $("#movieTable tbody");

        if (data.Error) {
          resultsContainer.html(`<p>${data.Error}</p>`);
        } else {
          resultsContainer.empty();

          data.Search.forEach((movie) => {
            resultsContainer.append(`
                <tr>
                  <td>${movie.Title}</td>
                  <td>${movie.Year}</td>
                  <td>${movie.Type}</td>
                  <td><img src="${movie.Poster}" alt="${movie.Title} Poster" style="width: 50px; height: auto;"></td>
                  <td>${movie.imdbID}</td>
                </tr>
                `);
          });
        }
      }

      $(document).ready(function () {
        searchOMDBResults();
      });
    </script>
  </body>
</html>