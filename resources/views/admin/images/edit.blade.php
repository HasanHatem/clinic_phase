@extends('admin.layouts.admin')

@section('title')
    Edit Image
@endsection

@section('content')
    <div class="row">
        <div class="width-50">

            <div class="card">

                <div class="form-wrapper">

                    <div class="form">

                        <form action="{{ route('admin.images.update', ['image' => $image]) }}" method="POST" enctype="multipart/form-data" id="upload-image">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="input-group">

                                    <div class="drop-area flex">
                                        {{-- <div class="promot flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v14H5V5h14m0-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-4.86 8.86l-3 3.87L9 13.14 6 17h12l-3.86-5.14z"/></svg>
                                            <p>Drop your image here or click to upload</p>
                                        </div> --}}

                                        <div class="drop-area--thumb" style="background-image: url({{ asset('storage/'.$image->image) }})"></div>

                                        <input type="file" name="image" id="image" class="@error('image') is-invalid @enderror drop-area--input" value="{{ old('image') }}" tabindex="2">
                                    </div>

                                    <small>If you do not want to change the image, leave the field blank.</small>

                                    @error('image')
                                        <span class="validate-error" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image_alt">Image alt</label>
                                <div class="input-group">
                                    <input type="text" name="image_alt" id="image_alt" class="@error('image_alt') is-invalid @enderror" value="{{ $image->image_alt }}" tabindex="2">

                                    <small>Descripe Image Content</small>

                                    @error('image_alt')
                                        <span class="validate-error" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn">update</button>

                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
