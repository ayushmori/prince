<div class="footer pt-5">
    <div class="container">
        <div class="row">
            <!-- First Column -->
            <div class="col-sm-3">
                <img src="{{ asset('assets/logoF.jpg') }}" class="img-fluid" alt="NeXT Solution">
                <p>
                    Founded in 2013, "NeXT SOLUTION" is an ISO certified company based in Rajkot, Gujarat.
                </p>
            </div>

            <!-- Second Column -->
            <div class="col-sm-2">
                <h3>Quick Links</h3>
                <ul class="list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about-us">About Us</a></li>
                    <li><a href="/contact-us">Contact Us</a></li>
                    <li><a href="/news">News</a></li>
                </ul>
            </div>

            <!-- Third Column (Categories) -->
            <div class="col-sm-2">
                <h3>Top Categories</h3>
                <ul class="list-unstyled">
                    @foreach ($categories as $categoryItem)
                    <li>
                        <a href="{{ url('/category/' . $categoryItem->slug) }}">
                            {{ $categoryItem->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Fourth Column (Brands) -->
            <div class="col-sm-2">
                <h3>Top Brands</h3>
                <ul class="list-unstyled">
                    @foreach ($brands as $brand)
                    <li>
                        <a href="{{ url('/brand/' . $brand->slug) }}">
                            {{ $brand->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Fifth Column (Contact Information) -->
            <div class="col-sm-2">
                <h3>Contact Us</h3>
                <ul class="address list-unstyled">
                    <li><i class="fas fa-mobile-alt"></i>
                        <p>+91 82005 01951</p>
                    </li>
                    <li><i class="fas fa-envelope"></i>
                        <p>support@nextgroup.in</p>
                    </li>

                    <li>
                        <p>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Maruti Industrial Area,</span>
                            <span>Ramwadi 2, Rolex Road,</span>
                            <span>Near Maldhari Railway Crossing,</span>
                            <span>Rajkot-4, (Guj.-India)</span>
                        </p>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Social Media Links -->
        <div class="social-media-links text-end mt-4">
            <a href="#" class="mx-2">
                <i class="fab fa-facebook-f fa-2x"></i>
            </a>
            <a href="#" class="mx-2">
                <i class="fab fa-instagram fa-2x"></i>
            </a>
            <a href="#" class="mx-2">
                <i class="fab fa-youtube fa-2x"></i>
            </a>
        </div>
    </div>

    <div class="copyrights mt-4">
        <div class="row">
            <p class="text-center">
                ©<span class="cYear">2024</span> All rights reserved. Design &amp; Developed
                by <a href="http://www.jbsoftware.co.in" target="_blank">Fuerte Developers</a>
            </p>
        </div>
    </div>
</div>

<style>
    .footer {
    overflow-x: hidden; /* Prevent horizontal scrolling */
}

.footer .container {
    padding-left: 0;
    padding-right: 0; /* Ensure the container fits within the viewport */
}

.footer .social-media-links {
    margin-top: 15px;
}

.footer .list-unstyled {
    padding-left: 0; /* Remove default padding */
}

@media (max-width: 768px) {
    .footer .col-sm-3,
    .footer .col-sm-2 {
        margin-bottom: 20px; /* Add spacing between columns on smaller screens */
    }
}

</style>
