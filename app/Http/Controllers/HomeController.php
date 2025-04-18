<?php

namespace App\Http\Controllers;

use App\Models\ArcModel;
use App\Models\Carousel;
use App\Models\GrcModel;
use App\Models\WecModel;
use App\Models\AshcModel;
use App\Models\ScstModel;
use App\Models\GalleryModel;
use Illuminate\Http\Request;
use App\Models\TimeTableModel;
use App\Models\PgsyllabusModel;
use App\Models\UgsyllabusModel;
use App\Models\AboutCollegeModel;
use App\Models\AboutLibraryModel;
use App\Models\LibraryRulesModel;
use App\Models\MinorityCellModel;
use App\Models\NotificationModel;
use App\Models\teachingStaffModel;
use App\Models\LibraryServiceModel;
use App\Models\BooksCollectionModel;
use App\Models\StudentStrengthModel;
use App\Models\AcademicCalendarModel;
use App\Models\NonTeachingStaffModel;
use App\Models\principalMessageModel;
use App\Models\secreatoryMessageModel;
use App\Models\AdmissionCommitteeModel;
use App\Models\AdmissionProcedureModel;
use App\Models\AdministrativeCouncilModel;


class HomeController extends Controller
{
    public function home()
    {
        $data['getRecords'] = Carousel::getRecordsImage();
        return view('home',$data);
    }
    public function vissionMission()
    {
        return view('frontend/vission-mission');
    }
    public function aboutCollege()
    {
        $data['getRecords'] = AboutCollegeModel::getRecordsImage();
        return view('frontend/aboutCollege',$data);
    }
    public function secreatoryMessage()
    {
        $data['getRecords'] = SecreatoryMessageModel::getRecordsImage();
        return view('frontend/secreatoryMessage', $data);
    }
    public function principalMessage()
    {
        $data['getRecords'] = PrincipalMessageModel::getRecordsImage();
        return view('frontend/principalMessage',$data);
    }
    public function CodeofConduct()
    {
        return view('frontend/CodeofConduct');
    }
    public function organogram()
    {
        return view('frontend/organogram');
    }
    public function administrativeCouncil()
    {
        $data['getRecords'] = AdministrativeCouncilModel::getRecordsImage();
        return view('frontend/administrativeCouncil', $data);
    }
    public function teachingStaff()
    {
        $data['getRecords'] = TeachingStaffModel::getRecordsImage();
        return view('frontend/teachingStaff',$data);
    }
    public function NonTeachingStaff()
    {
        $data['getRecords'] = NonTeachingStaffModel::getRecordsImage();
        return view('frontend/NonTeachingStaff',$data);
    }
    public function syllabus()
    {
        return view('frontend/syllabus');
    }
    public function ugsyllabus()
    {
        $data['getRecords'] = UgsyllabusModel::getRecords();
        return view('frontend/ugsyllabus', $data);
    }
    public function pgsyllabus()
    {
        $data['getRecords'] = PgsyllabusModel::getRecords();
        return view('frontend/pgsyllabus', $data);
    }
    public function progOffered()
    {
        return view('frontend/progOffered');
    }
    public function progOutcome()
    {
        return view('frontend/progOutcome');
    }
    public function prospectus()
    {
        return view('frontend/prospectus');
    }
    public function academicCalendar()
    {
        $data['getRecords'] = AcademicCalendarModel::getRecords();
        return view('frontend/academicCalendar',$data);
    }
    public function admissionProcedure()
    {
        $data['getRecords'] = AdmissionProcedureModel::getRecordsImage();
        return view('frontend/admissionProcedure',$data);
    }
    public function notification()
    {
        $data['getRecords'] = NotificationModel::getRecords();
        return view('frontend/notification', $data);
    }
    public function studentStrenght()
    {
        $data['getRecords'] = StudentStrengthModel::getRecords();
        return view('frontend/studentStrenght', $data);
    }
    public function timeTable()
    {
        $data['getRecords'] = TimeTableModel::getRecords();
        return view('frontend/timeTable',$data);
    }
    public function aboutLibrary()
    {
        $data['getRecords'] = AboutLibraryModel::getRecordsImage();
        return view('frontend/aboutLibrary',$data);
    }
    public function libraryRules()
    {
        $data['getRecords'] = LibraryRulesModel::getRecordsImage();
        return view('frontend/libraryRules', $data);
    }
    public function libraryServices()
    {
        $data['getRecords'] = LibraryServiceModel::getRecordsImage();
        return view('frontend/libraryServices',$data);
    }
    public function booksCollection()
    {
        $data['getRecords'] = BooksCollectionModel::getRecordsImage();
        return view('frontend/booksCollection', $data);
    }
    public function gallery()
    {
        $data['getRecords'] = GalleryModel::getRecordsImage();
        return view('frontend/gallery', $data);
    }
    public function admissionCommittee()
    {
        $data['getRecords'] = AdmissionCommitteeModel::getRecords();
        return view('frontend/admissionCommittee',$data);
    }
    public function ScStCommittee()
    {
        $data['getRecords'] = ScstModel::getRecords();
        return view('frontend/ScStCommittee', $data);
    }
    public function minorityCell()
    {
        $data['getRecords'] = MinorityCellModel::getRecords();
        return view('frontend/minorityCell',$data);
    }
    public function grc()
    {
        $data['getRecords'] = GrcModel::getRecords();
        return view('frontend/grc', $data);
    }
    public function arc()
    {
        $data['getRecords'] = ArcModel::getRecords();
        return view('frontend/arc', $data);
    }
    public function ashc()
    {
        $data['getRecords'] = AshcModel::getRecords();
        return view('frontend/ashc',$data);
    }
    public function wec()
    {
        $data['getRecords'] = WecModel::getRecords();
        return view('frontend/wec',$data);
    }
    public function aboutIQAC()
    {
        return view('frontend/aboutIQAC');
    }
    public function aqarReports()
    {
        return view('frontend/aqarReports');
    }
    public function ssrReports()
    {
        return view('frontend/ssrReports');
    }
    public function aboutNAAC()
    {
        return view('frontend/aboutNAAC');
    }
    public function criterion1()
    {
        return view('frontend/criterion1');
    }
    public function collegeDocuments()
    {
        return view('frontend/collegeDocuments');
    }
    public function criterion2()
    {
        return view('frontend/criterion2');
    }
    public function criterion3()
    {
        return view('frontend/criterion3');
    }
    public function criterion4()
    {
        return view('frontend/criterion4');
    }
    public function criterion5()
    {
        return view('frontend/criterion5');
    }
    public function criterion6()
    {
        return view('frontend/criterion6');
    }
    public function criterion7()
    {
        return view('frontend/criterion7');
    }
}
