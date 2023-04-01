<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use DB;
use Log;
use File;

use App\Models\Article_file;
use App\Models\Article_gallery;
use App\Models\Chamber_article;

class AcademyPageController extends Controller
{
    protected $object;

    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Chamber_article $object)
    {
        $this->middleware('auth:admin');

        $this->object = $object;
        $this->viewName = 'Admin.academyPages.';
        $this->routeName = 'aboutAcademy.';
        $this->message = 'The Data has been saved';
        $this->errormessage = 'check Your Data ';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Chamber_article::where("id",'=',9)->first();

        return view($this->viewName . 'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $row = Chamber_article::where('id', '=', $id)->first();

        $galleries = Article_gallery::where('article_id', '=', $id)->orderBy("created_at", "Desc")->get();
        $files = Article_file::where('article_id', '=', $id)->orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'edit', compact('row', 'galleries', 'files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [

            'en_text' => $request->input('en_text'),
            'ar_text' => $request->input('ar_text'),

        ];

        $this->object::findOrFail($id)->update($data);

        return redirect()->route($this->routeName . 'index')->with('flash_success', $this->message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
 /**
     * Announce Gallery
     */
    public function addGallery(Request $request)
    {

        $active = 0;

        if ($request->input('active') == 'on') {
            $active = 1;
        }
        $data = [

            'vedio' => $request->input('vedio'),
            'order' => $request->input('order'),
            'article_id' => $request->input('article_id'),

            'active' => $active,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $data['image'] = $this->UplaodImage($image);
        }

        Article_gallery::create($data);


        return redirect()->back()->with('flash_success', $this->message);
    }

    public function updateGallery(Request $request)
    {
        $id = $request->input('gallery_id');

        $active = 0;

        if ($request->input('active') == 'on') {
            $active = 1;
        }
        $data = [

            'vedio' => $request->input('vedio'),
            'order' => $request->input('order'),
            'article_id' => $request->input('article_id'),

            'active' => $active,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $data['image'] = $this->UplaodImage($image);
        }


        Article_gallery::findOrFail($id)->update($data);

        return redirect()->back()->with('flash_success', $this->message);
    }

    public function deleteGallery($id)
    {

        $gallery = Article_gallery::where('id', '=', $id)->first();
        $file = $gallery->image;


        $file_name = public_path('uploads/article/' . $file);

        try {

            $gallery->delete();
            File::delete($file_name);
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

        return redirect()->back()->with('flash_success', 'Data Has Been Deleted Successfully !');
    }
    /**
     * file
     */


    public function addFile(Request $request)
    {
        $lang = 1;

        if ($request->input('language_id') === 'en') {
            $lang = 0;
        }
        $data = [

            'name' => $request->input('name'),

            'article_id' => $request->input('article_id'),

            'language_id' => $lang,
        ];

        if ($request->hasFile('path')) {

            $path = $request->file('path');

            $data['path'] = $this->UplaodFile($path);
        }

        Article_file::create($data);


        return redirect()->back()->with('flash_success', $this->message);
    }

    public function updateFile(Request $request)
    {
        $id = $request->input('file_id');

        $lang = 1;

        if ($request->input('language_id') === 'en') {
            $lang = 0;
        }
        $data = [

            'name' => $request->input('name'),

            'article_id' => $request->input('article_id'),

            'language_id' => $lang,
        ];

        if ($request->hasFile('path')) {

            $path = $request->file('path');

            $data['path'] = $this->UplaodFile($path);
        }

        Article_file::findOrFail($id)->update($data);

        return redirect()->back()->with('flash_success', $this->message);
    }

    public function deleteFile($id)
    {

        $gallery = Article_file::where('id', '=', $id)->first();
        $file = $gallery->path;


        $file_name = public_path('uploads/article/' . $file);


        try {

            $gallery->delete();
            File::delete($file_name);
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

        return redirect()->back()->with('flash_success', 'Data Has Been Deleted Successfully !');
    }

    /**
     * uplaud image
     */
    public function UplaodImage($file_request)
    {
        //  This is Image Info..
        $file = $file_request;
        $name = $file->getClientOriginalName();
        $ext  = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $path = $file->getRealPath();
        $mime = $file->getMimeType();


        // Rename The Image ..
        $imageName = $name;
        $uploadPath = public_path('uploads/article');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
    /**
     * uplaud file
     */

    public function UplaodFile($file_request)
    {
        //  This is Image Info..
        $file = $file_request;
        $name = $file->getClientOriginalName();
        $ext  = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $path = $file->getRealPath();
        $mime = $file->getMimeType();


        // Rename The Image ..
        $imageName = $name;

        $uploadPath = public_path('uploads/article');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}

