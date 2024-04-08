<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin Dashboard</title>
</head>
<body>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">User</button>
          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Blog</button>
          <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Logout</button>
          <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false" disabled>Disabled</button>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">...</div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">...</div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">...</div>
        <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">...</div>
      </div>
      <div class="container">
        @yield('content')
      </div>
      <footer class='footer'>
        <div class="container-fluid">


            
        </div>
        </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

