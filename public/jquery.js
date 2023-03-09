let keywoard = document.getElementById('keywoard')
let container = document.getElementById('container')

$(document).ready(function() {
    $('keywoard').on('keyup', function() {
        $('container').load('jquerymain.php?keywoard=' + $('keywoard').val())
    })
})