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
        if (!format.test( String.fromCharCode( e.keyCode || e.which ))) {
            e.preventDefault();
        }
    });
});


$(function() {
    $('.live-data').each(function() {
        var $this = $(this);
        var source = $this.data('source');
        var interval = $this.data('interval');
        var _updateData = function(data) {
            $this.html(data);
        };

        var _fetchData = function() {
            $.ajax({
                url: source
            }).success(function(data) {
                _updateData(data);
                setTimeout(_fetchData, interval);
            });
        };

        _fetchData();
    });

});

$.fn.extend({
    liveTable: function() {
        return $(this).each(function() {
            var $this = $(this);
            var $tbody = $this.find('tbody');
            var $tr = $tbody.find('tr').first();
            var interval = $this.data('interval');
            var source = $this.data('source');

            var _updateData = function(data) {
                var $rows = [$tr];
                for(var i = 0; i < data.length; i++) {
                    var $newTr = $tr.clone();
                    $newTr.find('[data-field]').each(function() {
                        var keys = $(this).data('field').split(".");
                        var newData = data[i];
                        for(var j = 0; j < keys.length; j++) newData = newData[keys[j]];
                        $(this).html(newData);
                    });

                    $rows.push($newTr);
                }

                $tbody.html($rows);
            };

            var _fetchData = function() {
                $.ajax({
                    url: source
                }).success(function(data) {
                    _updateData(data);
                    setTimeout(_fetchData, interval);
                });
            };

            _fetchData();
        });
    }
});
