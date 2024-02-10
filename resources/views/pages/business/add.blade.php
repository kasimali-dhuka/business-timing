@extends('layout.base')

@section('content')
    
<section class="add-business">
    <div class="add-container max-w-[900px] mx-auto">
        <div class="add-wrapper">
            <div class="add-title">
                <h1 class="text-2xl my-6 text-center font-bold uppercase">Add new business</h1>
            </div>

            <div class="add-form">
                <div class="form-wrapper">
                    <form id="addBusinessForm" action="{{ route('business.post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="business_name" class="form-label">Business Name</label>
                                    <input 
                                        type="text" 
                                        class="form-control {{ $errors->has('business_name') ? 'is-invalid' : '' }}" 
                                        id="business_name" 
                                        name="business_name" 
                                        placeholder="Business name..." 
                                        value="{{ old('business_name', '') }}" 
                                    />
                                    @if($errors->has('business_name'))
                                        <div class="error-message">{{ $errors->first('business_name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="business_email" class="form-label">Business Email</label>
                                    <input 
                                        type="email" 
                                        class="form-control {{ $errors->has('business_email') ? 'is-invalid' : '' }}" 
                                        id="business_email" 
                                        name="business_email" 
                                        placeholder="Business email..." 
                                        value="{{ old('business_email', '') }}" 
                                    />
                                    @if($errors->has('business_email'))
                                        <div class="error-message">{{ $errors->first('business_email') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="business_phone" class="form-label">Business Phone</label>
                                    <input 
                                        type="tel" 
                                        class="form-control {{ $errors->has('business_phone') ? 'is-invalid' : '' }}" 
                                        id="business_phone" 
                                        name="business_phone" 
                                        placeholder="Business phone..." 
                                        value="{{ old('business_phone', '') }}" 
                                    />
                                    @if($errors->has('business_phone'))
                                        <div class="error-message">{{ $errors->first('business_phone') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="business_logo" class="form-label">Business Logo</label>
                                    <input 
                                        class="form-control" 
                                        type="file" 
                                        name="business_logo" 
                                        id="business_logo" 
                                    />
                                    @if($errors->has('business_logo'))
                                        <div class="error-message">{{ $errors->first('business_logo') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6 col-12 mx-auto mt-3">
                                <button class="btn btn-outline-primary w-full text-center" type="submit">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('extra-scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="{{ asset('js/validation.js') }}"></script>
@endpush