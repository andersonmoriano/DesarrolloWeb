function formLogin(e)
{
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const clave = document.getElementById("clave");
    if(usuario.value =="")
    {
        clave.classList.remove("is-invalid")
        usuario.classList.add("is-invalid");
        usuario.focus();
    }
    else if(clave.value == "")
    {
        usuario.classList.remove("is-invalid")
        clave.classList.add("is-invalid")
        usuario.focus();
    }
    else
    {
        const url = base_url + "Usuarios/validar";
        const frm = document.getElementById("formLogin");
        if (result == "ok") 
        {
            window.location = base_url + "Usuarios";
        }

    }
}

       /* http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function ()
        {
            if(this.readyState == 4 && this.status == 200)
            {
                const result = JSON.parse(this.responseText);
                if (result == "ok") 
                {
                    window.location = base_url + "Usuarios";
                }
            }
        }*/