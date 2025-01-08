<style>
  :root {
    --font-default: "Open Sans", system-ui, sans-serif;
    --font-primary: "Amatic SC", sans-serif;
    --font-secondary: "Inter", sans-serif;
    --color-default: #212529;
    --color-primary: #ce1212;
    --color-secondary: #37373f;
    scroll-behavior: smooth;
  }

  body {
    font-family: var(--font-default);
    color: var(--color-default);
  }

  a {
    color: var(--color-primary);
    text-decoration: none;
  }

  a:hover {
    color: #ec2727;
  }

  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-family: var(--font-secondary);
  }

  .footer {
    background-color: #1f1f24;
    padding: 50px 0;
    color: rgba(255, 255, 255, 0.7);
    font-size: 14px;
    z-index: 3;
    position: relative;
  }

  .footer h4 {
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    margin-bottom: 15px;
  }

  .footer p {
    margin: 0;
  }

  .footer .icon {
    font-size: 24px;
    margin-right: 15px;
  }

  .footer .footer-links ul {
    list-style: none;
    padding: 0;
  }

  .footer .footer-links ul li {
    padding: 10px 0;
  }

  .footer .footer-links ul a {
    color: rgba(255, 255, 255, 0.6);
    transition: color 0.3s;
  }

  .footer .footer-links ul a:hover {
    color: #fff;
  }

  .footer .social-links {
    display: flex;
    justify-content: flex-start;
    flex-wrap: wrap;
  }

  .footer .social-links a {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    border: 1px solid rgba(255, 255, 255, 0.2);
    font-size: 24px;
    /* Increased font size for better visibility */
    color: rgba(255, 255, 255, 0.9);
    /* Slightly higher opacity to ensure visibility */
    margin-right: 10px;
    transition: color 0.3s, border-color 0.3s;
  }

  .footer .social-links a:hover {
    color: #fff;
    border-color: #fff;
  }

  .footer .copyright {
    text-align: center;
    padding-top: 30px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
  }

  @media (max-width: 768px) {
    .footer {
      text-align: center;
    }

    .footer .row {
      flex-direction: column;
    }

    .footer .icon {
      margin-right: 0;
      margin-bottom: 0;
    }

    .footer .d-flex {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .footer .social-links {
      justify-content: center;
    }

    .footer .social-links a {
      margin: 5px;
    }
  }
</style>

<footer class="footer">
  <div class="container">
    <div class="row gy-4 justify-content-between pb-3">
      <div class="col-lg-3 col-md-6 d-flex">
        <i class="bi bi-geo-alt icon"></i>
        <div>
          <h4>Address</h4>
          <p>
            Sinhgad Institutes<br>
            19/15, Erandawane Smt. Khilare Marg,<br>
            Off Karve Road, Pune 411004
          </p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 d-flex">
        <i class="bi bi-clock icon"></i>
        <div>
          <h4>Opening Hours</h4>
          <p><strong>Mon-Sat: 9.00AM - 6.00PM</strong><br>Sunday: Closed</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <h4>Follow Us</h4>
        <div class="social-links">
          <a href="https://twitter.com/SinhgadCollege" class="twitter"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
              <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
            </svg></a>
          <a href="https://www.facebook.com/SinhgadInstitutes.STES" class="facebook"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
            </svg></a>
          <a href="https://www.instagram.com/sinhgadinstitutes/" class="instagram"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
            </svg></a>
          <a href="https://in.linkedin.com/school/sinhgad-institutes/" class="linkedin"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
              <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
            </svg></a>
        </div>
      </div>
    </div>
  </div>
  <div class="container2">
    <div class="copyright mb-n3">
      &copy; 2024 <strong>Sinhgad Data Center</strong>. All Rights Reserved. <b>Version 2.01.01</b>
    </div>
  </div>
</footer>