<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-submenu@3.0.1/dist/css/bootstrap-submenu.css">
    @yield('stlye')
    <!-- Bootstrap Icon library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" integrity="sha384-He3RckdFB2wffiHOcESa3sf4Ida+ni/fw9SSzAcfY2EPnU1zkK/sLUzw2C5Tyuhj" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('css/font.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/nav.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.3.1/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-PDUiPu3vDllMfrUHnurV430Qg8chPZTNhY8RUpq89lq22R3PzypXQifBpcpE1eoB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.3.1/dist/js/coreui.bundle.min.js" integrity="sha384-8QmUFX1sl4cMveCP2+H1tyZlShMi1LeZCJJxTZeXDxOwQexlDdRLQ3O9L78gwBbe" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-submenu@3.0.1/dist/js/bootstrap-submenu.js" defer></script>
     <!-- Customized Bootstrap Stylesheet -->
     <link href="css/style.css" rel="stylesheet" />
     <link href="css/lightboxed.css" rel="stylesheet" />



<title>MasterApp</title>
  </head>
  <body>
<!-- Navabar Starts-->
<img class="header_img img-fluid" src="{{ url('assets/header.jpg') }}" alt="">

<nav class="navbar navbar-expand-md bg-light border-bottom border-body justify-content-center" data-bs-theme="light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="bi bi-list bg-dark"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <a class="navbar-brand" href="{{ route('home') }}">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbar-full-demo" aria-controls="navbar-full-demo" aria-expanded="false"
            aria-label="Toggle navigation" onmouseup="this.blur()">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- about us --}}
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        About Us
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('vission-mission') }}">Vission & Mission</a></li>
                        <li><a class="dropdown-item" href="{{ route('aboutCollege') }}">About College</a></li>
                        <li><a class="dropdown-item" href="{{ route('secreatoryMessage') }}">Secreatory Message</a></li>
                        <li><a class="dropdown-item" href="{{ route('principalMessage') }}">Principal Message</a></li>
                    </ul>
                </li>
            </ul>
        {{-- about us End --}}
        {{-- Administration --}}
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Administration
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('CodeofConduct') }}">Code of Conduct</a></li>
                    <li><a class="dropdown-item" href="{{ route('organogram') }}">Organogram</a></li>
                    <li><a class="dropdown-item" href="{{ route('administrativeCouncil') }}">Administrative Council</a></li>
                    <li><a class="dropdown-item" href="{{ route('teachingStaff') }}">Teaching Staff</a></li>
                    <li><a class="dropdown-item" href="{{ route('NonTeachingStaff') }}">Non Teaching Staff</a></li>


                </ul>
            </li>
        </ul>
        {{-- Administration End --}}
        {{-- Multilevel Submenu  --}}

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Academics
                    </a>
                    <ul class="dropdown-menu">
                        <li class="submenu submenu-md dropend">
                            <a class="dropdown-item dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Syllabus
                            </a>
                            <ul class="dropdown-menu">
                                <li class="submenu submenu-md dropend">
                                    <a class="dropdown-item"  href="{{ route('ugsyllabus') }}">UG</a>
                                </li>
                                <li class="submenu submenu-md dropend">
                                    <a class="dropdown-item " href="{{ route('pgsyllabus') }}">PG</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('progOffered') }}">Program / Course Offered</a></li>
                        <li><a class="dropdown-item" href="{{ route('progOutcome') }}">Program / Course Outcomes</a></li>
                        <li><a class="dropdown-item" href="{{ route('prospectus') }}">Prospectus</a></li>
                        <li><a class="dropdown-item" href="{{ route('academicCalendar') }}">Academic Calendar</a></li>
                    </ul>
                </li>
            </ul>
        {{-- Admission --}}
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Admission
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('admissionProcedure') }}">Admission Procedure</a></li>
                    <li><a class="dropdown-item" href="{{ route('notification') }}">Notification</a></li>
                    <li><a class="dropdown-item" href="{{ route('studentStrenght') }}">Student Strenght</a></li>
                </ul>
            </li>
        </ul>
        {{-- Admission End --}}
        {{-- Examination --}}
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Examination
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('timeTable') }}">Time Table</a></li>
                    {{-- <li><a class="dropdown-item" href="{{ route('notification') }}">Result</a></li>
                    <li><a class="dropdown-item" href="{{ route('studentStrenght') }}">Convocation Form</a></li> --}}
                </ul>
            </li>
        </ul>
        {{-- Examination End --}}
        {{-- Library --}}
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Library
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('aboutLibrary') }}">About Library</a></li>
                    <li><a class="dropdown-item" href="{{ route('libraryRules') }}">Library Rules</a></li>
                    <li><a class="dropdown-item" href="{{ route('libraryServices') }}">Library Services</a></li>
                    <li><a class="dropdown-item" href="{{ route('booksCollection') }}">Books Collection</a></li>
                    <li><a class="dropdown-item" href="{{ route('gallery') }}">Gallery</a></li>
                </ul>
            </li>
        </ul>
        {{-- Library End --}}
        {{-- Committees --}}
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Committees
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('admissionCommittee') }}">Admission Committee</a></li>
                    <li><a class="dropdown-item" href="{{ route('ScStCommittee') }}">SC & ST Committee</a></li>
                    <li><a class="dropdown-item" href="{{ route('minorityCell') }}">Minority Cell</a></li>
                    <li><a class="dropdown-item" href="{{ route('grc') }}">Grievance Redressal Committee</a></li>
                    <li><a class="dropdown-item" href="{{ route('arc') }}">Anit Ragging Committee</a></li>
                    <li><a class="dropdown-item" href="{{ route('ashc') }}">Anit Sexual Harassment Cell</a></li>
                    <li><a class="dropdown-item" href="{{ route('wec') }}">Women Empowerment Cell</a></li>
                </ul>
            </li>
        </ul>
        {{-- Committees End --}}
        {{-- Committees --}}
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    IQAC
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('aboutIQAC') }}">About IQAC</a></li>
                    <li><a class="dropdown-item" href="{{ route('aqarReports') }}">AQAR Reports</a></li>
                    <li><a class="dropdown-item" href="{{ route('ssrReports') }}">SSR Reports</a></li>
                </ul>
            </li>
        </ul>
        {{-- Committees End --}}
        {{-- NAAC --}}
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    NAAC
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('aboutNAAC') }}">About NAAC</a></li>
                    <li><a class="dropdown-item" href="{{ route('collegeDocuments') }}">College Documents</a></li>
                    <li><a class="dropdown-item" href="{{ route('criterion1') }}">Criterion 1</a></li>
                    <li><a class="dropdown-item" href="{{ route('criterion2') }}">Criterion 2</a></li>
                    <li><a class="dropdown-item" href="{{ route('criterion3') }}">Criterion 3</a></li>
                    <li><a class="dropdown-item" href="{{ route('criterion4') }}">Criterion 4</a></li>
                    <li><a class="dropdown-item" href="{{ route('criterion5') }}">Criterion 5</a></li>
                    <li><a class="dropdown-item" href="{{ route('criterion6') }}">Criterion 6</a></li>
                    <li><a class="dropdown-item" href="{{ route('criterion7') }}">Criterion 7</a></li>
                </ul>
            </li>
        </ul>
        {{-- NAAC End --}}
        </div>

</div>
</nav>

<!--Navbar Ends-->
