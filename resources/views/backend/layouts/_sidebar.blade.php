<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2)!= 'dashboard')collapsed @endif" href="{{ route('dashboard') }}">
            <i class="bi bi-ui-checks-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <!-- Start General Tab Dropdown Nav -->
      <li class="nav-item">
       <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#GeneralTab" data-bs-toggle="collapse" href="#">
          <i class="bi bi-ui-checks-grid"></i><span>General Tab</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="GeneralTab" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a class="nav-link @if(Request::segment(2)!= 'carousel_list')collapsed @endif "href="{{ route('carousel') }}">
              <i class="bi bi-circle"></i><span>Carousel</span>
            </a>
          </li>
          <li>
            {{-- <a href="">
              <i class="bi bi-circle"></i><span>Secreatory Message</span>
            </a> --}}
          </li>
          <li>
            {{-- <a @if(Request::segment(2)!= 'principalMessage_list')collapsed @endif href="{{ route('principalMessage_list') }}">
              <i class="bi bi-circle"></i><span>Principal Message</span>
            </a> --}}
          </li>
        </ul>
      </li>
    <!-- End General Tab Dropdown-->
    <!-- Start About Us Dropdown Nav -->
      <li class="nav-item">
       <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#About-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-ui-checks-grid"></i><span>About Us</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="About-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a class="nav-link @if(Request::segment(2)!= 'aboutCollege_list') collapsed @endif" href="{{ route('aboutCollege_list') }}">
              <i class="bi bi-circle"></i><span>About College</span>
            </a>
          </li>
          <li>
            <a @if(Request::segment(2)!= 'secreatoryMessage_list')collapsed @endif href="{{ route('secreatoryMessage_list') }}">
              <i class="bi bi-circle"></i><span>Secreatory Message</span>
            </a>
          </li>
          <li>
            <li>
                <a @if(Request::segment(2)!= 'principalMessage_list')collapsed @endif href="{{ route('principalMessage_list') }}">
                  <i class="bi bi-circle"></i><span>Principal Message</span>
                </a>
              </li>
          </li>
        </ul>
      </li>
    <!-- End About Us Dropdown-->

     <!-- Start Administration Dropdown Nav -->
     <li class="nav-item">
        <li class="nav-item">
         <a class="nav-link collapsed" data-bs-target="#Administration-nav" data-bs-toggle="collapse" href="#">
           <i class="bi bi-ui-checks-grid"></i><span>Administration</span><i class="bi bi-chevron-down ms-auto"></i>
         </a>
         <ul id="Administration-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <li>
             <a href="">
               <i class="bi bi-circle"></i><span>Code of Conduct</span>
             </a>
           </li>
           <li>
             <a href="">
               <i class="bi bi-circle"></i><span>Organogram</span>
             </a>
           </li>
           <li>
             <a @if(Request::segment(1)!= 'administrativeCouncil_list')collapsed @endif href="{{ route('administrativeCouncil_list') }}">
               <i class="bi bi-circle"></i><span>Administrative Council</span>
             </a>
           </li>
           <li>
            <a @if(Request::segment(1)!= 'teachingStaff_list')collapsed @endif href="{{ route('teachingStaff_list') }}">
              <i class="bi bi-circle"></i><span>Teaching Staff</span>
            </a>
          </li>
          <li>
            <a @if(Request::segment(1)!= 'nonTeachingStaff_list')collapsed @endif href="{{ route('nonTeachingStaff_list') }}">
              <i class="bi bi-circle"></i><span>Non Teaching Staff</span>
            </a>
          </li>
         </ul>
       </li>
     <!-- End Administration Dropdown-->

      <!-- Start Academics Dropdown Nav -->
      <li class="nav-item">
        <li class="nav-item">
         <a class="nav-link collapsed" data-bs-target="#academics-nav" data-bs-toggle="collapse" href="#">
           <i class="bi bi-ui-checks-grid"></i><span>Academics</span><i class="bi bi-chevron-down ms-auto"></i>
         </a>
         <ul id="academics-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           {{-- <li>
             <a href="">
               <i class="bi bi-circle"></i><span>Syllabus</span>
             </a>
           </li> --}}
           <li>
             <a href="">
               <i class="bi bi-circle"></i><span>Prospectus</span>
             </a>
           </li>
           <li>
             <a @if(Request::segment(1)!= 'AcademicCalendar_list')collapsed @endif href="{{ route('AcademicCalendar_list') }}">
               <i class="bi bi-circle"></i><span>Academic Calendar</span>
             </a>
           </li>
         </ul>
       </li>
     <!-- End Academics Dropdown-->

     {{-- {{-- <!-- Start UG Syllabus Dropdown Nav --> --}}
     <li class="nav-item">
        <li class="nav-item">
         <a class="nav-link collapsed" data-bs-target="#PGSyllabus-nav" data-bs-toggle="collapse" href="#">
           <i class="bi bi-ui-checks-grid"></i><span>Syllabus</span><i class="bi bi-chevron-down ms-auto"></i>
         </a>
         <ul id="PGSyllabus-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <li>
             <a @if(Request::segment(1)!= 'UGSyllabus_list')collapsed @endif href="{{ route('UGSyllabus_list') }}">
               <i class="bi bi-circle"></i><span>UG Syllabus</span>
             </a>
           </li>
           <li>
             <a @if(Request::segment(1)!= 'PGSyllabus_list')collapsed @endif href="{{ route('PGSyllabus_list') }}">
               <i class="bi bi-circle"></i><span>PG Syllabus</span>
             </a>
           </li>

         </ul>
       </li>
     <!-- End UG Syllabus Dropdown-->

      <!-- Start Admission Dropdown Nav -->
      <li class="nav-item">
        <li class="nav-item">
         <a class="nav-link collapsed" data-bs-target="#admission-nav" data-bs-toggle="collapse" href="#">
           <i class="bi bi-ui-checks-grid"></i><span>Admission</span><i class="bi bi-chevron-down ms-auto"></i>
         </a>
         <ul id="admission-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <li>
             <a @if(Request::segment(1)!= 'admissionProcedure_list')collapsed @endif href="{{ route("admissionProcedure_list") }}">
               <i class="bi bi-circle"></i><span>Admission Procedure</span>
             </a>
           </li>
           <li>
             <a @if(Request::segment(1)!= 'notification_list')collapsed @endif href="{{ route('notification_list') }}">
               <i class="bi bi-circle"></i><span>Notificaion</span>
             </a>
           </li>
           <li>
             <a @if(Request::segment(1)!= 'studentStrength_list')collapsed @endif href="{{ route('studentStrength_list') }}">
               <i class="bi bi-circle"></i><span>Student Strength</span>
             </a>
           </li>
         </ul>
       </li>
     <!-- End Admission Dropdown-->

     <!-- Start Examination Dropdown Nav -->
     <li class="nav-item">
        <li class="nav-item">
         <a class="nav-link collapsed" data-bs-target="#examination-nav" data-bs-toggle="collapse" href="#">
           <i class="bi bi-ui-checks-grid"></i><span>Examination</span><i class="bi bi-chevron-down ms-auto"></i>
         </a>
         <ul id="examination-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <li>
             <a @if(Request::segment(1)!= 'studentStrength_list')collapsed @endif href="{{ route('timetable_list') }}">
               <i class="bi bi-circle"></i><span>Time Table</span>
             </a>
           </li>
          </ul>
       </li>
     <!-- End Examination Dropdown-->

     <!-- Start Library Dropdown Nav -->
     <li class="nav-item">
        <li class="nav-item">
         <a class="nav-link collapsed" data-bs-target="#library-nav" data-bs-toggle="collapse" href="#">
           <i class="bi bi-ui-checks-grid"></i><span>Library</span><i class="bi bi-chevron-down ms-auto"></i>
         </a>
         <ul id="library-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <li>
             <a @if(Request::segment(1)!= 'aboutLibrary_list')collapsed @endif href="{{ route('aboutLibrary_list') }}">
               <i class="bi bi-circle"></i><span>About Library</span>
             </a>
           </li>
           <li>
            <a @if(Request::segment(1)!= 'libraryRules_list')collapsed @endif href="{{ route('libraryRules_list') }}">
              <i class="bi bi-circle"></i><span>Library Rules</span>
            </a>
          </li>
          <li>
            <a @if(Request::segment(1)!= 'libraryService_list')collapsed @endif href="{{ route('libraryService_list') }}">
              <i class="bi bi-circle"></i><span>Library Service</span>
            </a>
          </li>
           <li>
            <a @if(Request::segment(1)!= 'bookCollection_list')collapsed @endif href="{{ route('bookCollection_list') }}">
              <i class="bi bi-circle"></i><span>Books Collection</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Gallery</span>
            </a>
          </li>
          </ul>
       </li>
     <!-- End Library Dropdown-->

     <!-- Start Committees Dropdown Nav -->
     <li class="nav-item">
        <li class="nav-item">
         <a class="nav-link collapsed" data-bs-target="#Committees-nav" data-bs-toggle="collapse" href="#">
           <i class="bi bi-ui-checks-grid"></i><span>Committees</span><i class="bi bi-chevron-down ms-auto"></i>
         </a>
         <ul id="Committees-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <li>
             <a href="">
               <i class="bi bi-circle"></i><span>Admission Committee</span>
             </a>
           </li>
           <li>
            <a href="">
              <i class="bi bi-circle"></i><span>SC & ST Committee</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Minority Cell</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Grievance Redressal Committee</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Anit Ragging Committee</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Anit Sexual Harassment Cell</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Women Empowerment Cell</span>
            </a>
          </li>
          </ul>
       </li>
     <!-- End Committees Dropdown-->

     <!-- Start IQAC Dropdown Nav -->
     <li class="nav-item">
        <li class="nav-item">
         <a class="nav-link collapsed" data-bs-target="#IQAC-nav" data-bs-toggle="collapse" href="#">
           <i class="bi bi-ui-checks-grid"></i><span>IQAC</span><i class="bi bi-chevron-down ms-auto"></i>
         </a>
         <ul id="IQAC-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <li>
             <a href="">
               <i class="bi bi-circle"></i><span>About IQAC</span>
             </a>
           </li>
           <li>
            <a href="">
              <i class="bi bi-circle"></i><span>AQAR Reports</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>SSR Reports</span>
            </a>
          </li>
          </ul>
       </li>
     <!-- End IQAC Dropdown-->

     <!-- Start NAAC Dropdown Nav -->
     <li class="nav-item">
        <li class="nav-item">
         <a class="nav-link collapsed" data-bs-target="#NAAC-nav" data-bs-toggle="collapse" href="#">
           <i class="bi bi-ui-checks-grid"></i><span>NAAC</span><i class="bi bi-chevron-down ms-auto"></i>
         </a>
         <ul id="NAAC-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <li>
             <a href="">
               <i class="bi bi-circle"></i><span>About NAAC</span>
             </a>
           </li>
           <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Criterion 1</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Criterion 2</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Criterion 3</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Criterion 4</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Criterion 5</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Criterion 6</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Criterion 7</span>
            </a>
          </li>
          </ul>
       </li>
     <!-- End Committees Dropdown-->

 </aside>
 <!-- End Sidebar-->
