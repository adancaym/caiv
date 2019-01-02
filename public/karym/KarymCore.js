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
        fetchDataBlob:()=>
        {
            return {
                method: 'POST'
            }
        },
        fetchBlob:(url)=>{
            return fetch(url,karym.request.fetchDataBlob()).then(karym.response.verifyBlobResponse);
        },
        form:(form)=>{
            if(typeof form === 'string')
            {
                form = $(form);
            }
            let accion = form.attr('action');

            $.ajax	({
                data: form.serialize(),
                type: "POST",
                dataType: "json",
                url: accion,
                success: function(data){
                   karym.response.processData(data);
                },
                error:karym.util.error
            });

        },
        formFile:(form)=>{


            if(typeof form === 'string')
            {
                form = $(form);
            }
            let accion = form.attr('action');
            var formData = new FormData(form[0]);

            $.ajax({
                url: accion,
                type: 'POST',
                data: formData,
                success: function (data) {
                    data = JSON.parse(data);
                    karym.response.processData(data);
                },
                error:karym.util.error,
                cache: false,
                contentType: false,
                processData: false

            });

        },
        query:(url)=>{
            karym.request.post(url).then(karym.response.processData).catch(karym.util.error);
        }
    },
    response:{
        blob:(response)=>{
            if (response.blob !== null) {
                var blob = karym.response.decodeBase64(response.blob.blob);
                var name = response.blob.name;
                var type = response.blob.type;
                karym.response.save(name,type,blob);
            }
        },
        decodeBase64 : (s)=>{
            var e={},i,b=0,c,x,l=0,a,r='',w=String.fromCharCode,L=s.length;
            var A="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
            for(i=0;i<64;i++){e[A.charAt(i)]=i;}
            for(x=0;x<L;x++){
                c=e[s.charAt(x)];b=(b<<6)+c;l+=6;
                while(l>=8){((a=(b>>>(l-=8))&0xff)||(x<(L-2)))&&(r+=w(a));}
            }
            return r;
        },
        save:(name, type, blob)=>{
            if(navigator.msSaveBlob){ // For ie and Edge
                return navigator.msSaveBlob(blob, name);
            }
            else{

                let link = document.createElement('a');
                link.href = (window.URL || window.webkitURL).createObjectURL( new Blob([blob], {type: type}));
                link.download = name;
                document.body.appendChild(link);
                link.dispatchEvent(new MouseEvent('click', {bubbles: true, cancelable: true, view: window}));
                link.remove();
                window.URL.revokeObjectURL(link.href);
            }
        },
        table:(response)=>{
            let nombreTabla = response.dateTable;

            if (nombreTabla!== ''){

                var tabla = $(nombreTabla);

                if (tabla.length >0){

                    tabla.DataTable(
                        {
                            "language": {
                                "url": "/assets/js/tools/datatables/tsconfig.json"
                            }
                        }

                    );

                }

            }
        },

        killSesion:(response)=>{
            if (response.killSesion){
                window.location.href = "/";

            }
        },
        redirect:(response)=>{
                if (response.redirect !== ''){
                    window.location.href = "/#" + response.redirect;
                }
        },

        menus:(response)=>{
            let menus = response.menus;
            var cadena = '';

            $.each(menus,(index,val)=>{

                if ( val.visible == 1){

                    if (!karym.params.menus.includes(val.nombre)){


                        karym.params.menus.push(val.nombre);


                        cadena = '<li class="nav-item dropdown">\n' +
                            '          <a class="nav-link dropdown-toggle" href="#" id="'+val.nombre+'Dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">\n' +
                            '            <span>'+val.nombre+'</span>\n' +
                            '          </a>\n' +
                            '          <div class="dropdown-menu" aria-labelledby="'+val.nombre+'Dropdown" x-placement="bottom-start" style="position: absolute; transform: translate3d(5px, 56px, 0px); top: 0px; left: 0px; will-change: transform;">\n' ;
                        $.each(val.submenus, (indexsubmenu, submenu )=>{
                            if (submenu.visible == 1)
                                cadena  = cadena + '<a class="dropdown-item" href="#'+ submenu.link +'">'+ submenu.nombre +'</a>\n' ;
                        });
                        cadena = cadena +
                            '          </div>\n' +
                            '        </li>';


                    }

                    $('.sidebar').append(cadena);

                }
            });
        },
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

                if (response.status === 500)
                {
                    karym.util.internalServerError(response);
                }


            }
            else{

                var pre = response.clone().json();

                if (pre.code === 404){
                    let cadena = pre.message +' '+pre.title;
                    karym.elementos.ui.error(cadena);
                    throw 'Error página no encontrada';
                }

                return response.json();

            }
        },
        verifyBlobResponse:(response)=>{

            if (!response.ok){

                if (response.status === 404) {
                    karym.util.notFound(response);
                }

                if (response.status === 500)
                {
                    karym.util.internalServerError(response);
                }
            }
            else{

                var pre = response.clone().json();

                if (pre.code === 404){
                    let cadena = pre.message +' '+pre.title;
                    karym.elementos.ui.error(cadena);
                    throw 'Error página no encontrada';
                }


            }
        },
        callKback:(response)=>{
            return response;
        },
        processData:(response)=>{
            if (response.hasOwnProperty('modal')) karym.response.responseModal(response);
            if (response.hasOwnProperty('menus')) karym.response.menus(response);
            if (response.hasOwnProperty('redirect')) karym.response.redirect(response);
            if (response.hasOwnProperty('killSesion')) karym.response.killSesion(response);
            if (response.hasOwnProperty('container')) karym.response.fillContainer(response);
            if (response.hasOwnProperty('url')) karym.response.includeUrls(response.url);
            if (response.hasOwnProperty('dateTable')) karym.response.table(response);
            if (response.hasOwnProperty('blob')) karym.response.blob(response);
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
        menus:[],
        btn: null,
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
            
            if (typeof  response.statusText !== "undefined"){
                let cadena = response.statusText +' '+response.url;
                karym.elementos.ui.error(cadena);
                throw 'Error página no encontrada';
            }

        },
        internalServerError(response){

           response.json().then((json)=>{

               var visor = $('<div class="container"></div>').JSONView(json).get(0).innerHTML;
               let cadena = response.statusText +' '+response.url;
               karym.elementos.ui.error(cadena,visor);

           });


        }
    },
    elementos:{
        viewFile:(btn)=>{
            event.preventDefault();


            var $btn = $(btn.target);

            if ($btn.is('a')){
                var accion = $btn.attr('href');
            }
            else{
                $btn = $btn.parents('a');
                var accion = $btn.attr('href');
            }

            karym.request.fetchBlob(accion);
        },
        delete:function(btn){
           event.preventDefault();
           karym.params.btn = btn.target;
           karym.elementos.ui.confirm('¿Estas seguro que deseas eliminar el registro?',karym.elementos.callbackDelete);
        },
        callbackDelete:(result)=>{

            if (result===true)
            {
                var $btn = $(karym.params.btn);

                var accion = $btn.attr('href');
                if  (typeof accion === "undefined"){
                    $btn = $btn.parents('a');
                }

                accion = $btn.attr('href');

                console.log(accion);

                //console.log(accion);

                window.location.href =accion;
            }


        },
        form:function(btn){
            event.preventDefault();
            let form = $(btn.target).parents('form')[0];
            karym.request.form($(form));
        },
        formFile:function(btn){
            event.preventDefault();
            let form = $(btn.target).parents('form')[0];
            karym.request.formFile($(form));
        },
        link:(element)=>{

            event.preventDefault();

            var accion = $(element.target).data('action');

            if (typeof accion === 'undefined' ) {
                accion = $(element.target).attr('href');
            }
            if (element.target.className!=='prop'){

                if (accion !== '#' ) {
                    karym.request.query(accion);
                }
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
            error: (mensaje,visor)=> {
                if (typeof visor == "undefined"){
                    var option = {
                        title: '<div class="text-center text-danger"><i class="fa fa-times mr-4"></i>Error</div> ',
                        message: '<p class="alert alert-danger text-center">'+mensaje+'</p>'
                    };
                }
                else{

                    var option = {
                        title: '<div class="text-center text-danger"><i class="fa fa-times mr-4"></i>Error</div> ',
                        message: visor,
                        size: 'large'

                    };

                }

                bootbox.alert(option);

                throw 'Error Interno';
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