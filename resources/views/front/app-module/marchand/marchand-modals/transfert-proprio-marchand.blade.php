

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        .modal-content-transfert-pro,
        .modal-body-transfert-pro {
            width: 452px !important;
            height: 398px !important;
            background-color: white;
        }
        
      
        
        .modal-body {
            margin: 0px;
            padding: 0px;
        }
        
        .modal-dialog-transfert-pro {
            position: relative;
            height: 579px;
            left: 10px;
            top: 60px;
        }
        
        .form-control {
            font-size: 14px;
            color: #9B9B9B;
        }
        
        .form-select {
            font-size: 15px;
            color: black;
        }
        
        #col:hover {
            box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.5);
        }
        
        #inlineCheckbox1:checked {
            color: #F8F8F8;
            background-color: red;
        }
    </style>



        <!-- The Modal -->
        <div class="modal " id="transfertPro" style="margin-top: 60px;">
            <div class="modal-dialog modal-dialog-transfert-pro">
                <div class="modal-content modal-content-transfert-pro">
                    <div class="container" style="height: 63px;  border-bottom: 1px solid #D8D8D8;">
                        <div class="row">
                            <h3 style="color:#191970; font-size: 21px; text-align: center;font-weight: 500;
                            letter-spacing: 0;
                            line-height: 24px;padding-top: 20px;">Transférer la propriété
                            </h3>
                        </div>

                    </div>


                    <div class="container">
                        <div class="row">
                            <p style="  color: #191970;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 300;
                                letter-spacing: -0.34px;
                                line-height: 16px;
                                text-align: center;
                                padding-right: 50px;padding-left: 50px;margin-top:15px">Le transfert de propriété fonctionne à sens unique.</p>
                            <p style="  color: #191970;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 300;
                                letter-spacing: -0.34px;
                                line-height: 16px;
                                text-align: center;padding-right: 70px;padding-left: 70px;margin-top: -6px;">Le transfert est immédiat et irréversible.</p>
                            <p style="  color: #191970;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 300;
                                letter-spacing: -0.34px;
                                line-height: 16px;
                                text-align: center;padding-right: 15px;padding-left: 15px;margin-top: -6px;" a href=# onclick="getcollab()"">Le nouveau propriétaire principal aura l'autorité suprême sur l'espace<br> de vente @NomDuStore, y compris l'attribution à d'autres membres<br> des rôles de propriétaire.</p>
                        </div>
                    </div>
                    <div class="container" style="margin-top: 5px; margin-left: 12px;">
                        {{-- <select name="list_pour_changer" id="select-list-proprio" class="form-control" placeholder="Nouveau propriétaire principal de l’espace de travail" 
                            style="height: 41px;width: 402px;border: 1px solid #9B9B9B;
                            border-radius: 6px;background-color: #F8F8F8;">
                            <option id="optionPro" value="QUI?" style="height: 20px;width:400px;"> What</option>
                        </select> --}}
                        <select   id="exampleDataList"  style="height: 41px;
                        width: 402px;
                        border: 1px solid #9B9B9B;
                        border-radius: 6px;
                        background-color: #F8F8F8;color:#9B9B9B;
                        font-family: Roboto;
                        font-size: 15px;
                        letter-spacing: -0.36px;
                        line-height: 16px;padding:12px;" >
                        <option value=""  disabled selected hidden>Nouveau propriétaire principal de l’espace de travail</option>
                        
                       
                        </select>
                        <div class="d-flex justify-content-between my-form-field password-field p-0" style="height: 41px;width: 402px;margin-top: 15px; border-top: 1px solid #9B9B9B;border-bottom: 1px solid #9B9B9B;"id="formLogin_password-input">
                            <input name="formLogin_password" type="password" style="height: 39px;width: 402px;border-left: 1px solid #9B9B9B;border-right:transparent;border-radius: 6px;
                            background-color: #F8F8F8; padding:10px;  color: #9B9B9B;
                            font-family: Roboto;
                            font-size: 15px;
                            letter-spacing: -0.36px;
                            line-height: 15px;
                            " class="my-form-field-mute" id="formLogin_password-field" placeholder="Votre mot de passe" name="mdp_changement" value="mdpcr">
                            <div class="image-password" data-icon="0" onclick="togglePasswordEye(this)" data-password-id="#formLogin_password-field">
                                <img src='{{ asset('assets/images2/Fermes2.svg') }}' alt=''>
                            </div>
                        </div>
                        {{-- <input class="form-control" type="text" placeholder="Mot de passe Toulè Market" aria-label="default input example"  name="mdp_changement" type="password"> --}}
                    </div>
                    <p style="text-align: right;  color: #1A7EF5;
                        font-family: Roboto;
                        font-size: 12px;
                        letter-spacing: -0.29px;
                        line-height: 13px;margin-right: 26px;margin-top:10px" href="#"><u>Mot de passe oublié ?</u></p>

                    <div class="container" style="text-align: center;  font-size: 16px;  height: 18px;
                        color: #FFFFFF;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0.31px;line-height: 18px;text-align: center;margin-bottom:30px;">
                        <button type="reset" id="annul-bnt-changement-de-propietaire" class="btn btn-outline btn-sm" value="Retour" style="width: 194px;height: 37px;border-radius: 5px; color: #1A7EF5; border:1px solid #1A7EF5; margin-left: -6px; font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0.35px;
                        line-height: 18px;
                        text-align: center;margin-left:5px;" onclick="annulerchangerpro()">Annuler</button>
                        <button type="submit" id="bnt-changement-de-propietaire" class="btn btn btn-sm" value="Suivant " style="width: 194px; height:37px; border-radius: 5px; background-color: #1A7EF5;border: 1px solid #1A7EF5; color:white; margin-right:5px;margin-left: 14px; font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0.35px;
                        line-height: 18px;
                        text-align: center;" onclick="changeproprio()">Enregistrer</button>
                    </div>

                </div>

            </div>
        </div>
   



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>

    
