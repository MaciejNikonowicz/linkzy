@extends('layouts.app')

@section('content')
<div>
    <div class="flex bg-gray-100 border-b border-gray-300 py-4">
        <div class="container mx-auto ">
            <router-link class="mr-4" :to="{ name: 'HomePage' }" exact>Home</router-link>
        </div>
        <div class="flex mx-auto">
            <router-link class="mr-4" :to="{name: 'LoginPage'}" exact>Login</router-link>
            <router-link :to="{name: 'RegisterPage'}">Register</router-link>
        </div>
    </div>
    <div class="container mx-auto py-2">
        <router-view></router-view>
    </div>
</div>
    
@endsection
