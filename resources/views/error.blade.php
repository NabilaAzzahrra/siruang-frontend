<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 - NOT FOUND</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body class="flex items-center justify-center h-screen p-36">
    <div class="w-full">
        <dotlottie-player src="{{ url('json/error.json') }}" background="transparent" speed="1"
            style="width: 800px; height: 800px" data-aos="zoom-in-up" data-aos-delay="100" data-aos-duration="600"
            data-aos-easing="ease-in-out" loop autoplay></dotlottie-player>
    </div>
    <div class=" w-full p-12 h-[600px] rounded-3xl">
        <div class="bg-[#154366] p-4 rounded-3xl flex items-center justify-center">
            <img src="{{ url('img/lp3i-white.svg') }}" alt="" srcset="" class="w-[300px]">
        </div>
        <div class="bg-gray-100 mt-4 p-4 rounded-3xl h-[350px]">
            <div class="flex items-center justify-center py-20">
                <div id="quote">
                    <div class="flex items-center justify-center">
                        <div class="informasi-y text-[25px]  font-bold">Y</div>
                        <div class="informasi-a text-[25px]  font-bold">a</div>
                        <div class="informasi-h1 text-[25px]  font-bold">h</div>
                        <div class="informasi-h2 text-[25px]  font-bold">h...</div>
                    </div>
                    <div class="flex items-center justify-center">
                        <div class="informasi-m text-[25px]  font-bold">M</div>
                        <div class="informasi-a0 text-[25px]  font-bold">a</div>
                        <div class="informasi-a2 text-[25px]  font-bold">a</div>
                        <div class="informasi-f text-[25px]  font-bold">f</div>
                        <div class="informasi-spasi text-[25px]  font-bold">&nbsp;</div> <!-- Spasi -->
                        <div class="informasi-y2 text-[25px]  font-bold">y</div>
                        <div class="informasi-a3 text-[25px]  font-bold">a</div>
                        <div class="informasi-spasi text-[25px]  font-bold">&nbsp;</div> <!-- Spasi -->
                        <div class="informasi-t text-[25px]  font-bold">t</div>
                        <div class="informasi-e text-[25px]  font-bold">e</div>
                        <div class="informasi-m2 text-[25px]  font-bold">m</div>
                        <div class="informasi-a4 text-[25px]  font-bold">a</div>
                        <div class="informasi-n text-[25px]  font-bold">n</div>
                        <div class="informasi-strip text-[25px]  font-bold">-</div>
                        <div class="informasi-t2 text-[25px]  font-bold">t</div>
                        <div class="informasi-e2 text-[25px]  font-bold">e</div>
                        <div class="informasi-m3 text-[25px]  font-bold">m</div>
                        <div class="informasi-a5 text-[25px]  font-bold">a</div>
                        <div class="informasi-n2 text-[25px]  font-bold">n</div>
                        <div class="informasi-koma text-[25px]  font-bold">,</div>
                        <div class="informasi-spasi text-[25px]  font-bold">&nbsp;</div> <!-- Spasi -->
                        <div class="informasi-h text-[25px]  font-bold">H</div>
                        <div class="informasi-a6 text-[25px]  font-bold">a</div>
                        <div class="informasi-l text-[25px]  font-bold">l</div>
                        <div class="informasi-a7 text-[25px]  font-bold">a</div>
                        <div class="informasi-m4 text-[25px]  font-bold">m</div>
                        <div class="informasi-a8 text-[25px]  font-bold">a</div>
                        <div class="informasi-n3 text-[25px]  font-bold">n</div>
                        <div class="informasi-spasi text-[25px]  font-bold">&nbsp;</div> <!-- Spasi -->
                        <div class="informasi-tidak-t text-[25px]  font-bold">t</div>
                        <div class="informasi-tidak-i text-[25px]  font-bold">i</div>
                        <div class="informasi-tidak-d text-[25px]  font-bold">d</div>
                        <div class="informasi-tidak-a text-[25px]  font-bold">a</div>
                        <div class="informasi-tidak-k text-[25px]  font-bold">k</div>
                        <div class="informasi-spasi text-[25px]  font-bold">&nbsp;</div> <!-- Spasi -->
                        <div class="informasi-t text-[25px]  font-bold">t</div>
                        <div class="informasi-e3 text-[25px]  font-bold">e</div>
                        <div class="informasi-r text-[25px]  font-bold">r</div>
                        <div class="informasi-s text-[25px]  font-bold">s</div>
                        <div class="informasi-e4 text-[25px]  font-bold">e</div>
                        <div class="informasi-d text-[25px]  font-bold">d</div>
                        <div class="informasi-i text-[25px]  font-bold">i</div>
                        <div class="informasi-a9 text-[25px]  font-bold">a</div>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex items-center justify-center">
                    Note <span class="text-red-500">*</span>
                </div>
                <div class="flex items-center justify-center text-center">
                    Untuk melakukan registrasi akun harap hubungi IT atau Pendidikan Politeknik LP3I Kampus Tasikmalaya
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        gsap.from("[class^='informasi-']", {
            duration: 0.8,
            opacity: 0,
            scale: 0,
            y: 80,
            rotationX: 180,
            transformOrigin: "0% 50% -50",
            ease: "back",
            stagger: 0.01,
            repeat: -1,
            yoyo: true,
            repeatDelay: 2
        });



        // gsap.registerPlugin(SplitText);


        // var content = document.getElementById("quote");
        // content.innerHTML = "<span class='informasi'>" +
        // content.innerHTML.split("").join("</span><span class='informasi'>") + "</span>"

        //var mySplitText = new SplitText("#quote");
    </script>
</body>

</html>
