@extends('layouts.app')

@section('title', 'Home Page')

@section('content')


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="https://vashiisl.com/cdn/shop/files/W_C_web_1500x587.jpg?v=1731755899" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://vashiisl.com/cdn/shop/files/All_Products_web_1500x587.jpg?v=1731755899" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://vashiisl.com/cdn/shop/files/W_C_web_1500x587.jpg?v=1731755899" alt="Third slide">
      </div>
      {{-- <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('assets/silder/silder-3.jpg') }}" alt="Third slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('assets/silder/silder-3.jpg') }}" alt="Third slide">
      </div> --}}
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Category Slider Section -->
<div class="container my-5">
    <h2 class="text-center mb-4">Categories</h2> <!-- Added header -->
    <div id="categoryCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <!-- Carousel Item 1 -->
        <div class="carousel-item active">
          <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4">
            <!-- Category Item 1 -->
            <div class="col">
              <div class="category-item text-center">
                <div class="icon-container">
                  <img src="https://via.placeholder.com/100" alt="Laptops" class="img-fluid rounded-circle"> <!-- Dummy image for Laptops -->
                </div>
                <h5>Laptops</h5>
              </div>
            </div>
            <!-- Category Item 2 -->
            <div class="col">
              <div class="category-item text-center">
                <div class="icon-container">
                  <img src="https://via.placeholder.com/100" alt="Mobiles" class="img-fluid rounded-circle"> <!-- Dummy image for Mobiles -->
                </div>
                <h5>Mobiles</h5>
              </div>
            </div>
            <!-- Category Item 3 -->
            <div class="col">
              <div class="category-item text-center">
                <div class="icon-container">
                  <img src="https://via.placeholder.com/100" alt="Accessories" class="img-fluid rounded-circle"> <!-- Dummy image for Accessories -->
                </div>
                <h5>Accessories</h5>
              </div>
            </div>
            <!-- Category Item 4 -->
            <div class="col">
              <div class="category-item text-center">
                <div class="icon-container">
                  <img src="https://via.placeholder.com/100" alt="Televisions" class="img-fluid rounded-circle"> <!-- Dummy image for Televisions -->
                </div>
                <h5>Televisions</h5>
              </div>
            </div>
            <!-- Category Item 5 -->
            <div class="col">
              <div class="category-item text-center">
                <div class="icon-container">
                  <img src="https://via.placeholder.com/100" alt="Furniture" class="img-fluid rounded-circle"> <!-- Dummy image for Furniture -->
                </div>
                <h5>Furniture</h5>
              </div>
            </div>
          </div>
        </div>
        <!-- Carousel Item 2 -->
        <div class="carousel-item">
          <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4">
            <!-- Category Item 6 -->
            <div class="col">
              <div class="category-item text-center">
                <div class="icon-container">
                  <img src="https://via.placeholder.com/100" alt="Footwear" class="img-fluid rounded-circle"> <!-- Dummy image for Footwear -->
                </div>
                <h5>Footwear</h5>
              </div>
            </div>
            <!-- Category Item 7 -->
            <div class="col">
              <div class="category-item text-center">
                <div class="icon-container">
                  <img src="https://via.placeholder.com/100" alt="Books" class="img-fluid rounded-circle"> <!-- Dummy image for Books -->
                </div>
                <h5>Books</h5>
              </div>
            </div>
            <!-- Category Item 8 -->
            <div class="col">
              <div class="category-item text-center">
                <div class="icon-container">
                  <img src="https://via.placeholder.com/100" alt="Sports" class="img-fluid rounded-circle"> <!-- Dummy image for Sports -->
                </div>
                <h5>Sports</h5>
              </div>
            </div>
            <!-- Category Item 9 -->
            <div class="col">
              <div class="category-item text-center">
                <div class="icon-container">
                  <img src="https://via.placeholder.com/100" alt="Toys" class="img-fluid rounded-circle"> <!-- Dummy image for Toys -->
                </div>
                <h5>Toys</h5>
              </div>
            </div>
            <!-- Category Item 10 -->
            <div class="col">
              <div class="category-item text-center">
                <div class="icon-container">
                  <img src="https://via.placeholder.com/100" alt="Groceries" class="img-fluid rounded-circle"> <!-- Dummy image for Groceries -->
                </div>
                <h5>Groceries</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <!-- Carousel Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#categoryCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#categoryCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>


      <!-- two photo Slider  -->
      <div id="imageCarousel" class="carousel slide mx-auto mt-5" data-bs-ride="carousel">
        <!-- Indicators/Dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
            <!-- First Slide -->
            <div class="carousel-item active">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ asset('assets/silder/image1.jpg') }}"
                                 alt="Image 1"
                                 class="img-fluid w-100"
                                 style="object-fit: cover; height: 150px; border-radius: 5px;">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('assets/silder/image2.jpg') }}"
                                 alt="Image 2"
                                 class="img-fluid w-100"
                                 style="object-fit: cover; height: 150px; border-radius: 5px;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Slide -->
            <div class="carousel-item">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ asset('assets/silder/image5.jpg') }}"
                                 alt="Image 3"
                                 class="img-fluid w-100"
                                 style="object-fit: cover; height: 150px; border-radius: 5px;">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('assets/silder/image6.jpg') }}"
                                 alt="Image 4"
                                 class="img-fluid w-100"
                                 style="object-fit: cover; height: 150px; border-radius: 5px;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Third Slide -->
            <div class="carousel-item">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ asset('assets/silder/image7.jpg') }}"
                                 alt="Image 5"
                                 class="img-fluid w-100"
                                 style="object-fit: cover; height: 150px; border-radius: 5px;">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('assets/silder/image8.jpg') }}"
                                 alt="Image 6"
                                 class="img-fluid w-100"
                                 style="object-fit: cover; height: 150px; border-radius: 5px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls/Arrows -->
        <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!-- Single Image Banner Slider -->
    <div id="Controls" class="carousel slide mx-auto mt-4" style="max-hight: 250px;" data-bs-ride="carousel">
      <div class="carousel-inner">
          <div class="carousel-item active">
              <img class="d-block w-100" src="{{ asset('assets/silder/silder-1.jpg') }}" alt="First slide" style="height: 250px; object-fit: cover; border-radius: 8px;">
          </div>
          <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('assets/silder/silder-2.jpg') }}" alt="Second slide" style="height: 250px; object-fit: cover; border-radius: 8px;">
          </div>
          <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('assets/silder/silder-3.jpg') }}" alt="Third slide" style="height: 250px; object-fit: cover; border-radius: 8px;">
          </div>
          <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('assets/silder/silder-1.jpg') }}" alt="Fourth slide" style="height: 250px; object-fit: cover; border-radius: 8px;">
          </div>
          <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('assets/silder/silder-2.jpg') }}" alt="Fifth slide" style="height: 250px; object-fit: cover; border-radius: 8px;">
          </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#Controls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#Controls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
      </button>
  </div>

{{--  there Image Slider  --}}
<div id="image" class="carousel slide mx-auto mt-5" data-bs-ride="carousel">
  <!-- Indicators/Dots -->
  <div class="carousel-indicators">
      <button type="button" data-bs-target="#image" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#image" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#image" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <!-- Slides -->
  <div class="carousel-inner">
      <!-- First Slide -->
      <div class="carousel-item active">
          <div class="container">
              <div class="row">
                  <div class="col-4">
                      <img src="{{ asset('assets/silder/image1.jpg') }}" alt="Image 1" class="img-fluid w-100" style="object-fit: cover; height: 150px; border-radius: 5px;">
                  </div>
                  <div class="col-4">
                      <img src="{{ asset('assets/silder/image2.jpg') }}" alt="Image 2" class="img-fluid w-100" style="object-fit: cover; height: 150px; border-radius: 5px;">
                  </div>
                  <div class="col-4">
                      <img src="{{ asset('assets/silder/image3.jpg') }}" alt="Image 3" class="img-fluid w-100" style="object-fit: cover; height: 150px; border-radius: 5px;">
                  </div>
              </div>
          </div>
      </div>

      <!-- Second Slide -->
      <div class="carousel-item">
          <div class="container">
              <div class="row">
                  <div class="col-4">
                      <img src="{{ asset('assets/silder/image4.jpg') }}" alt="Image 4" class="img-fluid w-100" style="object-fit: cover; height: 150px; border-radius: 5px;">
                  </div>
                  <div class="col-4">
                      <img src="{{ asset('assets/silder/image5.jpg') }}" alt="Image 5" class="img-fluid w-100" style="object-fit: cover; height: 150px; border-radius: 5px;">
                  </div>
                  <div class="col-4">
                      <img src="{{ asset('assets/silder/image6.jpg') }}" alt="Image 6" class="img-fluid w-100" style="object-fit: cover; height: 150px; border-radius: 5px;">
                  </div>
              </div>
          </div>
      </div>

      <!-- Third Slide -->
      <div class="carousel-item">
          <div class="container">
              <div class="row">
                  <div class="col-4">
                      <img src="{{ asset('assets/silder/image7.jpg') }}" alt="Image 7" class="img-fluid w-100" style="object-fit: cover; height: 150px; border-radius: 5px;">
                  </div>
                  <div class="col-4">
                      <img src="{{ asset('assets/silder/image8.jpg') }}" alt="Image 8" class="img-fluid w-100" style="object-fit: cover; height: 150px; border-radius: 5px;">
                  </div>
                  <div class="col-4">
                      <img src="{{ asset('assets/silder/image9.jpg') }}" alt="Image 9" class="img-fluid w-100" style="object-fit: cover; height: 150px; border-radius: 5px;">
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Controls/Arrows -->
  <button class="carousel-control-prev" type="button" data-bs-target="#image" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#image" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
  </button>
</div>

 {{--  Trusted By Logo Slider  --}}
 <div class="container rounded">
  <h1 class="text-center">Authorized Brands</h1>
  <div class="slider">
      <div class="logos">
      <i class="fab fa-js fa-4x"></i>
      <i class="fab fa-linkedin-in fa-4x"></i>
      <i class="fab fa-dribbble fa-4x"></i>
      <i class="fab fa-medium-m fa-4x"></i>
      <i class="fab fa-github fa-4x"></i>
      </div>
      <div class="logos">
      <i class="fab fa-js fa-4x"></i>
      <i class="fab fa-linkedin-in fa-4x"></i>
      <i class="fab fa-dribbble fa-4x"></i>
      <i class="fab fa-medium-m fa-4x"></i>
      <i class="fab fa-github fa-4x"></i>
      </div>
  </div>
</div>



{{--  Youtube card  --}}
<div class="container mt-5">
  <div class="row justify-content-center">
      <!-- Card 1 -->
      <div class="col-md-4 mb-4">
          <div class="card" style="width: 100%; margin: auto;">
              <div class="ratio ratio-16x9">
                  <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                          title="YouTube video"
                          allowfullscreen>
                  </iframe>
              </div>
              <div class="card-body d-flex align-items-center justify-content-between">
                  <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="text-danger" style="font-size: 1.5rem; text-decoration: none;">
                      <i class="fab fa-youtube"></i>
                  </a>
                  <h5 class="card-title mb-0" style="font-size: 1rem;">Watch this video</h5>
                  <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                      class="btn btn-primary btn-sm"
                      target="_blank">
                      Watch
                  </a>
              </div>
          </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-4 mb-4">
          <div class="card" style="width: 100%; margin: auto;">
              <div class="ratio ratio-16x9">
                  <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                          title="YouTube video"
                          allowfullscreen>
                  </iframe>
              </div>
              <div class="card-body d-flex align-items-center justify-content-between">
                  <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="text-danger" style="font-size: 1.5rem; text-decoration: none;">
                      <i class="fab fa-youtube"></i>
                  </a>
                  <h5 class="card-title mb-0" style="font-size: 1rem;">Watch this video</h5>
                  <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                      class="btn btn-primary btn-sm"
                      target="_blank">
                      Watch
                  </a>
              </div>
          </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-4 mb-4">
          <div class="card" style="width: 100%; margin: auto;">
              <div class="ratio ratio-16x9">
                  <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                          title="YouTube video"
                          allowfullscreen>
                  </iframe>
              </div>
              <div class="card-body d-flex align-items-center justify-content-between">
                  <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="text-danger" style="font-size: 1.5rem; text-decoration: none;">
                      <i class="fab fa-youtube"></i>
                  </a>
                  <h5 class="card-title mb-0" style="font-size: 1rem;">Watch this video</h5>
                  <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                      class="btn btn-primary btn-sm"
                      target="_blank">
                      Watch
                  </a>
              </div>
          </div>
      </div>
  </div>
</div>


{{--  Our Happy Customers  --}}
<div class="container mt-5">
  <div class="row justify-content-center">
      <h2 class="text-center mb-4">Our Happy Customers</h2>
      <!-- Card 1 -->
      <div class="col-md-4 mb-4">
          <div class="card" style="width: 100%; margin: auto; text-align: center;">
              <div class="card-body">
                  <img src="data:image/jpeg;base64,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" alt="" style="border-radius: 50%">
                  <h5 class="card-title">Our Mission</h5>
                  <p class="card-text">
                      We aim to deliver top-notch solutions tailored to our clients' needs and goals.
                  </p>
                  <b>Siddharth Shah - Reliance</b>
              </div>
          </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-4 mb-4">
          <div class="card" style="width: 100%; margin: auto; text-align: center;">
              <div class="card-body">
                  <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMTEhUSExIVFRUVFhUXGBgYFxUVFhcYFRUXGBUVFRYYHSggGBolHRcWITEiJSkrMC4uFyAzODMtNygtLisBCgoKDg0OGhAQGS0lHyUtLS0tLS8tKzctLSstLS0tLS0tLS0rLS0tLS0wLS0tLS8vLS0tLS0tLS0tLS0tLS0tLf/AABEIAOEA4QMBIgACEQEDEQH/xAAcAAABBQEBAQAAAAAAAAAAAAAEAAIDBQYBBwj/xABGEAABAwIDBAgDBAgEBAcAAAABAAIRAyEEEjEFQVFhBhMiMnGBkaGxwfBCUnLRBxQjYoKS4fEzorLCFjRTcxUkRIOTo9L/xAAaAQACAwEBAAAAAAAAAAAAAAAAAwECBAUG/8QAMhEAAgIBAwEFBQgDAQAAAAAAAAECAxEEITESBRNBUWEiMnGx8BRCgZGhwdHhM1JiNP/aAAwDAQACEQMRAD8As0kklYwiSSSQAkkkkAJJIBODUANShSBieKajIEIau5VP1a6GIyAPkSyInIl1aMk4BsqWVE9WuFiMkYBoSRBYmliMhggSUpYmlqkBiS7CbXe2m3PUe2m3i468mjVx8EEpN7I6kq/B7aoVXBjKnaOgIcCeQJEE8pVggmUXHlCSSSQVEkkkgBJJLqAOJJJIASSSSAIcbiBTpvqESGNLo4wNFjsJ0jxBdmNRt/slgLfAACR4zK03ST/la34CsFTERw5fX5INumgnFs3ezduseQ2oOrcdNcjvAm481eNYvNQ5unZHLtE/0V3sbpCaPZqS+lx1dT+ZaoIs0/jE2bWKRjOK7hnNe0OaQWkSCLgogMVTNjAOKaeKanDFHiMTTp997W8ib+guquWOS0YSm8RWRvVpdWhHbco7s7vws/OEx+22bmP85b8kvv4eZrj2bqX9xh3Vrhpqnf0mYNaZ8nAn0ICczpTR3tqN5w0j2dPspVsX4kvs3Ur7nyLQ00wsTsFjadUTTdPqCNNQdNQiCxMTyY5wcXiSwwJzEwsRppLOdJukjcPNGhDq+jnatpTu5v8Ah7KyCFbkd25ttmG/ZtAqYgjum7Kc6OfxP7qxOPc57jUrF73H7Tg70AEADkLJ9OmbkucXOkuMGSTrJN0HiKpG8nkfz1VjbCCjsiPDPDKrHj7NRh9HA+S9QcLry2g3M9gG97BH8QXqTzc+JQK1axg4uLq4gxCSSSQB1JJJAHEkkkAJJcLl0KBkqpxipSWz4B9pUc9Goz7zHj1aYWC2TQ6wAbyvSGtXn2zwaFdwicj3AA6GCRfkok8LJu7Ni5zcC/wexmMF2hx9kDjMCCZytHg0j/MrMY5z4ExH2WguPhGgPjCZiml3eIH/AHKku8qbJj+ZZZalI7K7Lk5Pqlhfmyu2Ftd+GflJmkTcT3Tx8F6LsvH067M9NwImDxB4Fea1dlVHGGtc78NN3uXEq36Mtr4UucIcx0SzW+gIc2wO60q0bHLGxk12i08INxn7S8/H0+JtNr4rqqL6m8C3ibBYvrTrIc4/amfNXm39o9bTaAx4gy4WMEXG+/sqGjMTkcRrJ08SLFZ9Q236GvsilQrba9p/mSkyQNeG/wA/FdaxpcGZgCSGkgSBmMS4kgDXdKJDIkuMdm8aNEXPibgDiV0YY5CXMqCGxDTEzE5QBceemqyZOs2oozuKe2S1hIgxBjNE8Iv4J72DKN539nfJ5ERAHqp8ZQdY3DHTDDMi+pkmCPKyDNcGRF2xdzWy6bEyJI7U8dQmojaXDJtm7QfQqB4iLZhES2b92LibSvTmgESN68nY8TaPcf6rLQ/8XVWUm02MBc0RmPaNtDlAhaK7VHZnL7R7PldiUMZ8SXpJ0jq067qNLLAaAT9rM4TYzaAQs7h8C1vbNKtxzAip47h8UqjalWoajodmiS4bwBZxAgb94VzRwRIltBpBGtKr+0aQ0A90y4TwVZXyzszTDRUQrUZRXHPqVorUnWDx4ElvsRHuqbarSDoY5wfcKfab5JuSeFQdr+ff5lV7cQRbdvB+S1Qu8zJb2ck81v8ABhPR2hnxNIcHZ/5Bm+IC9FWM6EYXNXqVNzGADxebezXLalieuDga3Kt6X4DUlx+np8VxpRnfAp0TVas8DqSRSUiTqSSSAOJJJBAELnOmIgW9JRFFg4318ePgmPuDHh5nRPFCQBJ11+P5eapjB0rdQ7YpWbJeCXh5k1GDosZ0rwmXFC5AewO0JvJB0v8A3W6pUwBawVHtw0XuDg8uLREMaXAXJJz90cN6pbJKO5bs9T799znGHvjhAmwMEwNJdOQ2yz1cmZmTBgac59LYVWt7DGNa0gwaeSnJn7xlzhrcoVlBtRvZlpi03GhiLWg/PxTG03aW0Is5sBwtOhI4wPbRcy2MurLR6DTzhZFrqba8GQVA8Zhx3tMgfiEHN6nWyMq7SOUN0Y0AZSQ4yL96BO4eqheAxkOfHGbT4DU+yyW2NqZjDXOMbpgeJA+AV6q5vdbIrfZVNqEl1S8v39C32pt1sZWnSbDug/XMoLZtSTmOUkn7UZvLUgIPYWyDU7Tu6NJkz5LUUcE1thbkA35ifdOlYlHpW5NOgkpqx4SXgglz2F5D3QzO4kgj+CeX5rmKrh3WABopyztdk3kBggsMzJ702G5TOwhLCCx14kkESG6SeXgVX46lUIDJhjdAHM4alpEk84CwxTNvRGb5B9t1gHnQuzwO0RYhxOYAkd4jdKrGgEg5soAe0uDTZwfm05x7onaIcS3NdzGwCXOeNZmG0/C07hMqtrZyA2HGJvl1mB7AD3WhZwWrowiPFOqRIJOpuB8RvXdmbQHcf4wdRzaVEXvbe41Gg3iDqEHWE3TYtNYYm3TWdXUnwaNmEvIdIO6QDygkQp30COe/fJO4TAnXUT4rPbP2u+n2TdvDhpf64rQUekJADWsY4ayWgO8A8a66Hhqqqt9WGxNmonXHOM+h3FUi6TiBDIOUuHbkcHAacjOqoMXgoMjNl/eEO5CN88R7LRYrpVIALN1xb56qhrPLzmdczprAO4eCfOMYLYzaS26yb6lhGr6BUf2VQxB6yNQbBjSNPxFaNzFmuh9fq3upluVjoPCHi2/iPgFrnMTapJxOL2pXKOobfjwAvpDgoyyEa5ihc1NOc8gxXFI5qjIUlTqSSSkDic0LgUzGoAayiJlCYjbdJhytIcRrB7I8TvPISrM0g4Fp0Kocf0avnZGskEHIbzuuzw05t0We6c4r2Udbs2rT3TxqZv0X9keMx7n94gQB2SRqXQAGCQDoe1MIdxI4yIuGgx/F2gpq1Oq1pmlLXHXLmEAWy1GgsDReIg8lHgC0dp57IvLnAtBG6Dv8lznJyeWethGuqv2EsegZg8CHkdupLtYkySfnxhEbfq08JTyuqkuMHKXSWj4gHgNVnds9LMri3DCDuMAkHiDuPvzWOx+L7RfWeXPO7V3nw81qrizl2wTWZyxEtdqbZq4h1jA3DS3IDRRYTB0wQatVrG+pWfqbSebNhg5XPmVAGuJvcrR3MnyzOtbTT/ijn1Z6LT6T4Ki2GtfVjxA/JCV/0hgf4WFaOZN/YLKYHZznTbcTHwT27Ml7ZPZzAHwO9StNWudxFnaN0vJfXqW1f9IGJcYDKY8iUK7pninTJZ5N/qndLuj5w1Wm4CWPuOG6yq8Xg4e+ORtzV1TX5Cvtuo/3+QS/pTid5b/L/Vc/4lrzByH+H+qhwmFDasvFmtzee5TYXY7n034g9lt8vO+qnuoeQfbtR/uyWn0lfvYPIkKX/wAfY7vsI9Cqujg5aTvAlD1aBCh0QfgNj2lqFy8/gXwqUX91wB4afFNexzLg29vyVB1J3qShjHs0JjgbhUdGOGaI9pKW1kfy/g0OHx40IvzuPe4RoxOUteC28ExlLmlpggyLG0idfNUWHxLKlj2XexU+dzeybj5ER6Jc9/ZkNrhGL72ndfX5G62XtprtYcNBAAuBqQe7MC1/DjrcA+WCTfgbOA3SFR9GujE4XPJZVec9N33LQJG8O3jhCYMc4VHMqtcx4EFhhzZ0LmEAHST5rO1KmWVwUxVroOK2a+s/A0r2qB7UVSpw1oPAfBR1Grank81OOG0BPaoHBGPCHeExC2RJJ0JKSBMCIYFEwIimFDJRNTaiqbVFSCJphLbGpA+J2UypJl9Nx1dSe6m4+Jae15yqfpH0Wa7DnqWufWYQ4F73Pe+AQWlzjzkDSWhXwxrQ8sO4TM+FvdHsSnFG6N2op6ct459D5z2vijSJpM/xPtu3idw4HnulU9Olx3rWfpH2U6ntOoGtJ60NqNjeHC/uCEFhdluBEtMrRWkojNRdK2bb/D4AGF2e525XuE2K4ASFebM2ZF3eyW0eklCh2BmqOG5sRPNx+Ss2JJNmbHLXB0SNDrMHxEqh21h+rxGTj8zZG4fptUaZ/VobyJlTY7GU8flfTOWrTvDrO/qqphhm02lsunisFTY4jM1oIO8OLSPiQsd0h2KKRc5pBgU5ji3vfJMwu06rJYZH1YjyCZtLGPdTI4n4oSwBNT6PZmS6xc2mJ5Xt8/NO6QYqm3DmkzutaWjnFreahxG1i1sTrbwGiztao6uTJy026nkFKQB3RrCZqb3mOHG+oAUVfZ9zAJ8vmn7OGJxH7HBUnZWAuJAkxve4mzfNA0KNap2m1nOMTclQ5pcl1BvgdV2a7gfHX2VbWwxCtaG03sOSuMw0mLj81bU6NJ9w5p8gPgrKWdyjWDHVcPCvOjbjXcKLoz5mgE6dowJ5cfJF4zAN5KboZhKVPHU31HhrAZvpIILB6gKlkeqJo01zpn1eHie14WiW02NcZLWtaTxIABKqukexhXZLYFVt2O/2u5H2V9MiVE8JGMrDMkLZ1zVkeStwb3Opsc9hY4tGZp3HeE2oEa8IWoFdCLN22B1AoHhFVEO8JiEtEOVJOSViBMCIpqBiIpqGSgmkE3aGKNNoI48LQNQn00UxLZoqlGM1JrK8ijqUqsjs5pIk3JBEy2QOftG5aLB0MjdSSTJkzc6xyUWBHZgCAHOA8A4wpcbUy03GYsVQ136uVsVBrCRhekTxVxJeYJaOraYuGyTHqSqvF1qNGx7TzuEe5VRt7a/VkhpvOs38kPsRznnrKgOWdTv8ibrQlhC1sXobVqtAALA7hqfAqh2dsMuxFRhglj3N5WcQB7Er0DZVfDnL2spHAgD0IQO2sMcJinYoDNh60F7hfq3gQS/g0iDOkzOoSLnLofTyNpaU1kx3TXaeGYKOGoUnNq0iTiKjrFzy0dht7svm3Wy81VMwr+pbiqVnNc6P4SfUGIWw6SdGKeOqU69GtTbIy1DrLR3XADVw0vujgu9IqlDD4X9Vow+oGhoA7WQE3fUI03m+pSVcmoqK38RzhvJyexI/Z3W0KeJb9ps+o0U+1Nj5abXDfCk6GbRaMCaFTWm4Nadc0mQPQ+y1VamTRDck8JEmdZ5blqzgynknSSiWvyjQ/O6i21hRTw7Itnexp8NT8Fs+kHR1xpmoS0EXPPwWT2pOK6ukyzaYJM6FzrfCVdPIFm79Yw+zqr8LUczOQKwaBPVgES12rYzXI3TwVB0CpuqYtjdWta4u4RED3j0W26O4fGUacOw/X09M1JzXPFtH03EE24TPBO2fTbQzjC7OrhzzJzN6pvIF9Q2aL2AMTosblNRlDGfJmn2HJTTK/pJslrsTQYwDtvkj91oLnO8LD1CFxezKbB/hEkauEBo8ZN1cgfq7n18Q5r8Q8ZQG/wCHSZr1bZuTNyd8CyoNqbWe4SfKb+0ADyC0UxcYpMTZJSllFHtDGZTaY5/3KJ2ViA5wNj5IHE9vXVBUXOpukFOKH0V0crZsOw8BHoj3rM/o4xbqmDBc2O0Yi4I3+60zlmktxEluDPQz0TUQtRShbBqiHeiKiHemIWxi4upKxU4xEMQzERTKhggqkUXTKDpoqmUtjUFMVd0oxBp4ao5sSGmJBPsN6sGKo6YgHDEEkdoaW9VVcjI8nj2G2c6o41ajSRunfzMrR7ExAcOrsI0Ez9eqY2uzuaDid6GxuyjOelPHX4J73NBa1MCGu7Li0+Ej4FHYXbFekOyGv8Ab+IICqdjbfbPV4hsO3PMEfxDKr7M2q4Bldj+TQT8GqrWCBmBo4Ss6amCpBx1IpNAJPEkAequNrYCnTw5bRY1rYs1jQ0eQAHqoDi2UCGsaa1XgwF0fKVd7IoV6hz1aDqYP3y2fQEwqvzDJ530Rw7hXyuGjpAOgnf46L1qlg3ZBNgVmOmHRnEtc3EYANNRoIcwxJH3mnQP4TK81p9JsS2q9jhWpObd0ucHawcz5ze6nHUB6p0swDxQcWk2E8vBeUbFaTi2loJ3kD8vRQnaGMxWJ6qgyrVqfukyBxc8mzebjC9Q6O9C/1Wn1lcsdXcJcQYYyb5Gzw471PuoCWjtWiIkmmdJA9jAVL0g2pUJIY8EcrE+ii6TYSpeoxhdxAc028CYI9+SyJ2pWpSTTeGcHwGg8i4yEJATVte1Y/ig+arcdTOsmBxMqertjOOz1XnUp/Nyrq+BxNS/Vlw/cyvH+QlXROQN1Qk20HuphTaYkjwTatE0x22ub+Jpb8UGaoO+ysB7P+jGsTQczKA1rrEc9x9FsHrCfolqTQeJJh2pFiDpfldbmoVmmvaES5IKhQtQqeoUNUKlCmweoVA5TVVA8q6KSOJJqSsVGtRFMoVpUzChgg1hRNMoKmUTTcltF0w1jlU9M6JfhKkTYTDRLnRo0KxY9S1G5mkHQgj6i6qtmMi9zxCnhKxcJaKfAVHsouP8ADUc0lW1I4mQ0Opg8C57yfDqmPlM2ti2YSq6j1eV8zMB1jocoAb7IWntGtUMCq4N4Zsjf5G2Wg0lxW2We9Vyj8TCyfD9YrUfgrPZ+Ia3sMrUWz919LP5NpCtJ81lv1LOSGQ9zbmB2WfjeSGsH4iEZsvE0qJ/a1BVG9lPuHk98hp/hL1VoDX4TCYem7K04zE1HC4a6plHJzmimxh5OIKvcGwsAb+r0qYu4dZWzZSLy/Uk8gSOayJ6S0HgMmqGju06B6pvIFwdLj6J9HaOEaSW4RhNpfVfnaI4kl0kcBN94VGmGD0/AYs5RnqMcY1YMrTzAJJ9155+mDZLX0HYym4NexsPB0qs4/ibJg7wSOBE1fpoxo7zLDQaRzmI8F530r6UVMZNME5Dqd0cBxRGLyTg9N6CYJmEw+Ywa1YNdUcLgADsU28Wtk33kk8AjNuY5tSWimypA0LgD6GPrevJ9l9KKtGmGPLsrbNeOAtdWFbpL1re8Hx5EcwRBCnpeSC0x1WkH9vDV6Em7mvq5PE9WSAPEJ7qWDc3MzEYlpH2m1mFn87muHlc8lk6m2KjTNOrWpkfvlw993JNO3A69eix5/wCrTHVVPPqy2/Mzp3SrdIF7j6FYNz08c8N41DTj/wCR/VNWf2ljMWwftIqMOjzSZUpnwc9jmO8nFJ2MHfo13sdF7ua4f+7SAJ8XUgOZUX/jFQkkmm8nVxAY+Bu6+gWPP8RVkBFT6Rva3LlZHAN6of8A0FnxXHY9tQgmgwni06+JqNe7/MuYrHMd3mgE/wDUaHg+FakG1I5HN4q66I9HBXrt7DmtaWvLg5r6bgCCWg2I0j7RvdSyOD03oXgW0cLTDWZMwzEST3jm1JPFXFRyQsFHUcsz3eTO2RVHIZ5UtQod5VkhbInlQuKkeVC4q6KM4kuSkpII2qVpUAUjCpALpuU7HINrkRTKo0XTDaRRdMoGmfrX23/BEMqfWvuqNF0yDbfR6hi2ZarAbWcIDm82leWbW6GVsIScpqsuQb6D7zBp6kH2XsdOr9b1LmG9SpNDVM8AOJLoabhugMNps8GCGt9L81HUqzZozO3Ejf8Aus+Z9AvWemHR7CGhVrOaKTmNLs7bGeYFnT6leV4SkWHPMgyGEcIkmNx+z5ngmxlkanlDBiTTs4zUOpmSBHdHzO/TTWCriXuIvfhuATcdgycjheQJ5mbquqOc1xuQrFi8wOy3VXDORE/VlsNmdH6bHAvggXA3cp5a+y86w+03s0KtGdKqm8u9fkqtMMmx29g6IEZb8lisVskd5ojw/ou4jpI514KEr7ceRAAahJoDrabm6unkbj3RGIY2Ac0ZtHcNzmu4jTwBCqW1XOtJv8UQ0E0nNO6HDz1/0tViB1QQYd2XD08bfEJlSnNzr97618UsI01Ginq5vdPL7p5cOBPA2t9gbONSs2lrJ7YPcA0Ljz3Wg3Am6G0llkxTbwhnRzY9WtUDaZsSMxiWgcXAyCva9mYFlFmRgtqYtJ4/0UmzsJTosFOmxrANwiCeObX1Uz48Elz6uBFraeGNJPGfYjxjX0UT3rj7KJ1SRf1QIbGvPBQOKc8qJ7lOCo1xULinPKicVYgWZJMlJSQJdBXEggCZhU9N8IQOUjXKCchjan1+amY9Atep2FRglMPp1FO2oq5tRB7d2yMNSL7F5sxvF35DUqkttxtUJWTUI8szH6VtuOhmHpuI7WZ8SJIFmkjcJB8SOBWXeZpNe219ws1xABbH3XAWGkgjhMvSrDuLWVXXJALjzJcHepufxJ3R1zSCx/aa4Q4cQfnZTRJShk3a6p6aUY+GF/f6g9IFzOzAIh2U6Eb8pOnmhMfhg5odEG4Pl9BHbYwFTCkQc1ImWP4T9h8aH43jgAqGImQe7qBvaf8A8/Xi0VGSksoqqmGUdSjCuMYBMjT6/NKlSBGY6Ae5UlijcxLq1ZFjdT9FOwuzalW7RDBq46eXFBVtLkCpENui8DSJzOdaQ0x4PFvZH09lsYCSHEjVxIgW3DL7BQuY5xDWgyY9NZ5IbS5KqTm8RRDhaZLgxgjjwjeXFej9D8Ixjf1jutHazGJeckGo4fd73ndZXYuy21HFk/sm3qu0NVwuKTeDeJ+ZRfS7b8/+Wp2AgPA0AHdpiPU+nFYbrHY8Lg61On7v2X73j6ehdbN6Rvdjc7rU6kMaJEBs9gxxkzf7xW1NQb/r8l41hDF5uvS9j7SFak14N9HfiGv5+atS/uiu19OoqNkfg/2LZzo8PrQqGof7/mOKj6xcL/RPwcLJzOo38R/ZKoVDnViDjnKMrrk1SQJdSSQQJJJcQSdTg5MSQBOxyka9Dgp4KgCd1YNBc4wACSeAGq872pj3YmsXmcoswcG8fE6qy6UbVNQ9RT7oPbI+0Qe4OIB15+CFo4DK2XWPD8jvWHU3L3Uev7E7P7uPfWLd8ei/stOkGF67C5gO6LeDoHxDfdYrY1Yg/Fei7DAfSfTJtoddHTBCwdTDGliHMcIMn1m/vKnRT3cTL2vV7D/5ePwfH16noux2tqUhTqND2PEOaRIII+RHvKwnSvoy7CONSmc+HJgGZdTJ+w87xwd81qtg4rKMpJy6jkVoX1WZCahaaZBzh0nM3e0CIB89fBa5PoeTzlM5KWIrJ5BTIyngRPuu4ShUq5cPSaXPN3Runid39FZbQ2OBVIpOIpkmJHaYDEid8GRMWi8QVuejFKnRpgUobPfBaHPN4IcTp6+qlWxfDN+ojbVBScXv9bmewPQxjINWoyo4aMBloO+wnMfqEbjWtHYsQLENtAM25b0djRZ7Q4MEaNkk30J1dobaclU1aBAvA8L+g+oVHPPLM9NU7JrCcn5FNtaX1IbpcNA05/OShy0D9mzkKjxy+wz81NXfMtYbaOf/ALWH4n6DWNgQ2BGnBZ7LepY8D0mm0ipzJ+8/09F/Iq20/wBXp5aYAeWwP3RIObxtbzKoKVMkyTc3M/Mo7G4MjtGZJvPxH1vCFq1MthEqI+g1w6XkfWrkdkFaPobtTq3FpPZdE8uayIkmSiqVWLBMW3BWaVqcZcM9gLl1jtyzXRrawc0UjMgWJOsblfytCeVk8vqaJUWOEiY6Ecsw9YP1yQ5Klp1LidL+hEFQKwg6uBdSQQJJJJACSSSQBxdSSQAlT9I9r9S0MZ/iP/yt3u8dw/orSvVytLoJgaDUncAsE97n1i+rqTccItA5CISbp9KwuTsdkaFX2dc17Mf1Y7DElwJvEf2V3TOd17f0XGdXULQIAFrQEbSwLtxhvHjzAXLk9z2inFLL2YVs6u1tSHgQQRv8QT9b1R9OMARlrgaOIJtcbj6EfylWWJpGm68TqCN6ssZhzXwrmyHZpIjcQDA8TMfxIrl0TUkc7WVRks+ElgyOyccDYeiu8djIa25gny5Dz+aw+CcWPibg/BaGpiC/KzjAPhvH1xHFda7plW+o81pqmtZHu47+K+YyntJkgC5EmDvMsgEnQQy55korZu1XNqMbTILQ1rXEiQ4gQS2dBrfms9tLDgViQLNi26bnTwHstFgcMAwVCRliZ0gcUjT1w99s39q2WtfZ4Ry3+zLDE1XG2bKNTFvMnVUeNxZf2QTk+9vf4Hc34/GXHYnrOTBoNC7hm4N5b/ZB5Z+vhxVbrlJ4XBfs7Q/Z1lvM3+nov5OW8G8vgF1uKDZsBz19eKZiXAQRpoBwiPzQFV6TydqNSit+RY/ESABo2Y89fKwVYwjNdTYhyr3uvAToIxaiSWwTVqSbJ7KZTsJgzwI4za3Eo0YfWfQKzkVhW2ss5gsSWOB0IW92NtdtUQTDwLjjzCwIphS4bEFjmkHQg+6vGWBGr0sb4dL5XDPTTqmMMiUBsTaja7J0cLOHwI5FWACeeXsrlCTjLlHUkklIsSSSSAEkkkgBJJKs2/tMUKRIIzukMB473eA/JQ3hZL11ysmoR5YHt7a9NpyB/abqAJufawlZupWzukTH1KrywkzOYkmTxP5qajUIssNj6nk91o6o0VqteBfbKfBPhdaVlcQYBsNSLC4ssfgq8EK7GLEGHDwB0ErLNbmmyPUG49zXNkbh8PPREdHXh0g/Zgg2kax6KjxVc1C1rSSTz52n63rmDrup1AXSIMO8DrfwuquOURKvqpcM78oq+muzzRr5gID+0LRed3KfaENsXE5n+ceQFz/MR6LbdNMAK2GztEup9rjYxPlMH1Xn+wqRDs5s0ZhO8k2AaN5WmM+urD8Dm6eKV3eJbvn8PrIVUoGpUc6Q1rXkucdAA0j1ujnvkBt8rYytOp/ecOPLd8OhwtawuG7hzPF3Pd7qKvV/tZRl8GmSTl7P5ic619fle/wQ9SomPqodz1KiPj01okqVCTrPioa1O0yk1287kDjcZPZHn/RXjEzXX4IMRU3BSYbC77BR4ekTcq2a0QBEmBpbwEK8njZCKodb6pE9NmpABkm+sC1ypiRAi26eP5aptCkdAOJN7TlNv6+KfUpx3QLb80+eiWaspbAtSfqUNUKmc9QuIKamJkE7IxzqFRtT7OjhxB1/PyXo9N4cA4GQRIPIryhzjC1/QjaWZpoON29pn4d48j8U2Eji9p0dUe8XK5+Bq0klxOOEdSSSQQcSSSQAljenP+LS/Af9SSSpb7p0+yP/AEr4P5FBR3+HzXaaSSxHsAyiigkklSNMOAjCd/yKscX3T+L/AGhJJVM8/wDOvgar/wBG/wD7B/0hedUu7S8H/NJJFXD+Jj0/uy+vIl3H64KvxGg8T8SkkmIdHkgKjSSTETIir93zVc3VJJMgc+/lB7dB4n5I/C7vwn4FJJUkaqeArC90fxf6Si8V3z5JJJbJnyUtdQu7p8kkk1FZEKtOin/NU/4v9JXUkxGTU/4pfB/I9GSSSWo8kdSSSUAf/9k=" alt=""  style="border-radius: 50%">
                  <h5 class="card-title">Our Vision</h5>
                  <p class="card-text">
                      To be the leading name in the industry by fostering innovation and excellence.
                  </p>
                  <b>Siddharth Shah - Reliance</b>
              </div>
          </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-4 mb-4">
          <div class="card" style="width: 100%; margin: auto; text-align: center;">
              <div class="card-body">
                  <img src="data:image/jpeg;base64,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" alt=""  style="border-radius: 50%">
                  <h5 class="card-title">Our Values</h5>
                  <p class="card-text">
                      Integrity, creativity, and customer-centric solutions drive everything we do.
                  </p>
                  <b>Siddharth Shah - Reliance</b>
              </div>
          </div>
      </div>
  </div>
</div>






  
  
@endsection





<script>
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    });

</script>