@extends('layout.dashboard.master')
@section('title')
    Products
@endsection
@section('dashboard_css')

@endsection
@section('location') Products: {{count($products)}}@endsection
@section('content')
    <div class="create_section"
        style="width: 100%; height: 100px; display: flex; align-items: center; justify-content: center;">
        <a href="{{ route('product.create') }}" class="btn btn-primary" style="width: 100px;">Create</a>

    </div>
    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 6%">
                        Id
                    </th>
                    <th style="width: 20%">
                        Products Name
                    </th>
                    <th style="width: 11%">
                        Quantity
                    </th>
                    <th style="width: 10%">
                        Price
                    </th>
                    <th style="width: 10%">
                        Category Id
                    </th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd(count($products)) --}}
                @if (count($products))     
                @foreach ($products as $product)
                        <tr>    
                            <td>
                                {{ $product->id }}
                            </td>
                            <td>
                                <a>
                                    {{ $product->name }}
                                </a>
                                <br />
                                <small>
                                    Created {{ $product->created_at }}
                                </small>
    
                            </td>
                            <td>
                                {{ $product->quantity }}
                            </td>
                            <td>
                                {{ $product->price }}
                            </td>
                            <td>
                                {{ $product->category_id }}
                            </td>
    
    
                            
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="{{ route('product.A_show', $product->id) }}">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route('product.edit', $product->id) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
    
                                <form method="POST" action="{{ route('product.destroy', $product->id) }}"
                                    style=" display: inline">
                                    @csrf
                                    @method('DELETE')
    
                                    <button type="submit" class="btn btn-danger btn-sm ">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    
                    @endif
                    
                    
                </tbody>
            </table>
            @if (!count($products))
                
            <h2  style="font-size:50px ;width: 100%; display: flex; justify-content: center;">EMPTY</h2>
            @endif
    </div>
@endsection
@section('dashboard_script')

@endsection
