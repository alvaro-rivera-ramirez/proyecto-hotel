function Eliminar(idCliente) {
    console.log(idCliente);
    Swal.fire({
        title: '¿Está seguro de eliminar?',
        text: "Está a punto de eliminar este registro",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('eliminar_cliente/' + idCliente, {
                method: 'POST',
                mode: 'no-cors',
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest"
                },
                body: idCliente

            }).then(res => res.json()).then(res => {
                if (res['respuesta']) {
                    Swal.fire(
                        'ELIMINADO!',
                        'El registro fue eliminado exitosamente',
                        'success'
                    ).then((value) => {
                        location.reload();
                    });
                } else {
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