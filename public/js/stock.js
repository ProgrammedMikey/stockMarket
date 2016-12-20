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
                    url: '/getLookUp?symbolsearch=' + request.term,
                    success: function(data) {
                        console.log(data);
                        response($.map(data.response, function(item) {
                            return {
                                label: item.Name + " (" + item.Symbol + ")",
                                value: item.Symbol
                            }
                        }));
                        $("span.help-inline").hide();
                    }
                });
            },
            minLength: 1,
            select: function(event, ui) {
                //socket.emit('chat message', ui.item.value);
                Echo.channel('chat-room.1')
                    .listen('ChatMessageWasReceived', ui.item.value);
                    var symbol = ui.item.value || 'AAPL';
                    new Markit.InteractiveChartApi(symbol, 3650);

            }
        });
});

//var nameElement = $("#symbolsearch");
//$("#addStock").on("click", function() {
//    var symbol = nameElement.val();
//    new Markit.InteractiveChartApi(symbol, 3650);
//});


