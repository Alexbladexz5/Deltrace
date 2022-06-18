function initScanner() {
    var sound = new Audio("audio/scanner_beep.mp3");

    Quagga.init(
        {
            inputStream: {
                name: "Live",
                type: "LiveStream",
                constraints: {
                    width: 640,
                    height: 480,
                },
                target: document.querySelector("#interactive"),
            },
            decoder: {
                readers: ["ean_reader"],
            },
            frequency: 1,
        },
        function (err) {
            if (err) {
                console.log(err);
                return;
            }
            console.log("Initialization finished. Ready to start");
            Quagga.start();
        }
    );

    Quagga.onProcessed(function (result) {
        var drawingCtx = Quagga.canvas.ctx.overlay,
            drawingCanvas = Quagga.canvas.dom.overlay;

        if (result) {
            if (result.boxes) {
                drawingCtx.clearRect(
                    0,
                    0,
                    parseInt(drawingCanvas.getAttribute("width")),
                    parseInt(drawingCanvas.getAttribute("height"))
                );
                result.boxes
                    .filter(function (box) {
                        return box !== result.box;
                    })
                    .forEach(function (box) {
                        Quagga.ImageDebug.drawPath(
                            box,
                            {
                                x: 0,
                                y: 1,
                            },
                            drawingCtx,
                            {
                                color: "green",
                                lineWidth: 2,
                            }
                        );
                    });
            }
            if (result.box) {
                Quagga.ImageDebug.drawPath(
                    result.box,
                    {
                        x: 0,
                        y: 1,
                    },
                    drawingCtx,
                    {
                        color: "green",
                        lineWidth: 2,
                    }
                );
            }
            if (result.codeResult && result.codeResult.code) {
                Quagga.ImageDebug.drawPath(
                    result.line,
                    {
                        x: "x",
                        y: "y",
                    },
                    drawingCtx,
                    {
                        color: "red",
                        lineWidth: 3,
                    }
                );
            }
        }
    });

    Quagga.onDetected(function (result) {
        Quagga.stop();
        var code = result.codeResult.code;
        $.ajax({
            url: "scanner.php",
            type: "POST",
            data: {
                code: code,
            },
            success: function (data) {
                if (data == "success") {
                } else {
                    alert(data);
                }
            },
        });
        sound.play();
        document.getElementById("autocomplete-app").value = code;
        document.getElementById("closeScannerButton").click();
    });
}
