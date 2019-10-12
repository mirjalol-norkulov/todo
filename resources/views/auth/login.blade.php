@extends('layouts.base')

@section('title')
    Login
@endsection

@section('body')
    <main class="bg-gray-100" id="login">
        <div class="container mx-auto">
            <div class="flex min-h-screen justify-center items-center">
                <div class="w-1/3">
                    <div class="font-bold text-3xl text-center mb-2 uppercase">Todo app</div>
                    <div class="rounded bg-white shadow-md w-full p-5">
                        <div class="font-bold text-xl mb-2">Login</div>
                        <form action="{{ route('auth.login') }}" method="post" ref="form">
                            {{ csrf_field() }}
                            <div class="mt-4">
                                <label for="email" class="block mb-1">Email</label>
                                <input type="email"
                                       id="email"
                                       class="w-full py-2 px-2 text-sm border border-gray-200 rounded outline-none"
                                       v-model.trim="$v.email.$model"
                                       required>
                                <p class="text-red-600 mt-1 text-xs" v-if="$v.email.$error && !$v.email.required">
                                    @{{ messages.email.required }}
                                </p>
                                <p class="text-red-600 mt-1 text-xs" v-if="$v.email.$error && !$v.email.email">
                                    @{{ messages.email.email }}
                                </p>
                            </div>
                            <div class="mt-4">
                                <label for="password" class="block mb-1">Password</label>
                                <input type="password" id="password"
                                       class="w-full py-2 px-2 text-sm border border-gray-200 rounded outline-none"
                                       v-model="password"
                                       required>
                                <p class="text-red-600 mt-1 text-xs" v-if="$v.password.$error && !$v.email.required">
                                    @{{ messages.password.required }}
                                </p>
                            </div>
                            <div class="mt-4">
                                <button type="submit"
                                        class="w-full font-bold py-1 px-2 rounded text-center bg-red-500 hover:bg-red-600 text-white focus:outline-none"
                                        @click.prevent="login">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('js')
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/login.js') }}"></script>
@endsection
