@extends('layouts.base')

@section('title')
    Todo App
@endsection

@section('head')
    <link href="https://cdn.lineicons.com/1.0.1/LineIcons.min.css" rel="stylesheet">
@endsection

@section('body')
    <main id="todo" class="bg-gray-100 min-h-screen">
        <profile v-if="user" :user="user"></profile>
        <div class="container mx-auto">
            <div class="flex">
                <div class="w-1/2">
                    <div class="font-bold text-3xl my-5">Todo list</div>
                    <create-todo class="mb-5" @create="onTodoCreated"></create-todo>
                    <todo-list :todos="todos"></todo-list>
                    <button
                        v-if="!loadedAll && todos.length"
                        class="rounded bg-red-500 text-white py-1 px-3 focus:outline-none"
                        @click="loadMore">
                        Load more
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('js')
    <script src="{{ mix('js/index.js') }}"></script>
@endsection
