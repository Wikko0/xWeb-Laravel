<div class="block-links">
    <div class="container flex-c-c flex-reverse">
        <div class="links">

            @if(session('User'))
                <a href="/account-panel" class="download-button flex-c-c bright">Account Panel</a>
                <a href="/vote-reward" class="reg-button flex-c-c bright">Vote Reward</a>


                <div class="countdown flex">
                    <a href="#modal6" class="open_modal credits-button">Buy <br> Credits</a>
                    <a href="#modal7" class="open_modal vip-button">Buy <br> VIP</a>
                </div>
            @else
                <a href="/download" class="download-button flex-c-c bright">Download</a>
                <a href="/register" class="reg-button flex-c-c bright">Register</a>
            @endif
            <div class="countdown flex">
                <a href="#modal3" class="open_modal events-button">Events <br> CountDown</a>
                <a href="#modal4" class="open_modal bosses-button">Bosses <br> CountDown</a>
            </div>
        </div>
