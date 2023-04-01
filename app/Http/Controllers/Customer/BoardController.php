<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Board_member;
use App\Models\Board_director;
use DB;
use Illuminate\Database\QueryException;
class BoardController extends Controller
{
    public function index(){
        //get current
       

            $currentBoard=Board_director::where('current','=',0)->first();
            $prevBoard=Board_director::where('current','=',1)->first();
            if($currentBoard !=null){

                $mastrBoard=Board_member::where('board_directors_id','=',$currentBoard->id)->get();
            }
            else{
                $mastrBoard=null;
            }

            if($prevBoard !=null){
                $subBoard=Board_member::where('board_directors_id','=',$prevBoard->id)->get();
            }else{
                $subBoard=null;
            }
          

          
            //get all
            $oldestList=Board_director::where('current','=',2)->get();


            //new
            $mastrBoard = [];
        $subBoard = [];


    

        $currentBoard =Board_director::where('current','=',0)->first();


        $prevBoard =Board_director::where('current','=',1)->first();
        if ($currentBoard != null) {
            $mastrBoard =Board_member::where('board_directors_id','=',$currentBoard->id)->get();
        }

        if ($prevBoard != null) {
            $subBoard = Board_member::where('board_directors_id','=',$prevBoard->id)->get();
        }
        //get all
        $oldestList =Board_director::where('current','=',2)->get();
       

              return view('Customer.board.index', compact( 'currentBoard', 'prevBoard', 'mastrBoard', 'subBoard', 'oldestList'));
        

        
    }
    public function boardPeople($id){
        $row=Board_member::where('id','=',$id)->first();
      
        return view('Customer.people.peopleBoard', compact('row'));
    }
}
