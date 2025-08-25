<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Bootstrap</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-size: 0.9rem;
    }
    .sidebar {
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      width: 220px;
      background-color: #343a40;
      color: white;
      padding-top: 60px;
    }
    .sidebar a {
      color: white;
      padding: 10px 15px;
      display: block;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color: #495057;
    }
    .content {
      margin-left: 220px;
      padding: 20px;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">My Dashboard</a>
      <button class="btn btn-outline-light">Logout</button>
    </div>
  </nav>

  <!-- Sidebar -->
  <div class="sidebar">
    <h5 class="text-center">Menu</h5>
    <a href="#">🏠 Dashboard</a>
    <a href="#">📊 Statistik</a>
    <a href="#">📁 Data</a>
    <a href="#">⚙️ Pengaturan</a>
  </div>

  <!-- Content -->
  <div class="content">
    <div class="container-fluid">
      <h1 class="mb-4">Selamat Datang</h1>

      <div class="row">
        <div class="col-md-4">
          <div class="card text-bg-primary mb-3 shadow">
            <div class="card-body">
              <h5 class="card-title">Users</h5>
              <p class="card-text">Total: 120</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card text-bg-success mb-3 shadow">
            <div class="card-body">
              <h5 class="card-title">Orders</h5>
              <p class="card-text">Total: 85</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card text-bg-warning mb-3 shadow">
            <div class="card-body">
              <h5 class="card-title">Revenue</h5>
              <p class="card-text">Rp 12.500.000</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Tabel Data -->
      <div class="card shadow">
        <div class="card-header bg-dark text-white">
          Data Terbaru
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Budi</td>
                <td>budi@mail.com</td>
                <td><span class="badge bg-success">Aktif</span></td>
              </tr>
              <tr>
                <td>2</td>
                <td>Siti</td>
                <td>siti@mail.com</td>
                <td><span class="badge bg-danger">Nonaktif</span></td>
              </tr>
              <tr>
                <td>3</td>
                <td>Andi</td>
                <td>andi@mail.com</td>
                <td><span class="badge bg-success">Aktif</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
