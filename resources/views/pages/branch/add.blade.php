@extends('layout.base')

@section('content')
    
<section class="add-business">
    <div class="add-container max-w-[900px] mx-auto">
        <div class="add-wrapper">
            <div class="add-title">
                <h1 class="text-2xl my-6 text-center font-bold uppercase">Add Branches to Business</h1>
            </div>

            <div class="add-form">
                <div class="form-wrapper">
                    @if (session('success'))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                            <div>
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                    <form id="addBranchForm" action="{{ route('branch.post', ['business_id' => $business->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="business_name" class="form-label">Business Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="business_name"
                                        name="business_name"
                                        placeholder="Business name..."
                                        disabled
                                        value="{{ $business->name }}" 
                                    />
                                    <input type="hidden" class="form-control" id="business_id" name="business_id" value="{{ $business->id }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="branch_name" class="form-label">Branch Name</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="branch_name" 
                                        name="branch_name" 
                                        placeholder="Branch name..." 
                                        value="{{ old('branch_name', '') }}"
                                    />
                                    @if($errors->has('branch_name'))
                                        <div class="error-message">{{ $errors->first('branch_name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="branch_images" class="form-label">Business Logo</label>
                                    <input 
                                        class="form-control" 
                                        type="file" 
                                        name="branch_images[]" 
                                        id="branch_images" 
                                        multiple
                                    />
                                    @if($errors->has('branch_images'))
                                        <div class="error-message">{{ $errors->first('branch_images') }}</div>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <h3 class="text-lg">Timing</h3>
                                <div class="timings-container">
                                    @php
                                        $weekdays = [
                                            'Sunday',
                                            'Monday',
                                            'Tuesday',
                                            'Wednesday',
                                            'Thursday',
                                            'Friday',
                                            'Saturday'
                                        ]
                                    @endphp

                                    @foreach ($weekdays as $day)
                                        <div class="timing-input-container flex justify-between items-center pb-4 mb-4 border-b-[1px]">
                                            <div class="indicator col-1">
                                                <div class="flex justify-center items-center">
                                                    {{-- <div class="w-3 h-3 bg-red-600 rounded-full"></div> --}}
                                                    <div class="form-check">
                                                        <input class="form-check-input dayCheckbox" type="checkbox" value="" checked />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timing-title col-3 text-start">{{ $day }}</div>
                                            <div class="col-7">
                                                <div class="timing-inputs">
                                                    <div class="inputs-container flex justify-start items-center mb-2" id="{{ strtolower($day).'_timing_0' }}" data-week="{{ strtolower($day) }}" data-sr="0">
                                                        <div class="inputs-wrapper relative flex justify-start items-center">
                                                            <input 
                                                                class="form-control"
                                                                type="time" 
                                                                name="{{ strtolower($day).'_start_time[]' }}" 
                                                                id="{{ strtolower($day).'_start_time' }}"
                                                                value="10:00"
                                                            />
                                                            <div class="mx-2 inline-block">-</div>
                                                            <input 
                                                                class="form-control"
                                                                type="time" 
                                                                name="{{ strtolower($day).'_end_time[]' }}" 
                                                                id="{{ strtolower($day).'_end_time' }}"
                                                                value="14:00"
                                                            />
                                                        </div>
                                                        <div class="inputs-action ms-4">
                                                            <button class="delete-timezone-btn btn btn-sm">
                                                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M14 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M4 7H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="unavailable-text d-none text-gray-500">
                                                    Unavailable
                                                </div>
                                            </div>
                                            <div class="timing-action col-1">
                                                <div class="flex justify-center items-center">
                                                    <button id="{{ strtolower($day).'-timezone' }}" class="addTimeZoneBtn btn btn-sm" data-inputsr="0">
                                                        <svg
                                                            width="32px"
                                                            height="32px"
                                                            viewBox="0 0 32 32" 
                                                            version="1.1" 
                                                            xmlns="http://www.w3.org/2000/svg" 
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                            xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"
                                                        >
                
                                                            <title>plus-square</title>
                                                            <desc>Created with Sketch Beta.</desc>
                                                            <defs>
                                                        
                                                            </defs>
                                                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                                                <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-100.000000, -1035.000000)" fill="#000000">
                                                                    <path d="M130,1063 C130,1064.1 129.104,1065 128,1065 L104,1065 C102.896,1065 102,1064.1 102,1063 L102,1039 C102,1037.9 102.896,1037 104,1037 L128,1037 C129.104,1037 130,1037.9 130,1039 L130,1063 L130,1063 Z M128,1035 L104,1035 C101.791,1035 100,1036.79 100,1039 L100,1063 C100,1065.21 101.791,1067 104,1067 L128,1067 C130.209,1067 132,1065.21 132,1063 L132,1039 C132,1036.79 130.209,1035 128,1035 L128,1035 Z M122,1050 L117,1050 L117,1045 C117,1044.45 116.552,1044 116,1044 C115.448,1044 115,1044.45 115,1045 L115,1050 L110,1050 C109.448,1050 109,1050.45 109,1051 C109,1051.55 109.448,1052 110,1052 L115,1052 L115,1057 C115,1057.55 115.448,1058 116,1058 C116.552,1058 117,1057.55 117,1057 L117,1052 L122,1052 C122.552,1052 123,1051.55 123,1051 C123,1050.45 122.552,1050 122,1050 L122,1050 Z" id="plus-square" sketch:type="MSShapeGroup"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
    <script src="{{ asset('js/main.js') }}"></script>
@endpush