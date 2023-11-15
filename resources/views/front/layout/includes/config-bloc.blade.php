<?php $configNotification = $_SESSION['config']['user-logged']['notification_config']; ?>
<div class="notification-panel config-content-box d-none" id="config-panel-box">
    <p class="config-text-1">Mes types de notification :</p>

    <form
        action="{{ route('notification-config.update', $configNotification['id']) }}"
        method="post"
        id="formEditConfigUser_myform"
        data-tpost="async"
    >
        @csrf
        @method('put')
        <div class="config-switch-inputs">
            <div class="notif-email switch-input">
                <div class="p-0 m-0">
                    <label class="switch-label">Notifications par email</label>
                </div>
                <div class="switch-config">
                    <div class="mon-switch switch-{{ $configNotification['email_notification'] }}" data-for="#formEditConfigUser_email_notification-input" data-is-active="{{ $configNotification['email_notification'] }}">
                        <div class="toggle-switch"></div>
                    </div>
                    <input type="hidden" data-old="{{ $configNotification['email_notification'] }}" name="formEditConfigUser_email_notification" value="{{ $configNotification['email_notification'] }}" id="formEditConfigUser_email_notification-input">
                </div>
            </div>
            <div class="notif-bureau switch-input">
                <div class="p-0 m-0">
                    <label class="switch-label">Notifications de bureau</label>
                </div>
                <div class="switch-config">
                    <div class="mon-switch switch-{{ $configNotification['bureau_notification'] }}" data-for="#formEditConfigUser_notification_bureau-input" data-is-active="{{ $configNotification['bureau_notification'] }}">
                        <div class="toggle-switch"></div>
                    </div>
                    <input type="hidden" data-old="{{ $configNotification['bureau_notification'] }}" name="formEditConfigUser_notification_bureau" value="{{ $configNotification['bureau_notification'] }}" id="formEditConfigUser_notification_bureau-input">
                </div>
            </div>
        </div>

        <div class="config-text-2">
            Recevoir des notifications sur cet ordinateur même lorsque <span style="font-weight: 500; color:#D0021B">TOUL&#200;</span> <span style="font-weight: 500; color:#191970">Market</span> est fermé. Pour recevoir les notifications, il te sera peut-être demandé d’activer les notifications push dans ton navigateur.
        </div>

        <div class="mavertir">
            <p class="mavertir-title p-0 m-0">M’avertir quand :</p>
            <div class="mavertir-main-block">
                <div class="mavertir-block-1">
                    <div class="options">
                        <div class="checkbox">
                            <div class="form-check">
                                <input type="hidden" data-old="{{ $configNotification['achat_notification'] }}" name="formEditConfigUser_success_achat" id="formEditConfigUser_success_achat-input" value="{{ $configNotification['achat_notification'] }}">
                                <div class="un-checkbox checked-{{ $configNotification['achat_notification'] }}" data-for="#formEditConfigUser_success_achat-input" data-is-active="{{ $configNotification['achat_notification'] }}">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mavertir-text"><p>Un achat réussi</p></div>
                    </div>
                    <div class="options">
                        <div class="checkbox">
                            <div class="form-check">
                                <input type="hidden" data-old="{{ $configNotification['livraison_notification'] }}" name="formEditConfigUser_livraison_encours" id="formEditConfigUser_livraison_encours-input" value="{{ $configNotification['livraison_notification'] }}">

                                <div class="un-checkbox checked-{{ $configNotification['livraison_notification'] }}" data-for="#formEditConfigUser_livraison_encours-input" data-is-active="{{ $configNotification['livraison_notification'] }}">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mavertir-text"><p>Une livraison en cours</p></div>
                    </div>
                    <div class="options">
                        <div class="checkbox">
                            <div class="form-check">
                                <input type="hidden" data-old="{{ $configNotification['message_notification'] }}" name="formEditConfigUser_message_prive" id="formEditConfigUser_message_prive-input" value="{{ $configNotification['message_notification'] }}">
                                <div class="un-checkbox checked-{{ $configNotification['message_notification'] }}" data-for="#formEditConfigUser_message_prive-input" data-is-active="{{ $configNotification['message_notification'] }}">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mavertir-text"><p>Un message privé</p></div>
                    </div>
                </div>
                <div class="mavertir-block-2">
                    <div class="options">
                        <div class="checkbox">
                            <div class="form-check">
                                <input type="hidden" data-old="{{ $configNotification['promotion_notification'] }}" name="formEditConfigUser_nouvelle_promo" id="formEditConfigUser_nouvelle_promo-input" value="{{ $configNotification['promotion_notification'] }}">
                                <div class="un-checkbox checked-{{ $configNotification['promotion_notification'] }}" data-for="#formEditConfigUser_nouvelle_promo-input" data-is-active="{{ $configNotification['promotion_notification'] }}">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mavertir-text"><p>Une promotion</p></div>
                    </div>
                    <div class="options">
                        <div class="checkbox">
                            <div class="form-check">
                                <input type="hidden" data-old="{{ $configNotification['panier_plein_notification'] }}" name="formEditConfigUser_panier_plein" id="formEditConfigUser_panier_plein-input" value="{{ $configNotification['panier_plein_notification'] }}">
                                <div class="un-checkbox checked-{{ $configNotification['panier_plein_notification'] }}" data-for="#formEditConfigUser_panier_plein-input" data-is-active="{{ $configNotification['panier_plein_notification'] }}">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mavertir-text"><p>Rappel panier plein</p></div>
                    </div>
                    <div class="options">
                        <div class="checkbox">
                            <div class="form-check">
                                <input type="hidden" data-old="{{ $configNotification['newslatter_notification'] }}" name="formEditConfigUser_newslatter" id="formEditConfigUser_newslatter-input" value="{{ $configNotification['newslatter_notification'] }}">
                                <div class="un-checkbox checked-{{ $configNotification['newslatter_notification'] }}" data-for="#formEditConfigUser_newslatter-input" data-is-active="{{ $configNotification['newslatter_notification'] }}">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mavertir-text"><p>Newslatter</p></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="explication-text">
            Vous ne recevrez aucune nouvelles notifications des types que vous avez désactivés.
        </div>

        <div class="config-box-btn-div">
            <button class="config-box-btn btn-disabled mon-btn" id="formEditConfigUser_unique_button">
                <div id="formEditConfigUser_btn-text">
                    Enregistrer
                </div>
                <div class="loader-white d-none" id="formEditConfigUser_btn-loader">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                </div>
            </button>
        </div>

    </form>

</div>
