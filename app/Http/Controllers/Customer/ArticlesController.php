<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chamber_article;
use App\Models\Article_gallery;
use App\Models\Chamber_chance;
class ArticlesController extends Controller
{
    public function article($id){
      
        $view_page ='Customer.article.';
        
        $data = Chamber_article::findOrFail($id);
    $galleries=Article_gallery::where('article_id','=',$id)->where('active','=',1)->orderBy("created_at", "Desc")->get();
        switch ($id) {

            case ($id == 1 ):
               
                $view_page .= 'tmyoz';
                break;
            case ($id == 2 ):
                $view_page .= 'medical';
            break;
            case ($id == 3 ):
               
                $view_page .= 'insurance';
                break;
            case ($id == 4 ):
                $view_page .= 'ershad';
            break;
            case ($id == 5 ):
               
                $view_page .= 'club';
                break;
            case ($id == 6 ):
                $view_page .= 'chamberConferance';
            break;
            case ($id == 7 ):
               
                $view_page .= 'tawfeek';
                break;
            case ($id == 8 ):
                $view_page .= 'ladies';
            break;
            default:
                break;
        };
        return view($view_page, compact('data','galleries'));
    }


    public function chance($id){
      
        $view_page ='Customer.chance.';
        $chanceType=$id;
    $chances=Chamber_chance::where('chance_type','=',$id)->where('active','=',1)->orderBy("order", "Desc")->get();
        switch ($id) {

            case ($id == 1 ):
               
                $view_page .= 'import';
                break;
            case ($id == 2 ):
                $view_page .= 'export';
            break;
            case ($id == 3 ):
               
                $view_page .= 'investment';
                break;
            case ($id == 4 ):
                $view_page .= 'tenders';
            break;
           
            default:
                break;
        };
        return view($view_page, compact('chanceType','chances'));
    }

    function fetch_importChance(Request $request)
    {
     

     if($request->ajax())
     {
         $id=$request->get("id");
         $view_page ='Customer.chance.';
        $chanceType=$id;
    $chances=Chamber_chance::where('chance_type','=',$id)->where('active','=',1)->orderBy("order", "Desc")->paginate(4);
        switch ($id) {

            case ($id == 1 ):
               
                $view_page .= 'importList';
                break;
            case ($id == 2 ):
                $view_page .= 'exportList';
            break;
            case ($id == 3 ):
               
                $view_page .= 'investmentList';
                break;
            case ($id == 4 ):
                $view_page .= 'tendersList';
            break;
           
            default:
                break;
        };
        return view($view_page, compact('chanceType','chances'))->render();
       
     }
    }
}
