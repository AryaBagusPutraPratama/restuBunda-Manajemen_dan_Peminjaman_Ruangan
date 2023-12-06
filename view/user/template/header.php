<!-- HAPUS  SEBELUM RUN INDEX.PHP -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Peminjaman Ruangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/custom_color.css">
    <style>
        @font-face {
            font-family: 'Plus Jakarta Sans';
            src: url('assets/font/PlusJakartaSans-VariableFont_wght.ttf') format('.ttf'),
            url('assets/font/PlusJakartaSans-Italic-VariableFont_wght.ttf') format('.ttf');
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow: hidden;
        
        }

        .custom-label{
            background-color: #f4f6ff;
        }
    </style>
</head>
<body>
    <div class="d-flex flex-row position-relative" style="width: 80vw;">
        <header class="z-1 navbar sticky-top bg-biru flex-md-nowrap shadow pe-4 shadow-none w-100">
            <!-- <i class="h2 bi bi-list putih"></i> -->
            <div class="d-flex flex-row w-100 justify-content-between">
                <a href="" class="d-flex justify-content-start ps-4 w-25">
                    <svg xmlns="http://www.w3.org/2000/svg" width="39.4" height="40" fill="white" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                    </svg>
                </a>

                <div class="dropdown">
                    <a href="#" class="" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
                        <svg  xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                        </svg>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end mt-2">
                        <li class="list-group-item" id="openPopup"><button class="dropdown-item" onclick="openPopup()">Ganti Password</button></li>
                        <li class="list-group-item"><a href="login.php" class="dropdown-item">Logout</a></li>
                    </ul>
                </div>

            </div>
        </header>
    </div>

<div id="popupOverlay" class="popupOff">
  <div id="popupContent">
    <h2 class="fs-4 fw-regular border-dark border-bottom biru pb-3">Muhammad Ali</h2>
    <h3 class="fs-4 fw-semibold biru text-start p-2">Ganti Password</h3>
    <form action="" class="d-flex flex-column gap-3 bg-white" method="post">
        <div class="">
            <input type="text" class="form-control form-control-lg rounded-pill ps-3 fs-6" id="floatingPasswordOld" placeholder="Password Lama :" name="passwordOld" required>
            <!-- <label for="floatingPasswordOld" class="ps-3">Password Lama :</label> -->
        </div>
        <div class="">
            <input type="text" class="form-control form-control-lg rounded-pill ps-3 fs-6" id="floatingPasswordNew" placeholder="Password Baru :" name="passwordNew" required>
            <!-- <label for="floatingPasswordNew" class="ps-3">Password Baru :</label> -->
        </div>
        <div class="">
            <input type="text" class="form-control form-control-lg rounded-pill ps-3 fs-6" id="floatingRepeat" placeholder="Ulangi Password :" name="repeatPassword" required>
            <!-- <label for="floatingRepeat" class="ps-3">Ulangi Password :</label> -->
        </div>
    </form>
    <div class="d-flex flex-row justify-content-center gap-5">
        <button class="btn btn-kuning align-items-center fw-medium fs-6" id="closePopup" onclick="closePopup()">
        <svg class="mb-1" width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.5415 0.782591C20.0759 1.21975 20.1546 2.00728 19.7174 2.54159L8.46745 16.2916C8.24381 16.5649 7.91499 16.7309 7.56227 16.7485C7.20954 16.7661 6.86584 16.6336 6.61612 16.3839L0.366117 10.1339C-0.122039 9.64577 -0.122039 8.85431 0.366117 8.36616C0.854272 7.878 1.64573 7.878 2.13388 8.36616L7.4072 13.6395L17.7826 0.95849C18.2197 0.424184 19.0072 0.345432 19.5415 0.782591Z" fill="#10375C"/>
        </svg>
        <span class="ms-3"></span>
        Ganti Password
    </button>
    
    <button class="btn btn-hijau align-items-center fw-medium fs-6 px-4" id="closePopup" onclick="closePopup()">
        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M12.5 20L7.5 15M7.5 15L12.5 10M7.5 15H22.5" stroke="#10375C" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    <span class="ms-3 align-items-center"></span>
    Kembali
    </button>
    </div>
  </div>
</div>

<style>
  /* Styling untuk overlay */
  #popupOverlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 1px solid black;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 10;
  }

  .popupOff {
    display: none;
  }

  .popupOn {
    display: flex;
  }

  /* Styling untuk konten pop-up */
  #popupContent {
    z-index: 11;
    background-color: #fff;
    padding: 20px;
    border-radius: 25px;
    width: 70%;
    text-align: center;
  }

  /* Styling untuk tombol tutup */
  #closePopup {
    border-radius: 30px;
    cursor: pointer;
  }
</style>

<script>
  function openPopup() {
    const modal = document.getElementById("popupOverlay");
    modal.classList.add("popupOn");
    modal.classList.remove("popupOff");
  }

  function closePopup() {
    const modal = document.getElementById("popupOverlay");
    modal.classList.remove("popupOn");
    modal.classList.add("popupOff");
  }
</script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</body>
<!-- </html> -->