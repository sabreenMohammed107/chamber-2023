<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Department_board_member;
use App\Models\Department_board_director;
use App\Models\Department_register;
use App\Models\Department_meeting;
use App\Models\Department_news;
use App\Models\Related_department_news;
use App\Models\Department_gallery;
use App\Models\Department_file;
use App\Models\Department_meeting_gallery;
use App\Models\Department_meeting_file;
use App\Models\Chamber_ads;
use App\Models\Ads_vedio;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
class DivisionController extends Controller
{
    public function index()
    {

        $devisions = Department::orderBy("created_at", "Desc")->paginate(10);

        return view('Customer.division.index', compact('devisions'));
    }

    function fetch_devision(Request $request)
    {
        $devisions = Department::orderBy("created_at", "Desc")->paginate(10);


        return view('Customer.division.indexList', compact('devisions'))->render();
    }
    public function devisionDetails($id)
    {

        $mastrBoard = [];
        $subBoard = [];


        $divisionObj = Department::where("id", '=', $id)->first();

        $currentBoard = Department_board_director::where('department_id', '=', $id)->where('current', '=', 0)->first();


        $prevBoard = Department_board_director::where('department_id', '=', $id)->where('current', '=', 1)->first();
        if ($currentBoard != null) {
            $mastrBoard = Department_board_member::where('board_directors_id', '=', $currentBoard->id)->orderBy("position_order", "asc")->get();
        }

        if ($prevBoard != null) {
            $subBoard = Department_board_member::where('board_directors_id', '=', $prevBoard->id)->orderBy("position_order", "asc")->get();
        }
        //get all
        $oldestList = Department_board_director::where('current', '=', 2)->get();
        //get meeting list
        $meetingLists = Department_meeting::where('department_id', '=', $id)->where('active', '=', 1)->where('meeting_date', '<', Carbon::parse(now()))->orderBy("created_at", "Desc")->paginate(6);
        //get news list
        $newsLists = Department_news::where('department_id', '=', $id)->where('active', '=', 1)->orderBy("created_at", "Desc")->paginate(6);
        return view('Customer.division.divisionDetails', compact('newsLists', 'meetingLists', 'divisionObj', 'currentBoard', 'prevBoard', 'mastrBoard', 'subBoard', 'oldestList'));
    }


    public function registerDevision(Request $request)
    {

        try {
            Department_register::create($request->all());

            return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
        } catch (QueryException $q) {

            return redirect()->back()->with('message', 'You cannot send Empty Message...');
        }
    }

    function fetch_meetingdevision(Request $request)
    {


        if ($request->ajax()) {
            $id = $request->get("id");

            $divisionObj = Department::where("id", '=', $id)->first();

            $currentBoard = Department_board_director::where('department_id', '=', $id)->where('current', '=', 0)->first();


            $prevBoard = Department_board_director::where('department_id', '=', $id)->where('current', '=', 1)->first();
            if ($currentBoard != null) {
                $mastrBoard = Department_board_member::where('board_directors_id', '=', $currentBoard->id)->orderBy("position_order", "asc")->get();
            }

            if ($prevBoard != null) {
                $subBoard = Department_board_member::where('board_directors_id', '=', $prevBoard->id)->orderBy("position_order", "asc")->get();
            }
            //get all
            $oldestList = Department_board_director::where('current', '=', 2)->get();
            //get meeting list
            $meetingLists = Department_meeting::where('department_id', '=', $id)->where('active', '=', 1)->orderBy("created_at", "Desc")->paginate(6);
            //get news list
            $newsLists = Department_news::where('department_id', '=', $id)->where('active', '=', 1)->orderBy("created_at", "Desc")->paginate(6);

            if (!empty($request->get("start"))) {

                return view('Customer.division.newsList', compact('newsLists', 'meetingLists', 'divisionObj', 'currentBoard', 'prevBoard', 'mastrBoard', 'subBoard', 'oldestList'))->render();
            }


            return view('Customer.division.meetingList', compact('newsLists', 'meetingLists', 'divisionObj', 'currentBoard', 'prevBoard', 'mastrBoard', 'subBoard', 'oldestList'))->render();
        }
    }



    public function newsDivisionDetails($id)
    {

        $newsObj = Department_news::where("id", '=', $id)->first();
        $newsGallery = Department_gallery::where("department_news_id", '=', $id)->where('active', '=', 1)->get();
        $relatedNews = Related_department_news::where("department_news_id", '=', $id)->paginate(3);
        $newsFile = Department_file::where("department_news_id", '=', $id)->get();
        $newsRandom = Department_news::take(3)->inRandomOrder(rand(10, 100))->get();
        $ads = Chamber_ads::where('active', '=', 1)->inRandomOrder(rand(10, 100))->get();
        $adsVedio = Ads_vedio::where('active', '=', 1)->take(1)->inRandomOrder(rand(10, 100))->get();
        return view('Customer.division.newsDetails', compact('adsVedio', 'ads', 'newsObj', 'newsFile', 'newsGallery', 'relatedNews', 'newsRandom'));
    }

    public function meetingDivisionDetails($id)
    {

        $newsObj = Department_meeting::where("id", '=', $id)->first();
        $newsGallery = Department_meeting_gallery::where("department_meeting_id", '=', $id)->where('active', '=', 1)->get();
        $newsFile = Department_meeting_file::where("department_meeting_id", '=', $id)->get();
        $ads = Chamber_ads::where('active', '=', 1)->inRandomOrder(rand(10, 100))->get();
        $adsVedio = Ads_vedio::where('active', '=', 1)->take(1)->inRandomOrder(rand(10, 100))->get();
        $newsRandom = Department_meeting::take(3)->inRandomOrder(rand(10, 100))->get();
        return view('Customer.division.meetingDetails', compact('adsVedio', 'ads', 'newsFile', 'newsObj', 'newsGallery', 'newsRandom'));
    }


    function fetch_newsDetailsDeivsion(Request $request)
    {


        if ($request->ajax()) {
            $id = $request->get("id");
            $newsObj = Department_news::where("id", '=', $id)->first();
            $newsGallery = Department_gallery::where("department_news_id", '=', $id)->where('active', '=', 1)->get();
            $relatedNews = Related_department_news::where("department_news_id", '=', $id)->paginate(3);
            $newsFile = Department_file::where("department_news_id", '=', $id)->get();
            $newsRandom = Department_news::take(3)->inRandomOrder(rand(10, 100))->get();
            $ads = Chamber_ads::where('active', '=', 1)->inRandomOrder(rand(10, 100))->get();
            $adsVedio = Ads_vedio::where('active', '=', 1)->take(1)->inRandomOrder(rand(10, 100))->get();
            return view('Customer.division.newsDetailsList', compact('adsVedio', 'ads', 'newsFile', 'newsObj', 'newsGallery', 'relatedNews', 'newsRandom'))->render();
        }
    }

    public function people($id)
    {
        $row = Department_board_member::where('id', '=', $id)->first();

        return view('Customer.people.index', compact('row'));
    }
}
