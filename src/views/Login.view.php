<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Modern Auth</title>

    <style>
        /* Animated Gradient Background */
        body {
            min-height: 100vh;
            background: linear-gradient(270deg, #6a11cb, #2575fc, #00c6ff);
            background-size: 600% 600%;
            animation: gradientBG 12s ease infinite;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Glass Card */
        .glass-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 40px;
            width: 400px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
            animation: fadeUp 1s ease;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .glass-card h3 {
            text-align: center;
            color: #fff;
            margin-bottom: 25px;
        }

        label {
            color: #fff;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.8);
            border: none;
            border-radius: 10px;
        }

        .form-control:focus {
            box-shadow: none;
            transform: scale(1.02);
            transition: 0.3s;
        }

        .btn-modern {
            background: #fff;
            color: #2575fc;
            border-radius: 30px;
            font-weight: bold;
            transition: 0.4s;
        }

        .btn-modern:hover {
            background: #2575fc;
            color: #fff;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>

    <div class="glass-card">
        <h3>Create Account</h3>

        <form method="post">
             <p class="text-danger text-center"><?= $success ?? $error ?></p>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email">
            </div>

            <div class="mb-4">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password">
            </div>

            <button type="submit" class="btn btn-modern w-100 py-2">
                Register
            </button>
        </form>
    </div>

</body>

</html>