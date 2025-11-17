<?php
namespace App\Controllers;

use App\Providers\View;
use App\Models\Journal;
use Dompdf\Dompdf;
use Dompdf\Options;

class JournalController {

    public function select(){
       $journal = new Journal;
       $data = $journal->select();
        return View::render('admin/log', ['activities'=> $data]);
    }

    public function pdf() {

        $journal = new Journal;
        $data = $journal->select();
    
        $html = View::render('admin/log', ['activities' => $data], true);
    
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'DejaVu Sans');
    
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("journal.pdf", ["Attachment" => true]);

        exit;
    }
    
}
?>