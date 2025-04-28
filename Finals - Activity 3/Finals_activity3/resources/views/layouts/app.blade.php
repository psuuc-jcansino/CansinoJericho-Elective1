<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>QR Code Student Management</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

  <!-- Custom Styles -->
  <style>
    body {
      background-color: #f0f2f5;
    }

    .navbar-custom {
      background-color: #343a40;
    }

    .navbar-custom .navbar-brand,
    .navbar-custom .nav-link {
      color: #ffffff;
    }

    .btn-rounded {
      border-radius: 50px;
    }

    table,
    th,
    td {
      border: 1px solid #dee2e6;
    }

    .table th {
      background-color: #0d6efd;
      color: white;
    }

    .card {
      border-radius: 15px;
    }
  </style>

  <!-- jQuery and DataTables -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-custom mb-4">
    <div class="container">
      <a class="navbar-brand" href="#">QR Code Manager</a>
    </div>
  </nav>

  <div class="container mb-5">
    @yield('content')
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#myTable').DataTable({
        paging: true,
        searching: true,
        ordering: true
      });
    });
  </script>

</body>

</html>