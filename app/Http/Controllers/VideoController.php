<?php

namespace Acada\Http\Controllers;

use Acada\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Acada\Video;
use Acada\User;
use Acada\Http\Requests\StoreVideoRequest;
use Acada\Http\Requests;

use Acada\Repositories\Video\RepositoryInterface as VidRepInt;
use Acada\Repositories\Users\RepositoryInterface as UserRepInt;

class VideoController extends Controller
{

    protected
        $video,
        $user;

    public function __construct(VidRepInt $video, UserRepInt $user)
    {
        $this->user = $user;
        $this->video = $video;
    }

    public function index()
    {
        $videos = $this->video->simplePaginate(16);
        return view('video.home', [
            'videos' => $videos
        ]);
    }

    public function view($videoId)
    {
        $video = $this->video->find($videoId);
        return view('video.single', [
            'video' => $video
        ]);
    }

    public function create()
    {
        return view('video.create');
    }

    public function store(StoreVideoRequest $request)
    {
        $this->video->create(array_merge([
            "user_id" => Auth::user()->id
        ], $request->all()));

        $request->session()->flash('success', 'Video Added Successfully');
        return redirect('/videos/create');
    }

    public function userUploadedVideos()
    {
        $user = $this->user->find(Auth::user()->id);
        return view('video.home', [
                'videos' => $user->videos->simplePaginate(16)
            ]);
    }

    public function searchCategory(Request $request)
    {
        $videos = $this->video->where('category', $request->input('category'), 16);
        return view('video.home', [
            'videos' => $videos
        ]);
    }

    public function getCategories()
    {
        return json_encode(Category::getCategories());
    }

}
