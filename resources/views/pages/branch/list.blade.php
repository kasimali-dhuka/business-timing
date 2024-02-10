@extends('layout.base')

@section('content')

<section class="branch-list">
    <div class="list-container">
        <div class="list-wrapper">
            @foreach ($branches as $branch)
                <div class="branch-container">
                    <h1>{{ $branch->name }}</h1>
                    <div class="content">
                        <h3>Timings</h3>
                        <div>
                            <div class="day">Sunday</div>
                            <div class="timing">
                                {{ isset($branch->sunday) && !empty($branch->sunday) ? $branch->sunday : 'Closed' }}
                            </div>
                        </div>
                        <div>
                            <div class="day">Monday</div>
                            <div class="timing">
                                {{ isset($branch->monday) && !empty($branch->monday) ? $branch->monday : 'Closed' }}
                            </div>
                        </div>
                        <div>
                            <div class="day">Tuesday</div>
                            <div class="timing">
                                {{ isset($branch->tuesday) && !empty($branch->tuesday) ? $branch->tuesday : 'Closed' }}
                            </div>
                        </div>
                        <div>
                            <div class="day">Wednesday</div>
                            <div class="timing">
                                {{ isset($branch->wednesday) && !empty($branch->wednesday) ? $branch->wednesday : 'Closed' }}
                            </div>
                        </div>
                        <div>
                            <div class="day">Thursday</div>
                            <div class="timing">
                                {{ isset($branch->thursday) && !empty($branch->thursday) ? $branch->thursday : 'Closed' }}
                            </div>
                        </div>
                        <div>
                            <div class="day">Friday</div>
                            <div class="timing">
                                {{ isset($branch->friday) && !empty($branch->friday) ? $branch->friday : 'Closed' }}
                            </div>
                        </div>
                        <div>
                            <div class="day">Saturday</div>
                            <div class="timing">
                                {{ isset($branch->saturday) && !empty($branch->saturday) ? $branch->saturday : 'Closed' }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection