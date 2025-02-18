<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identitas Diri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #556b2f, #c0a080);
            color: #fff;
            font-family: 'Poppins', sans-serif;
        }
        .profile-card {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px; border: 3px solid rgba(255, 255, 255, 0.5);
            padding: 30px;
            text-align: center;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            margin: 50px auto;
            backdrop-filter: blur(10px);
        }
        .profile-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #fff;
            margin-bottom: 15px;
        }
        .profile-name {
            font-size: 2em;
            font-weight: bold;
        }
        .profile-info {
            font-size: 1.2em;
            margin-bottom: 5px;
        }
        .social-links a {
            display: inline-block;
            margin: 10px;
            font-size: 1.5em;
            color: #fff;
            transition: 0.3s;
        }
        .social-links a:hover {
            color: #ffcc00;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="profile-card">
        <img src="images/love.jpg" alt="Foto Profil" class="profile-img">
        <div class="profile-name">Loveiana I.R</div>
        <div class="profile-info">Web Developer & Designer</div>
        <div class="profile-info">📍 Subang, Indonesia</div>
        <div class="social-links">
            <a href="https://www.instagram.com/l0veianaaa_?igsh=MXdlcXMyb3lybmQ4cQ=="  class="profile-btn">follow me on instagram</a>
            <a href="https://github.com/loveianaaaa" class="profile-btn">github</a></a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
