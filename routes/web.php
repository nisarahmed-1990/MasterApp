<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArcController;
use App\Http\Controllers\GrcController;
use App\Http\Controllers\WecController;
use App\Http\Controllers\AshcController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScstController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\AboutIqacController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TimeTableController;
use App\Http\Controllers\AqarReportController;
use App\Http\Controllers\PGSyllabusController;
use App\Http\Controllers\UGSyllabusController;
use App\Http\Controllers\AboutCollegeController;
use App\Http\Controllers\AboutLibraryController;
use App\Http\Controllers\LibraryRulesController;
use App\Http\Controllers\MinorityCellController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TeachingStaffController;
use App\Http\Controllers\LibraryServiceController;
use App\Http\Controllers\BooksCollectionController;
use App\Http\Controllers\StudentStrengthController;
use App\Http\Controllers\AcademicCalendarController;
use App\Http\Controllers\NonTeachingStaffController;
use App\Http\Controllers\PrincipalMessageController;
use App\Http\Controllers\SecreatoryMessageController;
use App\Http\Controllers\AdmissionCommitteeController;
use App\Http\Controllers\AdmissionProcedureController;
use App\Http\Controllers\AdministrativeCouncilController;



Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/vission-mission',[HomeController::class,'vissionMission'])->name('vission-mission');
Route::get('/aboutCollege',[HomeController::class,'aboutCollege'])->name('aboutCollege');
Route::get('/secreatoryMessage',[HomeController::class,'secreatoryMessage'])->name('secreatoryMessage');
Route::get('/principalMessage',[HomeController::class,'principalMessage'])->name('principalMessage');
Route::get('/CodeofConduct',[HomeController::class,'CodeofConduct'])->name('CodeofConduct');
Route::get('/organogram',[HomeController::class,'organogram'])->name('organogram');
Route::get('/administrativeCouncil',[HomeController::class,'administrativeCouncil'])->name('administrativeCouncil');
Route::get('/teachingStaff',[HomeController::class,'teachingStaff'])->name('teachingStaff');
Route::get('/NonTeachingStaff',[HomeController::class,'NonTeachingStaff'])->name('NonTeachingStaff');
Route::get('/syllabus',[HomeController::class,'syllabus'])->name('syllabus');
Route::get('/ugsyllabus',[HomeController::class,'ugsyllabus'])->name('ugsyllabus');
Route::get('/pgsyllabus',[HomeController::class,'pgsyllabus'])->name('pgsyllabus');
Route::get('/progOffered',[HomeController::class,'progOffered'])->name('progOffered');
Route::get('/progOutcome',[HomeController::class,'progOutcome'])->name('progOutcome');
Route::get('/prospectus',[HomeController::class,'prospectus'])->name('prospectus');
Route::get('/academicCalendar',[HomeController::class,'academicCalendar'])->name('academicCalendar');
Route::get('/admissionProcedure',[HomeController::class,'admissionProcedure'])->name('admissionProcedure');
Route::get('/notification',[HomeController::class,'notification'])->name('notification');
Route::get('/studentStrenght',[HomeController::class,'studentStrenght'])->name('studentStrenght');
Route::get('/timeTable',[HomeController::class,'timeTable'])->name('timeTable');
Route::get('/aboutLibrary',[HomeController::class,'aboutLibrary'])->name('aboutLibrary');
Route::get('/libraryRules',[HomeController::class,'libraryRules'])->name('libraryRules');
Route::get('/libraryServices',[HomeController::class,'libraryServices'])->name('libraryServices');
Route::get('/booksCollection',[HomeController::class,'booksCollection'])->name('booksCollection');
Route::get('/gallery',[HomeController::class,'gallery'])->name('gallery');
Route::get('/admissionCommittee',[HomeController::class,'admissionCommittee'])->name('admissionCommittee');
Route::get('/ScStCommittee',[HomeController::class,'ScStCommittee'])->name('ScStCommittee');
Route::get('/minorityCell',[HomeController::class,'minorityCell'])->name('minorityCell');
Route::get('/grc',[HomeController::class,'grc'])->name('grc');
Route::get('/arc',[HomeController::class,'arc'])->name('arc');
Route::get('/ashc',[HomeController::class,'ashc'])->name('ashc');
Route::get('/wec',[HomeController::class,'wec'])->name('wec');
Route::get('/aboutIQAC',[HomeController::class,'aboutIQAC'])->name('aboutIQAC');
Route::get('/aqarReports',[HomeController::class,'aqarReports'])->name('aqarReports');
Route::get('/ssrReports',[HomeController::class,'ssrReports'])->name('ssrReports');
Route::get('/aboutNAAC',[HomeController::class,'aboutNAAC'])->name('aboutNAAC');
Route::get('/collegeDocuments',[HomeController::class,'collegeDocuments'])->name('collegeDocuments');
Route::get('/criterion1',[HomeController::class,'criterion1'])->name('criterion1');
Route::get('/criterion2',[HomeController::class,'criterion2'])->name('criterion2');
Route::get('/criterion3',[HomeController::class,'criterion3'])->name('criterion3');
Route::get('/criterion4',[HomeController::class,'criterion4'])->name('criterion4');
Route::get('/criterion5',[HomeController::class,'criterion5'])->name('criterion5');
Route::get('/criterion6',[HomeController::class,'criterion6'])->name('criterion6');
Route::get('/criterion7',[HomeController::class,'criterion7'])->name('criterion7');

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'auth_login']);

Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'create_user']);
Route::get('/verify/{token}',[AuthController::class,'verify']);


Route::get('/forget-password',[AuthController::class,'forget_password'])->name('forget_password');
Route::post('/forget-password',[AuthController::class,'forgot_password']);
Route::get('/reset/{token}',[AuthController::class,'reset']);
Route::post('/reset/{token}',[AuthController::class,'post_reset']);


Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::group(['middleware'=>'adminuser'],function(){
    Route::get('panel/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // carousel routes starts here
    Route::get('carousel/carousel_list', [GeneralController::class, 'carousel_list'])->name('carousel');
    Route::get('carousel/carousel_add', [GeneralController::class, 'carousel_add'])->name('carousel_add');
    Route::post('carousel/carousel_add', [GeneralController::class, 'carousel_insert'])->name('carousel_insert');
    Route::get('carousel/carousel_edit/{id}', [GeneralController::class, 'carousel_edit'])->name('carousel_edit');
    Route::post('carousel/carousel_edit/{id}', [GeneralController::class, 'carousel_update'])->name('carousel_update');
    Route::get('carousel/carousel_delete/{id}', [GeneralController::class, 'carousel_delete'])->name('carousel_delete');
    // carousel routes ends here

    // Principal Message routes starts here
    Route::get('principalMessage/principalMessage_list',[PrincipalMessageController::class,'principalMessage_list'])->name('principalMessage_list');
    Route::get('principalMessage/principalMessage_add',[PrincipalMessageController::class,'principalMessage_add'])->name('principalMessage_add');
    Route::post('principalMessage/principalMessage_add',[PrincipalMessageController::class,'principalMessage_insert'])->name('principalMessage_insert');
    Route::get('principalMessage/principalMessage_edit/{id}',[PrincipalMessageController::class,'principalMessage_edit'])->name('principalMessage_edit');
    Route::post('principalMessage/principalMessage_edit/{id}',[PrincipalMessageController::class,'principalMessage_update'])->name('principalMessage_update');
    Route::get('principalMessage/principalMessage_delete/{id}',[PrincipalMessageController::class,'principalMessage_delete'])->name('principalMessage_delete');
    // Principal Message routes ends here

    // about College routes starts here
    Route::get('aboutCollege/aboutCollege_list',[AboutCollegeController::class,'aboutCollege_list'])->name('aboutCollege_list');
    Route::get('aboutCollege/aboutCollege_add',[AboutCollegeController::class,'aboutCollege_add'])->name('aboutCollege_add');
    Route::post('aboutCollege/aboutCollege_add',[AboutCollegeController::class,'aboutCollege_insert'])->name('aboutCollege_insert');
    Route::get('aboutCollege/aboutCollege_edit/{id}',[AboutCollegeController::class,'aboutCollege_edit'])->name('aboutCollege_edit');
    Route::post('aboutCollege/aboutCollege_edit/{id}',[AboutCollegeController::class,'aboutCollege_update'])->name('aboutCollegee_update');
    Route::get('aboutCollege/aboutCollege_delete/{id}',[AboutCollegeController::class,'aboutCollege_delete'])->name('aboutCollege_delete');
    // about College routes starts here

    // Secreatory Message routes starts here
    Route::get('secreatoryMessage/secreatoryMessage_list',[SecreatoryMessageController::class,'secreatoryMessage_list'])->name('secreatoryMessage_list');
    Route::get('secreatoryMessage/secreatoryMessage_add',[SecreatoryMessageController::class,'secreatoryMessage_add'])->name('secreatoryMessage_add');
    Route::post('secreatoryMessage/secreatoryMessage_add',[SecreatoryMessageController::class,'secreatoryMessage_insert'])->name('secreatoryMessage_insert');
    Route::get('secreatoryMessage/secreatoryMessage_edit/{id}',[SecreatoryMessageController::class,'secreatoryMessage_edit'])->name('secreatoryMessage_edit');
    Route::post('secreatoryMessage/secreatoryMessage_edit/{id}',[SecreatoryMessageController::class,'secreatoryMessage_update'])->name('secreatoryMessage_update');
    Route::get('secreatoryMessage/secreatoryMessage_delete/{id}',[SecreatoryMessageController::class,'secreatoryMessage_delete'])->name('secreatoryMessage_delete');
    // Secreatory Message routes ends here

    // Administrative Council  routes starts here
    Route::get('administrativeCouncil_list',[AdministrativeCouncilController::class,'administrativeCouncil_list'])->name('administrativeCouncil_list');
    Route::get('administrativeCouncil_add',[AdministrativeCouncilController::class,'administrativeCouncil_add'])->name('administrativeCouncil_add');
    Route::post('administrativeCouncil_add',[AdministrativeCouncilController::class,'administrativeCouncil_insert'])->name('administrativeCouncil_insert');
    Route::get('administrativeCouncil_edit/{id}',[AdministrativeCouncilController::class,'administrativeCouncil_edit'])->name('administrativeCouncil_edit');
    Route::post('administrativeCouncil_edit/{id}',[AdministrativeCouncilController::class,'administrativeCouncil_update'])->name('administrativeCouncil_update');
    Route::get('administrativeCouncil_delete/{id}',[AdministrativeCouncilController::class,'administrativeCouncil_delete'])->name('administrativeCouncil_delete');
    // Administrative Council routes ends here

    // Teaching Staff  routes starts here
    Route::get('teachingStaff_list',[TeachingStaffController::class,'teachingStaff_list'])->name('teachingStaff_list');
    Route::get('teachingStaff_add',[TeachingStaffController::class,'teachingStaff_add'])->name('teachingStaff_add');
    Route::post('teachingStaff_add',[TeachingStaffController::class,'teachingStaff_insert'])->name('teachingStaff_insert');
    Route::get('teachingStaff_edit/{id}',[TeachingStaffController::class,'teachingStaff_edit'])->name('teachingStaff_edit');
    Route::post('teachingStaff_edit/{id}',[TeachingStaffController::class,'teachingStaff_update'])->name('teachingStaff_update');
    Route::get('teachingStaff_delete/{id}',[TeachingStaffController::class,'teachingStaff_delete'])->name('teachingStaff_delete');
    // Teaching Staff routes ends here

     // Non Teaching Staff  routes starts here
     Route::get('nonTeachingStaff_list',[NonTeachingStaffController::class,'nonTeachingStaff_list'])->name('nonTeachingStaff_list');
     Route::get('nonTeachingStaff_add',[NonTeachingStaffController::class,'nonTeachingStaff_add'])->name('nonTeachingStaff_add');
     Route::post('nonTeachingStaff_add',[NonTeachingStaffController::class,'nonTeachingStaff_insert'])->name('nonTeachingStaff_insert');
     Route::get('nonTeachingStaff_edit/{id}',[NonTeachingStaffController::class,'nonTeachingStaff_edit'])->name('nonTeachingStaff_edit');
     Route::post('nonTeachingStaff_edit/{id}',[NonTeachingStaffController::class,'nonTeachingStaff_update'])->name('nonTeachingStaff_update');
     Route::get('nonTeachingStaff_delete/{id}',[NonTeachingStaffController::class,'nonTeachingStaff_delete'])->name('nonTeachingStaff_delete');
     // Non Teaching Staff routes ends here

    // UG Syllabus  routes starts here
    Route::get('UGSyllabus_list',[UGSyllabusController::class,'UGSyllabus_list'])->name('UGSyllabus_list');
    Route::get('UGSyllabus_add',[UGSyllabusController::class,'UGSyllabus_add'])->name('UGSyllabus_add');
    Route::post('UGSyllabus_add',[UGSyllabusController::class,'UGSyllabus_insert'])->name('UGSyllabus_insert');
    // Route::get('UGSyllabus_edit/{id}',[UGSyllabusController::class,'UGSyllabus_edit'])->name('UGSyllabus_edit');
    Route::post('UGSyllabus_edit/{id}',[UGSyllabusController::class,'UGSyllabus_update'])->name('UGSyllabus_update');
    Route::get('UGSyllabus_delete/{id}',[UGSyllabusController::class,'UGSyllabus_delete'])->name('UGSyllabus_delete');
    // UG Syllabus  routes Endss here

    // PG Syllabus  routes starts here
    Route::get('PGSyllabus_list',[PGSyllabusController::class,'PGSyllabus_list'])->name('PGSyllabus_list');
    Route::get('PGSyllabus_add',[PGSyllabusController::class,'PGSyllabus_add'])->name('PGSyllabus_add');
    Route::post('PGSyllabus_add',[PGSyllabusController::class,'PGSyllabus_insert'])->name('PGSyllabus_insert');
    // Route::get('UGSyllabus_edit/{id}',[UGSyllabusController::class,'UGSyllabus_edit'])->name('UGSyllabus_edit');
    Route::post('PGSyllabus_edit/{id}',[PGSyllabusController::class,'PGSyllabus_update'])->name('PGSyllabus_update');
    Route::get('PGSyllabus_delete/{id}',[PGSyllabusController::class,'PGSyllabus_delete'])->name('PGSyllabus_delete');
    // PG Syllabus  routes Endss here

     // Academic Calendar routes starts here
     Route::get('AcademicCalendar_list',[AcademicCalendarController::class,'AcademicCalendar_list'])->name('AcademicCalendar_list');
     Route::get('AcademicCalendar_add',[AcademicCalendarController::class,'AcademicCalendar_add'])->name('AcademicCalendar_add');
     Route::post('AcademicCalendar_add',[AcademicCalendarController::class,'AcademicCalendar_insert'])->name('AcademicCalendar_insert');
     // Route::get('UGSyllabus_edit/{id}',[AcademicCalendarController::class,'UGSyllabus_edit'])->name('UGSyllabus_edit');
     Route::post('AcademicCalendar_edit/{id}',[AcademicCalendarController::class,'AcademicCalendar_update'])->name('AcademicCalendar_update');
     Route::get('AcademicCalendar_delete/{id}',[AcademicCalendarController::class,'AcademicCalendar_delete'])->name('AcademicCalendar_delete');
     // Academic Calendar  routes Endss here

      // Admission Procedure routes starts here
      Route::get('admissionProcedure_list',[AdmissionProcedureController::class,'admissionProcedure_list'])->name('admissionProcedure_list');
      Route::get('admissionProcedure_add',[AdmissionProcedureController::class,'admissionProcedure_add'])->name('admissionProcedure_add');
      Route::post('admissionProcedure_add',[AdmissionProcedureController::class,'admissionProcedure_insert'])->name('admissionProcedure_insert');
      Route::get('admissionProcedure_edit/{id}',[AdmissionProcedureController::class,'admissionProcedure_edit'])->name('admissionProcedure_edit');
      Route::post('admissionProcedure_edit/{id}',[AdmissionProcedureController::class,'admissionProcedure_update'])->name('admissionProcedure_update');
      Route::get('admissionProcedure_delete/{id}',[AdmissionProcedureController::class,'admissionProcedure_delete'])->name('admissionProcedure_delete');
      // Admission Procedure  routes Endss here

      // Notifiaction routes starts here
      Route::get('notification_list',[NotificationController::class,'notification_list'])->name('notification_list');
      Route::get('notification_add',[NotificationController::class,'notification_add'])->name('notification_add');
      Route::post('notification_add',[NotificationController::class,'notification_insert'])->name('notification_insert');
      Route::get('notification_edit/{id}',[NotificationController::class,'notification_edit'])->name('notification_edit');
      Route::post('notification_edit/{id}',[NotificationController::class,'notification_update'])->name('notification_update');
      Route::get('notification_delete/{id}',[NotificationController::class,'notification_delete'])->name('notification_delete');
      // Notifiaction  routes Endss here

      // Student Strength routes starts here
      Route::get('studentStrength_list',[StudentStrengthController::class,'studentStrength_list'])->name('studentStrength_list');
      Route::get('studentStrength_add',[StudentStrengthController::class,'studentStrength_add'])->name('studentStrength_add');
      Route::post('studentStrength_add',[StudentStrengthController::class,'studentStrength_insert'])->name('studentStrength_insert');
      Route::get('studentStrength_edit/{id}',[StudentStrengthController::class,'studentStrength_edit'])->name('studentStrength_edit');
      Route::post('studentStrength_edit/{id}',[StudentStrengthController::class,'studentStrength_update'])->name('studentStrength_update');
      Route::get('studentStrength_delete/{id}',[StudentStrengthController::class,'studentStrength_delete'])->name('studentStrength_delete');
      // Student Strength  routes Endss here

      // Time Table routes starts here
      Route::get('timetable_list',[TimeTableController::class,'timetable_list'])->name('timetable_list');
      Route::get('timetable_add',[TimeTableController::class,'timetable_add'])->name('timetable_add');
      Route::post('timetable_add',[TimeTableController::class,'timetable_insert'])->name('timetable_insert');
    //   Route::get('timetable_edit/{id}',[TimeTableController::class,'timetable_edit'])->name('timetable_edit');
      Route::post('timetable_edit/{id}',[TimeTableController::class,'timetable_update'])->name('timetable_update');
      Route::get('timetable_delete/{id}',[TimeTableController::class,'timetable_delete'])->name('timetable_delete');
      // Time Table  routes Endss here

      // About Library routes starts here
      Route::get('aboutLibrary_list',[AboutLibraryController::class,'aboutLibrary_list'])->name('aboutLibrary_list');
      Route::get('aboutLibrary_add',[AboutLibraryController::class,'aboutLibrary_add'])->name('aboutLibrary_add');
      Route::post('aboutLibrary_add',[AboutLibraryController::class,'aboutLibrary_insert'])->name('aboutLibrary_insert');
      Route::get('aboutLibrary_edit/{id}',[AboutLibraryController::class,'aboutLibrary_edit'])->name('aboutLibrary_edit');
      Route::post('aboutLibrary_edit/{id}',[AboutLibraryController::class,'aboutLibrary_update'])->name('aboutLibrary_update');
      Route::get('aboutLibrary_delete/{id}',[AboutLibraryController::class,'aboutLibrary_delete'])->name('aboutLibrary_delete');
      // About Library  routes Endss here

      // Library Rules routes starts here
      Route::get('libraryRules_list',[LibraryRulesController::class,'libraryRules_list'])->name('libraryRules_list');
      Route::get('libraryRules_add',[LibraryRulesController::class,'libraryRules_add'])->name('libraryRules_add');
      Route::post('libraryRules_add',[LibraryRulesController::class,'libraryRules_insert'])->name('libraryRules_insert');
      Route::get('libraryRules_edit/{id}',[LibraryRulesController::class,'libraryRules_edit'])->name('libraryRules_edit');
      Route::post('libraryRules_edit/{id}',[LibraryRulesController::class,'libraryRules_update'])->name('libraryRules_update');
      Route::get('libraryRules_delete/{id}',[LibraryRulesController::class,'libraryRules_delete'])->name('libraryRules_delete');
      // Library Rules  routes Endss here

      // Library Service routes starts here
      Route::get('libraryService_list',[LibraryServiceController::class,'libraryService_list'])->name('libraryService_list');
      Route::get('libraryService_add',[LibraryServiceController::class,'libraryService_add'])->name('libraryService_add');
      Route::post('libraryService_add',[LibraryServiceController::class,'libraryService_insert'])->name('libraryService_insert');
      Route::get('libraryService_edit/{id}',[LibraryServiceController::class,'libraryService_edit'])->name('libraryService_edit');
      Route::post('libraryService_edit/{id}',[LibraryServiceController::class,'libraryService_update'])->name('libraryService_update');
      Route::get('libraryService_delete/{id}',[LibraryServiceController::class,'libraryService_delete'])->name('libraryService_delete');
      // Library Service  routes Endss here

       // Books Collection routes starts here
       Route::get('bookCollection_list',[booksCollectionController::class,'bookCollection_list'])->name('bookCollection_list');
       Route::get('bookCollection_add',[booksCollectionController::class,'bookCollection_add'])->name('bookCollection_add');
       Route::post('bookCollection_add',[booksCollectionController::class,'bookCollection_insert'])->name('bookCollection_insert');
       Route::get('bookCollection_edit/{id}',[booksCollectionController::class,'bookCollection_edit'])->name('bookCollection_edit');
       Route::post('bookCollection_edit/{id}',[booksCollectionController::class,'bookCollection_update'])->name('bookCollection_update');
       Route::get('bookCollection_delete/{id}',[booksCollectionController::class,'bookCollection_delete'])->name('bookCollection_delete');
       // Books Collection  routes Endss here

        // Gallery Items routes starts here
        Route::get('gallery_list',[GalleryController::class,'gallery_list'])->name('gallery_list');
        Route::get('gallery_add',[GalleryController::class,'gallery_add'])->name('gallery_add');
        Route::post('gallery_add',[GalleryController::class,'gallery_insert'])->name('gallery_insert');
        Route::get('gallery_edit/{id}',[GalleryController::class,'gallery_edit'])->name('gallery_edit');
        Route::post('gallery_edit/{id}',[GalleryController::class,'gallery_update'])->name('gallery_update');
        Route::get('gallery_delete/{id}',[GalleryController::class,'gallery_delete'])->name('gallery_delete');
        // Gallery Items  routes Ends here

        // Admission Committee routes starts here
        Route::get('admComm_list',[AdmissionCommitteeController::class,'admComm_list'])->name('admComm_list');
        Route::get('admComm_add',[AdmissionCommitteeController::class,'admComm_add'])->name('admComm_add');
        Route::post('admComm_add',[AdmissionCommitteeController::class,'admComm_insert'])->name('admComm_insert');
        Route::get('admComm_edit/{id}',[AdmissionCommitteeController::class,'admComm_edit'])->name('admComm_edit');
        Route::post('admComm_edit/{id}',[AdmissionCommitteeController::class,'admComm_update'])->name('admComm_update');
        Route::get('admComm_delete/{id}',[AdmissionCommitteeController::class,'admComm_delete'])->name('admComm_delete');
        // Admission Committee routes Ends here

        // Sc and ST Committee routes starts here
        Route::get('scstComm_list',[ScstController::class,'scstComm_list'])->name('scstComm_list');
        Route::get('scstComm_add',[ScstController::class,'scstComm_add'])->name('scstComm_add');
        Route::post('scstComm_add',[ScstController::class,'scstComm_insert'])->name('scstComm_insert');
        Route::get('scstComm_edit/{id}',[ScstController::class,'scstComm_edit'])->name('scstComm_edit');
        Route::post('scstComm_edit/{id}',[ScstController::class,'scstComm_update'])->name('scstComm_update');
        Route::get('scstComm_delete/{id}',[ScstController::class,'scstComm_delete'])->name('admComm_delete');
        // Sc and ST Committee routes Ends here

        // Minority Cell routes starts here
        Route::get('minorityCell_list',[MinorityCellController::class,'minorityCell_list'])->name('minorityCell_list');
        Route::get('minorityCell_add',[MinorityCellController::class,'minorityCell_add'])->name('minorityCell_add');
        Route::post('minorityCell_add',[MinorityCellController::class,'minorityCell_insert'])->name('minorityCell_insert');
        Route::get('minorityCell_edit/{id}',[MinorityCellController::class,'minorityCell_edit'])->name('minorityCell_edit');
        Route::post('minorityCell_edit/{id}',[MinorityCellController::class,'minorityCell_update'])->name('minorityCell_update');
        Route::get('minorityCell_delete/{id}',[MinorityCellController::class,'minorityCell_delete'])->name('minorityCell_delete');
        // Minority Cell routes Ends

        // Grievance Redressal Committee routes starts here
        Route::get('grc_list',[GrcController::class,'grc_list'])->name('grc_list');
        Route::get('grc_add',[GrcController::class,'grc_add'])->name('grc_add');
        Route::post('grc_add',[GrcController::class,'grc_insert'])->name('grc_insert');
        Route::get('grc_edit/{id}',[GrcController::class,'grc_edit'])->name('grc_edit');
        Route::post('grc_edit/{id}',[GrcController::class,'grc_update'])->name('grc_update');
        Route::get('grc_delete/{id}',[GrcController::class,'grc_delete'])->name('grc_delete');
        // Grievance Redressal Committee routes Ends here

        // Anit Ragging Committee routes starts here
        Route::get('arc_list',[ArcController::class,'arc_list'])->name('arc_list');
        Route::get('arc_add',[ArcController::class,'arc_add'])->name('arc_add');
        Route::post('arc_add',[ArcController::class,'arc_insert'])->name('arc_insert');
        Route::get('arc_edit/{id}',[ArcController::class,'arc_edit'])->name('arc_edit');
        Route::post('arc_edit/{id}',[ArcController::class,'arc_update'])->name('arc_update');
        Route::get('arc_delete/{id}',[ArcController::class,'arc_delete'])->name('arc_delete');
        // Anit Ragging Committee routes Ends here

        // Anit Sexual Harassment Cell routes starts here
        Route::get('ashc_list',[AshcController::class,'ashc_list'])->name('ashc_list');
        Route::get('ashc_add',[AshcController::class,'ashc_add'])->name('ashc_add');
        Route::post('ashc_add',[AshcController::class,'ashc_insert'])->name('ashc_insert');
        Route::get('ashc_edit/{id}',[AshcController::class,'ashc_edit'])->name('ashc_edit');
        Route::post('ashc_edit/{id}',[AshcController::class,'ashc_update'])->name('ashc_update');
        Route::get('ashc_delete/{id}',[AshcController::class,'ashc_delete'])->name('ashc_delete');
        // Anit Sexual Harassment Cell routes Ends here

        // Women Empowerment Cell routes starts here
        Route::get('wec_list',[WecController::class,'wec_list'])->name('wec_list');
        Route::get('wec_add',[WecController::class,'wec_add'])->name('wec_add');
        Route::post('wec_add',[WecController::class,'wec_insert'])->name('wec_insert');
        Route::get('wec_edit/{id}',[WecController::class,'wec_edit'])->name('wec_edit');
        Route::post('wec_edit/{id}',[WecController::class,'wec_update'])->name('wec_update');
        Route::get('wec_delete/{id}',[WecController::class,'wec_delete'])->name('wec_delete');
        // Women Empowerment Cell routes Ends here

        // About IQAC routes starts here
        Route::get('aboutIqac_list',[AboutIqacController::class,'aboutIqac_list'])->name('aboutIqac_list');
        Route::get('aboutIqac_add',[AboutIqacController::class,'aboutIqac_add'])->name('aboutIqac_add');
        Route::post('aboutIqac_add',[AboutIqacController::class,'aboutIqac_insert'])->name('aboutIqac_insert');
        Route::get('aboutIqac_edit/{id}',[AboutIqacController::class,'aboutIqac_edit'])->name('aboutIqac_edit');
        Route::post('aboutIqac_edit/{id}',[AboutIqacController::class,'aboutIqac_update'])->name('aboutIqac_update');
        Route::get('aboutIqac_delete/{id}',[AboutIqacController::class,'aboutIqac_delete'])->name('aboutIqac_delete');
        // About IQAC routes Ends here

         // AQAR Reports routes starts here
         Route::get('aqarReports_list',[AqarReportController::class,'aqarReports_list'])->name('aqarReports_list');
         Route::get('aqarReports_add',[AqarReportController::class,'aqarReports_add'])->name('aqarReports_add');
         Route::post('aqarReports_add',[AqarReportController::class,'aqarReports_insert'])->name('aqarReports_insert');
         Route::get('aqarReports_edit/{id}',[AqarReportController::class,'aqarReports_edit'])->name('aqarReports_edit');
         Route::post('aqarReports_edit/{id}',[AqarReportController::class,'aqarReports_update'])->name('aqarReports_update');
         Route::get('aqarReports_delete/{id}',[AqarReportController::class,'aqarReports_delete'])->name('aqarReports_delete');
         // AQAR Reports routes Ends here
});
