Karym = {
    hash: 'home_admin',
    init : ()=>{

        Karym.registrarSW();

        Karym.tratarHash();

        Karym.peticiones.consultar(Karym.action());

    },
    tratarHash:()=>{
        if (location.hash !== "") {
            Karym.hash = location.href.split('#')[1];
        }
    },
    registrarSW:()=>{
        if (navigator.serviceWorker){
            navigator.serviceWorker.register('/karym/KarymSw.js');
        }
    },
    urls: [],
    action: ()=>{
        var cadena = Karym.hash;
        return cadena;
        },
    processData:(response)=>{
        if (response.hasOwnProperty('url')) karym.response.includeUrls(response.url);
        if (response.hasOwnProperty('modal')) Karym.ui.responseModal(response);
        else if (response.hasOwnProperty('container')) Karym.fillContainer(response);

    },
    includeUrls: function(urls,index){
        if(!index){
            index = 0;
        }
        if(urls && index < urls.length) {
            if (urls[index].forceLoad || $.inArray(urls[index].url, Karym.urls) == -1) {
                var url = urls[index].url;

                $.getScript(url,
                    function (data, textStatus, jqxhr) {
                        Karym.urls.push(url);
                        Karym.includeUrls(urls, index+1);
                    }
                );
            }else{
               Karym.includeUrls(urls, index+1);
            }

        }
    },
    fillContainer:(response)=>{
        if (response.container != ''){
            $(response.container).html(response.body);
        }
    },
    peticiones:{
        consultar:(url)=>{

            $.ajax(
                {
                    url:url,
                    success: Karym.processData,
                    dataType: 'json',
                    type:'POST',
                    error: Karym.error
                }
            );
        },
    },
    ui:{
        alert:(mensaje)=>{
            var option = {
                title: '<div class="text-center text-info"><i class="fa fa-info mr-4"></i>Éxito</div> ',
                message: '<p class="alert alert-info text-center">'+mensaje+'</p>'
            };
            bootbox.alert(option);
        },
        success: (mensaje)=> {
            var option = {
                title: '<div class="text-center text-success"><i class="fa fa-check mr-4"></i>Éxito</div> ',
                message: '<p class="alert alert-success text-center">'+mensaje+'</p>'
            };
            bootbox.alert(option);
        },
        error: (mensaje)=> {
            var option = {
                title: '<div class="text-center text-danger"><i class="fa fa-times mr-4"></i>Error</div> ',
                message: '<p class="alert alert-danger text-center">'+mensaje+'</p>'
            };
            bootbox.alert(option);
        },
        warning: (mensaje)=> {
            var option = {
                title: '<div class="text-center text-warning"><i class="fa fa-warning mr-4"></i>Cuidado</div> ',
                message: '<p class="alert alert-warning text-center">'+mensaje+'</p>'
            };
            bootbox.alert(option);
        },
        confirm:(mensaje,callback)=>{
            var option = {
                title: '<div class="text-center text-primary">Confirmación<i class="fa fa-question ml-1"></i></div> ',
                message: '<p class="alert alert-info text-center">'+mensaje+'</p>',
                callback: callback
            };
            bootbox.confirm(option);
        },
        responseModal(response){
            var option = {
                title: response.title,
                message: response.body,
                size: 'large'
            };
            bootbox.alert(option);
        }
    },
    error:(error)=>{
        console.log(error);
        Karym.ui.error(error.statusText);
    },
    log:(toLog)=>{
        console.log(toLog);
    },
    elementos:{

        link:(element)=>{

            var accion = $(element.target).data('action');

            if (typeof accion === 'undefined' ) {
                accion = $(element.target).attr('href');
            }
            if (accion !== '#') {
                event.preventDefault();
                Karym.peticiones.consultar(accion);
            }
        }
    }
};