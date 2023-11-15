
function showLoginRegister() {
    init_modal_sections()
    $.ajax({
        url: '/load_login_register_modal', // The URL to your file
        type: 'GET', // The HTTP method
        beforeSend: function() {
            $('#register-login-spinner').removeClass('modal-loading-spinner')
            $('.btn-inscription-basic').addClass('modal-loading-lock-btn')
        },
        success: function(response) {

        $('#auto-login-register-section').empty()

        $('#auto-login-register-section').html(response.login_template);

        $('#registerLoginModal').modal('show');

        },
        complete: function() {
            $('#register-login-spinner').addClass('modal-loading-spinner')
            $('.btn-inscription-basic').removeClass('modal-loading-lock-btn')
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}

function showMarche() {
    init_modal_sections()
    $.ajax({
        url: '/load_magazin_modal', // The URL to your file
        type: 'GET', // The HTTP method
        beforeSend: function() {
            $('#marche-icon-btn').addClass('modal-loading-spinner')
            $('#marcher-spinner').removeClass('modal-loading-spinner')
            $('#choisir-marcher-mobile').addClass('modal-loading-lock-btn')
        },
        success: function(response) {
        $('#load-choisir-magasin').empty()

        $('#load-choisir-magasin').html(response.magasin_template);

        $('#modalChoisirMagasin').modal('show');
        },
        complete: function() {
            $('#marche-icon-btn').removeClass('modal-loading-spinner')
            $('#marcher-spinner').addClass('modal-loading-spinner')
            $('#choisir-marcher-mobile').removeClass('modal-loading-lock-btn')
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    })

}
function showLangueDevise() {
    init_modal_sections()
    $.ajax({
    url: '/load_langue_devise_modal', // The URL to your file
    type: 'GET', // The HTTP method
    beforeSend: function() {
        $('#pays-loading-btn-icon2').addClass('modal-loading-spinner')
        $('#pays-spinner').removeClass('modal-loading-spinner')
        $('#pays-loading-btn-icon').addClass('modal-loading-lock-btn')
    },
    success: function(response) {
    $('#load-choisir-magasin').empty()

    $('#load-choisir-magasin').html(response.magasin_template);

    $('#modalLangueDevise').modal('show');
        // $('#load-choisir-magasin').html(data)
    },
    complete: function(){
        $('#pays-loading-btn-icon').removeClass('modal-loading-lock-btn')
        $('#pays-loading-btn-icon2').removeClass('modal-loading-spinner')
        $('#pays-spinner').addClass('modal-loading-spinner')
    },
    error: function(xhr, status, error) {
        console.error('Error:', error);
    }
    })
}
function voir_panier_helper() {
    if ($('#nbr_panier').text() == 0) {
        const element = document.getElementById('mon_panier');
        element.classList.toggle('panier_show')
    } else {
    //
    $.ajax({

    type: 'GET',
    url: '/panier/afficher/',
    data: '',
    cache: false,
    success: function(result) {
    console.log('Panier result => ', result)
    let default_order_price = 20000;
    var sous_total = 0;
    var nombre_total = 0;
    $('#article_du_panier0').empty()
    let produit_object = [];
    let tab_expedition = [];
    // for (let i = 0; i < result.length; i++) {
    for (var i = result.length - 1; i >= 0; i--) {

    let tab_expedition2 = result[i][2]

    if (tab_expedition2.length > 0) {
        tab_expedition.push(tab_expedition2[0].prix)
    }
    // calucl de la taille et affectation des nouvelle propriétés
    let img_p = new Image();

    produit_object = '<div class="customu-popup paniersuppp mystyle" id="pop_'+i+'">';
    produit_object += '<div class="container-supp custom-commande-del" id="popup-close-body"><div><p class="popu-del-produit">Supprimer l’article du panier ?</p></div>'

    produit_object += '<div style="display: flex;  column-gap: 14px"><button class="supp-oui" onclick=supprimer_produit("'+i+'")>Oui</button><button class="supp-non" onclick="closePopup('+i+')">Non</button></div></div></div><div class="box-container" id="article_'+result[i].id+'" style="display: flex; flex-direction:column; justify-content:center; align-items:center; row-gap:30px"><div style="display: flex; flex-direction: column"><div class="box-elements"><div class="row" style="margin: 0%; padding: 0%; position: relative; margin-bottom: 10px;">'

    img_p.onload = function() {

        if (img_p.height > img_p.width) {
            // $('.no-padding').addClass('panier-image-long')
        }else {
            // $('.no-padding').addClass('panier-image-large')
        }
    };

    img_p.src = '/'+result[i].image;

    // console.log('La taille est :', $(result[i].image).height())

    if (result[i].id_rayon == 27) {
        produit_object += '<div class="img-layout-1" style="padding-right: 0px"><div class="center-panier-img"><img class="no-padding panier-image-long" src="/'+result[i].image+'" alt="" id="article_image-'+result[i].id+'" ></div></div> <div class="text-layout" id="elemnt-test"><span class="text-level-1" style="margin-bottom: 11.26px;" id="article_nom">'+result[i].libelle+'</span><span class="text-level-2" style="margin-bottom: 7px; " id="article_ref">Ref. '+result[i].ref_produit+'</span><span class="text-level-3" style="font-size: 16px !important;" id="article_prix_unit">'+result[i].prix+" Fcfa"+'</span><input type="hidden" id="article_id" name="" value="'+result[i].id+'"></div>'
    }else if (result[i].id_rayon == 25) {
        produit_object += '<div class="img-layout-1" style="padding-right: 0px"><div class="center-panier-img"><img class="no-padding panier-image-large" src="/'+result[i].image+'" alt="" id="article_image-'+result[i].id+'" ></div></div> <div class="text-layout" id="elemnt-test"><span class="text-level-1" style="margin-bottom: 11.26px;" id="article_nom">'+result[i].libelle+'</span><span class="text-level-2" style="margin-bottom: 7px; " id="article_ref">Ref. '+result[i].ref_produit+'</span><span class="text-level-3" style="font-size: 16px !important;" id="article_prix_unit">'+result[i].prix+" Fcfa"+'</span><input type="hidden" id="article_id" name="" value="'+result[i].id+'"></div>'
    }else {
        produit_object += '<div class="img-layout-1" style="padding-right: 0px"><div class="center-panier-img"><img class="no-padding panier-image-large" src="/'+result[i].image+'" alt="" id="article_image-'+result[i].id+'" ></div></div> <div class="text-layout" id="elemnt-test"><span class="text-level-1" style="margin-bottom: 11.26px;" id="article_nom">'+result[i].libelle+'</span><span class="text-level-2" style="margin-bottom: 7px; " id="article_ref">Ref. '+result[i].ref_produit+'</span><span class="text-level-3" style="font-size: 16px !important;" id="article_prix_unit">'+result[i].prix+" Fcfa"+'</span><input type="hidden" id="article_id" name="" value="'+result[i].id+'"></div>'
    }

    produit_object += '<div class="button-layout"><button onclick="confirmationSuppression('+i+')" class="button-close" style="margin-bottom: 14px;"><img class="corbeil-filter" src="/assets/images/Corbeille-grise-base.svg" alt=""></button><button class="span-button-editf button-close" onclick="modifier_produit('+i+')"><img class="partager-svg" src="/assets/images/tm_edit-off.svg" alt=""/></button></div></div><div class="line-separator"></div><div class="row" style="margin: 0%; padding: 0%; position: relative; margin-bottom: 5px;"><div class="row article-new" style="margin-bottom: 5px;">'

    produit_object += '<div class="col col1" style="display: flex; justify-content: center; align-items: center;"><span id="article_total"> '+result[i]['0']+" article(s)"+'</span></div><span class="separateur-1"></span><div class="col col2" style="display: flex; justify-content: center; align-items: center;"><span id="article_prix_total">'+result[i].prix*result[i]['0']+" Fcfa"+'</span></div></div><div class="row expedition-info" style="display: flex; justify-content: center; align-items: center;"><span>Expédition en 45 min</span></div></div><div class="line-separator1"></div>'

    produit_object += '<div class="rowd product-caracteristique" style="display: flex; justify-content: center; align-items: center;">'

    for (let caracteristique_item in result[i][1] ) {
        produit_object += '<label class="custom-span"><span>'+caracteristique_item+'</span><button class="infos-val-caracteristique" > '+result[i][1][caracteristique_item]+'</button></label>'
    }

    produit_object += '</div></div></div></div>'

    $('#article_du_panier0').append(produit_object)

    sous_total += result[i].prix*result[i]['0']
    nombre_total += parseInt(result[i]['0'])
    $('#sous_total').text(sous_total.toLocaleString()+" Fcfa")
    $('#total_tous').text(sous_total.toLocaleString()+" Fcfa")
    }

    if (tab_expedition.length > 0) {

    let maximum = -Infinity;
    let minimum = Infinity;

    for(let number of tab_expedition) {
        if(number > maximum)
        maximum = number;

        if(number < minimum)
        minimum = number
    }

    if (maximum == null) {
        $('#montant_expedition_panier').text('Gratuit')
    }else {
        $('#montant_expedition_panier').text(maximum+ ' Fcfa')
    }

    $('#panier-orange-info').addClass('new_produit') // retirer l'infos gratuit
    $('#panier-success-info').removeClass('new_produit') // ajout de l'infos livraison payant

    if (sous_total > 20000) {
        maximum  = 0;
    }

    let montant_total = Number(maximum) + Number(sous_total)
    let montant_restant_livraison_gratuite = default_order_price - montant_total;

    $('#total_tous').text(montant_total+" Fcfa") // montant total du panier
    $('#montant_restant_livraison_gratuite').text(montant_restant_livraison_gratuite)

    if (montant_restant_livraison_gratuite == 0 || montant_restant_livraison_gratuite < 0) {
        default_order_price = 0
        $('#panier-orange-info').removeClass('new_produit') // ajouter l'infos gratuit
        $('#panier-success-info').addClass('new_produit') // retrait de l'infos livraison payant
        $('#montant_expedition_panier').text('Gratuit')
    }

    }else{
        $('#montant_expedition_panier').text('Gratuit')
        $('#panier-orange-info').removeClass('new_produit') // ajouter l'infos gratuit
        $('#panier-success-info').addClass('new_produit') // retrait de l'infos livraison payant
        let montant_total = Number(sous_total) + 0;
        $('#total_tous').text(montant_total+" Fcfa") // montant total du panier
    }
    const element = document.getElementById('main-element');
    element.classList.toggle('panier_show')
    $('#nombre_total').text(nombre_total);

    $("#userProfilModal").removeClass("in");
    $(".modal-backdrop").remove();
    $("#userProfilModal").hide();
    $("#userProfilModal").modal('hide')

    $('#recap-produit-main-modal').addClass('main-prod-detail-modal')

    },

    error: function(error) {
        console.log('Erreur de la requette')
    }

    });
    //

    }
}

function loadPanier() {

    init_modal_sections()

    // load_panier_content();

    $.ajax({
    url: '/load_panier_vide_modal', // The URL to your file
    type: 'GET', // The HTTP method
    beforeSend: function() {
        $('#show-panier-spinner').removeClass('modal-loading-spinner')
        $('#show-panier-menu').addClass('modal-loading-spinner')
        $('#voir_panier_bis').addClass('modal-loading-lock-btn')
    },
    success: function(response) {
    $('#load_panier_section').empty()
    $('#recap_panier_template').empty();

    $('#load_panier_section').html(response.panier_vide_template);
    $('#recap_panier_template').html(response.recap_panier_template);

    voir_panier_helper();

    },
    complete: function() {
        $('#show-panier-menu').removeClass('modal-loading-spinner')
        $('#voir_panier_bis').removeClass('modal-loading-lock-btn')
        $('#show-panier-spinner').addClass('modal-loading-spinner')

        // load_panier_content();
    },
    error: function(xhr, status, error) {
        console.error('Error:', error);
    }
    })
}

function load_panier_content() {
    $.ajax({
        url: '/load_panier_template',
        type: 'GET',
        data: {},
        beforeSend: function() {
            $('#passer-ala-caisse-btn').addClass('modal-loading-lock-btn')
            $('#passer-ala-caisse').addClass('modal-loading-spinner')
            $('#passer-caisse-spinner').removeClass('modal-loading-spinner')
        },
        success: function(response) {
        $('#panier_template_section').empty();
        $('#panier_template_section').html(response.panier_template)

        Passer_au_panier()

        // $('#panier_version_v2').removeClass('input-none-panier-v2')
        },
        complete: function() {
            $('#passer-ala-caisse-btn').removeClass('modal-loading-lock-btn')
            $('#passer-ala-caisse').removeClass('modal-loading-spinner')
            $('#passer-caisse-spinner').addClass('modal-loading-spinner')
        }
    })
}

function load__invite_resgister_login() {

    $('#in_stock_input_field_mobile').val('active')
    var check_active = $('#in_stock_input_field_mobile').val()
    console.log('Check active => ', check_active)

    $.ajax({
        url: '/load_invite_register_login',
        type: 'GET',
        data: {},
        success: function(response) {
           $('#register_login_invite_section').empty();
           $('#register_login_invite_section').html(response.invite_register_template);
           ouvre_login()
        }
    })
}

function load_inviter_formulaire() {
    $.ajax({
        url: '/load_inviter_form',
        type: 'GET',
        success: function(response) {
            $('#load_inviter_form_template').empty()
            $('#load_inviter_form_template').html(response.inviter_template);

            showinterformulaire()
        }
    })
}

function load_recap_produit_modal(id) {
    $.ajax({
        url: '/loading_recap_produit_modal',
        type: 'GET',
        success: function(response) {
            console.log('Here is the section seached by you', response.recap_produit_template);
            $('#load_recap_produit_modal').empty();
            $('#load_recap_produit_modal').html(response.recap_produit_template)

            modifier_produit(id)

        }
    })
}

function load_inviter_formulaire() {
    $.ajax({
        url: '/load_inviter_form',
        type: 'GET',
        success: function(response) {
            $('#load_inviter_form_template').empty()
            $('#load_inviter_form_template').html(response.inviter_template);

            showinterformulaire()
        }
    })
}

function load__invite_resgister_login() {
    
    $('#in_stock_input_field_mobile').val('active')
    var check_active = $('#in_stock_input_field_mobile').val()
    console.log('Check active => ', check_active)

    $.ajax({
        url: '/load_invite_register_login',
        type: 'GET',
        data: {},
        success: function(response) {
           $('#register_login_invite_section').empty();
           $('#register_login_invite_section').html(response.invite_register_template);
           ouvre_login()
        }
    })
}

function init_modal_sections() {
    $('#load_panier_section').empty()
    $('#recap_panier_template').empty();
}

// Chargement du modal mot de passe oublié
function loadPassword(source) {

    $.ajax({
    url: '/load_change_pwd',
    type: 'GET',
    data: {},
    success: function(response) {

        console.log('Charge pwd ...', response.forgot_pwd_template)
        $('#load_changed_pwd').empty();
        $('#load_changed_pwd').html(response.forgot_pwd_template);

        forgetPassword(source)
    }
    })
    
}

window.addEventListener("load", function() {
    let storage_invite_data = JSON.parse(window.localStorage.getItem('adresse_invite'));
    if (storage_invite_data != null) {
        window.localStorage.removeItem('adresse_invite')
    }
});


function closeMarcheModal2() {
    $('#modalLangueDevise').modal('hide')
    $('#modalChoisirMagasin').modal('hide')
}