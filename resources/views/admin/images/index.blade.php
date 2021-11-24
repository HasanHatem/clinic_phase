@extends('admin.layouts.admin')

@section('title')
    Images Gallery
@endsection

@section('content')

    <div class="row">
        <div class="width-100">
            <a href="{{ route('admin.images.create') }}" class="btn btn--mr-b">
                Add Image
            </a>
        </div>
    </div>

    <div class="row">
        <div class="width-100">

            @if (count($images) <= 0)
                <div class="failed">
                    <p>
                        Gallery is empty.
                    </p>
                </div>
            @else

                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Image Alt</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($images as $image)
                            <tr>
                                <td>
                                    <div class="table-image">
                                        <img src="{{ asset('storage/'.$image->image) }}" class="img">
                                    </div>
                                </td>
                                <td>
                                    {{ $image->image_alt }}
                                </td>
                                <td>
                                    <ul class="table--icons flex">
                                        <li>
                                            <a href="{{ route('admin.images.edit', ['image' => $image]) }}" title="Edit" class="edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.images.delete', ['image' => $image]) }}" title="Delete" class="delete"
                                                onclick="if (confirm('Are you sure?')) {event.preventDefault(); document.getElementById('delete-image-{{ $image->id }}').submit();} else {return false;}"
                                                >
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                                            </a>

                                            <form action="{{ route('admin.images.delete', ['image' => $image]) }}" method="POST" id="delete-image-{{ $image->id }}" style="display: none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </li>
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
