<style>

    .in_stock_zone {
        height: 134.5px;
    }
    .produit_not_in_stok {
        height: 134.5px;
        width: 100%;
        border-radius: 0px 0px 6px 6px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .in_stock_red_oval {
        height: 17px;
        width: 17px;
        background-color: #D0021B;
        border-radius: 50%;
        position: absolute;
        margin-left: -24px;
        margin-top: 2px;
    }

    .not_stock_line_1 {
        color: #D0021B;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 500;
        letter-spacing: -0.36px;
        line-height: 18px;
        margin-bottom: 10px;
    }

    .not_stock_line_2 {
        height: 18px;
        width: 308px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 15px;
        letter-spacing: 0;
        line-height: 17px;
        margin-bottom: 10px;
    }

    .not_stock_line_3 {
        display: flex;
    }

    .in_stock_input_field {
        box-sizing: border-box;
        height: 41px;
        width: 360px;
        border: 1px solid #9B9B9B;
        border-radius: 6px 0 0 6px;
        background-color: #FFFFFF;
        padding-left: 10px
    }


    .in_stock_btn_element {
        height: 41px;
        width: 111px;
        border-radius: 0 6px 6px 0;
        background-color: #1A7EF5;
        border: transparent;

        font-size: 15px;
        font-weight: 500;
        letter-spacing: -0.36px;
        line-height: 16px;
        color: #fff;
    }

</style>

<div class="produit_not_in_stok">

    <div class="not_stock_line_1">
       <span class="in_stock_red_oval"></span> Ce produit n'est plus en stock
    </div>
    <div class="not_stock_line_2">
        Prévenez-moi lorsque le produit est disponible
    </div>
    <div class="not_stock_line_3">

        <div class="in_stock_input">
            <input class="in_stock_input_field" type="text"  placeholder="Adresse e-mail ou numéro de portable">
        </div>

        <div class="in_stock_btn">
            <button class="in_stock_btn_element">Envoyer</button>
        </div>

    </div>

</div>
