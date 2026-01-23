<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
    rel="stylesheet">
  <title>Professional Form</title>

  <style>
    body {
      background: linear-gradient(135deg, #0d6efd, #1e293b);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .card-header {
      background-color: #0d6efd;
      color: white;
      text-align: center;
      font-size: 1.5rem;
      font-weight: 600;
      border-radius: 15px 15px 0 0;
    }

    .form-label {
      font-weight: 500;
      color: #334155;
    }

    .form-control {
      border-radius: 8px;
    }

    .btn-primary {
      background-color: #0d6efd;
      border: none;
      border-radius: 8px;
      padding: 10px;
      font-weight: 600;
    }

    .btn-primary:hover {
      background-color: #0b5ed7;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card">
          <div class="card-header">
            Create Account
          </div>
          <div class="card-body p-4">

            <form method="post">
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" type="text" class="form-control" placeholder="Enter your first name">
              </div>

              <div class="mb-3">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control" placeholder="example@email.com">
              </div>

              <div class="mb-4">
                <label class="form-label">Password</label>
                <input name="password" type="password" class="form-control" placeholder="••••••••">
              </div>

              <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role" id="role" class="form-select">
                  <option selected disabled>Choose role</option>
                  <option value="client">Client</option>
                </select>
              </div>


              <div class="d-grid mb-2">
                <button type="submit" class="btn btn-primary">
                  Sign Up
                </button>
              </div>
              <div class="d-grid">
                <a href="/Auth/Login" class="btn btn-secondary">
                  Login
                  </a>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>