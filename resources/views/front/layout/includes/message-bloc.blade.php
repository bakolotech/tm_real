<div class="notification-panel message-content-box d-none" id="message-panel-box">
    <div class="scrollable-div scroll-4">
        <div class="une-conversation">
            <div class="une-conversation-content">
                <div class="message-avatars">
                    <div class="message-avatars-box">
                        <div class="avatar-interlocuteur">
                            <img src="{{ asset('assets/images/main-avatar-tm.svg') }}" alt="">
                        </div>
                        <div class="avatar-user">
                            <img style="border-radius: 50%; width: 100%; height: 100%;" src="{{ \Illuminate\Support\Facades\Auth::user()->getImage() }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="notification-information">
                    <div class="notification-information-message-title">
                        <p class="p-0 m-0">@ObjetDuMessage</p>
                        <div class="puce puce-danger"></div>
                    </div>
                    <div class="notification-information-message-text">
                        <p class="p-0 m-0">Quapropter a natura mihi videtur potius quam ab indigentia orta amicitia, applicatione magis animi.</p>
                    </div>
                    <div class="notification-information-message-time">
                        <p class="p-0 m-0">Il y’a 1 heure</p>
                    </div>
                </div>
                {{ \App\Http\Controllers\HtmlController::conversationCountMessage(true) }}
            </div>
        </div>
    </div>
</div>
