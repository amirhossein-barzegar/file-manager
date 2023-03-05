<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\User;

class SearchController extends Controller
{
    /**
     * @return array
     */
    public function getSearch(Request $request) {
        $searchInput = $request->input('searchInput');
        $searchType = $request->input('searchType');

        if ($searchType == 'inFiles') {
            $files = File::where('name', 'like', "%$searchInput%")->get();

            // add user column to files
            foreach($files as $file) {
                $file->user = User::find($file->user_id);
            }

            return response()->json([
                'files' => $files,
                'users' => []
            ]);
        }
        elseif ($searchType == 'inUsers') {
            $users = User::where('username', 'like', "%$searchInput%")->get();

            // add files column to files
            foreach($users as $user) {
                $user->files = File::where('user_id',$user->id)->get();
            }

            return response()->json([
                'users' => $users,
                'files' => []
            ]);
        } else {
            $files = File::where('name', 'like', "%$searchInput%")->get();

            // add user column to files
            foreach($files as $file) {
                $file->user = User::find($file->user_id);
            }

            return response()->json([
                'files' => $files,
                'users' => []
            ]);
        }
    }
}
