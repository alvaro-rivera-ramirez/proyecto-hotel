document.addEventListener("DOMContentLoaded", () => {

    const boton = document.querySelector("#imprimir");
    boton.addEventListener("click", () => {

        // alert("hola")

        // const borrar = document.querySelectorAll(".borrar");
        // borrar.classList.add("d-none");

        //  ******************************************************** INICIO DE FECHA Y HORA ********************************************
        let date = new Date();
        let fecha = String(date.getDate()).padStart(2, '0') + '/' + String(date.getMonth() + 1).padStart(2, '0') + '/' + date.getFullYear();

        let hoy = new Date();
        
        switch(hoy.getHours())
        {
            case 0:
                val_hora = 12;  
            break;

            case 13:
                val_hora = 1;  
            break;

            case 14:
                val_hora = 2;  
            break;

            case 15:
                val_hora = 3;  
            break;

            case 16:
                val_hora = 4;  
            break;

            case 17:
                val_hora = 5;  
            break;

            case 18:
                val_hora = 6;  
            break;

            case 19:
                val_hora = 7;  
            break;

            case 20:
                val_hora = 8;  
            break;

            case 21:
                val_hora = 9;  
            break;
            
            case 22:
                val_hora = 10;  
            break;

            case 23:
                val_hora = 11;  
            break;

            case 24:
                val_hora = 12;  
            break;

        }

        if(hoy.getHours()>=13){
            aux = " pm";
        }else{
            aux = " am";
        }


        if(val_hora.toString().length== 1)
            var hora = '0'+val_hora + ':' + hoy.getMinutes() + aux;
        else
            var hora = val_hora + ':' + hoy.getMinutes() + aux;

        
        console.log(hora);
        console.log(fecha);

        // ******************************************************** FINAL DE FECHA Y HORA ********************************************************

        
        const pdf = document.getElementById('TablaHabitaciones'); // <-- Aquí puedes elegir cualquier elemento del DOM
        // Generate the PDF.
        html2pdf().from(pdf).set({
                margin: 1,
                filename: 'Habitaciones_Reporte.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 3, // A mayor escala, mejores gráficos, pero más peso
                    letterRendering: true,
                },
                jsPDF: {
                    orientation: 'landscape', // landscape o portrait
                    unit: 'in',
                    format: 'letter'
                }
            })

            .toPdf().get('pdf').then(function (pdf) { //TITULO

                pdf.setPage(1);
                pdf.setFontSize(30);
                pdf.setTextColor(150);
                pdf.text('REPORTE DE HABITACIONES', (pdf.internal.pageSize.getWidth() / 4.15), (pdf.internal.pageSize.getHeight() / 10.20));
            })


            .toPdf().get('pdf').then(function (pdf) { //HORA Y FECHA

                pdf.setPage(1);
                pdf.setFontSize(15);
                pdf.setTextColor(150);
                pdf.text('Hora: ', (pdf.internal.pageSize.getWidth() / 9.5), (pdf.internal.pageSize.getHeight() / 1.55));
                pdf.text('Fecha: ', (pdf.internal.pageSize.getWidth() / 9.5), (pdf.internal.pageSize.getHeight() / 1.45));
            })


            .toPdf().get('pdf').then(function (pdf) { //PAGINACIÓN

                var totalPages = pdf.internal.getNumberOfPages();

                for (i = 1; i <= totalPages; i++) {
                    pdf.setPage(i);
                    pdf.setFontSize(15);
                    pdf.setTextColor(150);
                    pdf.text('Página ' + i + ' de ' + totalPages, (pdf.internal.pageSize.getWidth() / 2.30), (pdf.internal.pageSize.getHeight() / 1.04));
                }

            })
            .save().catch(err => console.log("NO SE PUDO DESCARGAR PDF"));

    })
})
