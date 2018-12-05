KarymEvents={
    ready:()=>{

        $(window).on('hashchange', karym.init);
        $(document).on('click','a',karym.elementos.link);
        $(document).on('click','.karym_submit',karym.elementos.form);

    }
}