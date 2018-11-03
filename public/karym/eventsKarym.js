KarymEvents={
    ready:()=>{

        $(window).on('hashchange', karym.init);
        $(document).on('click','a',karym.elementos.link);
    }
}