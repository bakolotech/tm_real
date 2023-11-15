<div class="box-2 box-notification arrow-top-2 is-hidden" id="notification-box" tabindex="0">

    <div class="notification-header">
        <div class="buttons">
            <button class="panel-notification-btn active" data-panel="#notification-panel-box">
                <div class="notification-text"><p>Notifications</p></div>
                <div class="notification-alert">
                    <div></div>
                </div>
            </button>
            <button class="panel-notification-btn" style="width: 117px" data-panel="#message-panel-box">
                <div class="notification-text"><p>Message</p></div>
                <div class="notification-alert">
                    <div></div>
                </div>
            </button>
        </div>
        <div class="parametres">
            <button class=" p-0">
                <div class="notification-parametre-icons"><img src="{{ asset('assets/images/checked-notification-icon.svg') }}" alt=""></div>
            </button>
            <button class="panel-notification-btn p-0" data-panel="#config-panel-box">
                <div class="notification-parametre-icons">
                    <img style="width: 17px; height: 18px;" class="active-img-1" src="{{ asset('assets/images/notification-setting-mute-icon.svg') }}" alt="">
                </div>
            </button>
        </div>
    </div>

    <div class="notification-main-box-content">
        @include('front.layout.includes.notification-bloc')
        @include('front.layout.includes.message-bloc')
        @include('front.layout.includes.config-bloc')
    </div>

</div>
