@extends('admin.layouts.admin')

@section('title')
    New Category
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

                        <form action="{{ route('admin.categories.store') }}" method="POST">
                            @csrf

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
