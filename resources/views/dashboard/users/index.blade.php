@extends('layout.dashboard.master')
@section('title')
    Users
@endsection
@section('dashboard_css')

@endsection
@section('location') Users: {{count($users)}}@endsection
@section('content')
    <div class="create_section"
        style="width: 100%; height: 100px; display: flex; align-items: center; justify-content: center;">
        

    </div>
    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 6%">
                        Id
                    </th>
                    <th style="width: 20%">
                        User Name
                    </th>
                    <th style="width: 20%">
                        Email
                    </th>
                </tr>
            </thead>
            <tbody>
               
                {{-- @if (count($users))      --}}
                
                @foreach ($users as $user)
                        <tr>    
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                <a>
                                    {{ $user->name }}
                                </a>
                                <br />
                                <small>
                                    Created {{ $user->created_at }}
                                </small>
                                <td>
                                    {{ $user->email }}
                                </td>
    
                            </td>
 
                            
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="{{ route('user.show', $user->id) }}">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                {{-- <a class="btn btn-info btn-sm" href="{{ route('product.edit', $product->id) }}">
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
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach

                    
                    {{-- @endif --}}
                    
                    
                </tbody>
            </table>
            @if (!count($users))
                
            <h2  style="font-size:50px ;width: 100%; display: flex; justify-content: center;">EMPTY</h2>
            @endif
    </div>
@endsection
@section('dashboard_script')

@endsection
