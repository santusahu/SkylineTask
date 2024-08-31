<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\FileShare;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    // File List
    public function index(Request $request){
        $auth_user_data = Session::get('auth_user_data');
        $files_query = File::with('uploader')->orderBy('id','DESC');
        if($auth_user_data->role != 'Admin'){
            $user_id = $auth_user_data->id;
            $user_id = $auth_user_data->id;
            $file_ids = FileShare::where('user_id',$user_id)->get('file_id')->pluck('file_id');
            if(count($file_ids) == 0){
                $file_ids = [0];
            }
            $files_query = $files_query->where('uploaded_by', $user_id)->orWhereIn('id',$file_ids); 
        }
        $data = $files_query->get();
        return view('files')->with('data',$data)->with('auth_user_data',$auth_user_data);
    }

    // Upload file view
    public function create(){
        return view('file-upload');
    }

    // File upload save
    public function store(Request $request){


        $auth_user_data = Session::get('auth_user_data');
        try {
           
            $request->validate([
                'file_to_upload' => 'required|file|mimes:jpg,png,pdf,docx,xlsx,xls,csv,mp4,avi,mov,wmv,mkv|max:20480',
            ]);
            
            if (isset($_FILES["file_to_upload"]) && $_FILES["file_to_upload"]["error"] == 0) {
                $file = $request->file('file_to_upload');

                $fileName = 'File_'.uniqid() . '.' . $file->getClientOriginalExtension();
                $filePath = "uploads/".$fileName;
                $originalName = $file->getClientOriginalName();
                $moveResult = $file->move(public_path('uploads/'), $fileName);
                File::create([
                    'uploaded_by' => $auth_user_data->id,
                    'name' => $request->name,
                    'path' => $filePath,
                    'original_name' => $originalName,
                ]);

                return redirect()->route('files.index')->with('success' , 'File uploaded');
            }else{
                return redirect()->route('files.create')->with('false' , 'Something went wrong!!!');
            }
        } catch (Exception $error) {
            $errorMessage = $error->getMessage();
            $errorCode = $error->getCode();
            $errorFile = $error->getFile();
            $errorLine = $error->getLine();
            $previousException = $error->getPrevious();

            return back()->with('error',$errorMessage);
            return response()->json([
                'error' => [
                'message' => $errorMessage,
                'code' => $errorCode,
                'file' => $errorFile,
                'line' => $errorLine,
                'previous' => $previousException,
                ]
            ], 500);
        }
    }

    // delete uploaded file
    public function destroy($file_id){
        $file = File::findOrFail($file_id);

        if($file != null){
            $file->delete();
            return back()->with('success','file deleted');
        }else{
            return back()->with('false','file not found');
        }
    }

    // share file to user view
    public function share(Request $request, $file_id){
        $file = File::findOrFail($file_id);
        $auth_user_data = Session::get('auth_user_data');
        $users  = User::where('role','<>','Admin')->where('id','<>',$auth_user_data->id)->get(['id','name','email']);
        $data = [
            "file" => $file,
            "users" => $users,
        ];
        return view('file-share')->with('data',$data);
    }

    // share file to user save
    public function shareStore(Request $request, $file_id){
        $file = File::findOrFail($file_id);
        $userIds = $request->user_ids; // Array of user IDs
        $data = [];
        foreach ($userIds as $userId) {
            $data_array = [
                'file_id' => $file->id,
                'user_id' => $userId,
            ];
            $data = FileShare::updateOrCreate($data_array,$data_array);
        }
        return redirect()->route('files.index')->with('success', 'File shared successfully!');
    }
}
