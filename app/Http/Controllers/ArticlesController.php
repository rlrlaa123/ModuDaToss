<?php

namespace App\Http\Controllers;

use App\Article;
use App\Dashboard;
use App\User;
use function attachments_path;
use const FILTER_SANITIZE_URL;
use Illuminate\Http\Request;
use App\Http\Requests\ArticlesRequest;
use Illuminate\Support\Facades\Auth;
use function str_random;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index($dashboard_id)
    {
        $articles = \App\Article::where('dashboard_id',$dashboard_id)->paginate(5);
        $dashboard = Dashboard::find($dashboard_id);
        return view('articles.index', compact('articles','dashboard'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($dashboard_id)
    {
        $article = new \App\Article;
        $dashboard = Dashboard::find($dashboard_id);

        return view('articles.create', compact('article','dashboard'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $dashboard_id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $article = new Article;
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->user_id = Auth::user()->id;
        $article->dashboard_id = $dashboard_id;

        $article->save();
//        $article = $request->user()->articles()->create([$request->all()]);
//
//        if(! $article) {
//            return back()->with('flash_message', '글이 저장되지 않았습니다.')
//                ->withInput();
//        }

        $articles = \App\Article::where('dashboard_id',$dashboard_id)->paginate(3);
        flash('작성하신 글이 저장되었습니다.');
        $dashboard = Dashboard::find($dashboard_id);
        return view('articles.index', compact('dashboard','articles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dashboard_id,\App\Article $article)
    {
        $dashboard = Dashboard::find($dashboard_id);
        $comments = $article->comments()->with('replies')->whereNull('parent_id')->latest()->get();

        return view('articles.show', compact('article','comments','dashboard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($dashboard_id,\App\Article $article)
    {
        $dashboard = Dashboard::find($dashboard_id);
        $this->authorize('update', $article);

        return view('articles.edit', compact('article','dashboard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($dashboard_id,\App\Article $article,ArticlesRequest $request)
    {
//        $this->authorize('delete', $article);
        $dashboard = Dashboard::find($dashboard_id);

        $article->update($request->all());
        flash()->success('수정하신 내용을 저장했습니다.');

        return redirect(route('articles.show', [$dashboard,$article->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($dashboard_id, \App\Article $article)
    {
        $article->delete();

        return response()->json([], 204);
    }
}