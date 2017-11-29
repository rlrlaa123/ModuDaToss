<?php

namespace App\Http\Controllers;

use function attachments_path;
use const FILTER_SANITIZE_URL;
use Illuminate\Http\Request;
use App\Http\Requests\ArticlesRequest;
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

    public function index()
    {
        $articles = \App\Article::latest()->paginate(3);

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = new \App\Article;

        return view('articles.create', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request)
    {

//        // 유효성 검사 규칙
//        $rules = [
//            'title' => ['required'],
//            'content' => ['required', 'min:10'],
//        ];
//        // Validator::make(유효성 검사의 대상 데이터, 검사 규칙)
//        $validator = \Validator::make($request->all(), $rules);
//
//        // back() (이전 페이지로 리디렉션)
//        // withErrors() (검사 실패 이유를 세션에 굽는 일) -> 뷰에서 $errors 변수가 이 데이터를 받는다.
//        // withInput() (폼 데이터를 세션에 넣는다) -> 뷰의 old() 함수는 이 데이터를 읽는다
//        if($validator->fails()) {
//            return back()->withErrors($validator)
//                ->withInput();
//        }
        $article = $request->user()->articles()->create($request->all());

//        if ($request->hasFile('files')) {
//            $files = $request->file('files');
//
//            foreach($files as $file) {
//                $filename = str_random().filter_var($file->getClientOriginalName(), FILTER_SANITIZE_URL);
//                $file->move(attachments_path(), $filename);
//
//                $article->attachments()->create([
//                    'filename' => $filename,
//                    'bytes' => $file->getSize(),
//                    'mime' => $file->getClientMimeType()
//                ]);
//            }
//        }

        if(! $article) {
            return back()->with('flash_message', '글이 저장되지 않았습니다.')
                ->withInput();
        }

        return redirect(route('articles.index'))
            ->with('flash_message', '작성하신 글이 저장되었습니다.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Article $article)
    {
        $this->authorize('update', $article);

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticlesRequest $request, \App\Article $article)
    {
        $this->authorize('delete', $article);

        $article->update($request->all());
        flash()->success('수정하신 내용을 저장했습니다.');

        return redirect(route('articles.show', $article->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Article $article)
    {
        $article->delete();

        return response()->json([], 204);
    }
}