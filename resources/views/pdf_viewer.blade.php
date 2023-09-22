<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View PDF</title>
</head>
<body>
    <iframe src="{{ $pdfUrl }}" width="100%" height="600px"></iframe>
    <br>
    <a href="{{ $pdfUrl }}" download="your_pdf_filename.pdf">Download PDF</a>
</body>
</html>
