<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use Dompdf\Dompdf;

class PdfController extends Controller{

    public function index()
    {
        
    }


    public function demoPDF()
    {
        $domPDF = new Dompdf();
        
        // $options = $domPDF->getOptions()
        // $options->set(array('isRemotedEnabled'=>true));
        // $domPDF->setOptions($options);
        $domPDF->loadHtml('<h1 style="text-align: center">EMPEZAR A PROGRAMAR EL CÓDIGO DEL PDF</h1>
        <br>
        <p style="text-align: center"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. A, soluta expedita suscipit iusto cupiditate eligendi
        possimus delectus est voluptates et! Exercitationem amet accusamus porro eaque sint harum cupiditate dignissimos
        vero. Lorem ipsum, dolor sit amet consectetur adipisicing elit. A, soluta expedita suscipit iusto cupiditate eligendi
        possimus delectus est voluptates et! Exercitationem amet accusamus porro eaque sint harum cupiditate dignissimos
        vero.</p>   
        <table style="text-align: center">
        <tr>
            <td> CAMPO UNO</td> <td> CAMPO DOS </td> <td> CAMPO TRES </td>         
        </tr>
        <tr>
            <td> DATO UNO</td> <td> DATO DOS</td><td>DATO TRES</td>    
        </tr>
        <tr>
            <td> DATO UNO</td> <td> DATO DOS</td><td>DATO TRES</td>    
        </tr>
        <tr>
            <td> DATO UNO</td> <td> DATO DOS</td><td>DATO TRES</td>    
        </tr>
        <tr>
            <td> DATO UNO</td> <td> DATO DOS</td><td>DATO TRES</td>    
        </tr>
        <tr>
            <td> DATO UNO</td> <td> DATO DOS</td><td>DATO TRES</td>    
        </tr>
        <tr>
            <td> DATO UNO</td> <td> DATO DOS</td><td>DATO TRES</td>    
        </tr>
        <tr>
            <td> DATO UNO</td> <td> DATO DOS</td><td>DATO TRES</td>    
        </tr>
        <tr>
            <td> DATO UNO</td> <td> DATO DOS</td><td>DATO TRES</td>    
        </tr>
    </table>
        ');
        $domPDF->setPaper('A4', 'portrait');
        $domPDF->render();
        $domPDF->stream("reporte.pdf",array('Attachment' => false));               
    }
}
