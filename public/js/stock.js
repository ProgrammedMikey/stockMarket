$(function() {

    $("#symbolsearch")
        .focus()
        .autocomplete({
            source: function(request, response) {
                $.ajax({
                    beforeSend: function() {
                        $("span.help-inline").show();
                        $("span.label-info").empty().hide();
                    },
                    type: 'GET',
                    jsonp: "callback",
                    dataType: "jsonp",
                    url: 'http://dev.markitondemand.com/api/v2/Lookup/jsonp?input=' + request.term,
                    success: function(data) {
                        response($.map(data, function(item) {
                            return {
                                label: item.Name + " (" + item.Symbol + ")",
                                value: item.Symbol
                            }
                        }));
                        $("span.help-inline").hide();
                    }
                });
            },
            minLength: 1
        });
});
