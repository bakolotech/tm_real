
<div class="messagerie-box none-messaboxcxe"  id="messagerieClientBox" style="height: 580px;
    width: 325px;
    border-radius: 6px;
    background-color: #FFFFFF;
    box-shadow: 0 5px 15px 0 rgba(0,0,0,0.5);
    position: absolute;
    margin-top: 0px;
    margin-left: 0px !important;">
     <button type="button" class="close-btn" style="z-index: 15000; position:absolute; right: -16px; top: -18px" onclick="closeMessagerieBox()">
        <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
    </button>

    <div class="negociation-users-headers" style="  height: 64px; width: 325px;
        border-radius: 6px 6px 0 0; background-color: #191970; display: flex">
    <div class="negociation-user-avatar">
        {{-- @if (\Illuminate\Support\Facades\Auth::check())
            <img style="width: 100%; height: 100%; border-radius: 50%" src="/uploads/avatars/{{\Illuminate\Support\Facades\Auth::user()->image}}" alt="" />
            @else
            <img src="uploads/user.png" alt="" />
        @endif --}}
    </div>
    <div class="text-negociation-avatar">
        Notre délai de réponse habituel
        Moins de 1 heure
    </div>

    </div>
    <div class="messagerie-container" id="userNegociationZoneElement" style="height: 461px; overflow-y:scroll; padding-bottom: 10px">
        {{-- message zone  --}}
    </div>
    <div class="message-input-section" style="display: flex; margin-left: 10px;
            position: relative; ">
    <div class="message-inout-section">
        <input style="height: 42px;
        width: 205px;
        border-radius: 6px;
        background-color: #F8F8F8;
        padding-left: 12px; border: none" autocomplete="off" type="text" id="user_message_input" placeholder="Saisissez un message">
    </div>
    <input type="hidden" name="negociation_id_product" id="negociation_id_product" />
    {{-- option d'envoi de message  --}}
    <div class="button-inout-section" style="height: 42px;
    width: 100px;">
        <div class="button-section" style="position: relative; left: -6px">
            <button type="submit" id="sendmessage_buttonD" style="margin-top: 9px;
            margin-left: 10px; border: none" onclick="sendMessage()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                    <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"></path>
                    </svg>
            </button>

            <button onclick="testSendMessage()" type="submit" style="margin-top: 9px;
            margin-left: 10px; border:none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                    <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"></path>
                    </svg>
            </button>

            <button type="submit" style="margin-top: 9px;
            margin-left: 10px; border: none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-heart-eyes-fill" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zM4.756 4.566c.763-1.424 4.02-.12.952 3.434-4.496-1.596-2.35-4.298-.952-3.434zm6.559 5.448a.5.5 0 0 1 .548.736A4.498 4.498 0 0 1 7.965 13a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .548-.736h.005l.017.005.067.015.252.055c.215.046.515.108.857.169.693.124 1.522.242 2.152.242.63 0 1.46-.118 2.152-.242a26.58 26.58 0 0 0 1.109-.224l.067-.015.017-.004.005-.002zm-.07-5.448c1.397-.864 3.543 1.838-.953 3.434-3.067-3.554.19-4.858.952-3.434z"></path>
                    </svg>
            </button>
        </div>
    </div>
    </div>

    <div class="negociation-message-success none-messaboxe" >
        Message envoyé
    </div>
    </div>