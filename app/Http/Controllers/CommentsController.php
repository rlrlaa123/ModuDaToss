<?php

namespace App\Http\Controllers;

use App\Dashboard;
use Illuminate\Http\Request;

use App\Http\Requests;

class CommentsController extends Controller
{
    /**
     * CommentsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CommentsRequest $request
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function store($dashboard_id, \App\Http\Requests\CommentsRequest $request, \App\Article $article)
    {
        $dashboard = Dashboard::find($dashboard_id);

        $comment = $article->comments()->create(array_merge(
            $request->all(),
            ['user_id' => $request->user()->id]
        ));

        flash()->success('작성하신 댓글을 저장했습니다.');

        return redirect(route('articles.show', [$dashboard,$article->id]) . '#comment_' .$comment->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\CommentsRequest $request
     * @param \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update($dashboard_id, \App\Http\Requests\CommentsRequest $request, \App\Comment $comment)
    {
        $dashboard = Dashboard::find($dashboard_id);

        $comment->update($request->all());

//        event(new \App\Events\ModelChanged(['articles']));

        return redirect(
            route('articles.show', [$dashboard,$comment->commentable->id]) . '#comment_' . $comment->id
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($dashboard_id, \App\Comment $comment)
    {
        $comment->delete();

        return response()->json([], 204);
    }

    /**
     * Vote up or down for the given comment.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Comment $comment
     * @return \Illuminate\Http\JsonResponse
     */
}