
    <!-- MODALS -->
    <div id="modal3" class="modal_div modal-links modal-ev">
        <span class="modal_close"></span>
        <div class="modal-block">
            <div class="modal-links-title event">
                <b>Events</b> <br>
                CountDown
            </div>
            <button>Active notification</button>


            <div id="events" class="list"></div>
            <script type="text/javascript">
                $(document).ready(function () {
                    App.getEventTimes();
                });
            </script>

        </div><!-- modal-block -->
    </div><!-- modal_div -->

    <div id="modal4" class="modal_div modal-links modal-ev">
        <span class="modal_close"></span>
        <div class="modal-block">
            <div class="modal-links-title boss">
                <b>Bosses</b> <br>
                CountDown
            </div>
            <button>Active notification</button>

            <div id="boses" class="list"></div>
            <script type="text/javascript">
                $(document).ready(function () {
                    Apps.getEventTimes();
                });
            </script>

        </div><!-- modal-block -->
    </div><!-- modal_div -->
    <div id="modal5" class="modal_div modal">
        <span class="modal_close"></span>
        @if(session('errors'))
            <div class="notification error">
                <div>
                    <li>{{session('errors')}}</li>
                </div>
            </div>
        @endif
        <h1>Login</h1>
        <form method="post" action="/login">
            @csrf
            <p><input type="text" name="login" placeholder="Login"></p>
            <p><input type="password" name="password" placeholder="Password"></p>
            <p><button class="download-link">Login</button></p>
        </form>
    </div><!-- modal_div -->
    <div id="overlay"></div>
