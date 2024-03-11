<?php

namespace App\Http\Controllers;

use App\Repository\ArticleRepository;
use App\Repository\AuthorRepository;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(
        protected ArticleRepository $articleRepository,
        protected AuthorRepository $authorRepository
    ) {}
    public function index()
    {
        return view('articles.index')->with([
            'articles' => $this->articleRepository->getAll(),
        ]);
    }

    public function create()
    {
        return view('articles.form')->with([
            'authors' => $this->authorRepository->getAll(),
        ]);
    }

    public function store(Request $request)
    {
        $this->articleRepository->create($request->all());
    }
    public function getById(int $id)
    {
        $article = $this->articleRepository->getById($id);
        return response()->json($article);
    }

    public function getByAuthor(int $authorId)
    {
        $articles = $this->articleRepository->getByAuthor($authorId);
        return response()->json($articles);
    }
}
