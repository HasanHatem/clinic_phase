@extends('admin.layouts.admin')

@section('title')
Edit {{ $user->name }}
@endsection

@section('content')

    <div class="row">
        <div class="width-50">

            <div class="card">

                <div class="form-wrapper">
                    <div class="form">

                        <form action="{{ route('admin.users.update', ['user' => $user]) }}" method="POST">

                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <div class="input-group">
                                    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" tabindex="1">

                                    @error('name')
                                        <span class="validate-error" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="input-group">
                                    <input id="email" type="text" class="@error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" tabindex="2">

                                    @error('email')
                                        <span class="validate-error" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="is_admin">Role</label>
                                <div class="input-group">
                                    <select name="is_admin" id="is_admin" class="@error('is_admin') is-invalid @enderror" tabindex="3">
                                        <option value="">Choose Role</option>
                                        @if ($user->is_admin)
                                            <option value="0">User</option>
                                            <option value="1" selected>Admin</option>
                                        @else
                                            <option value="0" selected>User</option>
                                            <option value="1">Admin</option>
                                        @endif
                                    </select>

                                    @error('is_admin')
                                        <span class="validate-error" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <input id="password" type="text" class="@error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" tabindex="4">

                                    <small>If you do not want to change the password, leave the field blank.</small>

                                    @error('password')
                                        <span class="validate-error" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn">Update</button>

                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
