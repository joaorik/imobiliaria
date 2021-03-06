<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\CommentsRequest;
use App\Models\Blog;
use App\Models\Comment;
use App\Http\Controllers\Controller;

class BlogsController extends Controller
{
    /**
     * Página BLOG do site
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'DESC')->where('published', '=', true)->paginate(4);
        return view('site.blogs.index', compact('blogs'));
    }

    /**
     * Adiciona o comentário do Blog no banco
     */
    public function store(CommentsRequest $request)
    {
        $comment = new Comment();
        $comment->blog_id = $request->input('blog_id');
        $comment->name = $request->input('name');
        $comment->email = $request->input('email');
        $comment->message = $request->input('message');
        $comment->ip = $request->ip();
        $comment->save();

        //flash('Comentario enviado com sucesso, aguarde aprovação')->success();
        return back();
    }

    /**
     * Página do Blog selecionado
     * Caso blog não exista, retorna 404
     * Incrementa o VIEWS na banco cada vez que visualiza o Blog
     * Retorna os comenários do Blog selecionado
     */
    public function show($id, $slug)
    {
        $blog = Blog::where('id', '=', $id)->whereSlug($slug)->firstOrFail();
        $blog->increment('views');

        $comments = Comment::where('blog_id', '=', $id)->where('allowed', '=', true)->get();

        return view('site.blogs.blog', compact('blog', 'comments'));
    }
}
