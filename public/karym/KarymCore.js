karym = {
    init : ()=>{

        karym.util.registrarSW();

        karym.request.query(karym.util.getHash());

    },
    request:{
        post:(url)=>{
            return karym.request.fetch(url);
        },
        get:(url)=>{
            karym.request.fetchData.method = 'GET';
            return karym.request.fetch(url);
            },
        fetch:(url)=>{

            return fetch(url,karym.request.fetchData).then(karym.response.verifyJsonResponse);

        },
        fetchData:()=>
        {
            return {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
            }
        },
        query:(url)=>{
            karym.request.post(url).then(karym.response.processData).catch(karym.util.error);
        }
    },
    response:{
        responseModal(response){
            var option = {
                title: response.title,
                message: response.body,
                size: 'large'
            };
            bootbox.alert(option);
        },
        verifyJsonResponse:(response)=>{

            if (!response.ok){

                if (response.status === 404) {
                    karym.util.notFound(response);
                }

            }

            return response.json();
        },
        callback:(response)=>{
            return response;
        },
        processData:(response)=>{
            if (response.hasOwnProperty('url')) karym.response.includeUrls(response.url);
            if (response.hasOwnProperty('modal')) karym.response.responseModal(response);
            else if (response.hasOwnProperty('container')) karym.response.fillContainer(response);
        },
        includeUrls: function(urls,index){
            if(!index){
                index = 0;
            }
            if(urls && index < urls.length) {
                if (urls[index].forceLoad || $.inArray(urls[index].url, karym.params.urls) === -1) {
                    var url = urls[index].url;

                    $.getScript(url,
                        function (data, textStatus, jqxhr) {
                            karym.params.urls.push(url);
                            karym.response.includeUrls(urls, index+1);
                        }
                    );
                }else{
                    karym.response.includeUrls(urls, index+1);
                }

            }
        },
        fillContainer:(response)=>{
            if (response.container !== ''){
                $(response.container).html(response.body);
            }
        },
    },
    params  :{
        data:[],
        addData:(data)=>{
            karym.params.data= data;
        },
        getData:()=>{
          return karym.params.data;
        },
        urls:[],
    },
    util:{
        log:(response)=>{
            console.log(response);
        },
        error:(error)=>{
            karym.util.log(error);
        },
        registrarSW:()=>{
            if (navigator.serviceWorker){
                navigator.serviceWorker.register('/karym/KarymSw.js');
            }
        },
        hash:'home_admin',
        getHash:()=>{
            if (location.hash !== "") {
                karym.util.setHash(location.href.split('#')[1]) ;
            }
            return karym.util.hash;
        },
        setHash:(hash)=>{
            karym.util.hash = hash;
        },
        notFound(response){
            let cadena = response.statusText +' '+response.url;
            karym.elementos.ui.error(cadena);
            throw new Exception('Error página no encontrada');
        }
    },
    elementos:{

        link:(element)=>{

            var accion = $(element.target).data('action');

            if (typeof accion === 'undefined' ) {
                accion = $(element.target).attr('href');
            }
            if (accion !== '#') {
                event.preventDefault();
                karym.request.query(accion);
            }
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
    },
};