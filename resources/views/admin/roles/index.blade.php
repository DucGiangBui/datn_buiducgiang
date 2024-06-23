@extends('admin.layouts.app')
@section('tittle', 'Vai trò')
@section('content')
    <div class="card">
        <h1>
            Danh sách vai trò
        </h1>
        @if (Session::has('message'))
            <div class="alert alert-success text-black">
                {{ Session::get('message') }}
            </div>
        @endif

        <div>
            <a href="{{ route('roles.create') }}" class="btn btn-primary">Them moi</a>
        </div>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Tên hiển thị</th>
                    <th>Nhóm</th>
                    <th>Chỉnh sửa</th>
                    <th>Xoá</th>
                </tr>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>{{ $role->group }}</td>
                        <td>
                            <a href="{{ route('roles.edit',$role->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('roles.destroy',$role->id) }}" class="btn-delete"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $roles->links() }}
        </div>
    </div>
@endsection