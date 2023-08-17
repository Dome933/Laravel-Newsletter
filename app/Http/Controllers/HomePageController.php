<?php

namespace App\Http\Controllers;

use App\Models\PostsModel;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class HomePageController extends Controller
{
    /**
     * Display the home page.
     *
     * @param  Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request): array
    {
        $postsModel = new PostsModel();

        return view('home', ['posts' => $postsModel->getPostsFromDatabse()]);
    }
}
