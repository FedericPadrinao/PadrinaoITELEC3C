<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        
            Welcome {{Auth::user()->name}}
            <b style="float:right"> Total Users
                <span class="badge text-danger">{{count($users)}} </span> 
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="container">
            <div class="ro">
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created At:</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    @foreach ($users as $user)
                        <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        </tr>
                        <tr>
                    @endforeach
                    </tbody>
                    </table>
            </div>
           </div>
        </div>
    </div>
</x-app-layout>


