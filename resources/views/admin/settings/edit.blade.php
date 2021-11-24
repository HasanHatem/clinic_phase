@extends('admin.layouts.admin')

@section('title')
    Edit Settings
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

                        <form action="{{ route('admin.settings.update') }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="width-50">
                                    <div class="form-group">
                                        <label for="facebook">Facebook page link</label>
                                        <div class="input-group">
                                            <input type="text" name="facebook" id="facebook" class="@error('facebook') is-invalid @enderror" value="{{ $settings->facebook }}" tabindex="1">

                                            @error('facebook')
                                                <span class="validate-error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="width-50">
                                    <div class="form-group">
                                        <label for="instagram">Instagram Account Link</label>
                                        <div class="input-group">
                                            <input id="instagram" type="text" class="@error('instagram') is-invalid @enderror" name="instagram" value="{{ $settings->instagram }}" tabindex="2">

                                            @error('instagram')
                                                <span class="validate-error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="mobile_number">Mobile Number</label>
                                <div class="input-group">
                                    <input id="mobile_number" type="text" class="@error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ $settings->mobile_number }}" tabindex="3">

                                    @error('mobile_number')
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
                                            <label for="{{ $language->slug }}_name">Site name (<span class="ar-text">{{ $language->name }}</span>)</label>
                                            <div class="input-group">
                                                <input id="{{ $language->slug }}_name" type="text" class="@error($language->slug.'_name') is-invalid @enderror ar-text" name="{{ $language->slug }}_name" value="{{ $settings->translation($language->slug)->first()->name }}" tabindex="3">

                                                @error($language->slug.'_name')
                                                    <span class="validate-error" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="{{ $language->slug }}_description">Description (<span class="ar-text">{{ $language->name }}</span>)</label>
                                            <div class="input-group">
                                                <textarea name="{{ $language->slug }}_description" class="@error($language->slug.'_description') is-invalid @enderror ar-text" id="{{ $language->slug }}_description" cols="30" rows="3">{{ $settings->translation($language->slug)->first()->description }}</textarea>

                                                <small>This Description will appear in Google results, under site name. (between 50–160 characters.)</small>

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

                            <button type="submit" class="btn">Update</button>
                        </form>

                    </div>

                </div>

            </div>

        </div>

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

                        <form action="{{ route('admin.settings.about.update') }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="tabs-content" data-tabs-content>
                                @foreach ($languages as $language)
                                    <div class="tab-pane {{ ($language->slug == 'en') ? 'active' : '' }}" data-tab-pane id="{{ $language->slug }}">

                                        <div class="form-group">
                                            <label for="{{ $language->slug }}_about">About {{ $settings->translation($language->slug)->first()->name }} (<span class="ar-text">{{ $language->name }}</span>)</label>
                                            <div class="input-group">
                                                <textarea name="{{ $language->slug }}_about" class="@error($language->slug.'_about') is-invalid @enderror ar-text" id="{{ $language->slug }}_about" cols="30" rows="5">{{ $about != null ? $about->translation($language->slug)->first()->about : '' }}</textarea>

                                                @error($language->slug.'_about')
                                                    <span class="validate-error" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>

                            <button type="submit" class="btn">Update</button>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('js_files')
    <script src="{{ asset('libs/ckeditor/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.replace('en_about', {
            language: 'en'
        });
        CKEDITOR.replace('ar_about', {
            language: 'ar'
        });
    </script>
@endsection
