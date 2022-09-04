(
    ()=>{
        maps();

        View_maps = (ev)=>{
            maps();
            clearActive();
            ev.currentTarget.classList.add( "active");
        }

        View_trashs = (ev)=>{
            trashs();
            clearActive();
            ev.currentTarget.classList.add( "active");
        }

        View_users = (ev)=>{
            users();
            clearActive();
            ev.currentTarget.classList.add( "active");
        }
    }
)();