<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFileRequest;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use League\CommonMark\Normalizer\SlugNormalizer;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param string $username
     */
    public function index($username)
    {
        $user = User::where('username',$username)->first();
        $files = $user->files->sortByDesc('id');
        return view('file.index',compact('user','files'));
    }

    /**
     * Show the form for creating a new resource.
     * @param string $username
     */
    public function create($username)
    {
        Gate::authorize('user-owner',$username);
        $user = User::where('username',$username)->first();
        return view('file.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     * @param $request
     * @param string $username
     */
    public function store(CreateFileRequest $request, $username)
    {
        Gate::authorize('user-owner',$username);
        $user = User::where('username',$username)->first();
        $sluger = new SlugNormalizer;
        $name = $sluger->normalize($request->input('name') ?? strval(time()));
        // upload file
        $fileRequest = $request->file('file');
        $ext = $fileRequest->getClientOriginalExtension();
        $fileSize = $fileRequest->getSize();
        $filename = $name.'.'.$ext;
        $folder = 'uploads/'.$sluger->normalize($user->username);
        $fileRequest->move($folder,$filename);
        // new file instance
        $file = new File;
        $file->name = $name;
        $file->type = $ext;
        $file->link = Str::random(6);
        $file->size = $fileSize;
        if($request->input('password')) {
            $file->password = $request->input('password');
        }
        $user->files()->save($file);
        return redirect()->route('file.index',$user->username);
    }

    /**
     * Display the specified resource.
     * @param string $username
     * @param string $link
     */
    public function show(string $username,string $link)
    {
        $user = User::where('username', $username)->first();
        $file = File::where('link',$link)->first();
        $filename = 'uploads/'.$user->username.'/'.$file->name.'.'.$file->type;

        return view('file.show',compact('user','file'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $username,string $id)
    {
        $user = User::where('username', $username)->first();
        Gate::authorize('user-owner',$username);
        $file = File::findOrFail($id);
        return view('file.edit',compact('user','file'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $username,string $id)
    {
        $user = User::where('username', $username)->first();
        Gate::authorize('user-owner',$username);
        $sluger = new SlugNormalizer;
        $name = $sluger->normalize($request->input('name') ?? strval(time()));
        $file = File::findOrFail($id);
        $fileUrl = 'uploads/'.auth()->user()->username.'/'.$file->full_name;
        $file->name = $name;
        $file->update();
        
        if (file_exists($fileUrl)) {
            $newName = 'uploads/'.auth()->user()->username.'/'.$file->name.'.'.$file->type;
            rename($fileUrl, $newName);
        }
        return redirect()->route('file.index',$user->username);
    }

    /**
     * Remove the specified resource from storage.
     * @param string $username
     * @param int $id
     */
    public function destroy(string $username,string $id)
    {
        Gate::authorize('user-owner',$username);
        $user = User::findOrFail(auth()->id());
        $sluger = new SlugNormalizer;
        $folder = 'uploads/'.$sluger->normalize($user->username);

        $file = File::findOrFail($id);
        if (file_exists($folder.'/'.$file->full_name)) {
            unlink($folder.'/'.$file->full_name);
            if (!file_exists($folder.'/')){
                rmdir($folder);
            }
        }
        $file->delete();
        return redirect()->route('file.index');
    }
}
