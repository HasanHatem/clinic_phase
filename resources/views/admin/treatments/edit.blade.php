@extends('admin.layouts.admin')

@section('title')
    Edit {{ $treatment->translation->name }}
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

                        <form action="{{ route('admin.treatments.update', ['treatment' => $treatment]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="input-group">

                                    <div class="drop-area flex">
                                        <div class="drop-area--thumb" style="background-image: url({{ asset('storage/'.$treatment->image) }})"></div>

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
                                <label for="category_id">Category</label>
                                <div class="input-group">
                                    <select name="category_id" id="category_id" class="@error('category_id') is-invalid @enderror" tabindex="2">
                                        <option value="">Choose category</option>
                                        @foreach ($categories as $category)
                                            @if ($treatment->category_id === $category->id)
                                                <option value="{{ $category->id }}" selected>{{ $category->translation->name }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->translation->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('category_id')
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
                                                <input id="{{ $language->slug }}_name" data-name type="text" class="@error($language->slug.'_name') is-invalid @enderror ar-text" name="{{ $language->slug }}_name" value="{{ $treatment->translation($language->slug)->first()->name }}" tabindex="3">

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
                                                <input id="{{ $language->slug }}_slug" type="text" class="@error($language->slug.'_slug') is-invalid @enderror ar-text" name="{{ $language->slug }}_slug" value="{{ $treatment->translation($language->slug)->first()->slug }}" tabindex="3">

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
                                                <textarea name="{{ $language->slug }}_description" class="@error($language->slug.'_description') is-invalid @enderror ar-text" id="{{ $language->slug }}_description" cols="30" rows="5" tabindex="4">{{ $treatment->translation($language->slug)->first()->description }}</textarea>

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

                            <button type="submit" class='btn'>Update</button>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
