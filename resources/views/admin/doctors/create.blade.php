@extends('admin.layouts.admin')

@section('title')
    New Doctor
@endsection

@section('content')
    <div class="row">
        <div class="width-50">
            <div class="card">

                <div class="form-wrapper">

                    <div class="languages">
                        <div class="title">
                            Languages
                        </div>
                        <ul class="flex">
                            @foreach ($languages as $language)
                                <li>
                                    @if ($language->slug == 'en')
                                        <a href="#{{ $language->slug }}" data-nav-tab class="active">{{ $language->name }}</a>
                                    @elseif ($language->slug == 'ar')
                                        <a href="#{{ $language->slug }}" data-nav-tab class="ar-text">{{ $language->name }}</a>
                                    @else
                                        <a href="#{{ $language->slug }}" data-nav-tab>{{ $language->name }}</a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="form">

                        <form action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="input-group">

                                    <div class="drop-area flex">
                                        <div class="promot flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v14H5V5h14m0-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-4.86 8.86l-3 3.87L9 13.14 6 17h12l-3.86-5.14z"/></svg>
                                            <p>Drop your image here or click to upload</p>
                                        </div>

                                        <input type="file" name="image" id="image" class="@error('image') is-invalid @enderror drop-area--input" value="{{ old('image') }}" tabindex="1">
                                    </div>


                                    @error('image')
                                        <span class="validate-error" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <div class="input-group">
                                    <select name="status" id="status" class="@error('status') is-invalid @enderror" tabindex="2">
                                        <option value="">Choose doctor status</option>
                                        <option value="1" selected>Enable</option>
                                        <option value="0">Not enabled</option>
                                    </select>

                                    @error('status')
                                        <span class="validate-error" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="tabs-content" data-tabs-content>
                                @foreach ($languages as $language)
                                    <div class="tab-pane {{ ($language->slug == 'en') ? 'active' : '' }}" data-tab-pane id="{{ $language->slug }}">

                                        <div class="form-group">
                                            <label for="{{ $language->slug }}_name">Name (<span class="ar-text">{{ $language->name }}</span>)</label>
                                            <div class="input-group">
                                                <input id="{{ $language->slug }}_name" data-name type="text" class="@error($language->slug.'_name') is-invalid @enderror ar-text" name="{{ $language->slug }}_name" value="{{ old($language->slug.'_name') }}" tabindex="3">

                                                @error($language->slug.'_name')
                                                    <span class="validate-error" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="{{ $language->slug }}_slug">Slug (<span class="ar-text">{{ $language->name }}</span>)</label>
                                            <div class="input-group">
                                                <input id="{{ $language->slug }}_slug" type="text" class="@error($language->slug.'_slug') is-invalid @enderror ar-text" name="{{ $language->slug }}_slug" value="{{ old($language->slug.'_slug') }}" tabindex="3">

                                                <small>The link that will be displayed.</small>

                                                @error($language->slug.'_slug')
                                                    <span class="validate-error" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="{{ $language->slug }}_description">Description (<span class="ar-text">{{ $language->name }}</span>)</label>
                                            <div class="input-group">
                                                <textarea name="{{ $language->slug }}_description" class="@error($language->slug.'_description') is-invalid @enderror ar-text" id="{{ $language->slug }}_description" cols="30" rows="5" tabindex="4">{{ old($language->slug.'_description') }}</textarea>

                                                @error($language->slug.'_description')
                                                    <span class="validate-error" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>

                            <button type="submit" class='btn'>Add</button>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
