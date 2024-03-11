@extends('layouts.app')

@section('content')
    <div class="w-3/6 mx-auto flex flex-col">
        <div class="border-b-2 border-black mt-2 flex">
            <h1 class="text-3xl">
                Articles
            </h1>
            <a href="{{ route('articles.create') }}" class="ml-auto">
                <button class="bg-green-500 mb-0.5 text-white rounded-md" style="padding: 5px">
                    Add article
                </button>
            </a>
        </div>
        @foreach ($articles as $article)
            <div>
                {{ $article->title }}
                {{ $article->text }}
                @foreach ($article->authors as $author)
                    {{ $author->name }}
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
