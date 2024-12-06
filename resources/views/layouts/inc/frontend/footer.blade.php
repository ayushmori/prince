<div class="footer pt-5">
    <div class="container">
        <div class="row">
            <!-- First Column -->
            <div class="col-sm-3">
                <img src="{{ asset('assets/logoF.jpg') }}" class="img-responsive" alt="NeXT Solution">
                <p>
                    Founded in the year 2013. we "NeXT SOLUTION" is an ISO certified company in Rajkot,
                    Gujarat.
                </p>
            </div>

            <!-- Second Column -->
            <div class="col-sm-2">
                <h3>Quick Link</h3>
                <ul class="list">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about-us">About Us</a></li>
                    <li><a href="/contact-us">Contact Us</a></li>
                    <li><a href="/news">News</a></li>
                </ul>
            </div>

            <!-- Third Column (Top Brands) -->
            <div class="col-sm-2">
                <h3>Top Category</h3>
                <ul class="list">
                    @foreach ($categories as $categoryItem)
                    <li>
                        {{-- <a href="{{ url('/category/' . $categoryItem->slug) }}" class="btn btn-primary m-1"> --}}
                            <a href="">
                            {{ $categoryItem->name }}
                            </a>
                        {{-- </a> --}}
                    </li>
                @endforeach
                </ul>
            </div>

            <!-- Fourth Column (Top Category) -->
            <div class="col-sm-2">
                <h3>Top Brand</h3>
                <ul class="list">


                    @foreach ($brands as $brand)
                        <li>
                            {{-- <a href="{{ url('/brand/' . $brand->slug) }}" class="btn btn-primary m-1"> --}}
                                <a href="">
                                {{ $brand->name }}
                                </a>
                            {{-- </a> --}}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-2">
                <h3>Contact Us</h3>
                <ul class="address">
                    <li><i class="fas fa-mobile-alt"></i>
                        <p>+91 82005 01951</p>
                    </li>
                    <li><i class="fas fa-envelope"></i>
                        <p>support@nextgroup.in</p>
                    </li>

                    <li>
                        <p>
                            <i class="fas fa-map-marker"></i>
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
        <div class="float-end mx-5 px-5 py-2">
            <a href="">
                <i class="fab fa-facebook-f fa-2x mx-2"></i>
            </a>
            <!-- Instagram -->
            <a href="">
                <i class="fab fa-instagram fa-2x mx-2"></i>
            </a>

            <!-- Youtube -->
            <a href="">
                <i class="fab fa-youtube fa-2x mx-2"></i>
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