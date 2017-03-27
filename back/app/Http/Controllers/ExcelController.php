<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\Input;
use DB;
class ExcelController extends Controller
{
    public function ExportClients(){
        Excel::create('clients', function($excel) {

            $excel->sheet('clients', function($sheet) {

                //$sheet->setOrientation('landscape');
                $sheet->loadView('ExportClients_view');

            });

        })->export('xlsx');
    }

    public function upload_excel(){
        return view('upload_excel_file');
    }

    public function post_upload_excel(){
        $data = [];
        $file = Input::file('file');
        $file_name = $file->getClientOriginalName();
        $file->move('upload_folder',$file_name);
        $results = Excel::load('upload_folder/'.$file_name,function($reader){
            $reader->all();
        })->get();

        //This code is for inserting excell data into database
        //start
       /* if($results){
            foreach($results as $result){
                $data['name'] = $result['name'];
                $data['email'] = $result['email'];
                $data['address'] = $result['address'];

                DB::table('tbl_students')->insert($data);
            }
        }
        return 'Data inserted successfully !!';
       */
       //end
        //This code is for showing excell data with a view
        return view('show_students',['students' => $results]);

    }
}
