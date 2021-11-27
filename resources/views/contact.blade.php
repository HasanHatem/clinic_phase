@extends('layouts.app')

@section('content')
    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="width-50 flex flex--jc-c">
                    <div class="info flex flex--jc-c">
                        <ul class="contact-info">
                            <li>
                                <a href="tel:{{ $settings->mobile_number }}" class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 1h-8C6.12 1 5 2.12 5 3.5v17C5 21.88 6.12 23 7.5 23h8c1.38 0 2.5-1.12 2.5-2.5v-17C18 2.12 16.88 1 15.5 1zm-4 21c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm4.5-4H7V4h9v14z"/></svg>
                                    <span>{{ $settings->mobile_number }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:info@clinicphase.com" class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5-8-5h16zm0 12H4V8l8 5 8-5v10z"/></svg>
                                    <span>info@clinicphase.com</span>
                                </a>
                            </li>
                        </ul>

                        @if ($settings->facebook !== null || $settings->instagram !== null)
                            <div class="social-holder">
                                <ul class="social-links flex flex--jc-c">
                                    @if ($settings->facebook !== null)
                                        <li>
                                            <a href="{{ $settings->facebook }}" class="facebook flex flex--jc-c">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                                            </a>
                                        </li>
                                    @endif

                                    @if ($settings->instagram !== null)
                                        <li>
                                            <a href="{{ $settings->instagram }}" class="instagram flex flex--jc-c">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="width-50">
                    <div class="contact-form">
                        <div class="title">
                            <h2>Contact Us</h2>
                        </div>
                        {{-- <div class="headline">
                            <p>{{ __('contact.headline') }}</p>
                        </div> --}}
                        <div class="form">
                            <form action="#">
                                <div class="row">
                                    <div class="width-50">
                                        <div class="form-group">
                                            <label for="name">{{ __('contact.name') }}</label>
                                            <div class="input-group">
                                                <input type="text" name="name" id="name" tabindex="1" autocomplete="name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="width-50">
                                        <div class="form-group">
                                            <label for="email">{{ __('contact.email') }}</label>
                                            <div class="input-group">
                                                <input type="text" name="email" id="email" tabindex="2" autocomplete="email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="width-50">
                                        <div class="form-group">
                                            <label for="mobile_number">{{ __('contact.mobile_number') }}</label>
                                            <div class="input-group">
                                                <input type="text" name="mobile_number" id="mobile_number" tabindex="3" autocomplete="mobile_number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="width-50">
                                        <div class="form-group">
                                            <label for="subject">{{ __('contact.subject') }}</label>
                                            <div class="input-group">
                                                <input type="text" name="subject" id="subject" tabindex="4" autocomplete="subject">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="width-100">
                                        <div class="form-group">
                                            <label for="message">{{ __('contact.message') }}</label>
                                            <div class="input-group">
                                                <textarea name="message" id="message" cols="30" rows="4" tabindex="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-small flex flex--jc-sb">
                                    <span>{{ __('contact.send') }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4.01 6.03l7.51 3.22-7.52-1 .01-2.22m7.5 8.72L4 17.97v-2.22l7.51-1M2.01 3L2 10l15 2-15 2 .01 7L23 12 2.01 3z"/></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
