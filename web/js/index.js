function index() {
    console.log('hola');
    this.ini = function() {
        console.log("iniciamos...");
        this.getIndicadores();
        this.getDatosGrafica();


    }
    this.getIndicadores = function() {
        /*vendidos*/
        $.ajax({
            statusCode: {
                404: function() {
                    console.log("Esta página no existe");
                }
            },
            url: 'php/servidor.php',
            method: 'POST',
            data: {
                rq: "1"
            }
        }).done(function(datos) {
            //La lógica 3,000
            $("#idVendidos").text(parseFloat(datos).toLocaleString());
        });

    }

    this.getDatosGrafica = function() {

    }
}


var oIndex = new index();
setTimeout(function() { oIndex.ini(); }, 100);