document.getElementById("1img").style.display = "none";
        document.getElementById("2img").style.display = "none";
        document.getElementById("3img").style.display = "none";
        document.getElementById("4img").style.display = "none";
        document.getElementById("5img").style.display = "none";
        document.getElementById("6img").style.display = "none";
        document.getElementById("7img").style.display = "none";
        document.getElementById("8img").style.display = "none";
        document.getElementById("9img").style.display = "none";

        setTimeout(() => {
            document.getElementById("solved").style.display = "";
        }, 5000)
        var path1 = "false";
        var path2 = "false";
        var path3 = "false";
        var path4 = "false";
        var path5 = "false";
        var path6 = "false";
        var path7 = "false";
        var path8 = "false";
        var path9 = "false";
        function ver(i)
        {
            var decrypted = md5(path1 + path2 + path3 + path4 + path5 + path6 + path7 + path8 + path9);
            console.log(decrypted + " -----   " + i)
            if(decrypted == i) {
                console.log("Captcha solved")
                document.getElementById("c8f748d48ff").value = "verified";
            }else {
                console.log("Captcha Error")
            }
        }
        function i1(i, i2)
        {
            if(i2 == 1) {
                if(path1 == "false") {
                    path1 = "true";
                    document.getElementById("1img").style.display = "";
                }else {
                    path1 = "false";
                    document.getElementById("1img").style.display = "none";
                }
                console.log(i2 + "    - " + path1);
            }else if (i2 == 2) {
                if(path2 == "false") {
                    path2 = "true";
                    document.getElementById("2img").style.display = "";
                }else {
                    path2 = "false";
                    document.getElementById("2img").style.display = "none";
                }
                console.log(i2 + "    - " + path2);
            }else if (i2 == 3) {
                if(path3 == "false") {
                    path3 = "true";
                    document.getElementById("3img").style.display = "";
                }else {
                    path3 = "false";
                    document.getElementById("3img").style.display = "none";
                }
                console.log(i2 + "    - " + path3);
            }else if (i2 == 4) {
                if(path4 == "false") {
                    path4 = "true";
                    document.getElementById("4img").style.display = "";
                }else {
                    path4 = "false";
                    document.getElementById("4img").style.display = "none";
                }
                console.log(i2 + "    - " + path4);
            }else if (i2 == 5) {
                if(path5 == "false") {
                    path5 = "true";
                    document.getElementById("5img").style.display = "";
                }else {
                    path5 = "false";
                    document.getElementById("5img").style.display = "none";
                }
                console.log(i2 + "    - " + path5);
            }else if (i2 == 6) {
                if(path6 == "false") {
                    path6 = "true";
                    document.getElementById("6img").style.display = "";
                }else {
                    path6 = "false";
                    document.getElementById("6img").style.display = "none";
                }
                console.log(i2 + "    - " + path6);
            }else if (i2 == 7) {
                if(path7 == "false") {
                    path7 = "true";
                    document.getElementById("7img").style.display = "";
                }else {
                    path7 = "false";
                    document.getElementById("7img").style.display = "none";
                }
                console.log(i2 + "    - " + path7);
            }else if (i2 == 8) {
                if(path8 == "false") {
                    path8 = "true";
                    document.getElementById("8img").style.display = "";
                }else {
                    path8 = "false";
                    document.getElementById("8img").style.display = "none";
                }
                console.log(i2 + "    - " + path8);
            }else if (i2 == 9) {
                if(path9 == "false") {
                    path9 = "true";
                    document.getElementById("9img").style.display = "";
                }else {
                    path9 = "false";
                    document.getElementById("9img").style.display = "none";
                }
                console.log(i2 + "    - " + path9);
            }
        }