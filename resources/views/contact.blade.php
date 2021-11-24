@extends('layouts.app')

@section('content')
    <section class="contact-page">
        <div class="container">
            <div class="row">
                <div class="width-50">
                    <div class="info">

                    </div>
                </div>
                <div class="width-50">
                    <div class="contact-form">
                        <div class="headline">
                            <p>{{ __('contact.headline') }}</p>
                        </div>
                        <div class="form">
                            <form action="#">
                                <div class="row">
                                    <div class="width-50">
                                        <div class="form-group">
                                            <label for="#">{{ __('contact.name') }}</label>
                                            <div class="input-group">
                                                <input type="text" name="" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="width-50">
                                        <div class="form-group">
                                            <label for="#">{{ __('contact.email') }}</label>
                                            <div class="input-group">
                                                <input type="text" name="" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="width-50">
                                        <div class="form-group">
                                            <label for="#">{{ __('contact.mobile_number') }}</label>
                                            <div class="input-group">
                                                <input type="text" name="" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="width-50">
                                        <div class="form-group">
                                            <label for="#">{{ __('contact.subject') }}</label>
                                            <div class="input-group">
                                                <input type="text" name="" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="width-100">
                                        <div class="form-group">
                                            <label for="#">{{ __('contact.message') }}</label>
                                            <div class="input-group">
                                                <textarea name="" id="" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-small">{{ __('contact.send') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
