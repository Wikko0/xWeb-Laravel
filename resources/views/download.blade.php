@extends('layout.default')

@section('content')

@include('block.rightblock')

        <main class="content">
            <h1>Download</h1>

            <div class="download-links-block">
                <a data-tab="lite" class="download-link active">Lite Version</a> <a data-tab="full" class="download-link">Full Version</a>
            </div>
            @if(isset($lite))
            <div class="download-block block-p tab active" id="lite">
                <p>Without sounds and musics:</p>

                @foreach($lite as $values)
                <span class="size">{{$values}}MB</span>
                @endforeach
                <div class="flex-c-c">
                    @foreach($litelink as $values)
                        @if($values->site == 'google')
                        <a href="{{$values->link}}" class="button big download-button-link flex-c">
                        <i class="download-icon google"></i>
                        <div><span>Download for</span>
                            Google Drive</div>
                    </a>

                    @else
                        <a href="{{$values->link}}" class="button big download-button-link flex-c">
                            <i class="download-icon mega"></i>
                            <div><span>Download for</span>
                                MEGA</div>
                        </a>
                        @endif
                    @endforeach
                </div>
            </div><!-- block-p -->
            @endif

            @if(isset($full))
            <div class="download-block block-p tab" id="full">
                @foreach($full as $values)
                    <span class="size">{{$values}}MB</span>
                @endforeach
                <div class="flex-c-c">
                    @foreach($fulllink as $values)
                        @if($values->site == 'google')
                            <a href="{{$values->link}}" class="button big download-button-link flex-c">
                                <i class="download-icon google"></i>
                                <div><span>Download for</span>
                                    Google Drive</div>
                            </a>

                        @else
                            <a href="{{$values->link}}" class="button big download-button-link flex-c">
                                <i class="download-icon mega"></i>
                                <div><span>Download for</span>
                                    MEGA</div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div><!-- block-p -->
            @endif
            <div class="block-p system-block">
                <h2>System <b>Requirements</b></h2>
                <div class="content-p">
                    <table class="system">
                        <tbody>
                        <tr>
                            <td></td> <td>Minim</td> <td>Recommended</td>
                        </tr>
                        <tr>
                            <td>Processor</td> <td>2.8 GHz</td> <td>3.5 GHz</td>
                        </tr>
                        <tr>
                            <td>Memory</td> <td>2 GB</td> <td>4 GB</td>
                        </tr>
                        <tr>
                            <td>Operating system</td> <td>Windows 7</td> <td>Windows 10</td>
                        </tr>
                        <tr>
                            <td>Video Card</td> <td>256 MB</td> <td>512 MB</td>
                        </tr>
                        <tr>
                            <td>Connection</td> <td>1 Mbps (ADSL)</td> <td>2 Mbps (ADSL/Fibra)</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- block-p -->
            <div class="block-p update-block">
                <h2>Update <b>Package</b></h2>
                <p>If you have problems with the previous version of the launcher, <br> please extract this patch in the game folder to correct.</p>
               @foreach($update as $values)
                <a href="{{$values->link}}" class="button big flex-c-c update-button">Download all updates</a>
                @endforeach
            </div><!-- block-p -->
        </main><!-- content -->
    </div><!-- container -->
</div><!-- block-links -->

@endsection
