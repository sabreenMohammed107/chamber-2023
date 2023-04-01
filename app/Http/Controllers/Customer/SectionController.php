<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Section_file;
class SectionController extends Controller
{
    public function index()
    {

        $sections = Section::orderBy("created_at", "Desc")->paginate(6);

        return view('Customer.section.index', compact('sections'));
    }

    public function details($id)
    {
        $section = Section::where('id', '=', $id)->first();
        $newsFile=Section_file::where("section_id",'=',$id)->get();
        return view('Customer.section.details', compact('section','newsFile'));
    }
}
