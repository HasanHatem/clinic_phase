@extends('admin.layouts.admin')

@section('title')
    All Users
@endsection

@section('content')

    <div class="row">
        <div class="width-100">
            <a href="{{ route('admin.users.create') }}" class="btn btn--mr-b">
                Add User
            </a>
        </div>
    </div>

    <div class="row">
        <div class="width-100">

            @if (count($users) <= 0)
                <div class="failed">
                    <p>
                        There are no users.
                    </p>
                </div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.users.edit', ['user' => $user]) }}">
                                        {{ $user->name }}
                                    </a>
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->is_admin === 1 ? 'Admin' : 'User' }}
                                </td>
                                <td>
                                    <ul class="table--icons flex">
                                        <li>
                                            <a href="{{ route('admin.users.edit', ['user' => $user]) }}" title="Edit" class="edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                                            </a>
                                        </li>
                                        @if ($user->is_admin != 1)
                                            <li>
                                                <a href="{{ route('admin.users.delete', ['user' => $user]) }}" title="Delete" class="delete"
                                                    onclick="if (confirm('Are you sure?')) {event.preventDefault(); document.getElementById('delete-user-{{ $user->id }}').submit();} else {return false;}"
                                                    >
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                                                </a>

                                                <form action="{{ route('admin.users.delete', ['user' => $user]) }}" method="POST" id="delete-user-{{ $user->id }}" style="display: none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </li>
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @endif

        </div>
    </div>

@endsection
