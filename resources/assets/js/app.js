$(function () {
    $('*[data-allowed-chars]').keyup(function(e) {
        var $this = $(this);
        var val = $this.val();
        var format = new RegExp($this.data('allowed-chars'), 'i');
        var newVal = '';
        for(var i = 0; i < val.length; i++)
            if(val.charAt(i).match(format)) newVal += val.charAt(i);

        $this.val(newVal.toLowerCase());
    }).keydown(function (e) {
        // Allow: backspace, delete, tab, escape and enter
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
            // Allow: Ctrl
            (e.ctrlKey === true) ||
                // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }

        var $this = $(this);
        var val = $this.val();
        var format = new RegExp($this.data('allowed-chars'), 'i');
        console.log( String.fromCharCode( e.keyCode || e.which ));
        if (!format.test( String.fromCharCode( e.keyCode || e.which ))) {
            e.preventDefault();
        }
    });
});
