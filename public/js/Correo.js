function Forget(){
    console.log("nuevo202s2");
    Swal.fire({
        title: 'Escribe tu Email para enviarte un mensaje de recuperación',
        input: 'email',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Enviar'
        
    }).then((result) => {
        if (result.isConfirmed) 
        {
            const correo = document.querySelector('.swal2-input').value;
            console.log(correo);

            fetch('email', 
            {
                method: 'POST',
                mode: 'no-cors',
                headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest"
                },
                body: correo

            }).then(res => res.json()).then(res => 
            {
                if (res['respuesta']) 
                {            
                    console.log("Envió el email sssatisfactoriamente");           
                } else 
                {
                    Swal.fire(
                    'Error!',
                    res['mensaje'],
                    'error'
                    );
                }
            })
            
        }
    })
}