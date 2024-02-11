@extends('layout.base')

@section('content')

<div class="page-container">
    {{-- <section class="main-section">
        <h1 class="text-center text-5xl">Business Timing</h1>
    </section> --}}

    <section class="business-timings">
        <div class="timing-wrapper">
            <div class="timing-container">
                @foreach ($businesses as $business)
                    <div class="shadow-md w-full mb-4">
                        <div class="business-card px-4 py-6">
                            <div class="card-wrapper">
                                <div class="business-brand flex justify-start items-center">
                                    <div class="business-logo">
                                        <img src="{{ asset('storage/business-logo/1707658076.jpg') }}" alt="{{ $business['business']['name'] .' | '. $business['name'] . ' logo' }}" width="100" height="100" class="rounded-full w-11 h-11 object-cover" />
                                    </div>
                                    <h1 class="text-2xl font-semibold ms-3">
                                        {{ $business['business']['name'] .' | '. $business['name'] }}
                                    </h1>
                                </div>
                                <div class="business-content mt-4">
                                    <div class="content-header flex justify-between items-center mb-2">
                                        <h3 class="text-lg font-semibold">Timings</h3>
                                        <div class="status-wrapper">
                                            Status: <span class="status font-semibold">Open</span>
                                        </div>
                                    </div>
                                    <div class="content-body">
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
                                            @php
                                                $timing = isset($business[strtolower($day).'_time']) && !empty($business[strtolower($day).'_time']) && $business[strtolower($day).'_time'] ?
                                                            json_decode($business[strtolower($day).'_time'], true) : 
                                                            null;

                                                $start = $timing && isset($timing['start']) ? $timing['start'] : null;
                                                $end = $timing && isset($timing['end']) ? $timing['end'] : null;
                                                
                                                if (is_array($start) && is_array($end)) {
                                                    $maxInt = max(count($start), count($end));
                                                }
                                            @endphp
                                            <div class="weekday-status flex justify-between items-center">
                                                <div class="title">{{ $day }}</div>

                                                <div class="weekday-timing-container">
                                                    @if ($maxInt && $start && $end)
                                                        @for ($i=0; $i < $maxInt; $i++)
                                                            <div class="day-timing">
                                                                {{ $start[$i] }} - {{ $end[$i] }}
                                                            </div>
                                                        @endfor
                                                    @else
                                                        <div>Closed</div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

@endsection