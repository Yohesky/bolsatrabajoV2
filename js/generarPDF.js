var pdf = document.getElementById("pdf");
console.log(pdf);

pdf.addEventListener("click", () => {
    html2canvas(document.getElementById("graficos")).then(function(canvas) {
        var img = canvas.toDataURL('image/png');
        var doc = new jsPDF();
        doc.addImage(img, 'JPEG', 5, 5, 200,290);
        doc.save('test.pdf');
    });


})
