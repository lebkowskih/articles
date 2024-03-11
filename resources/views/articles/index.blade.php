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
            <div class="border-2 my-4 flex-col">
                <div class="mb-8">
                    <h1 class="text-3xl text-center">
                        {{ $article->title }}
                    </h1>
                    {{ $article->text }}
                </div>

                <div>
                    <h1>
                        Authors:
                    </h1>
                    <ul>
                        @foreach ($article->authors as $author)
                            <li>{{ $author->name }}</li>
                        @endforeach
                    </ul>
                </div>

                <a href="{{ route('articles.edit', $article) }}">
                    <button class="bg-yellow-300 mb-0.5 text-white rounded-md ml-auto" style="padding: 5px">
                        Edit article
                    </button>
            </a>
            </div>
        @endforeach
    </div>
@endsection
