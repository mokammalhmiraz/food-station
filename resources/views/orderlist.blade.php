@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mb-5">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>
                        Welcome, {{ Auth::user()->name }}
                    </p>

                    <p>
                        Your email is, {{ Auth::user()->email }}
                    </p>
                    <p>
                        {{ __('Confirmed Order') }}
                        @php
                            print_r($selected_order)
                        @endphp
                    </p>
                    @if ( ((Auth::user()->email)=='miraz@live.com') || ((Auth::user()->email)=='emon@live.com') == true )

                    @else
                        <span class="alert alert-success">
                        {{ 'Total Price' }} {{ $total_price }} BDT
                        </span>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Sub Category List') }}</div>

                <div class="card-body">
                    <div class="alert alert-success text-center">
                        <h3>Total Sub Categorys:
                            @if ( ((Auth::user()->email)=='miraz@live.com') || ((Auth::user()->email)=='emon@live.com') == true )
                                {{ $total_orders }}
                            @else
                                {{ $total_order }}
                            @endif
                            </h3>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Product Category</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Added By</th>
                                <th>Order Time</th>
                                <th>UPDATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ( ((Auth::user()->email)=='miraz@live.com') || ((Auth::user()->email)=='emon@live.com') == true )
                                @php
                                    $orders = $order_list;
                                @endphp
                            @endif
                                @foreach ($orders as $order)
                                    <tr>
                                        <th>{{ $loop->index + 1 }}</th>
                                        <td>
                                            {{ $order->product_catagory}}
                                        </td>
                                        <td>{{ $order->product_name }}</td>
                                        <td>{{ $order->product_price }} BDT</td>
                                        <td>{{ App\Models\User::find($order->added_by)->name }}</td>
                                        <td>{{ $order->created_at->format('d/m/y h:i:s A') }}
                                            <br>
                                            <span class="badge badge-success">{{ $order->created_at->diffForHumans() }}</span>
                                        </td>
                                        <td>
                                            @php
                                                $order_status = $order->order_status;
                                                $deliver_status = $order->deliver_status;
                                            @endphp

                                            @if ( $order_status == 1)
                                                @if ( ((Auth::user()->email)=='miraz@live.com') || ((Auth::user()->email)=='emon@live.com') == true )
                                                    @if ($deliver_status == 1)
                                                        <span class="badge badge-success">Delivered</span>
                                                    @else
                                                        <a href="{{ url('order.deliver') }}.{{ $order->id }}" class="btn btn-success btn-sm">Deliver</a>
                                                    @endif
                                                @elseif ($deliver_status == 1)
                                                        <span class="badge badge-success">Delivered</span>
                                                @else
                                                        <span class="badge badge-warning">Pending</span>
                                                @endif
                                            @elseif ( $order_status == -1 )
                                                @if ( ((Auth::user()->email)=='miraz@live.com') || ((Auth::user()->email)=='emon@live.com') == true )
                                                    @if ( $order_status == -1 )
                                                        <a href="{{ url('order.delete') }}.{{ $order->id }}" class="btn btn-danger btn-sm">Delete</a>
                                                    @else
                                                        <a href="{{ url('order.cancel') }}.{{ $order->id }}" class="btn btn-danger btn-sm">Cancel</a>
                                                        <a href="{{ url('order.delete') }}.{{ $order->id }}" class="btn btn-danger btn-sm">Delete</a>
                                                        <a href="{{ url('order.update') }}.{{ $order->id }}" class="btn btn-success btn-sm">Confirm</a>
                                                    @endif
                                                @else
                                                @endif
                                                <span class="badge badge-info">Cancled</span>
                                            @elseif ( ((Auth::user()->email)=='miraz@live.com') || ((Auth::user()->email)=='emon@live.com') == true )
                                                @if ( $order_status == -1 )
                                                    <a href="{{ url('order.delete') }}.{{ $order->id }}" class="btn btn-danger btn-sm">Delete</a>
                                                @else
                                                    <a href="{{ url('order.cancel') }}.{{ $order->id }}" class="btn btn-danger btn-sm">Cancel</a>
                                                    <a href="{{ url('order.delete') }}.{{ $order->id }}" class="btn btn-danger btn-sm">Delete</a>
                                                    <a href="{{ url('order.update') }}.{{ $order->id }}" class="btn btn-success btn-sm">Confirm</a>
                                                @endif
                                            @else
                                                <a href="{{ url('order.delete') }}.{{ $order->id }}" class="btn btn-danger btn-sm">Delete</a>
                                                <a href="{{ url('order.update') }}.{{ $order->id }}" class="btn btn-success btn-sm">Confirm</a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            @if ($orders->count() == 0)
                                <tr class="text-center">
                                    <td colspan="10">No Data To Show</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    @if ( ((Auth::user()->email)=='miraz@live.com') || ((Auth::user()->email)=='emon@live.com') == true )
                        {{ $order_list->links() }}
                    @else
                        {{-- {{ $orders->links() }} --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
