<!-- ======= Header ======= -->

<style>
    .bg-danger {
        background: #48276A;
        background-image: linear-gradient(to right, #48276A, #48276A);
        transition: opacity 300ms ease;



    }

    .header {
        height: 100px;
        /* Adjust the height as per your requirement */

    }
</style>
<link rel="stylesheet" href="https://bootswatch.com/5/simplex/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- TO stop overlapping-->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">



<!-- ICON LIST -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<header id="header" class=" mx-auto sticky-top bg-danger  ">
    <div class="container d-flex align-items-center justify-content-between">
        <!-- Logo -->
        <img src="https://admissions.sinhgad.edu/application/views/image/OIP.png" height="100" width="100"
            style="margin-top: 10px;" alt="Sinhgad Technical Education Society,Pune" class="img-fluid">
        <!-- Text logo  class="img-fluid" -->
        <h4 class="fs-6 fw-light text-white ms-3 d-none d-md-block">Sinhgad Technical Education Society,Pune</h4>
        <!-- Mobile Logo and Toggle -->

        <!-- Social Media Links -->
        <div class="social-links ms-auto">
            <a href="https://twitter.com/SinhgadCollege" class="twitter"><i
                    class="bi bi-twitter text-white me-3"></i></a>
            <a href="https://www.facebook.com/SinhgadInstitutes.STES" class="facebook"><i
                    class="bi bi-facebook text-white me-3"></i></a>
            <a href="https://www.instagram.com/sinhgadinstitutes/" class="instagram"><i
                    class="bi  bi-instagram text-white me-3"></i></a>
            <a href="https://in.linkedin.com/school/sinhgad-institutes/" class="linkedin"><i
                    class="bi bi-linkedin text-white "></i></a>
        </div>



        <!-- Mobile Navigation Toggles -->
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list text-white"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x text-white"></i>

    </div>
    <div>
        <div class="container d-flex align-items-center justify-content-between">
            <?php $this->session->userdata('role') ?>
            <h2 class="fs-3 fw-light text-white d-none mx-auto d-md-block"><b> Mess Feedback System</b></h2>
        </div>
    </div>
</header>


<!-- End Header -->