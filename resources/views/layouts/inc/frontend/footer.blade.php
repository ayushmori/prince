<!-- Remove the container if you want to extend the Footer to full width. -->
<div class="container-fludi mt-4">
    <!-- Footer -->
    <footer class="text-white" style="background-color: #0b4f9fe0">
      <!-- Grid container -->

        <!-- Section: Links -->
        <section>
          <div class="row text-md-left">
            <!-- Company Info -->
              <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3 company-info">
              <img src="{{ asset('assets/logoF.jpg') }}" class="img-fluid logo-img" alt="NeXT Solution">
              <p class="text-white">
                  Founded in 2013, "NeXT SOLUTION" is an ISO-certified company based in Rajkot, Gujarat.
              </p>
              </div>

            <!-- Quick Links -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3 footer-section">
              <h6 class="text-uppercase mb-4 font-weight-bold">Quick Links</h6>
              <ul class="list-unstyled">
                <li><a href="/" class="text-white">Home</a></li>
                <li><a href="/about-us" class="text-white">About Us</a></li>
                <li><a href="/contact-us" class="text-white">Contact Us</a></li>
                <li><a href="/news" class="text-white">News</a></li>
              </ul>
            </div>

            <!-- Top Categories -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3 footer-section">
              <h6 class="text-uppercase mb-4 font-weight-bold">Top Categories</h6>
              <ul class="list-unstyled">
                @if ($categories->isEmpty())
                <li>No categories available.</li>
                @else
                @foreach ($categories->take(4) as $categoryItem)
                <li>
                  <a href="{{ url('/category/' . $categoryItem->slug) }}" class="text-white">
                    {{ $categoryItem->name }}
                  </a>
                </li>
                @endforeach
                @endif
              </ul>
            </div>

            <!-- Top Brands -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3 footer-section">
              <h6 class="text-uppercase mb-4 font-weight-bold" >Top Brands</h6>
              <ul class="list-unstyled">
                @if ($brands->isEmpty())
                <li>No brands available.</li>
                @else
                @foreach ($brands->take(4) as $brand)
                <li>
                  <a href="{{ url('/brand/' . $brand->slug) }}" class="text-white">
                    {{ $brand->name }}
                  </a>
                </li>
                @endforeach
                @endif
              </ul>
            </div>

            <!-- Contact Information -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3 footer-section">
              <h6 class="text-uppercase mb-4 font-weight-bold">Contact Us</h6>
              <p><i class="fas fa-home mr-3"></i> Rajkot, Gujarat, India</p>
              <p><i class="fas fa-envelope mr-3"></i> support@nextgroup.in</p>
              <p><i class="fas fa-phone mr-3"></i> +91 82005 01951</p>
              <p>
                <i class="fas fa-map-marker-alt"></i>
                Maruti Industrial Area, <br>
                Ramwadi 2, Rolex Road, <br>
                Near Maldhari Railway Crossing, <br>
                Rajkot-4, (Guj.-India)
              </p>
            </div>
          </div>
        </section>

        <hr class="my-3">

        <!-- Social Media Links -->
        <section class="p-3 pt-0">
          <div class="row d-flex align-items-center">
            <div class="col-md-7 col-lg-8 text-md-left text-center">
              <div class="p-3">
                &copy; <span class="cYear">2024</span> All rights reserved. Design & Developed by
                <a href="https://www.fuertedevelopers.com/" target="_blank" class="text-white"><b>Fuerte Developers</b></a>.
              </div>
            </div>

            <div class="col-md-5 col-lg-4 text-md-right text-center">
              <a href="#" class="btn btn-outline-light btn-floating m-1"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="btn btn-outline-light btn-floating m-1"><i class="fab fa-instagram"></i></a>
              <a href="#" class="btn btn-outline-light btn-floating m-1"><i class="fab fa-google"></i></a>
            </div>
          </div>
        </section>
      </div>
    </footer>
  </div>

  <style>
  /* Footer General Styling */
  /* Footer General Styling */

  /* Company Info Styling */
  .company-info {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  .company-info img {
    max-width: 250px;
    height: auto;
    border: 20px solid white;
    margin-bottom: 10px;
    border-radius: 10px;
  }

  .company-info p {
    font-size: 14px;
    margin: 0;
    color: #ddd;
    max-width: 250px;
  }

  /* Responsive Fix */
  @media (max-width: 768px) {
    .company-info {
      align-items: center;
      text-align: center;
    }
  }
  .footer-section h6 {
    font-size: 18px;
    font-weight: bold;
    /* margin-bottom: 15px; */
    padding-bottom: 5px;
    border-bottom: 2px solid white;
    display: inline-block;
  }

  .company-info h6,
  .footer-section h6,
  .contact-section h6 {
    border-bottom: 2px solid white;
    padding-bottom: 5px;
    margin-bottom: 15px;
    display: inline-block;
  }

  footer {
    font-size: 16px;
    line-height: 1.5;
    background-color: #45526e;
    padding: 40px 0;
    color: white;
  }

  /* Headings Styling */
  footer h6 {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 15px;
  }

  /* Ensure text aligns properly */
  .footer-section ul {
    padding: 0;
    list-style-type: none;
    text-align: left;
  }

  .footer-section ul li {
    margin-bottom: 8px;
  }

  .footer-section a {
    text-decoration: none;
    color: white;
    transition: color 0.3s ease-in-out;
    display: block;
  }

  .footer-section a:hover {
    color: #ffcc00; /* Highlight effect */
  }

  /* Social Media Icons */
  .btn-floating {
    border-radius: 50%;
    transition: all 0.3s ease;
    display: inline-block;
  }

  .btn-floating:hover {
    transform: scale(1.1);
  }

  /* Contact Info Styling */
  .footer-section p {
    margin-bottom: 8px;
    text-align: left;
  }

  /* Responsive Adjustments */
  @media (max-width: 768px) {
    .footer-section {
      text-align: left !important;
      margin-bottom: 20px;
    }

    .text-md-left {
      text-align: left !important;
    }
  }

  </style>
