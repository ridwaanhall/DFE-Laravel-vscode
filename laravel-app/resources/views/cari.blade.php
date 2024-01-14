<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="https://ecb03365-700f-42e0-b12e-d94e3cfea0b9-00-21u0t6dk925yd.kirk.replit.dev/static/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="https://ecb03365-700f-42e0-b12e-d94e3cfea0b9-00-21u0t6dk925yd.kirk.replit.dev/static/assets/img/favicon.png" />
    <title>
      Search Movies
    </title>
    <!-- CSS Files -->
    <link id="pagestyle" href="https://ecb03365-700f-42e0-b12e-d94e3cfea0b9-00-21u0t6dk925yd.kirk.replit.dev/static/assets/css/material-dashboard.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/17dd18b72c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://ecb03365-700f-42e0-b12e-d94e3cfea0b9-00-21u0t6dk925yd.kirk.replit.dev/static/assets/css/material-dashboard.min.css" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  </head>

  <body class="d-flex align-items-center justify-content-center vh-100">
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
                  <input type="text" name="searchTitle" class="form-control" id="searchTitle" />
                </div>
              </div>
              <button onclick="searchOMDB()" class="btn btn-outline-primary">Search</button>
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
      function searchOMDB() {
        const searchTitle = $("#searchTitle").val();
        const apiKey = "fa604f7b";
        const redirectUrl = `hasil?p=${encodeURIComponent(searchTitle)}`;
        window.location.href = redirectUrl;
      }
    </script>
  </body>
</html>