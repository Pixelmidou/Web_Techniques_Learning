<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX : PHP</title>
</head>
<body>
    <h1>List of students</h1>
    <div id="aff"></div>
    <input type="button" value="<<" id="p" onclick="previous()">
    <span id="butsaff"></span>
    <input type="button" value=">>" id="a" onclick="next()">
    <script>
        var i = 0
        var stu = []
        loadstudent()
        buttons()
        document.getElementById("p").addEventListener("click", loadstudent)
        document.getElementById("a").addEventListener("click", loadstudent)
        function loadstudent() {
            xhr = new XMLHttpRequest()
            xhr.open("POST", "ajax9_data.php", true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            xhr.onload = function() {
                if (this.status == 200) {
                    stu = JSON.parse(this.responseText)
                    output = ""
                    for (j = 0; j < stu.length - 1; j++) {
                        output += 
                        '<ul>' + 
                            '<li> Id : ' + stu[j][0] + '</li>' + 
                            '<li> Name : ' + stu[j][1] + '</li>' + 
                            '<li> Date Of Birth : ' + stu[j][2] + '</li>' + 
                        '</ul>'
                    }
                    document.getElementById("aff").innerHTML = output
                }
            }
            xhr.send("i=" + i)
        }
        function buttons() {
            xhr = new XMLHttpRequest()
            xhr.open("POST", "ajax9_data.php", true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            xhr.onload = function() {
                if (this.status == 200) {
                    arr = JSON.parse(this.responseText)
                    x = arr[2]
                    buts = ""
                    h = 1
                    for (y = 1; y <= x; y += 2) {
                        buts += "<input type='button' value='" + h + "' onclick='loadstudentpage(this.value)' >"
                        h++
                    }
                    document.getElementById("butsaff").innerHTML = buts
                }
            }
            xhr.send("i=" + i)
        }
        function loadstudentpage(val) {
            pval = (val - 1) * 2
            i = pval
            xhr = new XMLHttpRequest()
            xhr.open("POST", "ajax9_data.php", true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            xhr.onload = function() {
                if (this.status == 200) {
                    res = JSON.parse(this.responseText)
                    output = ""
                    for (a = 0; a < res.length - 1; a++) {
                        output += 
                        '<ul>' + 
                            '<li> Id : ' + res[a][0] + '</li>' + 
                            '<li> Name : ' + res[a][1] + '</li>' + 
                            '<li> Date Of Birth : ' + res[a][2] + '</li>' + 
                        '</ul>'
                    }
                    document.getElementById("aff").innerHTML = output
                }
            }
            xhr.send("i=" + pval)
        }
        function next() {
            if (i < stu[2] - 2) {
                i += 2
            }
        }
        function previous() {
            if (i > 0) {
                i -= 2
            }
        }
        
    </script>
</body>
</html>