@extends('layout.default')

@section('content')

    @include('block.rightblock')
    @php
        use \App\Http\Controllers\doController;
    @endphp
    <main class="content">
        <h1>News</h1>
            <div class="content-character">
                <div class="content-news">
                    <div class="news-tabs-links">
                        <a data-tab="all-news" class="download-link news-link active">All news</a>
                        <a data-tab="all-events" class="download-link news-link">Events</a>
                        <a data-tab="all-updates" class="download-link news-link">Updates</a>
                    </div>
                    <div class="news-block tab active" id="all-news">

                        @foreach($news as $new)
                            <div class="news-click">
                        <p><span class="date">{{$new->date}}</span><span class="hot">[{{$new->prefix}}]</span> {{$new->subject}}  </p>
                        </div>
                        <div class="textnews">
                            <p>{!! $new-> news !!} </p>
                        </div>

                        @endforeach


                            {!! $news->links('others.pagination') !!}
                    </div>
                    <div class="news-block tab" id="all-events">
                        @foreach($events as $event)
                            <div class="news-click">
                                <p><span class="date">{{$event->date}}</span><span class="hot">[{{$event->prefix}}]</span> {{$event->subject}}  </p>
                            </div>
                            <div class="textnews">
                                <p>{!! $event-> news !!} </p>
                            </div>

                        @endforeach


                        {!! $events->links('others.pagination') !!}
                    </div>
                    <div class="news-block tab" id="all-updates">
                        @foreach($updates as $update)
                            <div class="news-click">
                                <p><span class="date">{{$update->date}}</span><span class="hot">[{{$update->prefix}}]</span> {{$update->subject}}  </p>
                            </div>
                            <div class="textnews">
                                <p>{!! $update-> news !!} </p>
                            </div>

                        @endforeach


                        {!! $updates->links('others.pagination') !!}
                    </div>
                </div><!-- content-news -->
        </div><!-- content-p -->
    </main><!-- content -->
    </div><!-- container -->
    </div><!-- block-links -->
@endsection
