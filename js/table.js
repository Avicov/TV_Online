var $TABLE = $('#table');
var $BTN = $('#export-btn');
var $BTNF = $('#enviarDatos');
var $EXPORT = $('#export');
var $ARRAYID = [];

function addFile(id) {
    if ($ARRAYID.indexOf(id) < 0) {
        $ARRAYID.push(id);
        var $fila = $('#' + id.toString());
        var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide');
        $clone.attr('id', id);
        $clone.children()[0].innerText = $fila.children()[0].textContent;
        $clone.children()[1].innerText = $fila.children()[1].textContent;
        $TABLE.find('table').append($clone);
        $('#formCrearMenu').append('<input type="hidden" id="'+id+'" name="prodid[]" value="' + id + '">');
    }
}

$('.table-remove').click(function() {
    var id = $(this).parents('tr').attr('id');
    var num=parseInt(id);//obtengo el atributo ID de la fila.
    $ARRAYID.splice($ARRAYID.indexOf(num), 1); //lo elimino pasandole como parametro la posicion donde se encuentra(se supone q es unico en el array).
    $(this).parents('tr').detach(); //elimino la fila.
    //console.log($('#formCrearMenu').find('input#' + id));
    $('#formCrearMenu').find('input#' + id).remove();

});

/*$('.table-up').click(function () {
  var $row = $(this).parents('tr');
  if ($row.index() === 1) return; // Don't go above the header
  $row.prev().before($row.get(0));
});

$('.table-down').click(function () {
  var $row = $(this).parents('tr');
  $row.next().after($row.get(0));
});
*/
// A few jQuery helpers for exporting only
jQuery.fn.pop = [].pop;
jQuery.fn.shift = [].shift;

function Enviar() {
    var frm = document.getElementById("formCrearMenu");
    frm.idioma.value = $ARRAYID; // <-- aquí
}

$BTN.click(function() {
    var $rows = $TABLE.find('tr:not(:hidden)');
    var headers = [];
    var data = [];

    // Get the headers (add special header logic here)
    $($rows.shift()).find('th:not(:empty)').each(function() {
        headers.push($(this).text().toLowerCase());
    });

    // Turn all existing rows into a loopable array
    $rows.each(function() {
        var $td = $(this).find('td');
        var h = {};

        // Use the headers from earlier to name our hash keys
        headers.forEach(function(header, i) {
            h[header] = $td.eq(i).text();
        });

        data.push(h);
    });

    // Output the result
    $EXPORT.text(JSON.stringify(data));
});
