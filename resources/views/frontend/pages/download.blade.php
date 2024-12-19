@extends('layouts.app')

@section('title', 'Download')

@section('content')
    <script type="text/javascript" src="https://handle.inspiroxindia.com/pluginjs.php?id=IX20232024-00001"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/menu.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="{{ asset('fav.ico') }}">
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">

    

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3S5HBRBMVR"></script>
    {{-- <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-3S5HBRBMVR');
    </script> --}}


    
    <div class="section">
        <div class="container">
            <div id="ContentPlaceHolder1_ucDowloadSearchBox_pnDownloadSearch"
                onkeypress="javascript:return WebForm_FireDefaultButton(event, 'ContentPlaceHolder1_ucDowloadSearchBox_btnDownloadSearch')">
                <div class="clearfix form dwlpenal">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-4 p10">
                                <div id="ContentPlaceHolder1_ucDowloadSearchBox_UpdatePanel2">
                                    <select name="ctl00$ContentPlaceHolder1$ucDowloadSearchBox$drpDownloadBrand"
                                        onchange="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ucDowloadSearchBox$drpDownloadBrand\',\'\')', 0)"
                                        id="ContentPlaceHolder1_ucDowloadSearchBox_drpDownloadBrand" class="text-field">
                                        <option selected="selected" value="0">- Select -</option>
                                        <option value="3">Inovance</option>
                                        <option value="4">Autonics</option>
                                        <option value="5">Schneider Electric</option>
                                        <option value="6">Rtelligent</option>
                                        <option value="7">Modbus</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 p10">
                                <div id="ContentPlaceHolder1_ucDowloadSearchBox_upUpDownloadCategory">
                                    <select name="ctl00$ContentPlaceHolder1$ucDowloadSearchBox$drpDownloadCategory"
                                        onchange="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ucDowloadSearchBox$drpDownloadCategory\',\'\')', 0)"
                                        id="ContentPlaceHolder1_ucDowloadSearchBox_drpDownloadCategory" class="text-field">
                                        <option selected="selected" value="0">- Select -</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 p10">
                                <div id="ContentPlaceHolder1_ucDowloadSearchBox_UpdatePanel1">
                                    <select name="ctl00$ContentPlaceHolder1$ucDowloadSearchBox$drpDownloadSubCategory"
                                        id="ContentPlaceHolder1_ucDowloadSearchBox_drpDownloadSubCategory"
                                        class="text-field">
                                        <option value="0">- Select -</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-my-5">
                        <div class="row">
                            <div class="col-md-8 p10 mt-2">
                                <input name="ctl00$ContentPlaceHolder1$ucDowloadSearchBox$txtSearch" type="text"
                                    id="ContentPlaceHolder1_ucDowloadSearchBox_txtSearch" placeholder="Search product"
                                    class="text-field">
                            </div>
                            <div class="col-md-4 p10">
                                <input type="submit" name="ctl00$ContentPlaceHolder1$ucDowloadSearchBox$btnDownloadSearch"
                                    value="Search" id="ContentPlaceHolder1_ucDowloadSearchBox_btnDownloadSearch"
                                    class="custbtn">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section pt0">
        <div class="container">
            <div class="image-grid">
                @foreach (['Inovance', 'Autonics', 'Schneider Electric', 'Rtelligent', 'Modbus'] as $index => $brand)
                    <div>
                        <a href="download/{{ strtolower(str_replace(' ', '-', $brand)) }}/{{ $index + 3 }}"
                            title="{{ $brand }}">
                            <img class="img-responsive"
                                src="{{ asset('images/' . ($index + 3) . strtolower(str_replace(' ', '-', $brand)) . '.png') }}"
                                alt="{{ $brand }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- <div class="hdwatsp">
        <a href="https://api.whatsapp.com/send?phone=918200501951&amp;text=I%20am%20interested%20in%20your%20products!"
            target="_blank"><i class="fab fa-whatsapp"></i></a>
    </div> --}}

    <script src="{{ asset('admin/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/functions.js') }}"></script>
    <script src="{{ asset('admin/js/menu.js') }}"></script>
    <script src="{{ asset('admin/js/wow.js') }}"></script>
    {{-- <script>
        new WOW().init();
        $('.cYear').text(new Date().getFullYear());
    </script>
    <script>
        $("#m3").addClass("active");
    </script> --}}

    <style>
        /* General Section Styling */
        .section {
            padding: 20px 0;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Form Styling */
        .dwlpenal {
            display: flex;
            flex-wrap: wrap;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 15px;
        }

        .text-field {
            width: 300px;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: border-color 0.3s ease;
        }

        .text-field:focus {
            border-color: #007bff;
            outline: none;
        }

        .custbtn {
            background-color: #007bff;
            color: #fff;
            margin-left: 10px;
            width: 100px;
            border: none;
            padding: 10px 15px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .custbtn:hover {
            background-color: #0056b3;
        }

        /* Column Styling */
        .col-md-4 {
            flex: 0 0 33.333%;
            max-width: 33.333%;
            padding: 10px;
        }

        .col-md-5 {
            flex: 0 0 41.666%;
            max-width: 41.666%;
        }

        .col-md-7 {
            flex: 0 0 58.333%;
            max-width: 58.333%;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -10px;
            margin-left: -10px;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {

            .col-md-4,
            .col-md-5,
            .col-md-7 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .p10 {
                padding: 5px;
            }
        }

        /* Placeholder Styling */
        .text-field::placeholder {
            color: #aaa;
            font-size: 14px;
        }

        /* Input Focus */
        input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }


        .section {
            padding: 20px 0;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .image-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-top: 20px;
        }

        .image-grid img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .image-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .image-grid {
                grid-template-columns: 1fr;
            }
        }

        .hdwatsp a {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #25d366;
            color: #fff;
            padding: 10px 15px;
            border-radius: 50%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-size: 20px;
        }
    </style>
@endsection



{{-- {{-- 


<style>
    /* Basic styles for the button */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    #showDivBtn {
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      border: none;
      cursor: pointer;
      font-size: 16px;
      margin: 20px;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }

    #showDivBtn:hover {
      background-color: #0056b3;
    }

    /* Category list div styling */
    .category-div {
      display: none; /* Initially hidden */
      margin-top: 20px;
      padding: 20px;
      background-color: #f9f9f9;
      border: 1px solid #ddd;
      border-radius: 8px;
      width: 400px;
      box-sizing: border-box;
    }

    /* Category list styling */
    #categoryList {
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    #categoryList li {
      padding: 10px;
      cursor: pointer;
      border-bottom: 1px solid #ddd;
      transition: background-color 0.3s ease;
    }

    #categoryList li:last-child {
      border-bottom: none; /* Remove border from the last item */
    }

    #categoryList li:hover {
      background-color: #f0f0f0;
    }
  </style>
 --}}
{{--  
  <button id="showDivBtn">Show Categories</button>

  <div id="categoryDiv" class="category-div">
    <h2>Select a Category</h2>
    <ul id="categoryList">
      <li>Technology</li>
      <li>Science</li>
      <li>Arts</li>
      <li>Health</li>
      <li>Sports</li>
      <li>Entertainment</li>
    </ul>
  </div> --}}
{{-- 
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Get elements
      const showDivBtn = document.getElementById('showDivBtn');
      const categoryDiv = document.getElementById('categoryDiv');

      // Toggle visibility of the category div when the button is clicked
      showDivBtn.addEventListener('click', () => {
        if (categoryDiv.style.display === 'none' || categoryDiv.style.display === '') {
          categoryDiv.style.display = 'block'; // Show the div
        } else {
          categoryDiv.style.display = 'none'; // Hide the div
        }
      });
    });
  </script> --}}
