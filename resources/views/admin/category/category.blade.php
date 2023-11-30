<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            Welcome {{Auth::user()->name}}
            <b style="float:right"> Total Users 
               
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="container">
            <div class="row">
                <div class="col-md-8"></div>
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Created At:</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    @foreach ($categories as $category)
                        <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->user_id}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>@if ($category->image_path)
                <img src="{{ asset('images/' . $category->image_path) }}" alt="Category Image" style="max-width: 100px; max-height: 100px;">
            @else
                No Image
            @endif</td>
                        <td>
                            <a href="{{ route('editCategory', $category->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('deleteCategory', $category->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        </tr>
                        <tr>
                    @endforeach 
                    </tbody>
                    </table>
                    
                    <form method="POST" action="{{ route('AllCat') }}" enctype="multipart/form-data">
                    @csrf <!-- CSRF Protection -->
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="category_name">
                    </div>
                    <div class="mb-3">
                        <label for="category_image" class="form-label">Image</label>
                        <input type="file" class="form-control" name="category_image">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            </div>
           </div>
        </div>
    </div>
</x-app-layout>


