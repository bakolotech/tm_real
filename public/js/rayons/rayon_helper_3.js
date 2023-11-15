function divide(dividend, divisor) {
    if(divisor !== 0) {
        return dividend / divisor;
    } else {
        console.log("Error: Division by O")
    }
}


function keep_shopping_old_end() {

    console.log('Start redistributing product line ...')
    var prod_container = $('.etagere-parent-miror').height();
    console.log('The height => ', prod_container)

    var result = divide(prod_container, 5)

    console.log('Le result est bien => ', result)

    // let window_height = window.innerHeight;

    // let main_div_height = document.getElementById('grande_etagereOK').offsetHeight;

    // const span_parent = document.getElementById('view-window-height-and-width')
    // var span_1 = document.createElement('span')
    // var span_2 = document.createElement('span')
    // var delemiter = document.createElement('br')

    // span_1.textContent = main_div_height
    // span_2.textContent = window_height

    // span_parent.appendChild(span_1)

    // $('#view-window-height-and-width').addClass('veiw-device-width-and-height')

}