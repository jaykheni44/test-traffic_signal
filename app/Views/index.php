<html>
    <head>
        <title>Traffic Signal</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container text-center">
            <div class="row">
                <div class="col" id="clrA">
                    <label>Signal A</label><br>
                    <input type="text" id="signal_a" value="2">
                </div>
                <div class="col" id="clrB">
                    <label>Signal B</label><br>
                    <input type="text" id="signal_b" value="1">
                </div>
                <div class="col" id="clrC">
                    <label>Signal C</label><br>
                    <input type="text" id="signal_c" value="3">
                </div>
                <div class="col" id="clrD">
                    <label>Signal D</label><br>
                    <input type="text" id="signal_d" value="4">
                </div>
            </div>
        </div>
        <br>
        <hr>
        <div class="container text-center">
            <div>
                <label>Green Light Interval</label>
                <input type="text" id="GL_int" value="20">
            </div>
            <br>
            <div>
                <label>Yellow Light Interval</label>
                <input type="text" id="YL_int" value="3">
            </div>
        </div>
        <br>
        <hr>
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-success" id="start">Start</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-danger" id="stop">Stop</button>
                </div>
            </div>
        </div>
    </body>
    <script>
        var signal;
        var status = 1;
        var i = 1;
        $(document).ready(function(){
            $("#start").click(function(){
                signalFunction();
            });
            $("#stop").click(function(){
                $("#clrA").css("background-color","#FFFFFF");
                $("#clrB").css("background-color","#FFFFFF");
                $("#clrC").css("background-color","#FFFFFF");
                $("#clrD").css("background-color","#FFFFFF");
                status = 0;
                return false;
            });
            function signalFunction(){
                if(status == 1){
                    var signalA = $("#signal_a").val();
                    var signalB = $("#signal_b").val();
                    var signalC = $("#signal_c").val();
                    var signalD = $("#signal_d").val();
                    var inretvalGL = $("#GL_int").val()*1000;
                    var inretvalYL = $("#YL_int").val()*1000;
                    if(signalA == i){
                        signal = "A";
                    }
                    if(signalB == i){
                        signal = "B";
                    }
                    if(signalC == i){
                        signal = "C";
                    }
                    if(signalD == i){
                        signal = "D";
                    }
                    console.log(signal);
                    greenLightInterval(inretvalGL,inretvalYL);
                }
            }
            function greenLightInterval(greenLight,yellowLight){
                if(status == 1){
                    $("#clr"+signal).css("background-color","#008000");
                    setTimeout(function(greenLight){
                        yellowLightInterval(yellowLight)
                    },greenLight);
                }
            }
            function yellowLightInterval(yellowLight){
                if(status == 1){
                    $("#clr"+signal).css("background-color","#FFFF00");
                    setTimeout(function(yellowLight){
                        redLightInterval();
                    },yellowLight);
                }
            }
            function redLightInterval(){
                if(status == 1){
                    i++;
                    if(i == 5){
                        i = 1;
                    }
                    $("#clr"+signal).css("background-color","#f00");
                    signalFunction();
                }
            }
        });
    </script>
</html>