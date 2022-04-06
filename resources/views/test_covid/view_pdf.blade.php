<?php $path = Storage::url('pdf/result_pdf_'.$id.'.pdf'); ?>
<embed type="application/pdf" src="{{ url($path) }}" width="1320" height="800"></embed>
