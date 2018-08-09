$( document ).ready(function(){
    $('#exportardiploma').submit(function () {
        var form = $(this);
        var file2 = $('#diploma');
        var archivo = file2[0].files;       //el array pertenece al elemento

        if( archivo )
        {
            function VentanaCentrada(theURL,winName,features, myWidth, myHeight, isCenter) { //v3.0
                if(window.screen)if(isCenter)if(isCenter=="true"){
                    var myLeft = (screen.width-myWidth)/2;
                    var myTop = (screen.height-myHeight)/2;
                    features+=(features!='')?',':'';
                    features+=',left='+myLeft+',top='+myTop;
                }
                window.open(theURL,winName,features+((features!='')?',':'')+'width='+myWidth+',height='+myHeight);
            }

            $.ajax({
                url: 'ajax/subirdiploma.php',
                data: new FormData(form[0]),
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(data){
                    VentanaCentrada('./pdf/documentos/ver_diploma.php?nombrear='+data,'Factura','','1024','768','true');





                }
            });
        }
        return false;
    });
});