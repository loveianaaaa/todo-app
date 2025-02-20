<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- digunakan dalam HTML untuk mengontrol cara halaman ditampilkan di perangkat mobile. --}}
    <title>Identitas Diri</title>
    {{-- digunakan untuk menentukan judul halaman web yang akan ditampilkan di tab browser atau hasil pencarian Google. --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #272adb, #5f667c);
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
        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid #fff;
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            transition: 0.3s;
        }
        .back-btn:hover {
            background: rgba(255, 255, 255, 0.5);
            color: #000;
        }
    </style>
</head>
<body>
    <a href="javascript:history.back()" class="back-btn">← Kembali</a>
    {{-- Tombol kembali untuk kembali ke halaman sebelumnya --}}
    <div class="profile-card"> 
        {{-- digunakan untuk membuat sebuah elemen yang berfungsi sebagai wadah atau kontainer untuk                                               menampilkan informasi tentang profil, misalnya profil pengguna, seseorang, atau entitas lainnya. --}}
        <img src="images/lope.jpg" alt="Foto Profil" class="profile-img">
        {{-- digunakan untuk menampilkan gambar di halaman web. --}}
        <div class="profile-name">Loveiana I.R</div>
        <div class="profile-info">Web Developer & Designer</div>
        <p>Ngoding with Me!!!🔥</p>

        <div class="social-links">
            {{-- adalah wadah (container) yang biasanya digunakan untuk menampung tautan (link) ke media                                                  sosial seperti Facebook, Twitter, Instagram, dll. --}}
            <a href="https://www.instagram.com/l0veianaaa_?igsh=MXdlcXMyb3lybmQ4cQ=="  class="profile-btn">follow me on instagram 📸</a>
            <a href="https://github.com/loveianaaaa" class="profile-btn">github🐙</a></a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
