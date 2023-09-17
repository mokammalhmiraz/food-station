@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('List Items') }}</div>

                <div class="card-body">
                    <div class="alert alert-success text-center">
                        <h3>Total Items: {{ $total_item }}</h3>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Category</th>
                                <th>Item Name</th>
                                <th>Item Price</th>
                                <th>Item Review</th>
                                <th>Offer</th>
                                <th>Added By</th>
                                <th>Created At</th>
                                <th>UPDATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item_list as $items)
                                <tr>
                                    <th>{{ $loop->index + 1 }}</th>
                                    <td>
                                        {{ App\Models\Category::find($items->category_id)->category_name}}
                                    </td>
                                    <td>{{ $items->item_name }}</td>
                                    <td>{{ $items->item_price }} BDT</td>
                                    <td>{{ $items->item_review }}</td>
                                    <td>{{ $items->item_offer }}</td>
                                    <td>
                                        {{ App\Models\User::find($items->added_by)->name }}
                                    </td>
                                    <td>{{ $items->created_at->format('d/m/y h:i:s A') }}
                                        <br>
                                        <span class="badge badge-success">{{ $items->created_at->diffForHumans() }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ url('items.delete') }}.{{ $items->id }}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $categorys->links() }} --}}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('ADD Items') }}</div>
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('items.insert') }}" enctype="multipart/form-data">

                        @csrf {{-- Token for cross check and secure from hacker --}}

                        <div class="form-group">
                            <label>Category Name</label>
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
                            <label>Item Name</label>
                            <input type="text" class="form-control" name="item_name">
                            @error('item_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Item Price</label>
                            <input type="text" class="form-control" name="item_price">
                            @error('item_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Item Image</label>
                            <input type="file" class="form-control" name="item_image">
                            @error('item_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Offer Name</label>
                            <select name="item_offer" class="form-control">
                                <option value="">-Select One-</option>
                                <option value="Best Deal">Best Deal</option>
                                <option value="Eid Offer">Eid Offer</option>
                                <option value="New Year Offer">New Year Offer</option>
                            </select>
                            @error('item_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Item Review</label>
                            {{-- <input type="text" class="form-control" name="item_review"> --}}
                            <select name="item_review" class="form-control">
                                <option value="">-Select One-</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            @error('item_review')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
