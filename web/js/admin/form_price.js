let dimensions = '';
let frame = '';
let canvas = '';

$('#price-dimensions, #price-frame, #price-canvas').change(function() {
     dimensions = $('#price-dimensions').val();
     frame = $('#price-frame').val();
     canvas = $('#price-canvas').val();
     let value = dimensions + ' ' + frame + ' ' + canvas;
     $('#price-options').val(value);
     
});

