@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Sub Category List') }}</div>

                <div class="card-body">
                    <div class="alert alert-success text-center">
                        <h3>Total Sub Categorys: {{ $subcategories->count() }}</h3>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Sub Category Name</th>
                                <th>Category Name</th>
                                <th>User</th>
                                <th>Created At</th>
                                <th>UPDATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subcategories as $key => $subcategory)
                                <tr>
                                    <th>{{ $subcategories->firstItem() + $key }}</th>
                                    <td>{{ $subcategory->sub_category_name }}</td>
                                    <td>
                                        {{ App\Models\Category::find($subcategory->category_id)->category_name }}
                                    </td>
                                    <td>
                                        {{ App\Models\User::find($subcategory->added_by)->name }}
                                    </td>
                                    <td>{{ $subcategory->created_at->format('d/m/y h:i:s A') }}
                                        <br>
                                        <span class="badge badge-success">{{ $subcategory->created_at->diffForHumans() }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ url('subcategory.delete') }}.{{ $subcategory->id }}" class="btn btn-danger btn-sm">Delete</a>
                                        <a href="{{ url('subcategory.edit') }}.{{ $subcategory->id }}" class="btn btn-warning btn-sm">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($subcategories->count() == 0)
                                <tr class="text-center">
                                    <td colspan="10">No Data To Show</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $subcategories->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('ADD Category') }}</div>
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('subcategory.insert') }}">
                        @csrf
                        <div class="form-group">
                            <label>Sub Category Name</label>
                            <select name="category_id" class="form-control">
                                <option value="">-Select One-</option>
                                @foreach ($categories as $category)
                                    <option {{ (old('category_id') == $category->id)? "selected":"" }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Sub Category Name</label>
                            <input type="text" class="form-control" name="sub_category_name" value="{{ old('sub_category_name') }}">
                            @error('sub_category_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Add Sub Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
