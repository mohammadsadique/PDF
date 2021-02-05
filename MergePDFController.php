<?php

namespace test\Http\Controllers;
use PDF;
use PdfMerger;
class MergePDFController extends Controller
{

    public function printinvoice($version,$quatationId)
    {
        
        //PDF 1
            $pdf = PDF::loadView('Company.pdf'); // Give the blade file path
            $path1 = public_path().'\allpdfFile'; // Give PDF path
            $fileName1 = $id.'1' . '.' . 'pdf' ; // making PDF name
            $pdf->save($path1 . '/' . $fileName1); // save PDF file to that location
        //PDF 2
            $pdf = PDF::loadView('Company.pdf2'); // Give the blade file path
            $path2 = public_path().'\allpdfFile';  // Give PDF path
            $fileName2 = $id.'2' . '.' . 'pdf' ;  // making PDF name
            $pdf->save($path2 . '/' . $fileName2);  // save PDF file to that location
        // Merge the PDF File
            $pdf1 = public_path().'\allpdfFile'.'/'.$fileName1;
            $pdf2 = public_path().'\allpdfFile'.'/'.$fileName2;
            $pdfMerger = PDFMerger::init();
            $pdfMerger->addPDF($pdf1, 'all');
            $pdfMerger->addPDF($pdf2, 'all');
            $pdfMerger->merge();
            $pdfMerger->save("mergeFile.pdf",'download');


            $unlinkpath1 = public_path().'\allpdfFile'.'/'.$fileName1;
            $unlinkpath2 = public_path().'\allpdfFile'.'/'.$fileName2;
            unlink($unlinkpath1);
            unlink($unlinkpath2);

    }

}