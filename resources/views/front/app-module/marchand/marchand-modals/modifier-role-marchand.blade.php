<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    .modal-content-modifier-role,
    .modal-body-modifier-role {
        width: 452px !important;
        height: 398px !important;
        background-color: white;
    }
    
  
    
    .modal-body-modifier-role {
        margin: 0px;
        padding: 0px;
    }
    
    .modal-dialog-modifier-role {
        position: relative;
        height: 579px;
        left: 10px;
        top: 60px;
    }
    
    .form-control {
        font-size: 10px;
        color: #9B9B9B;
    }
    
    .form-select {
        font-size: 10px;
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
    <!-- The Modal  data-toggle="modal" data-backdrop="static"-->
    <div class="modal" id="modifRole" style="margin-top: 60px;">
        <div class="modal-dialog modal-dialog-modifier-role">
            <div class="modal-content modal-content-modifier-role">
                <div class="container" style="height: 87px;  border-bottom: 1px solid #D8D8D8;">
                    <div class="row">
                        <h3 style="color:#191970; font-size: 21px; text-align: center;font-weight: 500;
                        letter-spacing: 0;
                        line-height: 24px;padding-top: 25px;" id="quel-role-modifier-compte-collabo">Quel Modifier le rôle du compte de @EmailDuCompte
                        </h3>
                    </div>

                </div>


                <div class="container">

                    <form action="{{-- route("collabo.updaterole")--}}" method="POST" id="form-changer-role-collabo">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="row">
                            <p style=" color: #191970;
                            font-family: Roboto;
                            font-size: 14px;
                            font-weight: 300;
                            letter-spacing: -0.34px;
                            line-height: 16px;
                            text-align: center;padding-top: 14px;padding-left: 25px;padding-right: 25px;">Vous pouvez choisir de promouvoir, changer ou restreindre le rôle dont @NomD’afficheage disposera dans l’espace de travail @NomDuStore.
                            </p>
                            <div class="col" style="text-align: left;">
                                <div class="form-check" style="margin-left:25px;margin-top:15px;">
                                    <input class="form-check-input" type="radio" name="changer_role_collabo" value="Gérant de la boutique" id="check-gerant-role">
                                    <label class="form-check-label" for="check-gerant-role" style=" color: #4A4A4A;
                                    font-family: Roboto;
                                    font-size: 15px;
                                    font-weight: 500;
                                    letter-spacing: -0.36px;
                                    line-height: 15px;margin-top:5px;">
                                        Gérant de la boutique
                                    </label>
                                </div>
                                <div class="form-check" style="margin-left:25px;margin-top:10px;;">
                                    <input class="form-check-input" type="radio" name="changer_role_collabo" value="Éditeur" id="check-editeur-role">
                                    <label class="form-check-label" for="check-editeur-role" style=" color: #4A4A4A;
                                    font-family: Roboto;
                                    font-size: 15px;
                                    font-weight: 500;
                                    letter-spacing: -0.36px;
                                    line-height: 15px;margin-top:5px;">
                                    Éditeur
                                    </label>
                                </div>
                                <div class="form-check" style="margin-left:25px;margin-top:10px;;">
                                    <input class="form-check-input" type="radio" name="changer_role_collabo" value="Démarcheur" id="check-demarcheur-role">
                                    <label class="form-check-label" for="check-demarcheur-role" style=" color: #4A4A4A;
                                    font-family: Roboto;
                                    font-size: 15px;
                                    font-weight: 500;
                                    letter-spacing: -0.36px;
                                    line-height: 15px;margin-top:5px;">
                                    Démarcheur
                                    </label>
                                </div>
                                <div class="form-check" style="margin-left:25px;margin-top:10px;">
                                    <input class="form-check-input" type="radio" name="changer_role_collabo" value="Nouveau membre" id="check-membre-role">
                                    <label class="form-check-label" for="check-membre-role" style=" color: #4A4A4A;
                                    font-family: Roboto;
                                    font-size: 15px;
                                    font-weight: 500;
                                    letter-spacing: -0.36px;
                                    line-height: 15px;margin-top:5px;">
                                    Membre simple
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="container" style="text-align: center;  font-size: 16px;  height: 18px;
                            color: #FFFFFF;
                            font-family: Roboto;
                            font-size: 16px;
                            font-weight: 500;
                            letter-spacing: 0.31px;line-height: 18px;text-align: center;margin-bottom:18px;">
                            <button type="reset" id="annul-btn-changer-role-collabo" class="btn btn-outline btn-sm " value="Retour" style="width: 194px;height: 37px;border-radius: 5px; color: #1A7EF5; border:1px solid #1A7EF5; margin-left: -6px;  font-family: Roboto;
                            font-size: 16px;
                            font-weight: 500;
                            letter-spacing: 0.35px;
                            line-height: 18px;
                            text-align: center;
                          ">Annuler</button>

                            <button type="submit " class="btn btn btn-sm" value="Suivant" id="btn-changer-role-collabo" style="width: 194px; height:37px; border-radius: 5px; background-color: #1A7EF5;border: 1px solid #1A7EF5; color:white; margin-right: -7px;margin-left: 14px;  font-family: Roboto;
                            font-size: 16px;
                            font-weight: 500;
                            letter-spacing: 0.35px;
                            line-height: 18px;
                            text-align: center;
                          ">Enregistrer</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>

