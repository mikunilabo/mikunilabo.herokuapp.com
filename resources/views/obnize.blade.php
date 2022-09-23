<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  </head>
  <body>
    <div id="obniz-debug"></div>

    <h3>Keyestudio_HT16K33</h3>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://unpkg.com/obniz@3.22.0/obniz.js" crossorigin="anonymous"></script>
    <script>
        "use strict";

        var obniz = new Obniz("OBNIZ_ID_HERE");
        obniz.onconnect = async function() {
            const date = new Date();
            const dateStr = `${date.getFullYear()}-${('0' + (date.getMonth()+1)).slice(-2)}-${('0' + date.getDate()).slice(-2)} ${('0' + date.getHours()).slice(-2)}:${('0' + date.getMinutes()).slice(-2)}`;
            obniz.display.print(dateStr);

            const matrix = obniz.wired("Keyestudio_HT16K33", { gnd:0, vcc:1, sda:2, scl:3 });
            matrix.brightness(5);// 0~15の整数値を入れる。暗くても十分視認できるため基本的に0でOK

            const ctx = obniz.util.createCanvasContext(matrix.width, matrix.height);

            // ２進数（ビット列）を10進数で表現
            // ／斜線
            // const dots = [
            //   parseInt("10000000", 2),
            //   parseInt("01000000", 2),
            //   parseInt("00100000", 2),
            //   parseInt("00010000", 2),
            //   parseInt("00001000", 2),
            //   parseInt("00000100", 2),
            //   parseInt("00000010", 2),
            //   parseInt("00000001", 2),
            // ];

            // ○
            // const dots = [
            //   parseInt("00111100", 2),
            //   parseInt("01000010", 2),
            //   parseInt("10000001", 2),
            //   parseInt("10000001", 2),
            //   parseInt("10000001", 2),
            //   parseInt("10000001", 2),
            //   parseInt("01000010", 2),
            //   parseInt("00111100", 2),
            // ];

            // × クロス
            // const dots = [
            //   parseInt("10000001", 2),
            //   parseInt("01000010", 2),
            //   parseInt("00100100", 2),
            //   parseInt("00011000", 2),
            //   parseInt("00011000", 2),
            //   parseInt("00100100", 2),
            //   parseInt("01000010", 2),
            //   parseInt("10000001", 2),
            // ];

            // matrix.dots(dots);



            // Scroll mag
            let x = matrix.width;
            obniz.repeat(async function(){
                ctx.fillStyle = "black";
                ctx.fillRect(0, 0, matrix.width, matrix.height);
                ctx.fillStyle = "white";
                ctx.font = "9px sans-serif";
                ctx.fillText(dateStr, x, matrix.height);
                x--;

                matrix.draw(ctx);
            }, 1000/7);


            // called on offline
            obniz.onclose = async function() {
                // obniz.display.clear();
                // obniz.display.print('Bye!');
            };
        };
    </script>
  </body>
</html>
