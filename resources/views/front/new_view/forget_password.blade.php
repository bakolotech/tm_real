{{-- @extends('front.new_view.layout.index') --}}

<STYle>
  .center-forget-modal {
          top: 47% !important;
          transform: translateY(-50%) !important
      }
  
        .forget-pass-dialog, .forget-pass-content {
          height: 295px !important;
          width: 432px;
          border-radius: 6px;
          background-color: #FFFFFF;
          box-shadow: 0 5px 15px 0 rgba(0,0,0,0.35);
        }
  
        .pass-oublie-custom {
          box-sizing: border-box;
          height: 41px;
          width: 402px;
          border: 1px solid #D8D8D8;
          border-radius: 6px;
          background-color: #F8F8F8;
          margin-left: 15px;
          padding-left: 10px
        }
  
        .error-pass-none {
          display: none !important;
        }
  
        .btn-disabled-forget {
          background-color: #9B9B9B !important;
          color: #ffffff;
          pointer-events: none;
          border: transparent !important;
      }
  
    </STYle>
    <!-- Modal -->
  
      <div class="modal fade" id="exampleModal_pwd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 260000; ">
        <div class="modal-dialog center-forget-modal forget-pass-dialog" style="width: 432px;">
          <div class="modal-content forget-pass-content" style="border-bottom: none;text-align: center;">
          <p id="retour_request"></p>
          <div class="modal-header"style="text-align: center;padding-bottom: 0px !important; padding-top: 0.5rem">
  
                <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close" onClick='closeForgetModal()' style="margin-right: -5px" >
                  <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
              </button>
  
      <div class="auth-header" style=" text-align: center; margin-bottom: 0px;padding-bottom: 0px;">
          <div class="vous-avez-oublie-vot" style="    height: 24px; width: 361px;color: #191970;font-family: Roboto; font-size: 21px;font-weight: 500;
          letter-spacing: 0;line-height: 23px;margin-bottom: 5px;text-align: center;position: relative; margin-left: auto; margin-right: auto;">
              <h5 class="" >
              Vous avez oublié votre mot de passe?</h5>
          </div>
          <p class="auth-text" style="height: 48px;width: 393px;color: #191970;font-family: Roboto;font-size: 14px;font-weight: 300; letter-spacing: -0.34px;line-height: 18px;text-align: center;padding: 0px;">
              Alors, on a oublié son mot de passe ? Bon allez, ça reste entre nous.
              Renseignez votre email ou votre numéro de portable
              et tout rentrera dans l’ordre.
          </p>
  
          </div>
      </div>
      <form action="{{ route('forget.password.post') }}" method="POST" data-tpost="async" id="forget_myform" data-btn="#forget-btn">
          @csrf
            <div class="modal-bodyd">
  
          <div class="input-group mb-3">
              <input type="text" class="form-controlS pass-oublie pass-oublie-custom" id="exampleFormControlInput1" placeholder="Adresse e-mail ou numéro de portable" style="border-radius: 6px; z-index: 1; margin-top: 15px" name="email" required>
              <span class="input-group-text error basic-addon1" id="basic-addon2B" style="background: #fff; border-radius: 0 6px 6px 0; border: 1px solid red; z-index:999; border-left: none; position: relative; left: -10px; display:none">
  
              <img src="{{asset('assets/images2/error.svg')}}" alt="" style="width: 18px; height: 18px">
              </span>
              <span class="ladresse-e-mail-ou error1 error-pass-none" id="basic-addon1" style="padding:3px;font-size:12px;color:red;">L’adresse e-mail ou le numéro de portable que vous avez saisi(e) n’est pas associé(e)
    à un compte.</span>
  
                  <input type="hidden" name="modification_source" id="pwd_modification_source">
  
            </div>
  
          </div>
  
  
            <div class="modal-foo" style="position: relative;	margin-right: auto;	margin-left: auto;text-align: center;top: 37px;
          padding: 0px;">
               <button type="submit" class="btn btn-primary btn-bottom btn-disabled-forget" style="padding: 0px;  width: 164px; height: 37px; position: relative; top: 15px;" id="forget-btn-1">Continuer</button>
      </div>
      </form>
      <br><br>
      </div>
      </div>
    </div>
  
  
    <script type="text/javascript">
  
      function validateInput() {
  
          const input = document.getElementById("exampleFormControlInput1"); //basic-addon2
          const error = document.getElementById("basic-addon2");
          error.classList.remove('error')
  
          const error1 = document.getElementById("basic-addon1");
          error1.classList.remove('error1')
  
          input.classList.toggle('none')
  
      }
  
    function closeForgetModal() {
      $('#exampleModal_pwd').modal('hide')
    }
  
    function ValidateEmail(mailval){
      var emailv = mailval
      if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailv))
      {
          return (true)
      }else {
          return false;
      }
    }
  
    $('#exampleFormControlInput1').on('blur', function() {
          let email = $('#exampleFormControlInput1').val();
          let isvalid = ValidateEmail(email)
          if (!isvalid) {
              $('#exampleFormControlInput1').addClass('input-error-warning')
              $('#forget-btn-1').addClass('btn-disabled-forget')
          }else {
              $('#forget-btn-1').removeClass('btn-disabled-forget')
              $('#exampleFormControlInput1').removeClass('input-error-warning')
          }
    })
  
    $('#exampleFormControlInput1').on('keyup', function() {
          let email = $('#exampleFormControlInput1').val();
          let isvalid = ValidateEmail(email)
          if (!isvalid) {
              $('#exampleFormControlInput1').addClass('input-error-warning')
              $('#forget-btn-1').addClass('btn-disabled-forget')
          }else {
              $('#forget-btn-1').removeClass('btn-disabled-forget')
              $('#exampleFormControlInput1').removeClass('input-error-warning')
          }
    })
  
  </script>
  
  
    {{-- @endsection --}}
  