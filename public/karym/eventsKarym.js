KarymEvents={
    ready:()=>{

        $(window).on('hashchange', karym.init);
        //$(document).on('click','a',karym.elementos.link);
        $(document).on('click','.karym_submit',karym.elementos.form);
        $(document).on('click','.karym_submit_file',karym.elementos.formFile);
        $(document).on('click','.karym_delete',karym.elementos.delete);
    }
};
